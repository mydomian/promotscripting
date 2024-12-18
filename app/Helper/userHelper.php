<?php

use App\Models\Cart;
use App\Models\Currency;
use Illuminate\Support\Facades\Auth;

use App\Models\Favourite;
use App\Models\Notification;
use App\Models\NotificationSetting;
use App\Models\Order;
use App\Models\PaymentInfo;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserFavourite;
use App\Models\View;
use Database\Factories\UserFactory;
use Illuminate\Support\Carbon;

function model(){
    return $model = array('1'=>'Version 1','2'=>'Version 2','3'=>'Version 3','4'=>'Version 4','5'=>'Version 5');
}
function sampler(){
    return $sampler = array('1'=>'Sampler 1','2'=>'Sampler 2','3'=>'Sampler 3','4'=>'Sampler 4','5'=>'Sampler 5');
}
function userLocalIp(){
    return gethostbyname(gethostname());
}

function totalFav($product){
    $fav = Favourite::where('product_id',$product)->count();
    return $fav;
}
function userFav($productId,$userIp){
    $fav = Favourite::where(['product_id'=>$productId,'user_ip'=>$userIp])->count();
    return $fav;
}
function userTotalFav($userIp){
    $fav = Favourite::where(['user_ip'=>$userIp])->count();
    return $fav;
}
function totalPromptSell($userId){
    $orders = Order::where(['user_id'=>$userId,'status'=>'approve','is_paid'=>'paid'])->count();
    return $orders;

}
function userPromotCategoriesWise($userId){
    $prompts = Product::where(['user_id'=>$userId,'status'=>'active'])->get()->unique('is_type');
    return $prompts;
}
function userPromotSubCategoryWise($userId,$subCategoryId){
    $prompts = Product::where(['user_id'=>$userId,'status'=>'active','sub_category_id'=>$subCategoryId])->get();
    return $prompts;
}
function viewAdd($userIp,$productId){
   $view = View::create(['user_ip'=>$userIp,'product_id'=>$productId]);
   return $view;
}
function ProductViews($productId){
    $view = View::where(['product_id'=>$productId])->count();
    return $view;
 }
 function userAllProductView($userId){
    $userProducts = Product::where(['user_id'=>$userId,'status'=>'active'])->get()->pluck('id');
    return $view = View::whereIn('product_id',$userProducts)->count();
 }
 function userAllProductFav($userId){
    $userProducts = Product::where(['user_id'=>$userId,'status'=>'active'])->get()->pluck('id');
    return $view = Favourite::whereIn('product_id',$userProducts)->count();
 }
function totalPrompt(){
    return Product::where('user_id',Auth::id());
}
function totalScriptPrompt(){
    return Product::where(['status'=>'active'])->count();
}
function totalScriptUser(){
    return User::count();
}
function totalSaleAmount(){
    return Order::where('seller_id',Auth::id())->where('is_paid','paid')->where('status','approve')->sum('price');
}
function totalPurchase(){
    return Order::where('user_id', Auth::id())->where('is_paid','paid')->where('status','approve');
}
function thisMonthSale(){
    return  Sale::where(['seller_id'=>Auth::id()])->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month);
}

function createNotification($typeId, $type){
    $notification = Notification::create([
        'type_id'=>$typeId,
        'type'=>$type,
    ]);
    return $notification;
}
function favourites()
{
    return  Favourite::with('product')->where('user_ip', userLocalIp())->latest()->paginate(20);
}
function prompts()
{
    return  Product::with('user','subCategory')->where('user_id', Auth::id())->latest()->get();
}
function purchases()
{
    return \App\Models\Order::with('product')->where('user_id', Auth::id())->where('is_paid','paid')->where('status','approve')->latest()->get();
}
function sales()
{
    return \App\Models\Sale::with('order','product')->where('seller_id', Auth::id())->latest()->get();
}
function systemSetting()
{
    return Setting::first();
}
function userSetting()
{
    return NotificationSetting::where('user_id',Auth::id())->first();
}
function cartCount(){
    return Cart::where('user_ip', userLocalIp())->count();
}
function checkCart($id){
    return Cart::Where(['user_ip'=>userLocalIp(),'product_id'=>$id])->exists();
}
function cart(){
    return Cart::with('product')->where('user_ip', userLocalIp())->latest()->get();
}
function checkPurchaseOrder($product_id){
    $order = Order::with('product')->where(['user_id'=>Auth::id(),'product_id'=>$product_id,'status'=>'approve','is_paid'=>'paid','is_order'=>'regular'])->whereNotNull('transaction_id')->first();
    return $order;
}
function totalProduct(){
    return Product::where('status','active')->count();
}
function totalSale(){
    return Sale::count();
}
function totalUser(){
    return User::where('is_admin','user')->count();
}
function totalOrder(){
    return Order::where('is_paid','paid')->count();
}
function payoutDetails()
{
        $secret_key = PaymentInfo::first()->secret_key;
        $stripe = new \Stripe\StripeClient($secret_key);
        $account = User::find(Auth::id());
        if($account->stripe_id){
            $balance = $stripe->balance->retrieve([], ['stripe_account' => $account->stripe_id]);
       foreach($balance->available as $amount){
           $availableAmount =  $amount->amount / 100;
           $currency = $amount->currency;
       }
       foreach($balance->pending as $amount){
           $pendingAmount =  $amount->amount / 100;
       }
       
       $totalBalance = $availableAmount + $pendingAmount;
       $info = $stripe->accounts->retrieve(
           $account->stripe_id
         );
       $schedule = $info->settings->payouts->schedule->interval;
       $minimum_payout = Currency::where('country_code', $info->country)->first();
       $payoutList = $stripe->payouts->all(['limit'=>5],['stripe_account' => $account->stripe_id])->data;
       return [
           'availableAmount' => $availableAmount,
           'currency'        => $currency,
           'pendingAmount'   => $pendingAmount,
           'totalBalance'    => $totalBalance,
           'schedule'        => $schedule,
           'minimum_payout'  => $minimum_payout,
           'payoutList'      => $payoutList
       ];
    }
    return false;
        
}

function checkFavouriteUser($user){
    return UserFavourite::where(['user_ip' => userLocalIp(), 'user_id' => $user])->exists();
}

