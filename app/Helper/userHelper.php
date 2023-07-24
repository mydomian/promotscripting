<?php

use App\Models\Favourite;
use App\Models\Order;

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

function totalPromptSell($userId){
    $orders = Order::where(['user_id'=>$userId,'status'=>'approve','is_paid'=>'paid'])->count();
    return $orders;
}