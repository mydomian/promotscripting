<?php


use Illuminate\Support\Facades\Auth;

use App\Models\Favourite;
use App\Models\Order;
use App\Models\Product;
use App\Models\View;

function model(){
    return $model = array('1'=>'Version 1','2'=>'Version 2','3'=>'Version 3','4'=>'Version 4','5'=>'Version 5');
}
function sampler(){
    return $sampler = array('1'=>'Sampler 1','2'=>'Sampler 2','3'=>'Sampler 3','4'=>'Sampler 4','5'=>'Sampler 5');
}
function purchases()
{
    return \App\Models\Order::with('product')->where('user_id', Auth::id())->where('is_paid','paid')->where('status','approve')->latest()->get();
}
function sales()
{
    return \App\Models\Sale::with('order','product')->where('seller_id', Auth::id())->latest()->get();
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
function userPromotSubCategoryWise($userId,$subSubCategoryId){
    $prompts = Product::where(['user_id'=>$userId,'status'=>'active','sub_sub_category_id'=>$subSubCategoryId])->get();
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