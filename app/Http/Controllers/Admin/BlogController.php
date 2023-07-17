<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use App\Services\Services;

class BlogController extends Controller
{
    private $services; 
    public function __construct(Services $services)
    {
        $this->services = $services;
    }

    public function index(){
        $categories = Category::with('subCategories')->where('status','active')->latest()->get();
        $subCategories = SubCategory::with('subSubCategories')->latest()->get();
        $blogs = Blog::with('category','subCategory','subSubCategory')->latest()->paginate(50);
        return view('admin.blogs',compact('blogs','categories','subCategories'));
    }

    public function store(Request $request){
        $upload = $this->services->imageUpload($request->file('image'), 'blog/');
        $blog = $this->services->blogCreate($request->all(),$upload);
        if($blog) return back()->with('success','Blog Created Successfully');
    }

    public function update(Request $request, Blog $blog){
        if($request->hasFile('image')) $this->services->imageDestroy($blog->image,$request->file('image'),'blog/');
        $blog = $this->services->blogUpdate($blog, $request->all(),$request->file('image'));
        if($blog) return back()->with('success','Blog Updated Successfully');
    }

    public function blogStatus(Request $request, Blog $blog){
        if($request->type == 'active'){
            $blog->status = 'active';
        }elseif($request->type == 'inactive'){
            $blog->status = 'inactive';
        }else{
            $blog->status = 'ban';
        }
        $blog->save();
        return back()->with('success','Blog Status Updated');
    }

    public function destroy(Blog $blog){
        $this->services->imageDestroy($blog->image,'blog/');
        $blog->delete();
        return back()->with('success','Blog Deleted Successfully');
    }
}
