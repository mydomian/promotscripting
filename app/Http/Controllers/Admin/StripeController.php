<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    public function info(){
        $user_id = User::where('id', Auth::id())->where('is_admin','admin')->first();
        $info = PaymentInfo::where('user_id', $user_id->id )->first();
        return view('admin.payment-info',compact('info'));
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
}
