<?php

namespace App\Http\Controllers;

use DB;
use Str;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Sale;
use App\Models\User;
use App\Models\Order;
use App\Models\Charge;
use App\Models\Rating;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tempfile;
use App\Models\Favourite;
use App\Services\Services;
use App\Models\ProductImage;
use App\Models\Skill;
use App\Models\PaymentInfo;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\HireDeveloper;
use App\Models\CustomPromptOrder;
use App\Models\HireDeveloperSample;
use App\Models\NotificationSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Chatify\Facades\ChatifyMessenger as Chatify;


class DashboardController extends Controller
{

    private $services;
    public function __construct(Services $services)
    {
        $this->services = $services;
    }

    public function dashboard()
    {   
  
        $registerDate = User::find(Auth::id())->created_at;
        $registerDate = Carbon::parse($registerDate);
        $years = [$registerDate->format('Y')];
        for ($i = 0; $i <= 6; $i++) {
            $years[] = $registerDate->addYear()->format('Y');
        }
        $yearlySales = [];
        foreach ($years as $year) {
            $yearlySales[] = number_format(Sale::where('seller_id', Auth::id())->whereYear('created_at', $year)->sum('price'), 2);
        }
       
        $firstTen = Sale::where('seller_id', Auth::id())->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->startOfMonth()->addDays(9)])->sum('price');
        $secondTen = Sale::where('seller_id', Auth::id())->whereBetween('created_at', [Carbon::now()->startOfMonth()->addDays(10), Carbon::now()->startofMonth()->addDays(19)])->sum('price');
        $rest = Sale::where('seller_id', Auth::id())->whereBetween('created_at', [Carbon::now()->startOfMonth()->addDays(20), Carbon::now()->endofMonth()])->sum('price');
        $perTenDaySale = [$firstTen, $secondTen, $rest];
        return view('user.website.dashboard', compact('years', 'yearlySales', 'perTenDaySale'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', "Logged out!");
    }

    public function profile(Request $request, User $user)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name'      => 'required|string',
                'email'      => 'required|email',
                'phone'     => 'required|string',
                'address'   => 'required|string',
                'profession'=> 'required',
                'experience'=> 'required',
                'language'  => 'required',
                'video'     => 'required',
                'description'=> 'required',
                'education' => 'required',
                'password'   => 'nullable',
                'confirm_password' => 'nullable|same:password',
            ]);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->profession = $request->profession;
            $user->experience = $request->experience;
            $user->language = $request->language;
            $user->description = $request->description;
            $user->education = $request->education;
            
           
            if (isset($request->password)) $user->password = Hash::make($request->password);
            if ($request->hasFile('profile')) $this->services->imageDestroy($user->profile_photo_path, 'profile/');
            if ($request->hasFile('profile')) $user->profile_photo_path = $this->services->imageUpload($request->file('profile'), 'profile/');
            if ($request->hasFile('profile')) $user->avatar = $this->services->imageUpload($request->file('profile'), 'profile/');
            if ($request->hasFile('video')) $user->video = $this->services->imageUpload($request->file('video'), 'profile/');
            $user->save();
            return redirect()->back()->with('success', 'Profile Updated');
        }
        return view('user.website.profile', compact('user'));
    }

    public function settings()
    {
        $settings = userSetting();
        return view('user.website.setting', compact('settings'));
    }

    public function prompts(Request $request)
    {

        $prompts = Product::with('user', 'subCategory')->where('user_id', Auth::id())->where('status', 'active')->latest()->paginate(100);
        if ($request->isMethod('post')) {
            if ($request->filterType == "active") {
                $prompts = Product::with('user', 'subCategory')->where('user_id', Auth::id())->where('status', 'active')->latest()->paginate(100);
            } elseif ($request->filterType == "inactive") {
                $prompts = Product::with('user', 'subCategory')->where('user_id', Auth::id())->where('status', 'inactive')->latest()->paginate(100);
            } elseif ($request->filterType == "default") {
                $prompts = Product::with('user', 'subCategory')->where('user_id', Auth::id())->where('status', 'active')->latest()->paginate(100);
            } elseif ($request->filterType == "search") {
                $prompts = Product::with('user', 'subCategory')->where('title', 'like', '%' . $request->value . '%')->where(['user_id' => Auth::id(), 'status' => 'active'])->latest()->paginate(100);
            } else {
                $prompts = Product::with('user', 'subCategory')->where('user_id', Auth::id())->where('status', 'active')->latest()->paginate(100);
            }
            $prompts = $prompts->appends($request->all());
            return view('user.website.includes.prompts_append', compact('prompts'));
        }
        $prompts = $prompts->appends($request->all());
        return view('user.website.prompts', compact('prompts'));
    }

    public function promptsEdit(Request $request, $product)
    {

        $prompt = Product::with('user', 'subCategory')->find($product);
       
        if ($request->isMethod('post')) {
            $request->validate([
                'image'                 => 'nullable',
                'title'                 => 'required',
                'description'           => 'required',
                'price'                 => 'required',
                'sub_category_id'   => 'required',
                'instructions'          => 'required',
            ]);

            if ($request->hasFile('image')) $this->services->imageDestroy($prompt->image, '/products/thumbnil/');
            if ($request->hasFile('image')) $prompt->image = $this->services->imageUpload($request->file('image'), 'products/thumbnil/');

            if ($prompt->subCategory->category->id == 1) {
                $request->validate(['prompt_testing' => 'required', 'preview_input' => 'required', 'preview_output' => 'required']);

                $prompt->prompt_testing = $request->prompt_testing;
                $prompt->preview_input = $request->preview_input;
                $prompt->preview_output = $request->preview_output;
               
            }
            if ($prompt->subCategory->category->id == 5) {
                $request->validate(['midjourney_text' => 'required', 'midjourney_profile' => 'required', 'images' => 'nullable']);

                $prompt->midjourney_text = $request->midjourney_text;
                $prompt->midjourney_profile = $request->midjourney_profile;
                if ($request->hasFile('images')) $this->multipleProductImage($request, $prompt);
            }
            if ($prompt->subCategory->category->id == 6) {
                $request->validate(['model_version' => 'required', 'sampler' => 'required', 'image_width' => 'required', 'image_height' => 'required', 'cfg_scale' => 'required', 'step' => 'required', 'clip' => 'required', 'negative_prompt' => 'required', 'images' => 'nullable']);

                $prompt->model_version = $request->model_version;
                $prompt->sampler = $request->sampler;
                $prompt->image_width = $request->image_width;
                $prompt->image_height = $request->image_height;
                $prompt->cfg_scale = $request->cfg_scale;
                $prompt->cfg_scale = $request->cfg_scale;
                $prompt->step = $request->step;
                $prompt->clip = $request->clip;
                $prompt->negative_prompt = $request->negative_prompt;
                if (isset($request->speed)) $prompt->speed = $request->speed;
                if ($request->hasFile('images')) $this->multipleProductImage($request, $prompt);
            }
            if ($prompt->subCategory->category->id == 7) {
                $request->validate(['image_verification' => 'required', 'images' => 'nullable']);

                $prompt->image_verification = $request->image_verification;
                if ($request->hasFile('images')) $this->multipleProductImage($request, $prompt);
            }
            if ($prompt->subCategory->category->id == 8) {
                $request->validate(['images' => 'nullable']);

                if ($request->hasFile('images')) $this->multipleProductImage($request, $prompt);
            }

            $prompt->title = $request->title;
            $prompt->sub_category_id = $request->sub_category_id;
            $prompt->price = $request->price;
            $prompt->description = $request->description;
            $prompt->instructions = $request->instructions;
            $prompt->words = Str::wordCount($request->description);
            $prompt->save();

            return back()->with('success', 'Prompt Updated Successfully');
        }

        $categories = Category::with('subCategories')->where('status', 'active')->latest()->get();
        $subCategories = SubCategory::latest()->get();
        return view('user.website.prompt_deatils', compact('prompt', 'categories', 'subCategories'));
    }

    public function promptDelete(Product $product)
    {
        $this->services->imageDestroy($product->image, '/products/thumbnil/');
        foreach ($productImages = ProductImage::where('product_id', $product->id)->get() as $productImage) {
            $this->services->imageDestroy($productImage->images, '/products/');
        }
        $product->delete();
        return back()->with('success', 'Prompt Deleted');
    }

    public function multipleProductImage($request, $prompt)
    {

        $product_images = ProductImage::where('product_id', $prompt->id)->get();
        foreach ($product_images as $product_image) {
            $this->services->imageDestroy($product_image->images, 'products/');
            $product_image->delete();
        }
        foreach ($request->file('images') as $file) {
            $product_image = new ProductImage;
            $product_image->images = $this->services->imageUpload($file, 'products/');
            $product_image->product_id = $prompt->id;
            $product_image->save();
        }
    }

    public function favourites(Request $request)
    {
        $favs = Favourite::with('product')->where('user_ip', userLocalIp())->latest()->paginate(100);
        if ($request->isMethod('post')) {
            if ($request->filterType == "search") {

                $favs = Favourite::whereHas('product', function ($query) use ($request) {
                    $query->where('title', 'like', '%' . $request->value . '%')->where('status', 'active');
                })->latest()->paginate(100);

                $favs = $favs->appends($request->all());
                return view('user.website.includes.favourite_append', compact('favs'));
            }
        }
        $favs = $favs->appends($request->all());
        return view('user.website.favourites', compact('favs'));
    }

    public function promptCustomOrder(Request $request)
    {


        $data = $request->formData;

        if (isset($data) && !empty($data)) {
            $sk = PaymentInfo::first()->secret_key;
            $stripe = new \Stripe\StripeClient($sk);
            $charge = Charge::first()->buyer_charge;

            $chargeAmount = number_format(($data['price'] * ($charge / 100)), 2) * 100;
            $collected_price = $chargeAmount  > 50 ? $data['price'] + ($chargeAmount / 100) : $data['price'];

            $order = CustomPromptOrder::create([
                'to_id'           => $data['to_id'],
                'from_id'         => $data['from_id'],
                'title'           => $data['title'],
                'description'     => $data['description'],
                'price'           => $data['price'],
                'delivery'        => $data['delivery'],
                'revision'        => $data['revision'],
                'expire'          => $data['expire'],
                'charge_amount'   => $chargeAmount  > 50 ? $chargeAmount / 100 : '0.00',
                'charge_percentage' => $charge,
                'collected_price' =>  $collected_price,
                'transaction_id'  => "",
                'is_paid'         => "unpaid",
                'status'          => "approve",
            ]);

            $session = $stripe->checkout->sessions->create([
                'line_items' => [
                    [
                        'price_data' => [
                            'currency'     => 'usd',
                            'product_data' => [
                                'name' => "Custom Order"
                            ],
                            'unit_amount'  => $data['price'] * 100
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => env('APP_URL') . "/custom-order/success?session_id={CHECKOUT_SESSION_ID}&order_id=" . encrypt($order->id),
                'cancel_url'  => url('/promptscripting-chat', $data['to_id']),
            ]);


            if ($chargeAmount > 50) {
                $stripe->charges->create([
                    'amount'    => $chargeAmount,
                    'currency'  => 'usd',
                    'source'    => 'tok_amex',
                ]);
            }

            return redirect()->away($session->url);
        } else {
            return redirect('/promptscripting-chat');
        }
    }

    public function CustomOrderSuccess(Request $request)
    {
        $order = CustomPromptOrder::find(decrypt($request->order_id));
        $secret_key = PaymentInfo::first()->secret_key;
        $stripe = new \Stripe\StripeClient($secret_key);
        $session = $stripe->checkout->sessions->retrieve(
            $request->session_id
        );

        $order->update([
            'is_paid'        => $session->payment_status,
            'transaction_id' => $session->payment_intent
        ]);

        return view('user.website.custom_order_success');
    }

    public function customOrderLists(){
        return view('user.website.custom_orders');

    }
    public function accountDelete()
    {
        $user = User::find(Auth::id());
        $user->delete();
        return redirect()->route('home');
    }

    public function sales()
    {
        return view('user.website.sales');
    }

    public function purchases()
    {
        return view('user.website.purchases');
    }

    public function copyToClickBoard($id)
    {
        $ch_message = DB::table('ch_messages')->find($id);
        $item = json_decode($ch_message->attachment);

        return response()->json([
            'status'=>true,
            'message'=>html_entity_decode($ch_message->body),
            'attachment'=> $item->new_name ?? null
        ]);
    }

    public function cart(Request $request)
    {   
        
        $user_ip = userLocalIp();
        
        $product = Product::find($request->product_id);
        if (!checkCart($product->id)) {
            Cart::create([
                'user_ip'       => $user_ip,
                'product_id'    => $product->id,
                'price'         => $product->price
            ]);
            
            $cartCount = Cart::Where('user_ip',userLocalIp())->count();
            return response()->json([
                'success'   => true,
                'total'     => $cartCount,
                'ip'        => $user_ip
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'This prompt is already in your cart!'
        ]);
    }

    public function cartList(){
        $cartList = Cart::with('product')->where('user_ip',userLocalIp())->latest()->get();
       
        return view('user.website.cart',compact("cartList"))->render();
    }

    public function cartdelete(Cart $cart){
        $cart->delete();
        return back()->with('success', 'Prompt removed from your cart!');
    }

    public function fileDawonload($product_id){
        
        $tempFile = Tempfile::where(['product_id'=>$product_id])->first();
        $zipPath = storage_path('app/public/'.$tempFile->zip_file);
        return Response::download($zipPath, $tempFile->zip_file)->deleteFileAfterSend(false);
    }

    public function hireDeveloper(Request $request){
        $sellers = Product::where(['status'=>'active'])->select('user_id')->get()->unique('user_id');
        $users = User::whereIn('id',$sellers)->paginate(20);
        if($request->isMethod('post')){
            $users = User::where('profession', 'like', '%' . $request->profession . '%')->orWhere('name', 'like', '%' . $request->name . '%')->orWhere('language', 'like', '%' . $request->language . '%')->orWhere('experience', 'like', '%' . $request->experience . '%')->latest()->paginate(20);
            
            return view('user.website.hire_developer',compact('users'));
        }
        $users = $users->appends($request->all());
        return view('user.website.hire_developer',compact('users'));
    }

    public function userRating(Request $request){
        $rating = Rating::where(['from_id'=>Auth::id(),'to_id'=>$request->userId])->first();
        if(isset($rating)){
            return response()->json([
                'status'=>'exits',
                'title'=>"Rating Already Exits For This User"
            ]);
        }else{
            $rating = new Rating;
            $rating->from_id = Auth::id();
            $rating->to_id = $request->userId;
            $rating->rating = $request->value;
            $rating->save();
            return response()->json([
                'status'=>'added',
                'title'=>"Thanks For Rating"
            ]);
        }
    }


    public function skill(Request $request){
        $user_id = Auth::id();
        if($request->skill){
            $skills =  explode(',',$request->skill);
             foreach($skills as $skill){
                    Skill::create([
                     'user_id' => $user_id,
                     'skill'        => $skill
                 ]);
             }
         }
         return back()->with('success', "Skills Added Successfully!");
    }

    public function removeSkill(Request $request){
       $skill = Skill::where('id',$request->id)->first();
       $skill->delete();
        return response()->json([
            'success' => true,
            'message' => 'Skill Removed.'
        ]);
    }
    public function hireDeveloperStore(Request $request){
        $hireDev = new HireDeveloper;
        $hireDev->type = $request->type;
        $hireDev->price = $request->price;
        $hireDev->title = $request->title;
        $hireDev->description = $request->description;
        $hireDev->to_id = $request->to_id;
        $hireDev->from_id = Auth::id();
        $hireDev->save();

        if ($request->hasFile('sample')) $this->hireDeveloperSample($request,$hireDev);

        return back()->with('success','Hire Developer Assigned');
        

    }

    public function hireDeveloperLists(Request $request){
        $hireDevs = HireDeveloper::with('to_user:id,name,email,profile_photo_path','from_user:id,name,email,profile_photo_path')->where('from_id',Auth::id())->get();
        return view('user.website.hire_developer_lists',compact('hireDevs'));
    }

    public function hireDeveloperSample($request, $hireDev)
    {
        
        $samples = HireDeveloperSample::where('hire_developer_id', $hireDev->id)->get();
        foreach ($samples as $sample) {
            $this->services->imageDestroy($sample->sample, 'hire_developer/');
            $sample->delete();
        }
        foreach ($request->file('sample') as $file) {
            $sample = new HireDeveloperSample;
            $sample->sample = $this->services->imageUpload($file, 'hire_developer/');
            $sample->hire_developer_id = $hireDev->id;
            $sample->save();
        }

    }
}
