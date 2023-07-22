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
       

            <div>
               <div style="background-image: url({{asset('storage/hero-home-figure.png')}});  background-position: right bottom; background-repeat: no-repeat; background-size: 400px,350px,auto;
               padding: 10px;">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 p-3 my-3 rounded" style="background: linear-gradient(to right, #485563, #29323c);">
                            <div class="auth-form-wrapper  m-5">
                                <div class="text-white">
                                    <h5 class="mb-0">Login</h5>
                                    <small>Please Enter Your Email & Password!</small>
                                </div>
                                <form class="mt-3 text-white mb-5" method="POST" action="{{route('user.login')}}">
                                    @csrf
                                        <div class="mb-2">
                                            <small class="form-label">Enter Your Email</small>
                                            <input type="text" name="email" class="form-control bg-tranparent  @error('email') is-invalid @enderror" placeholder="Enter Email...">
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
                                        
                                            <button type="submit" class="btn btn-outline-primary form-control btn-sm">Login</button>
                              
                                        <div class="text-center mt-2">
                                            <a href="{{ route('user.forgetPassword') }}">Forgot Password?</a>
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
                        <div class="col-sm-12 col-md-6 col-lg-6 d-flex text-center">
                            <div class="align-self-center  mx-5 user-register">
                               <h3 class="text-primary">Welcome to the platform.</h3>
                               <small class="px-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi odit sit ullam nostrum laborum, excepturi omnis quasi molestias. Ipsum deserunt tempore molestiae, accusamus </small>
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
                }});
        })
    </script>
@endpush

