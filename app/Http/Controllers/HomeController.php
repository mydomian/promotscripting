<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Favourite;
use App\Models\Order;
use App\Models\Product;
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

    public function blog(){
        $blogs = Blog::with('category','subCategory','subSubCategory')->where('status','active')->latest()->paginate(3);
        return view('user.website.blog',compact('blogs'));
    }

    public function blogSeeMoreLoad(Blog $blog){
        return response()->json(['blog'=>$blog]);
    }

    public function userFavourite($product){
        $fav = Favourite::where(['product_id'=>$product,'user_ip'=>userLocalIp()])->first();
        if($fav){
            $fav->delete();
        }else{
            $fav = Favourite::create(['product_id'=>$product,'user_ip'=>userLocalIp()]);
        }
        return back()->with('success','Check Favourite Lists');
    }

    public function hire(){
        $mostOrders = Order::with('user','product')->inRandomOrder()->limit(50)->get();
        $midJourneys = Product::with('user')->where(['status'=>'active'])->get()->unique('user_id');
        return view('user.website.hire',compact('mostOrders','midJourneys'));
    }
}
