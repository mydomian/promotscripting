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
              @if ($cartList->count())
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
                            <div class="card-header">
                                <h5 class="card-title text-primary">Your Cart</h5>
                            </div>
                            <div class="card-body mb-0">
                              <div class="d-flex justify-content-between">
                                <p class="text-light">Product Quantity</p>
                                <p class="text-primary"> {{$cartList->count()}}</p>
                              </div>
                              <div class="d-flex justify-content-between">
                                <p class="text-light">Total Amount</p>
                                <p class="text-primary"> {{'$'.$cartList->sum('price')}}</p>
                              </div>
                            </div>
                           <div class="card-footer">
                            <a href="{{route('cart.checkout')}}" class="btn btn-outline-primary w-100">Checkout</a>
                           </div>
                          </div>
                        </div>
                      </div>
                   </div>
               </div>
              @else
              <div class="card marketplace--card border-2 shadow-lg bg-transparent mb-3">
                  <div class="card-body">
                    <h5 class="text-light">You haven't cart any product</h5>
                  </div>
              </div>
              @endif
                
                
            </div>
                <div class="d-flex justify-content-center mt-5">
                    <a href="{{route('marketplace')}}" class="btn btn-primary btn-md text-light">Visit Marketplace <i class="fa-solid fa-arrow-right fa-beat fa-lg" style="color: #ffffff;"></i></a>
                </div>
        </section>
    </main>
@endsection