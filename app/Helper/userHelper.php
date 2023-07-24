<?php

use Illuminate\Support\Facades\Auth;

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