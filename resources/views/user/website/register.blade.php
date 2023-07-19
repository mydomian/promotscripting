<?php
$system = App\Models\Setting::first();
?>
@extends('user.website.includes.master')

@section('title')
   | Register
@endsection
@section('register','active')

@section('content')
    
    <section class="prompt-details custom-offers section text-white bg-body">
       

            <div >
               
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 p-3 my-3 rounded" style="background: linear-gradient(to right, #485563, #29323c);">
                            <div class="auth-form-wrapper  m-3">
                                
                                <div class="text-white">
                                    <h5 class="mb-0">Sign Up</h5>
                                    <small>Please give your information!</small>
                                </div>
                                <form class="mt-3 text-white" method="POST" action="{{route('user.register')}}">
                                    @csrf
                                        <div class="mb-2">
                                            <small class="form-label">Enter Your Name</small>
                                            <input type="text" name="name" value="{{old('name')}}" class="form-control   @error('name') is-invalid @enderror" placeholder="Enter Name...">
                                            @error('name')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-2">
                                            <small class="form-label">Enter Your Email</small>
                                            <input type="text" name="email" value="{{old('email')}}" class="form-control  @error('email') is-invalid @enderror" placeholder="Enter Email...">
                                            @error('email')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        {{-- <div class="mb-2">
                                            <small class="form-label">Enter Your Phone</small>
                                            <input type="number" name="phone" value="{{old('phone')}}" class="form-control bg-dark  @error('phone') is-invalid @enderror" placeholder="Enter Phone...">
                                            @error('phone')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-2">
                                            <small class="form-label">Enter Your Address</small>
                                            <input type="text" name="address" value="{{old('address')}}" class="form-control bg-dark  @error('address') is-invalid @enderror" placeholder="Enter Address...">
                                            @error('phone')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div> --}}
                                        <div  class="mb-2">
                                            <small class="form-label">Enter Your Password</small>
                                            <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Enter Password...">
                                            @error('password')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div  class="mb-2">
                                            <small class="form-label">Confirm Password</small>
                                            <input type="password" name="confirm_password" class="form-control  @error('confirm_password') is-invalid @enderror" placeholder="Enter Password...">
                                            @error('confirm_password')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        
                                       
                                            <button type="submit" class="btn btn-outline-primary form-control btn-sm">SignUp</button>
                                
                                </form>

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 d-flex text-center">
                            <div class="align-self-center  mx-5 user-register">
                               <h3 class="text-primary">Welcome to the platform.</h3>
                               <small class="px-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi odit sit ullam nostrum laborum, excepturi omnis quasi molestias. Ipsum deserunt tempore molestiae, accusamus ad sunt officiis modi repellendus omnis deleniti error nulla totam. Ullam assumenda suscipit consequuntur optio debitis deserunt cumque ad similique quaerat rerum eius nisi nobis ducimus ab, culpa nostrum Lorem</small>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>
      </section>
@endsection
