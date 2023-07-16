<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Services\Services;
use Illuminate\Http\Request;

class SubSubCategoryController extends Controller
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
        $categories = Category::with('subCategories')->where('status','active')->latest()->get();
        $subSubCategories = SubSubCategory::with('subCategory')->latest()->get();
        return view("admin.sub_sub_categories", compact('categories','subSubCategories'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $subSubCategory = $this->services->subSubCategoryCreate($request->all());
        if($subSubCategory) return back()->with('success','Sub Subcategory Created');
       
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubSubCategory $subsubcategory)
    {
       
        $subSubCategory = $this->services->subSubCategoryUpdate($subsubcategory, $request->all());
        if($subSubCategory) return back()->with('success','Sub Subcategory Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubSubCategory $subsubcategory)
    {
       $subsubcategory->delete();
       return back()->with('success','Sub Subcategory Deleted');
    }
}
