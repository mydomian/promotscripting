<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Services\Services;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
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
        $categories = Category::where('status','active')->latest()->get();
        $subcategories = SubCategory::with('category:id,category_name,category_icon')->orderBy('id','DESC')->get();
        return view("admin.sub_categories", compact('categories','subcategories'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $subCategory = $this->services->subCategoryCreate($request->all());
        if($subCategory) return back()->with('success','Subcategory Created');
       
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $subCategory)
    {
        $subCategory = SubCategory::find($subCategory);
        $subCategory = $this->services->subCategoryUpdate($subCategory, $request->all());
        if($subCategory) return back()->with('success','Subcategory Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subcategory)
    {
       $subcategory->delete();
       return back()->with('success','Subcategory Deleted');
    }
}
