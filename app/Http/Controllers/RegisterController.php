<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function login(Request $request){
     
        return view('user.website.login');
    }

    public function register(Request $request){
        return view('user.website.register');
    }
}
