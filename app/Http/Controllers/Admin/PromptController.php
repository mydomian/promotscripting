<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class PromptController extends Controller
{
    public function prompts(Request $request){
        // $prompts = Product::with('user','subSubCategory','productImages')->latest()->get();
        if($request->isMethod('post')){
            return $request->all();
        }
        return view('admin.prompts');
    }
}
