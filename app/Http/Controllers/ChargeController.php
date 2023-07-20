<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use Illuminate\Http\Request;

class ChargeController extends Controller
{
    public function charge(Request $request){
        $request->validate([
            'buyer_charge'  => 'required|numeric',
            'seller_charge' => 'required|numeric'
        ],[
            'buyer.required'     => 'Insert a value',
            'buyer.number'       => 'Value must be a number',
            'seller.required'    => 'Insert a value',
            'seller.number'      => 'Value must be a number'
        ]);

        $charges = Charge::first();
        $charges->update([
            'buyer_charge' => $request->buyer_charge,
            'seller_charge' => $request->seller_charge,
        ]);

        return back()->with('success', 'Charge Applied!');

    }
}
