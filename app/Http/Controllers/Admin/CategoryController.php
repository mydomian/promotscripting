<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\Services;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $services; 
    public function __construct(Services $services)
    {
        $this->services = $services;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view("admin.categories", compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $upload = $this->services->imageUpload($request->file('category_icon'), 'category_icon/');
        $category = $this->services->categoryCreate($request->all(),$upload);
        if($category) return back()->with('success','Category Created Successfully');
       
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        if($request->hasFile('category_icon')) $this->services->imageDestroy($category->category_icon,$request->file('category_icon'),'category_icon/');
        if($request->hasFile('logo')) $this->services->imageDestroy($category->logo,$request->file('logo'),'category_icon/');
        $category = $this->services->categoryUpdate($category, $request->all(), $request->file('category_icon'), $request->file('logo'));
        if($category) return back()->with('success','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
       $this->services->imageDestroy($category->category_icon,'category_icon/');
       $category->delete();
       return back()->with('success','Category Deleted Successfully');
    }

    public function categoryStatusActive(Category $category){
        $category->status = "active";
        $category->save();
       return back()->with('success','Category Actived');
    }

    public function categoryStatusInactive(Category $category){
        $category->status = "inactive";
        $category->save();
       return back()->with('success','Category Inactived');
    }
}
