<?php
$system = App\Models\Setting::first();
?>
@extends('user.website.includes.master')

@section('title')
    | Login
@endsection
@section('login','active')

@section('content')
    
    <section class="prompt-details custom-offers section text-white bg-body">
       

            <div style="background: linear-gradient(to right top, #80a69f, #648085, #4e5c64, #383b40, #1e1e1e);">
               <div style="background-image: url({{asset('storage/hero-home-figure.png')}});  background-position: right bottom; background-repeat: no-repeat; background-size: 400px,350px,auto;
               padding: 10px;">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 bg-dark bg-opacity-75 p-3 my-3 rounded">
                            <div class="auth-form-wrapper  m-5">
                                
                                <div class="text-white">
                                    <h5 class="mb-0">Login</h5>
                                    <small>Please Enter Your Email & Password!</small>
                                </div>
                                <form class="mt-3 text-white mb-5" method="POST" action="{{route('user.login')}}">
                                    @csrf
                                        <div class="mb-2">
                                            <small class="form-label">Enter Your Email</small>
                                            <input type="text" name="email" class="form-control bg-dark  @error('email') is-invalid @enderror" placeholder="Enter Email...">
                                            @error('email')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div  class="mb-2">
                                            <small class="form-label">Enter Your Password</small>
                                            <input type="password" name="password" class="form-control bg-dark @error('password') is-invalid @enderror" placeholder="Enter Password...">
                                            @error('password')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        
                                            <button type="submit" class="btn btn-outline-primary form-control btn-sm">Login</button>
                              
                                        <div class="text-center mt-2">
                                            <a href="#">Forgot Password?</a>
                                        </div>
                                </form>
                                        <div class="mt-5 d-flex justify-content-center text-white">
                                            <hr class="w-100 bold">
                                            <p class="mt-1 mx-3">or</p>
                                            <hr class="w-100">
                                        </div>
                                        <a href="{{ route('user.register') }}" class="btn btn-outline-secondary btn-sm w-100">Sign Up</a>
                            </div>
                        </div>
                        <div class="col-md-8 d-flex text-center">
                            <div class="align-self-center  mx-5">
                               <h3>Welcome to the platform.</h3>
                               <p class="px-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi odit sit ullam nostrum laborum, excepturi omnis quasi molestias. Ipsum deserunt tempore molestiae, accusamus ad sunt officiis modi repellendus omnis deleniti error nulla totam. Ullam assumenda suscipit consequuntur optio debitis deserunt cumque ad similique quaerat rerum eius nisi nobis ducimus ab, culpa nostrum Lorem</p>
                            </div>
                        </div>
                    </div>
                </div>
               </div>
            </div>
                 <!-- Modal -->
                <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content bg-dark bg-opacity-100 border">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Forgot Password?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        ...
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    </div>
                </div>
      </section>

 
@endsection

