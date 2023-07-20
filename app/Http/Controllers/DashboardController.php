<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Services\Services;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    public function prompts(Request $request){
       
        $prompts = Product::with('user','subSubCategory')->where('user_id',Auth::id())->where('status','active')->latest()->paginate(100);
        if($request->isMethod('post')){
            if($request->filterType == "active"){
                $prompts = Product::with('user','subSubCategory')->where('user_id',Auth::id())->where('status','active')->latest()->paginate(100);
            }elseif($request->filterType == "inactive"){
                $prompts = Product::with('user','subSubCategory')->where('user_id',Auth::id())->where('status','inactive')->latest()->paginate(100);
            }elseif($request->filterType == "default"){
                $prompts = Product::with('user','subSubCategory')->where('user_id',Auth::id())->where('status','active')->latest()->paginate(100);
            }elseif($request->filterType == "search"){
                $prompts = Product::with('user','subSubCategory')->where('title','like','%'.$request->value.'%')->where(['user_id'=>Auth::id(),'status'=>'active'])->latest()->paginate(100);
            }else{
                $prompts = Product::with('user','subSubCategory')->where('user_id',Auth::id())->where('status','active')->latest()->paginate(100);
            }
            $prompts = $prompts->appends($request->all());
            return view('user.website.includes.prompts_append',compact('prompts'));
        }
        $prompts = $prompts->appends($request->all());
        return view('user.website.prompts',compact('prompts'));
    }

    public function promptsEdit(Request $request,$product){
        
        $prompt = Product::with('user','subSubCategory')->find($product);

        if($request->isMethod('post')){
            $request->validate([
                'image'                 => 'nullable',
                'title'                 => 'required',
                'description'           => 'required',
                'price'                 => 'required',
                'sub_sub_category_id'   => 'required',
                'instructions'          => 'required',
            ]);
          
        }

        $categories = Category::with('subCategories')->where('status','active')->latest()->get();
        $subCategories = SubCategory::with('subSubCategories')->latest()->get();
        return view('user.website.prompt_deatils',compact('prompt','categories','subCategories'));
    }
}
