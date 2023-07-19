<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\CustomerPaymentInfo;
use App\Models\PaymentInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

        return redirect()->route('user.dashboard')->with('success','Posted successfully!');

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
}
