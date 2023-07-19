<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\Services;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    private $services; 
    public function __construct(Services $services)
    {
        $this->services = $services;
    }

    public function setting(Request $request){
        $setting = Setting::first();
        if($request->isMethod('post')){
            if(isset($request->name)) $setting->name = $request->name;
            if(isset($request->phone)) $setting->phone = $request->phone;
            if(isset($request->email))  $setting->email = $request->email;
            if(isset($request->location)) $setting->location = $request->location;
            if(isset($request->facebook))  $setting->facebook = $request->facebook;
            if(isset($request->twitter)) $setting->twitter = $request->twitter;
            if(isset($request->instagram)) $setting->instagram = $request->instagram;
            if(isset($request->whatsapp)) $setting->whatsapp = $request->whatsapp;
            if(isset($request->footer_description)) $setting->footer_description = $request->footer_description;

            if($request->hasFile('logo')) $this->services->imageDestroy($setting->logo,$request->file('logo'),'logo/');
            if($request->hasFile('logo')) $setting->logo = $this->services->imageUpload($request->file('logo'), 'images/logo/');
                
            if($request->hasFile('favicon')) $image = $this->services->imageDestroy($setting->favicon,$request->file('favicon'),'favicon/');
            if($request->hasFile('favicon')) $setting->favicon = $this->services->imageUpload($request->file('favicon'), 'images/favicon/');
        
            if($request->hasFile('login_register_background_image')) $this->services->imageDestroy($setting->login_register_background_image,$request->file('login_register_background_image'),'background/');
            if($request->hasFile('login_register_background_image')) $setting->login_register_background_image = $this->services->imageUpload($request->file('login_register_background_image'), 'images/background/');

            $setting->save();
            return back()->with('success','Successfully Updated !');
        }
        return view('admin.setting',compact('setting'));
    }
}
