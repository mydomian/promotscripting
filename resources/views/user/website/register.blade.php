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
                                    
                                        <div  class="mb-2">
                                            <small class="form-label">Enter Your Password</small>
                                            <div class="input-group">
                                                <input type="password" name="password" class="password form-control bg-tranparent @error('password') is-invalid @enderror" placeholder="Enter Password...">
                                                <span class="input-group-text bg-body opacity-25 text-white">
                                                    <i class="far fa-eye-slash" id="togglePassword"
                                                    style="cursor: pointer"></i>
                                                </span>
                                                
                                            </div>
                                            @error('password')
                                                <small class="text-danger">{{$message}}</small>
                                             @enderror
                                        </div>
                                        <div  class="mb-2">
                                            <small class="form-label">Confirm Password</small>
                                            <input type="password" name="confirm_password" class="form-control  @error('confirm_password') is-invalid @enderror" placeholder="Enter Confirmed Password..."> 
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
                               <small class="px-5">In most cases, register refers to the act of recording an event, transaction, name, or other information, or an aggregation of stored data, usually containing past events, transactions, names or other information</small>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>
      </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $("#togglePassword").click(function (e) {
                
                e.preventDefault();
                var type = $(this).parent().parent().find(".password").attr("type");
                if(type == "password"){
                    $(this).removeClass("fa-eye-slash");
                    $(this).addClass("fa-eye");
                    $(this).parent().parent().find(".password").attr("type","text");
                }else if(type == "text"){
                    $(this).removeClass("fa-eye");
                    $(this).addClass("fa-eye-slash");
                    $(this).parent().parent().find(".password").attr("type","password");
                }
            });
         
        })
    </script>
@endpush
