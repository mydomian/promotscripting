<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('user', ['only' => ['create']]);
    }

     /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        return view('user.website.sell');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $categories = Category::get();
        return view('user.website.create-prompt',compact('categories'));
    }


    public function subcategory(Request $request){

        $request->validate([
            'category_id'   => 'required',
            'title'         => 'required|string',
            'description'   => 'required|string',
            'price'         => 'required|numeric'
        ]);

        $data['category_id']    = $request->category_id;
        $data['title']          = $request->title;
        $data['description']    = $request->description;
        $data['price']          = $request->price;
        
        
        $subcategories = SubCategory::where('category_id',$data['category_id'])->get();
        
        return view('user.website.subcategory-select', compact('subcategories','data'));
    }

    public function country(Request $request){
       
        $request->validate([
            'sub_category_id' => 'required',
            'prompt_file'     =>'required|json',
            'prompt_testing'  => 'string',
            'gpt_engine'      => 'required',
            'preview_input'   => 'string',
            'preview_output'   => 'string',
        ]);
      
        $data = $request->all();
        $countries = Country::all();
        return view('user.website.select-country',compact('countries','data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $stripe_public_key = new \Stripe\StripeClient('pk_test_51MdVopI5vndzPyR8dKn6Rwiy8AnLUxlZKmMJ5A42U57LSajaTsHKjlaKTO3ZhrFP45G7uIAmj6JFaXV0i43WA5Wf000QVUrGy8');
        $stripe_secret_key = new \Stripe\StripeClient('sk_test_51MdVopI5vndzPyR8raL9vEY79KT2Iv22xGMebpbPOnFMc8jClAEjvnCeqMIGYeJQGgD9SWAHqduTPB64YA1KqmIY00cfZ7o7Ml');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
