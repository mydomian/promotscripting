<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\JobPost;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarketplaceController extends Controller
{
    public function marketplace(Request $request){
        
        $categories = Category::where('status','active')->latest()->get();
        $subCategories = SubCategory::latest()->get();
        $subSubCategories = SubSubCategory::latest()->get();
        $marketPlaces = Product::with('user','subSubCategory')->where('status','active')->paginate(100);

        if($request->isMethod('post')){

            if($request->filterType == "priceFilter"){
                $marketPlaces = Product::where('status','active')->whereBetween('price', [$request->price_start, $request->price_end])->paginate(50);
            }elseif($request->filterType == 'categoryFilter'){
               $subCategories = [];
               $subSubCategories = [];
               if(isset($request->category_id) && !empty($request->category_id)){
                    $subCategories = SubCategory::whereIn('category_id',$request->category_id)->get(['id']);
                    $subSubCategories = SubSubCategory::whereIn('sub_category_id',$subCategories)->get(['id']);
                    $marketPlaces = Product::with('user','subSubCategory')->whereIn('sub_sub_category_id',$subSubCategories)->where('status','active')->paginate(50);
               }
            }elseif($request->filterType == 'subCategoryFilter'){
                $subSubCategories = [];
                if(isset($request->sub_category_id) && !empty($request->sub_category_id)){
                     $subSubCategories = SubSubCategory::whereIn('sub_category_id',$request->sub_category_id)->get(['id']);
                     $marketPlaces = Product::with('user','subSubCategory')->whereIn('sub_sub_category_id',$subSubCategories)->where('status','active')->paginate(50);
                }
            }elseif($request->filterType == 'subSubCategoryFilter'){
                if(isset($request->sub_sub_category_id) && !empty($request->sub_sub_category_id)){
                    $marketPlaces = Product::with('user','subSubCategory')->whereIn('sub_sub_category_id',$request->sub_sub_category_id)->where('status','active')->paginate(50);
                }
            }elseif($request->filterType == 'high'){
                $marketPlaces = Product::with('user','subSubCategory')->where('status','active')->orderBy('price','DESC')->paginate(50);
            }elseif($request->filterType == 'low'){
                $marketPlaces = Product::with('user','subSubCategory')->where('status','active')->orderBy('price','ASC')->paginate(50);
            }else{
                $marketPlaces = Product::with('user','subSubCategory')->where('status','active')->paginate(50);
            }
            $marketPlaces = $marketPlaces->appends($request->all());
            return view('user.website.includes.marketplace_append',compact('marketPlaces','categories','subCategories','subSubCategories'));
        }

        $marketPlaces = $marketPlaces->appends($request->all());
        return view('user.website.marketplace',compact('marketPlaces','categories','subCategories','subSubCategories'));
    }

    public function marketplaceDetails($slug, $product){
        viewAdd(userLocalIp(),$product);
        $product = Product::with('user','subSubCategory','productImages')->find($product);
        return view('user.website.marketplace_details',compact('product'));
    }
}
