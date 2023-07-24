<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Favourite;
use App\Models\User;
use App\Services\Services;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;
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
            if($request->hasFile('profile')) $user->avatar = $this->services->imageUpload($request->file('profile'), 'profile/');
            $user->save();
            return redirect()->back()->with('success','Profile Updated');

        }
        return view('user.website.profile',compact('user'));
    }



    public function settings(){

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

            if($prompt->subSubCategory->subCategory->category->id == 1) {
                $request->validate(['prompt_testing'=>'required','preview_input'=>'required','preview_output'=>'required']);

                $prompt->prompt_testing = $request->prompt_testing;
                $prompt->preview_input = $request->preview_input;
                $prompt->preview_output = $request->preview_output;
                if($request->hasFile('image')) $this->services->imageDestroy($prompt->image,'/products/thumbnil/');
                if($request->hasFile('image')) $prompt->image = $this->services->imageUpload($request->file('image'), 'products/thumbnil/');
            }
            if($prompt->subSubCategory->subCategory->category->id == 5) {
                $request->validate(['midjourney_text'=>'required','midjourney_profile'=>'required','images'=>'nullable']);

                $prompt->midjourney_text = $request->midjourney_text;
                $prompt->midjourney_profile = $request->midjourney_profile;
                if($request->hasFile('images')) $this->multipleProductImage($request,$prompt);
            }
            if($prompt->subSubCategory->subCategory->category->id == 6) {
                $request->validate(['model_version'=>'required','sampler'=>'required','image_width'=>'required','image_height'=>'required','cfg_scale'=>'required','step'=>'required','clip'=>'required','negative_prompt'=>'required','images'=>'nullable']);
                
                $prompt->model_version = $request->model_version;
                $prompt->sampler = $request->sampler;
                $prompt->image_width = $request->image_width;
                $prompt->image_height = $request->image_height;
                $prompt->cfg_scale = $request->cfg_scale;
                $prompt->cfg_scale = $request->cfg_scale;
                $prompt->step = $request->step;
                $prompt->clip = $request->clip;
                $prompt->negative_prompt = $request->negative_prompt;
                if(isset($request->speed)) $prompt->speed = $request->speed;
                if($request->hasFile('images')) $this->multipleProductImage($request,$prompt);
            }
            if($prompt->subSubCategory->subCategory->category->id == 7) {
                $request->validate(['image_verification'=>'required','images'=>'nullable']);

                $prompt->image_verification = $request->image_verification;
                if($request->hasFile('images')) $this->multipleProductImage($request,$prompt);
            }
            if($prompt->subSubCategory->subCategory->category->id == 8) {
                $request->validate(['images'=>'nullable']);

                if($request->hasFile('images')) $this->multipleProductImage($request,$prompt);
            }

            $prompt->title = $request->title;
            $prompt->sub_sub_category_id = $request->sub_sub_category_id;
            $prompt->price = $request->price;
            $prompt->description = $request->description;
            $prompt->instructions = $request->instructions;
            $prompt->words = Str::wordCount($request->description);
            $prompt->save();

            return back()->with('success','Prompt Updated Successfully');
        }

        $categories = Category::with('subCategories')->where('status','active')->latest()->get();
        $subCategories = SubCategory::with('subSubCategories')->latest()->get();
        return view('user.website.prompt_deatils',compact('prompt','categories','subCategories'));

    }
    
    public function promptDelete(Product $product){
        $this->services->imageDestroy($product->image,'/products/thumbnil/');
        foreach($productImages = ProductImage::where('product_id',$product->id)->get() as $productImage){
            $this->services->imageDestroy($productImage->images,'/products/');
        }
        $product->delete();
        return back()->with('success','Prompt Deleted');
    }

    public function multipleProductImage($request,$prompt){
       
        $product_images = ProductImage::where('product_id',$prompt->id)->get();
        foreach($product_images as $product_image){
            $this->services->imageDestroy($product_image->images,'products/');
            $product_image->delete();
        }
        foreach($request->file('images') as $file){
            $product_image = new ProductImage;
            $product_image->images = $this->services->imageUpload($file, 'products/');
            $product_image->product_id = $prompt->id;
            $product_image->save();
        }
       
    }

    public function favourites(Request $request){
        $favs = Favourite::with('product')->where('user_ip',userLocalIp())->latest()->paginate(100);
        if($request->isMethod('post')){
            if($request->filterType == "search"){

                $favs = Favourite::whereHas('product', function($query) use ($request) {
                    $query->where('title','like','%'.$request->value.'%')->where('status','active');
                })->latest()->paginate(100);
               
                $favs = $favs->appends($request->all());
                return view('user.website.includes.favourite_append',compact('favs'));
            }
        }
        $favs = $favs->appends($request->all());
        return view('user.website.favourites',compact('favs'));
    }
}
