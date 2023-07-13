<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    public function marketplace(Request $request){
        if($request->price == "priceFilter"){
            $jobPosts = JobPost::with('user','bids')->where(['status'=>'active','job_status'=>'New'])->whereBetween('budget', [$request->price_start, $request->price_end])->get();
            return view('user.website.includes.marketplace_append',compact('jobPosts'));
        }

        if($request->type == "filter_category"){
            $jobPosts = JobPost::with('user','bids')->where(['status'=>'active','job_status'=>'New'])->where('category_id',$request->selectedValue)->latest()->get();
            // return $jobPosts;
            return view('user.website.includes.marketplace_append',compact('jobPosts'));
        }
        
        if($request->filterType == 'high'){
            $jobPosts = JobPost::with('user','bids')->where(['status'=>'active','job_status'=>'New'])->orderBy('budget','DESC')->paginate(35);
        }elseif($request->filterType == 'low'){
            $jobPosts = JobPost::with('user','bids')->where(['status'=>'active','job_status'=>'New'])->orderBy('budget','ASC')->paginate(35);
        }else{
            $jobPosts = JobPost::with('user','bids')->where(['status'=>'active','job_status'=>'New'])->latest()->paginate(35);
        }
        $jobPosts = $jobPosts->appends($request->all());
        return view('user.website.includes.marketplace_append',compact('jobPosts'));
    }
}
