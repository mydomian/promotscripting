<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use App\Services\Services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SellController extends Controller
{
   private $services;
    public function __construct(Services $services)
    {
        $this->middleware('user', ['only' => ['create']]);
        $this->services = $services;
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
        $categories = Category::where('status','active')->get();
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
        $gptEngines = $GPT_ENGINS = ['text-davinci-003','text-davinci-002','text-curie-001','text-babbage-001','text-ada-001','text-davinci-001','davinci-instruct-beta','davinci','curie','babbage','ada'];
        $categories = Category::with('subCategories')->where('status','active')->latest()->get();
        $subcategories = SubCategory::with('subSubCategories')->get();
        return view('user.website.subcategory-select', compact('categories','subcategories','data','gptEngines'));

    }

   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //      $request->validate([
        //     'category_id'           => 'required',
        //     'sub_category_id'       => 'required',
        //     'sub_sub_category_id'    => 'required',
        //     'prompt_file'           => 'required_if:category_id,1|json',
        //     'prompt_testing'        => 'required_if:category_id,1',
        //     'gpt_engine'            => 'required_if:category_id,1',
        //     'preview_input'         =>  'required_if:category_id,1',
        //     'preview_output'        =>  'required_if:category_id,1',
        //     'midjourney_text'       => 'required_if:category_id,2',
        //     'midjourney_profile'    => 'required_if:category_id,2',
        //     'images'                => 'required_if:category_id,2|array|size:9',
        //     'instructions'          => 'required|string'
        // ]);

        $validator = Validator::make($request->all(),[
            'category_id'           => 'required',
            'sub_category_id'       => 'required',
            'sub_sub_category_id'   => 'required',
            'prompt_file'           => 'required_if:category_id,1|json',
            'prompt_testing'        => 'required_if:category_id,1',
            'gpt_engine'            => 'required_if:category_id,1',
            'preview_input'         => 'required_if:category_id,1',
            'preview_output'        => 'required_if:category_id,1',
            'midjourney_text'       => 'required_if:category_id,5,6,7',
            'midjourney_profile'    => 'required_if:category_id,5',
            'image'                 => 'required',
            'images'                => 'required_if:category_id,5|array|size:6',
            'instructions'          => 'required|string',
            'image_verification'    => 'required_if:category_id,7',
            'model_version'         => 'required_if:category_id,6',
            'sampler'               => 'required_if:category_id,6',
            'image_width'           => 'required_if:category_id,6|numeric|between:512,1024',
            'image_height'          => 'required_if:category_id,6|numeric|between:512,1024',
            'cfg_scale'             => 'required_if:category_id,6|numeric|between:0,20',
            'step'                  => 'required_if:category_id,6|numeric|between:10,150',
            'clip'                  => 'accepted_if:category_id,6',
            'negative_prompt'       => 'string',
        ]);

        if($validator->fails()) {
            return  $validator->errors()->first();
        }
      $type = ($request->category_id == 1 ? "gpt" : ($request->category_id == 5 ? "midjourney" : ($request->category_id == 6 ? "stablediffusion" : ($request->category_id == 7 ? 'dalle' : 'promptbase'))));

       $product = Product::create([
            'user_id'                  => Auth::id(),
            'sub_sub_category_id'      => $request->sub_sub_category_id,
            'title'                    => $request->title,
            'image'                    => ' ',
            'price'                    => $request->price,
            'description'              => $request->description,
            'words'                    => Str::of($request->description)->wordCount(),
            'is_tips'                  => $request->instructions ? 'yes' :'no',
            'is_tested'                => ($request->prompt_testing ?? $request->midjourney_text) ? 'yes' : 'no',
            'is_hq_images'             => 'no',
            'status'                   => 'inactive',
            'prompt_file'              => $request->prompt_file ?? null ,
            'prompt_testing'           => $request->prompt_testing ?? null ,
            'gpt_engine_id'            => $request->gpt_engine_id ?? null,
            'preview_input'            => $request->preview_input ?? null,
            'preview_output'           => $request->preview_output ?? null,
            'midjourney_text'          => $request->midjourney_text ?? null,
            'midjourney_profile'       => $request->midjourney_profile ?? null,
            'instructions'             => $request->instructions,
            'image_verification'       => $request->image_verification ?? null,
            'model_version'            => $request->model_version ,
            'sampler'                  => $request->sampler,
            'image_width'              => $request->image_width ,
            'image_height'             => $request->image_height ,
            'cfg_scale'                => $request->cfg_scale ,
            'step'                     => $request->step ,
            'speed'                    => $request->speed,
            'clip'                     => $request->clip,
            'negative_prompt'          => $request->clinegative_promptp,
            'is_type'                  => $type,
        ]);

        

        if($request->file('image')){
            $upload = $this->services->imageUpload($request->file('image'),'products/thumbnil/');
            $product->image = $upload;

            $product->save();
        }
        
        if($request->file('images')){
            foreach($images = $request->file('images') as $image){
                $upload = $this->services->imageUpload($image,'products/');
                ProductImage::create([
                    'product_id' => $product->id,
                    'images' => $upload
                ]);
            }           
        }



        $this->services->createFile($product->productImages,$product);

        

        createNotification($product->id,'prompts');
        
        if(Auth::user()->is_onboarding_completed == 1){
            return redirect()->route('user.dashboard')->with('success','Your prompt is ready to be approved, Please wait!');
        }

        return redirect()->route('sell.country');

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


    public function country(Request $request){
       
        $countries = Country::all();
        return view('user.website.select-country',compact('countries'));
    }
}
