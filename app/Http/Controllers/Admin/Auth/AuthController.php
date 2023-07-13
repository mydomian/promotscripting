<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){
            $request->validate(['email' => 'required|email','password' => 'required']);
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'is_admin'=>'admin'])){
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('admin.login')->with('@Sorry, Invalid Email and Password!');
        }
        return view('admin.login');
    }

  
}
