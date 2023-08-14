<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class PromptController extends Controller
{
    public function prompts(Request $request){
        $prompts = Product::with('user','subCategory','productImages')->latest()->paginate(100);
        if($request->isMethod('post')){
            return $request->all();
        }
        $categories = Category::where('status','active')->get();
        return view('admin.prompts',compact('prompts','categories'));
    }

    public function orders(Request $request){
        $orders = Order::with('user','product')->latest()->paginate(100);
        if($request->isMethod('post')){
            return $request->all();
        }
        return view('admin.orders',compact('orders'));
    }

    public function promptStatusUpdate(Order $order,$type){
        if(isset($type)){
            $order->status = $type;
            $order->save();
            return back()->with('success','Status '.$type.' Successfully');
        }
    }
    public function promptStatusChecked(Product $product,$type){
        if(isset($type)){
            $product->update(['status'=>$type]);
            return back()->with('success','Status '.$type.' Successfully');
        }
    }


    
}
