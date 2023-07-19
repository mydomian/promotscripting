<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin;
use App\Models\User;
use App\Services\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Profiler\Profile;

class AuthController extends Controller
{
    private $services; 
    public function __construct(Services $services)
    {
        $this->services = $services;
    }

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
    
    public function logout(){
        Auth::logout();
        return redirect()->route("admin.login")->with('success','Logout Successfully');
    }

    public function forgetPassword(Request $request){
        if($request->isMethod('post')){

        }
        return view('admin.forget_password');
    }

    public function profile(Request $request,User $user){
        if($request->isMethod('post')){
            if($request->hasFile('profile')) $this->services->imageDestroy($user->profile_photo_path,'profile/');
            $user->profile_photo_path =  $this->services->imageUpload($request->file('profile'), 'profile/');
            $user->password =  Hash::make($request->password);
            $user->name =  $request->name;
            $user->email =  $request->email;
            $user->phone =  $request->phone;
            $user->address =  $request->address;
            $user->save();
            return redirect()->route('admin.dashboard')->with('success','Profile Updated Successfully');
        }
        return view('admin.profile',compact('user'));
    }
  
}
