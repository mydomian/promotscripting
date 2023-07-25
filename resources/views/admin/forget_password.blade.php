<?php
$system = App\Models\Setting::first();
?>
@extends('user.website.includes.master')

@section('title')
    Forget Page
@endsection

@section('content')
    
    <section class="prompt-details custom-offers section text-white bg-body">
       

            <div>
               <div style="background-image: url({{asset('storage/hero-home-figure.png')}});  background-position: right bottom; background-repeat: no-repeat; background-size: 400px,350px,auto;
               padding: 10px;">
                <div class="container">
                    <div class="row d-flex justify-content-center my-5">
                        <div class="col-sm-8 col-md-6 p-3  my-3 rounded" style="background: linear-gradient(to right, #485563, #29323c);">
                            <div class="auth-form-wrapper m-5">
                               <div class="mb-3">
                                    <a href="{{url('/login')}}" class="border border-secondary"><i class="fa-solid fa-angle-left m-1"></i></a>
                               </div>
                                <div class="text-white">
                                    <h5 class="mb-0">Forgot Password?</h5>
                                </div>
                                @if (session('status'))
                                <div class="alert alert-danger mt-2" role="alert">
                                    <small class="text-danger"> {{ session('status') }}</small>
                                </div>
                                @endif
                                <form class="mt-3 text-white mb-5" method="POST" action="{{route('password.email')}}">
                                    @csrf
                                        <div class="mb-5">
                                            <small class="form-label text-primary">Enter your registered email</small>
                                            <input type="text" name="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Enter Email...">
                                            @error('email')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-outline-primary form-control btn-sm">Send Mail <i class="fa fa-paper-plane"></i></button>
                              
                                </form>
                                      
                            </div>
                        </div>
                        
                    </div>
                </div>
               </div>
            </div>
      </section>
@endsection


