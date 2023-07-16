<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $setting = Setting::first();
        return view('user.website.index',compact('setting'));
    }

    public function contactus(Request $request, Contact $contact){
        if($request->isMethod('post')){
            $contact->create($request->all());
            return redirect()->route('home')->with('success','Message Sent Successfully');
        }
        $setting = Setting::first();
        return view('user.website.contact_us', compact('setting'));
    }

    public function aboutUs(){
        $aboutus = About::first();
        $setting  = Setting::first();
        return view("user.website.aboutus", compact('aboutus','setting'));
    }
}
