<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $setting = Setting::first();
        return view('user.website.index',compact('setting'));
    }
}
