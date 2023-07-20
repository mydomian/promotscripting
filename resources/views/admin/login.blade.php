<?php
$system = App\Models\Setting::first();
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <title>{{ config('app.name') }} Admin Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css')}}">
   
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo1/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('/storage/images/favicon/'.$system->favicon) }}"/>
</head>
<body>
<section class="prompt-details custom-offers section text-white bg-body">
    <div style="background: linear-gradient(to right top, #80a69f, #648085, #4e5c64, #383b40, #1e1e1e);">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-12 col-md-5 col-lg-6 p-5 my-5 rounded" style="background: linear-gradient(to right, #485563, #29323c);">
                    <div class="auth-form-wrapper  m-3">
                        <div class="text-white mb-5">
                            <h5 class="mb-0">Log In</h5>
                            <small>Please give your information!</small>
                        </div>
                        <form class="mt-5 text-white" action="{{ route('admin.login') }}" method="POST" >
                            @csrf
                                
                                <div class="mb-2">
                                    <small class="form-label">Enter Your Email</small>
                                    <input type="text" name="email" value="{{old('email')}}" class="form-control   @error('email') is-invalid @enderror" placeholder="Enter Email...">
                                    @error('email')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div  class="mb-2">
                                    <small class="form-label">Enter Your Password</small>
                                    <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Enter Password...">
                                    @error('password')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mt-5">
                                    <button type="submit" class="btn btn-outline-info form-control">Log in</button>
                                </div>
                        </form>
                        <div class="mt-5 d-flex justify-content-center text-white">
                            <hr class="w-100 bold">
                            <p class="mt-1 mx-3">or</p>
                            <hr class="w-100">
                        </div>
                        <div class="text-center">
                            <a href="{{ route('admin.forgetPassword') }}" class="text-white">Forgot Password?</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-5 col-lg-6 d-flex text-center">
                    <div class="align-self-center register-text-div admin-login">
                       <h3 class="">Register today and get connected</h3>
                       <p class="px-5 mt-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi odit sit ullam nostrum laborum,Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi odit sit ullam nostrum laborum,</p>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
</section>
<!-- core:js -->
<script src="{{ asset('assets/vendors/core/core.js') }}"></script>
<script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/template.js') }}"></script>
@include('admin.errors')
</body>
</html>
