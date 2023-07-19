<?php
$system = App\Models\Setting::first();
?>
@extends('user.website.includes.master')

@section('title')
   | Profile Page
@endsection
@section('register','active')

@section('content')
    <section class="hero-marketplace page-header bg-body">
        <div class="bg-holder bg-black bg-opacity-25"></div>
        <!--// bg-holder  -->
        <div class="container">
        <h2 class="text-center text-capitalize text-white mb-4">
            Profile
            <span class="fw-semibold text-primary">Update</span>
        </h2>
        <p class="text-white text-center mb-0">
            Update Your Personal Information To Show Lookratip
        </p>
        </div>
    </section>
    <section class="prompt-details custom-offers section text-white bg-body">
        <div class="container">
            <div class="row">
                
                <div class="col-sm-12 col-md-4  d-flex text-center h-100">
                    <div class="w-100 p-5 m-0" style="background: linear-gradient(to right, #0f2027, #203a43, #2c5364);">
                        <img class="img-fluid w-100 rounded-circle objit-fit-fill" src="@if(isset($user->profile_photo_path)){{ asset('/storage/profile/'.$user->profile_photo_path) }} @else https://picsum.photos/200 @endif" alt="profile-image">
                        <a href="#" class="btn btn-md btn-outline-primary w-auto mt-3">{{ $user->name }}</a>
                        <a href="#" class="btn btn-md btn-outline-primary w-auto mt-3">{{ $user->email }}</a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 p-3 rounded" style="background: linear-gradient(to right, #485563, #29323c);">
                    <div class="auth-form-wrapper  m-3">
                        <div class="text-white text-center mb-5">
                            <h5 class="mb-0">Profile Informaytion</h5>
                            <small>Please give your information!</small>
                        </div>
                        <form class="mt-3 text-white" method="POST" action="{{route('user.profile',['user'=>$user->id])}}" enctype="multipart/form-data">
                            @csrf
                                <div>
                                    <input
                                    type="file"
                                    name="profile"
                                    id="images"
                                    hidden
                                    class="d-none"
                                    />
                                    <label
                                    for="images"
                                    class="form-label custom-file-upload-box"
                                    style="background: linear-gradient(to right, #5b6c7d, #3a4450);"
                                    
                                    >
                                    <svg
                                        class="ps-icon"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                        d="M1.10132 18.6662H6.66665V23.9995H17.3333V18.6662H22.8987L12 5.9502L1.10132 18.6662ZM14.6667 15.9995V21.3329H9.33332V15.9995H6.89865L12 10.0489L17.1013 15.9995H14.6667Z"
                                        fill="#9AC6B7"
                                        />
                                        <path
                                        d="M0 0V8H2.66667V2.66667H21.3333V8H24V0H0Z"
                                        fill="#9AC6B7"
                                        />
                                    </svg>
                                    <span class="text-body-tertiary d-block">
                                        Profile Photo
                                    </span>
                                    <span class="text-body-tertiary d-block"> or </span>
                                    <span class="d-block"> Drop or Browse file </span>
                                    </label>
                                </div>
                                <div class="row mb-2 mt-5">
                                    <div class="col-sm-6">
                                        <small class="form-label">Enter Your Name</small>
                                        <input type="text" name="name" value="{{$user->name}}" class="form-control   @error('name') is-invalid @enderror" placeholder="Enter Name...">
                                        @error('name')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <small class="form-label">Enter Your Email</small>
                                        <input type="text" name="email" value="{{$user->email}}" class="form-control  @error('email') is-invalid @enderror" placeholder="Enter Email...">
                                        @error('email')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <small class="form-label">Enter Your Phone</small>
                                        <input type="text" name="phone" value="{{$user->phone}}" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter Phone...">
                                        @error('phone')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <small class="form-label">Enter Your Address</small>
                                        <input type="text" name="address" value="{{$user->address}}" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Address...">
                                        @error('phone')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div  class="col-sm-6">
                                        <small class="form-label">Enter Your Password</small>
                                        <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Enter Password...">
                                        @error('password')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div  class="col-sm-6">
                                        <small class="form-label">Confirm Password</small>
                                        <input type="password" name="confirm_password" class="form-control  @error('confirm_password') is-invalid @enderror" placeholder="Enter Password...">
                                        @error('confirm_password')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-outline-primary form-control btn-sm mt-4">Profile Update</button>
                        
                        </form>

                    </div>
                </div>
            </div>
        </div>
      </section>
@endsection
