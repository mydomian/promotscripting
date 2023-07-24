<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Charge;
use App\Models\PaymentInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    public function info(){
        $charges = Charge::first();
        $user_id = User::where('id', Auth::id())->where('is_admin','admin')->first();
        $info = PaymentInfo::where('user_id', $user_id->id )->first();
        return view('admin.payment-info',compact('info','charges'));
    }

    public function update(Request $request){
        
        $info = PaymentInfo::first();
        $info->update([
            'user_id' => Auth::id(),
            'publishable_key' => $request->publishable_key,
            'secret_key' => $request->secret_key,
        ]);

        return back()->with('success', 'Updated!');
    }

    public function checkouts(){

        // $stripe = new \Stripe\StripeClient('sk_test_4eC39HqLyjWDarjtT1zdp7dc');
        // $checkouts=$stripe->checkout->sessions->all();
        // return $checkouts;
        return view('admin.checkouts');
    }
}
