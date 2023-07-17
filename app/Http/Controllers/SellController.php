<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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
       
        $request->validate([
            'category_id'           => 'required',
            'sub_category_id'       => 'required',
            'sub_sub_category_id'    => 'required',
            'prompt_file'           => 'required_if:category_id,1|json',
            'prompt_testing'        => 'required_if:category_id,1',
            'gpt_engine'            => 'required_if:category_id,1',
            'preview_input'         =>  'required_if:category_id,1',
            'preview_output'        =>  'required_if:category_id,1',
            'midjourney_text'       => 'required_if:category_id,2',
            'midjourney_profile'    => 'required_if:category_id,2',
            'instructions'          => 'required|string'
        ]);
        
       $products = Product::create([
            'user_id'                  => Auth::id(),
            'sub_sub_category_id'      => $request->sub_sub_category_id,
            'title'                    => $request->title,
            'image'                    => 'paper-plane.png',
            'price'                    => $request->price,
            'description'              => $request->description,
            'words'                    => Str::of($request->description)->wordCount(),
            'is_tips'                  => $request->instructions ? 'yes' :'no',
            'is_tested'                => ($request->prompt_testing ?? $request->midjourney_text) ? 'yes' : 'no',
            'is_hq_images'             => 'no',
            'status'                   => 'active',
            'prompt_testing'           => $request->prompt_testing ?? '' ,
            'gpt_engine_id'            => $request->gpt_engine_id ?? '0',
            'preview_input'            => $request->preview_input ?? '',
            'preview_output'           => $request->preview_output ?? '',
            'instructions'             => $request->instructions
        ]);

        if($request->file('images')){
                
        }




        return redirect()->route('home')->with('success', 'Posted Successful');
      

       

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
