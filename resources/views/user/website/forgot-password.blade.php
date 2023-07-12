<?php
$system = App\Models\Setting::first();
?>
@extends('website.includes.master')

@section('title')
    Login page
@endsection

@section('content')
    
    <section class="prompt-details custom-offers section text-white bg-body">
       

            <div style="background: linear-gradient(to right top, #80a69f, #648085, #4e5c64, #383b40, #1e1e1e);">
               <div style="background-image: url({{asset('storage/hero-home-figure.png')}});  background-position: right bottom; background-repeat: no-repeat; background-size: 400px,350px,auto;
               padding: 10px;">
                <div class="container">
                    <div class="row d-flex justify-content-center my-5">
                        <div class="col-sm-8 col-md-6 bg-dark bg-opacity-100 p-3  my-3 rounded">
                            <div class="auth-form-wrapper m-5">
                               <div class="mb-3">
                                    <a href="{{url('/login')}}" class="border border-secondary"><i class="fa-solid fa-angle-left m-1"></i></a>
                               </div>
                                <div class="text-white">
                                    <h5 class="mb-0">Forgot Password?</h5>
                                </div>
                                <form class="mt-3 text-white mb-5" method="POST" action="{{url('/login')}}">
                                    @csrf
                                        <div class="mb-5">
                                            <small class="form-label text-primary">Enter your registered email</small>
                                            <input type="text" name="email" class="form-control bg-dark  @error('email') is-invalid @enderror" placeholder="Enter Email...">
                                            @error('email')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        
                                        
                                            <button type="submit" class="btn btn-outline-primary form-control btn-sm">Send Mail</button>
                              
                                        {{-- <div class="text-center mt-2">
                                            <a href="{{route('forgot.password')}}" style="">Forget Password?</a>
                                        </div> --}}
                                </form>
                                        {{-- <div class="mt-5 d-flex justify-content-center text-white">
                                            <hr class="w-100 bold">
                                            <p class="mt-1 mx-3">or</p>
                                            <hr class="w-100">
                                        </div>
                                         --}}
                                        {{-- <a href="{{ route('user.register') }}" class="btn btn-outline-secondary btn-sm w-100">Sign Up</a> --}}
                            </div>
                        </div>
                        
                    </div>
                </div>
               </div>
            </div>
      </section>
@endsection


