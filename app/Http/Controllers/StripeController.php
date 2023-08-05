<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartOrder;
use App\Models\Charge;
use App\Models\Country;
use App\Models\Currency;
use App\Models\CustomerPaymentInfo;
use App\Models\Order;
use App\Models\PaymentInfo;
use App\Models\Product;
use App\Models\Sale;
use App\Models\StripeCustomer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Ramsey\Uuid\Type\Integer;

class StripeController extends Controller
{

    public function createAcc(Request $request)
    {
        $request->validate([
            'country_id' => 'required'
        ], [
            'country_id.required' => 'Please select a country.'
        ]);
        $country_code = Country::find($request->country_id)->code;

        $secret_key = PaymentInfo::first()->secret_key;
        $user = User::where('id', Auth::id())->first();


        if ($user->is_onboarding_completed == 0) {

            if (empty($user->stripe_id)) {

                $stripe = new \Stripe\StripeClient($secret_key);
                $id =   $stripe->accounts->create([
                    'type' => 'express',
                    'country' => $country_code,
                    'email' => Auth::user()->email,
                    'capabilities' => [
                        'card_payments' => ['requested' => true],
                        'transfers' => ['requested' => true],
                    ],
                ]);

                $user->update([
                    'stripe_id' => $id->id
                ]);
            }
            $user->fresh();
            $stripe = new \Stripe\StripeClient($secret_key);
            $data =  $stripe->accountLinks->create([
                'account' => $user->stripe_id,
                'refresh_url' => env('APP_URL') . '/connect-bank',
                'return_url' => route('onboarding.completed', encrypt($user->stripe_id)),
                'type' => 'account_onboarding',
            ]);
            return Redirect::to($data->url);
        }

        // $stripe = new \Stripe\StripeClient($secret_key);
        // $loginLink = $stripe->accounts->createLoginLink(
        //     $user->stripe_id
        // );

        // return Redirect::to($loginLink->url);
        return redirect()->route('user.dashboard')->with('success', 'Your prompt is ready to be approved, Please wait!');
    }


    public function getPrompt($id)
    {
        $product = Product::findOrFail(decrypt($id), ['id', 'user_id', 'title', 'price']);
        $charge = Charge::first()->buyer_charge;
        $chargeAmount = number_format(($product->price * ($charge / 100)), 2) * 100;
        $sk = PaymentInfo::first()->secret_key;
        $stripe = new \Stripe\StripeClient($sk);

        $order = Order::create([
            'user_id'           => Auth::id(),
            'product_id'        => $product->id,
            'price'             => $product->price,
            'charge_amount'     => $chargeAmount  > 50 ? $chargeAmount / 100 : '0.00',
            'charge_percentage' => $charge,
            'collect_price'     => $chargeAmount  > 50 ? $product->price + ($chargeAmount / 100) : $product->price,
            'seller_id'         => $product->user_id
        ]);

        createNotification($order->id, 'orders');

        $customer = $stripe->customers->create([
            'description' => $product->id,
        ]);

        StripeCustomer::create([
            'user_id'       => Auth::id(),
            'product_id'    => $product->id,
            'customer_id'   => $customer->id
        ]);

        $session = $stripe->checkout->sessions->create([
            'customer'   => $customer,
            'line_items' => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => $product->id
                        ],
                        'unit_amount'  => $product->price * 100
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => env('APP_URL') . '/success?session_id={CHECKOUT_SESSION_ID}&order_id=' . encrypt($order->id),
            'cancel_url'  => route('marketplace'),
        ]);


        if ($chargeAmount > 50) {
            $stripe->charges->create([
                'amount'    => $chargeAmount,
                'currency'  => 'usd',
                'source'    => 'tok_amex',
            ]);
        }


