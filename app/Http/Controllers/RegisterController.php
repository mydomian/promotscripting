<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function login(Request $request){
        
        if($request->isMethod('post')){
            $request->validate(['email' => 'required|email','password' => 'required']);
            $user = User::where('email',$request->email)->first();
            
            if($user){
                Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
                return redirect()->route('user.dashboard')->withSuccess('Successfully Login');
            }
            return back()->withError('Wrong Credentials, Invalid Email or Password');
        }
        return view('user.website.login');
    }



    public function register(Request $request, User $user){
        if($request->isMethod('post')){
            $request->validate([
                'name'      => 'required|string',
                'email'     => 'required|email|unique:users,email',           
                'password'  => 'required|min:6',
                'confirm_password'     => 'required|same:password'
            ]);
            try {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->profile_photo_path = 'default.png';
                $user->password = \bcrypt($request->password);
                $user->save();
                return redirect()->route('user.login')->with('success', 'Succesfully Registered, Login to continue');
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
        return view('user.website.register');
        
    }

    public function forgetPassword(Request $request){
        if($request->isMethod('post')){
            
        }
        return view('user.website.forget-password');
    }
}
