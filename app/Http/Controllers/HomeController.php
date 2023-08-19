<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Favourite;
use App\Models\Order;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\User;
use App\Models\UserFavourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function home(){
        $setting = Setting::first();
        $categories = Category::where('status','active')->select('id','category_name','category_icon')->get();
        $prompts = Product::with('subCategory')->where('status','active')->inRandomOrder()->limit(4)->get();
        return view('user.website.index',compact('setting','categories','prompts'));
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
        $blogs = Blog::with('category','subCategory')->where('status','active')->latest()->paginate(3);
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
            createNotification($fav->id,'favourites');
        }
        return back()->with('success','Check Favourite Lists');
    }

    public function hire(){
        $mostOrders = Order::with('user','product')->where('status','approve')->inRandomOrder()->limit(50)->get();
        $midjourneys = Product::with('user')->where(['status'=>'active','is_type'=>'midjourney'])->get()->unique('user_id');
        $gpts = Product::with('user')->where(['status'=>'active','is_type'=>'gpt'])->get()->unique('user_id');
        $stablediffusions = Product::with('user')->where(['status'=>'active','is_type'=>'stablediffusion'])->get()->unique('user_id');
        $dalles = Product::with('user')->where(['status'=>'active','is_type'=>'dalle'])->get()->unique('user_id');
        $promptbases = Product::with('user')->where(['status'=>'active','is_type'=>'promptbase'])->get()->unique('user_id');
        $categories = Category::where('status','active')->select('id','category_name','category_icon')->get();
        return view('user.website.hire',compact('mostOrders','midjourneys','gpts','stablediffusions','dalles','promptbases','categories'));
        
    }

    public function publicProfile(Request $request, User $user){
        $countryFlagUrl = "";
        $ipv4Address = $request->ip();
        $response = Http::get("http://ipinfo.io/{$ipv4Address}/json");
        if ($response->successful()) {
           $data = $response->json();
            $countryCode = $data['country'] ?? 'US';
            $countryFlagUrl = "https://flagsapi.com/{$countryCode}/flat/64.png";
        }
     
        return view('user.website.hire_details',compact('user','countryFlagUrl'));
    }

    public function terms(){
        return view('user.website.termsOfService');
    }

    public function search(Request $request){
        
        $tags =  explode('#', $request->search);
      foreach($tags as $tag){
        $products = Tag::where('tag', 'LIKE', '%'.$tag.'%')->select('product_id')->get();
      }

        $marketPlaces = Product::whereIn('id', $products)->orWhere('title', 'LIKE', '%'.$request->search.'%')->where('status','active')->get();
        
        // $users = User::where('username', 'LIKE', '%'.$request->search.'%' )->where('is_admin','user')->where('status','active')->get();
       

        return view('user.website.search', compact('marketPlaces'));
    }

    public function personFavourite($user){
       
        $user_ip = userLocalIp();
        $personFavourite = UserFavourite::where(['user_ip' => $user_ip, 'user_id' => $user])->first();
        if($personFavourite){
            $personFavourite->delete();
            return back()->with('success','Removed From Your Favourite User List');
        }

        UserFavourite::create([
            'user_ip' => $user_ip,
            'user_id' => $user
        ]);
        
        return back()->with('success','Added to Favourite User List');
    }
}
