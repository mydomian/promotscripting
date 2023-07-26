<?php

namespace App\Http\Controllers;

use App\Models\NotificationSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationSettingController extends Controller
{
    public function change(Request $request){
       $setting = NotificationSetting::where('user_id', Auth::id())->first();
       
       $setting->update([
        'new_prompt_notification' => $request->prompt_notification ? 1 : 0,
        'new_sale_notification' => $request->sale_notification ? 1 : 0,
        'new_purchase_notification' => $request->purchase_notification ? 1 : 0,
        'new_favourites_notification' => $request->favourite_notification ? 1 : 0,
        'new_prompt_email' => $request->prompt_email ? 1 : 0,
        'new_sale_email' => $request->sale_email ? 1 : 0,
        'new_purchase_email' => $request->purchase_email ? 1 : 0,
        'new_favourites_email' => $request->favourite_email ? 1 : 0,
       ]);
       return back()->with('success', 'Email & Notification settings updated!');
    }
}
