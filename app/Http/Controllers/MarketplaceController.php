<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\JobPost;
use App\Models\Product;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    public function marketplace(Request $request){
        
        $categories = Category::where('status','active')->latest()->get();
        // if($request->price == "priceFilter"){
        //     $jobPosts = JobPost::with('user','bids')->where(['status'=>'active','job_status'=>'New'])->whereBetween('budget', [$request->price_start, $request->price_end])->get();
        //     return view('user.website.includes.marketplace_append',compact('jobPosts'));
        // }

        // if($request->type == "filter_category"){
        //     $jobPosts = JobPost::with('user','bids')->where(['status'=>'active','job_status'=>'New'])->where('category_id',$request->selectedValue)->latest()->get();
        //     // return $jobPosts;
        //     return view('user.website.includes.marketplace_append',compact('jobPosts'));
        // }
        if($request->isMethod('post')){
            if($request->filterType == 'high'){
                $marketPlaces = Product::with('user','subSubCategory')->where('status','active')->orderBy('price','DESC')->paginate(50);
            }elseif($request->filterType == 'low'){
                $marketPlaces = Product::with('user','subSubCategory')->where('status','active')->orderBy('price','ASC')->paginate(50);
            }else{
                $marketPlaces = Product::with('user','subSubCategory')->where('status','active')->paginate(50);
            }
            $marketPlaces = $marketPlaces->appends($request->all());
            return view('user.website.includes.marketplace_append',compact('marketPlaces','categories'));
        }    
        $marketPlaces = Product::with('user','subSubCategory')->where('status','active')->paginate(50);
        return view('user.website.marketplace',compact('marketPlaces','categories'));
    }
}
