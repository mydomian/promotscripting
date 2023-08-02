@extends('user.website.includes.master')
@section('title')
    | My Cart
@endsection
@section('cart','active')
@section('content')
    <main class="flex-shrink-o">
        <section class="hero-marketplace page-header">
            <div class="bg-holder bg-body bg-opacity-25"></div>
            <!--// bg-holder  -->
            <div class="container d-flex justify-content-center">
               <div class="row">
                <div class="col-md-8  ">
                    @forelse($cartList as $cart)
                    <div class="card marketplace--card border-2 shadow-lg bg-transparent mb-3">
                        <div class="row g-0">
                          <div class="col-md-4 p-2">
                            <img src="{{asset('storage/products/thumbnil/'.$cart->product->image)}}" class="img-fluid rounded-2" alt="...">
                          </div>
                          <div class="col-md-8 p-2">
                            <div class="card-body">
                              <h5 class="card-title text-light">{{$cart->product->title}}</h5>
                              <p class="card-text text-light">{{Str::limit($cart->product->description,100)}}</p>
                              <div class="d-flex justify-content-between">
                                <small class="text-primary" style="align-self: self-end;">{{'$'.number_format($cart->product->price,2)}}</small>
                                <a href="{{route('cart.delete',$cart->id)}}" class="bg-primary" style="height:45px; width:45px; border-radius: 50%"><i class="fa-solid fa-trash-arrow-up fa-shake fa-md p-3" style="color: #ffffff;"></i></a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      @empty
                      @endforelse
                   </div>
                   <div class="col-md-4 ">
                    <div class="card marketplace--card border-2 shadow-lg bg-transparent" >
                        <div class="row g-0">
                          <div class="col-md-12">
                            <div class="card-header d-flex justify-content-between">
                                <h5 class="card-title text-primary">Cart</h5>
                                <small class="text-light">Total Product ({{$cartList->count()}})</small>
                            </div>
                            <div class="card-body">
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                            <div class="cart-footer d-flex justify-content-between p-2">
                                <h5 class="card-title text-primary">Total</h5>
                                <p class="text-white">{{$cartList->sum('price')}}</p>
                            </div>
                          </div>
                        </div>
                      </div>
                   </div>
               </div>
                
                
            </div>
                <div class="d-flex justify-content-center mt-5">
                    <a href="{{route('marketplace')}}" class="btn btn-primary btn-md text-light">Visit Marketplace <i class="fa-solid fa-arrow-right fa-beat fa-lg" style="color: #ffffff;"></i></a>
                </div>
        </section>
    </main>
@endsection
