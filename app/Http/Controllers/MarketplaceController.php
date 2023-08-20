<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\JobPost;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MarketplaceController extends Controller
{
    public function marketplace(Request $request){
        Session::forget('tag_name');
        $categories = Category::where('status','active')->latest()->get();
        $subCategories = SubCategory::latest()->get();
        $marketPlaces = Product::with('user','subCategory')->where('status','active')->inRandomOrder()->paginate(100);

        if($request->isMethod('post')){
           
            if($request->filterType == "priceFilter"){
                $marketPlaces = Product::where('status','active')->whereBetween('price', [$request->price_start, $request->price_end])->paginate(50);
            }elseif($request->filterType == 'categoryFilter'){
               $subCategories = [];
               if(isset($request->category_id) && !empty($request->category_id)){
                    $subCategories = SubCategory::whereIn('category_id',$request->category_id)->get(['id']);
                    $marketPlaces = Product::with('user','subCategory')->whereIn('sub_category_id',$subCategories)->where('status','active')->paginate(50);
               }
            }elseif($request->filterType == 'subCategoryFilter'){
                $subSubCategories = [];
                if(isset($request->sub_category_id) && !empty($request->sub_category_id)){
                     $marketPlaces = Product::with('user','subCategory')->where('sub_category_id',$request->sub_category_id)->where('status','active')->paginate(50);
                }
            }elseif($request->filterType == 'high'){
                $marketPlaces = Product::with('user','subCategory')->where('status','active')->orderBy('price','DESC')->paginate(50);
            }elseif($request->filterType == 'low'){
                $marketPlaces = Product::with('user','subCategory')->where('status','active')->orderBy('price','ASC')->paginate(50);
            }else{
                $marketPlaces = Product::with('user','subCategory')->where('status','active')->paginate(50);
            }
            $marketPlaces = $marketPlaces->appends($request->all());
            return view('user.website.includes.marketplace_append',compact('marketPlaces','categories','subCategories'));
        }

        $marketPlaces = $marketPlaces->appends($request->all());
        return view('user.website.marketplace',compact('marketPlaces','categories','subCategories'));
    }

    public function marketplaceDetails($slug, $product){
        viewAdd(userLocalIp(),$product);
        $product = Product::with('user','subCategory','productImages','tags')->find($product);
        return view('user.website.marketplace_details',compact('product'));
    }

    public function filter($name){
        Session::put('tag_name', $name);
        $categories = Category::where('status','active')->latest()->get();
        $subCategories = SubCategory::latest()->get();
        $product_ids = Tag::where( 'tag', $name)->select('product_id')->get();
        $marketPlaces = Product::with('user', 'subCategory', 'tags')->whereIn('id', $product_ids)->where('status','active')->paginate(50);
         return view('user.website.marketplace',compact('marketPlaces','categories','subCategories'));
    }
}

