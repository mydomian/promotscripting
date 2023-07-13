<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('user.website.dashboard');
    }

        public function logout(){
            Auth::logout();
            return redirect()->route('home')->with('success', "Logged out!");
        }
}
