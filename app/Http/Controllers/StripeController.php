<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class StripeController extends Controller
{

    public function createAcc(Request $request)
    {
        $request->validate([
            'country_id' => 'required'
        ],[
            'country_id.required' => 'Please select a country.'
        ]);
        $country_code = Country::find($request->country_id)->code;
        
        $stripe = new \Stripe\StripeClient('sk_test_51MdVopI5vndzPyR8raL9vEY79KT2Iv22xGMebpbPOnFMc8jClAEjvnCeqMIGYeJQGgD9SWAHqduTPB64YA1KqmIY00cfZ7o7Ml');
        
        $id =   $stripe->accounts->create([
            'type' => 'express',
            'country' => $country_code,
            'email' => Auth::user()->email,
            'capabilities' => [
                'card_payments' => ['requested' => true],
                'transfers' => ['requested' => true],
            ],
        ]);

        $stripe = new \Stripe\StripeClient('sk_test_51MdVopI5vndzPyR8raL9vEY79KT2Iv22xGMebpbPOnFMc8jClAEjvnCeqMIGYeJQGgD9SWAHqduTPB64YA1KqmIY00cfZ7o7Ml');
        $data =  $stripe->accountLinks->create([
            'account' => $id->id,
            'refresh_url' => 'http://127.0.0.1:8000/connect-bank',
            'return_url' => 'http://127.0.0.1:8000',
            'type' => 'account_onboarding',
            'collect' => 'eventually_due',
        ]);

        return Redirect::to($data->url);
    }
}
