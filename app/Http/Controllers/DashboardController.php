<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Services;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{

    private $services; 
    public function __construct(Services $services)
    {
        $this->services = $services;
    }

    public function dashboard(){
        return view('user.website.dashboard');
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('home')->with('success', "Logged out!");
    }

    public function profile(Request $request, User $user){
        if($request->isMethod('post')){

            $request->validate([
                'name'      => 'required|string',
                'email'      => 'required|email',
                'phone'     => 'required|string',
                'address'   => 'required|string',
                'password'   => 'nullable',
                'confirm_password' => 'nullable|same:password',
            ]);
           
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            if(isset($request->password)) $user->password = Hash::make($request->password);
            if($request->hasFile('profile')) $this->services->imageDestroy($user->profile_photo_path,'profile/');
            if($request->hasFile('profile')) $user->profile_photo_path = $this->services->imageUpload($request->file('profile'), 'profile/');
            $user->save();
            return redirect()->back()->with('success','Profile Updated');

        }
        return view('user.website.profile',compact('user'));
    }
}
