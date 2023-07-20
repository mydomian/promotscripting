<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use App\Models\Country;
use App\Models\CustomerPaymentInfo;
use App\Models\PaymentInfo;
use App\Models\Product;
use App\Models\StripeCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $paymentInfo = CustomerPaymentInfo::where('user_id', Auth::id())->where('is_completed', 1)->first();


        if ($paymentInfo) {

            //     $stripe = new \Stripe\StripeClient($secret_key);
            //    $data = $stripe->accounts->createLoginLink(
            //         $paymentInfo->account,
            //         []
            //     );
            //     return Redirect::to($data->url);

            return redirect()->route('user.dashboard')->with('success', 'Posted successfully!');
        } else {
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

            $stripe = new \Stripe\StripeClient($secret_key);
            $data =  $stripe->accountLinks->create([
                'account' => $id->id,
                'refresh_url' => 'http://127.0.0.1:8000/connect-bank',
                'return_url' => 'http://127.0.0.1:8000/dashboard',
                'type' => 'account_onboarding',
            ]);
            CustomerPaymentInfo::create([
                'user_id' =>  Auth::id(),
                'account' => $id->id,
                'is_completed' => 1
            ]);
            return Redirect::to($data->url);
        }
    }


    public function getPrompt($id)
    {
        $product = Product::findOrFail(decrypt($id), ['id','title', 'price']);
        $charge = Charge::first()->buyer_charge;
        // return intval($charge);
        $sk = PaymentInfo::first()->secret_key;
        $stripe = new \Stripe\StripeClient($sk);
        $customer = $stripe->customers->create([
            'description' => 'My First Test Customer (created for API docs at https://www.stripe.com/docs/api)',
          ]);

          StripeCustomer::create([
            'user_id'       => Auth::id(),
            'product_id'    => $product->id,
            'customer_id'   => $customer->id
          ]);


       $session = $stripe->checkout->sessions->create([
              'customer' => $customer,
            'line_items' => [
                [
                    'price_data' => [
                        'currency'=> 'usd',
                        'product_data' =>[
                            'name' => $product->title
                        ],
                        'unit_amount' => $product->price * 100
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('marketplace'),
        ]);

       
       if($charge > 0 ){         
           $chargeAmount = number_format(($product->price * ( intval($charge) / 100)), 2);
           $stripe->charges->create([
            'amount'    => $chargeAmount * 100,
            'currency'  => 'usd',
            'source'    => 'tok_amex',
          ]);
       }
        

        return redirect()->away($session->url);
    }



    public function success(){
        return view('user.website.success');
    }
}