        return redirect()->away($session->url);
    }



    public function success(Request $request)
    {
        $order = Order::find(decrypt($request->order_id));
        $secret_key = PaymentInfo::first()->secret_key;
        $stripe = new \Stripe\StripeClient($secret_key);
        $session = $stripe->checkout->sessions->retrieve(
            $request->session_id
        );

        $order->update([
            'is_paid'        => $session->payment_status,
            'transaction_id' => $session->payment_intent
        ]);

        $sale = Sale::create([
            'user_id'       => $order->user_id,
            'product_id'    => $order->product_id,
            'price'         => $order->price,
            'seller_id'     => $order->product->user_id,
            'order_id'      => $order->id
        ]);

        return view('user.website.success');
    }


    public function completed($id)
    {
        $user = User::whereStripeId(decrypt($id))->firstOrFail();
        $user->update([
            'is_onboarding_completed' => 1
        ]);

        return redirect(route('user.dashboard'))->with('success', 'Onboarding Successsful!');
    }

    public function destroy()
    {
        $account = User::find(Auth::id());
        $sk = PaymentInfo::first()->secret_key;
        if (!empty($account->stripe_id)) {
            $stripe = new \Stripe\StripeClient($sk);
            $success =  $stripe->accounts->delete(
                $account->stripe_id,
            );

            if ($success->deleted == 'true') {
                $account->update([
                    'stripe_id' => NULL,
                    'is_onboarding_completed' => 0
                ]);
                return back()->with('success', 'Stripe Account Deleted');
            }
        }
        return back()->with('error', "You haven't connect a stripe account yet");
    }

    public function payout()
    {

        $secret_key = PaymentInfo::first()->secret_key;
        $stripe = new \Stripe\StripeClient($secret_key);
        $account = User::find(Auth::id());
        $balance = $stripe->balance->retrieve([], ['stripe_account' => $account->stripe_id]);
        foreach($balance->available as $amount){
            $availableAmount =  $amount->amount / 100;
            $currency = $amount->currency;
        }
        foreach($balance->pending as $amount){
            $pendingAmount =  $amount->amount / 100;
        }
        $totalBalance = $availableAmount + $pendingAmount;
        $info = $stripe->accounts->retrieve(
            $account->stripe_id
          );
        $schedule = $info->settings->payouts->schedule->interval;
        $minimum_payout = Currency::where('country_code', $info->country)->first();
        $payoutList = $stripe->payouts->all(['limit'=>5],['stripe_account' => $account->stripe_id])->data;
       
        return view('user.website.payout',compact('availableAmount', 'currency', 'pendingAmount', 'totalBalance', 'schedule','minimum_payout', 'payoutList'));
    }


    public function cartCheckout(){
        $cart           = cart();
        $totalAmount    =  $cart->sum('price');
        $charge         = Charge::first()->buyer_charge;
        $chargeAmount   = number_format(($totalAmount * ($charge / 100)), 2) * 100;
        $sk             = PaymentInfo::first()->secret_key;
        $stripe         = new \Stripe\StripeClient($sk);
        foreach($cart as $product){
            $products[] = $product->product_id;
        }
       
        $cart_order = CartOrder::create([
            'buyer_id'          => Auth::id(),
            'product_quantity'  => $cart->count(),
            'product_id'    => json_encode($products),
            'cart_total'    => $totalAmount,
            'charge_amount' => $chargeAmount  > 50 ? $chargeAmount / 100 : '0.00',
            'charge_percentage'  => $charge,
            'total_amount'       => $chargeAmount  > 50 ? $totalAmount + ($chargeAmount / 100) : $totalAmount,
        ]);
        foreach($cart as $product){
            $perPoductChargeAmount   = number_format(($product->product->price * ($charge / 100)), 2) * 100;
             Order::create([
                'user_id'           => Auth::id(),
                'product_id'        => $product->product_id,
                'price'             => $product->product->price,
                'charge_amount'     => $perPoductChargeAmount  > 50 ? $perPoductChargeAmount / 100 : '0.00',
                'charge_percentage' => $charge,
                'collect_price'     => $perPoductChargeAmount  > 50 ? $product->product->price + ($perPoductChargeAmount / 100) : $product->product->price,
                'seller_id'         => $product->product->user_id,
                'cart_order_id'     => $cart_order->id
            ]);
        }
        $customer = $stripe->customers->create([
            'description' => 'cart checkout',
        ]);
      
        $session = $stripe->checkout->sessions->create([
            'customer'   => $customer,
            'line_items' => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => 'Checkout From Cart'
                        ],
                        'unit_amount'  => $totalAmount * 100
                    ],
                    'quantity' => $cart->count(),
                ],
            ],
            'mode' => 'payment',
            'success_url' => env('APP_URL') . '/cart-checkout-success?session_id={CHECKOUT_SESSION_ID}&cart_order_id=' . encrypt($cart_order->id),
            'cancel_url'  => route('marketplace'),
        ]);
        if ($chargeAmount > 50) {
            $stripe->charges->create([
                'amount'    => $chargeAmount,
                'currency'  => 'usd',
                'source'    => 'tok_amex',
            ]);
        }


        return redirect()->away($session->url);

        
    }

    public function cartSuccess(Request $request){
        $cartOrder = CartOrder::find(decrypt($request->cart_order_id));
        $secret_key = PaymentInfo::first()->secret_key;
        $stripe = new \Stripe\StripeClient($secret_key);
        $session = $stripe->checkout->sessions->retrieve(
            $request->session_id
        );

        $cartOrder->update([
            'is_paid'        => $session->payment_status,
            'transaction_id' => $session->payment_intent
        ]);
       
        foreach(json_decode($cartOrder->product_id)  as $order){
           
           $orderedProduct = Order::where('user_id', Auth::id())->where('product_id', $order)->where('cart_order_id', decrypt($request->cart_order_id))->first();
           
            $orderedProduct->update([
                'is_paid'        => $session->payment_status,
                'transaction_id' => $session->payment_intent
            ]);
            Sale::create([
                'user_id'       => $orderedProduct->user_id,
                'product_id'    => $orderedProduct->product_id,
                'price'         => $orderedProduct->price,
                'seller_id'     => $orderedProduct->product->user_id,
                'order_id'      => $orderedProduct->id
            ]);
            $cart = Cart::where('user_id',Auth::id())->where('product_id',$order)->first();
            $cart->delete();
            
        }
        
        return redirect()->route('user.dashboard');
    }
}
