<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Setting;
use App\Services\Services;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    private $services; 
    public function __construct(Services $services)
    {
        $this->services = $services;
    }

    public function aboutUs(Request $request){
        $aboutus = About::first();

        if($request->isMethod('post')){
            if (isset($request->heading)) $aboutus->heading = $request->heading;
            if (isset($request->short_des)) $aboutus->short_des = $request->short_des;
            if (isset($request->details)) $aboutus->details = $request->details;

            if ($request->hasFile('image')) {
                $this->services->imageDestroy($aboutus->image,$request->file('image'),'about_us/');
                $upload = $this->services->imageUpload($request->file('image'), 'about_us/');
                $aboutus->image = $upload;
            }

            if(isset($request->aboutus_slider_title1))  $aboutus->aboutus_slider_title1 = $request->aboutus_slider_title1;
            if(isset($request->aboutus_slider_title2)) $aboutus->aboutus_slider_title2 = $request->aboutus_slider_title2;
            
            if ($request->hasFile('promotional_video')) {

                $this->services->imageDestroy($aboutus->image,$request->file('promotional_video'),'about_us/');
                $video = $this->services->imageUpload($request->file('promotional_video'), 'about_us/');
                $aboutus->promotional_video = $video;
            }
            $aboutus->save();
            return back()->with('success', 'Successfully Updated !');
        }
        
        return view('admin.about_us',compact('aboutus'));
    }
}
