<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('user.website.dashboard');
    }

    public function getPrompt($id){
        $product = Product::findOrFail( decrypt($id),['price','title']);
        return $product;

        
    }

        public function logout(){
            Auth::logout();
            return redirect()->route('home')->with('success', "Logged out!");
        }
}
