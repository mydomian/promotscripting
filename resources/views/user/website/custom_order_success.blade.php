@extends('user.website.includes.master')
@section('title')
    Payment Success
@endsection

@section('content')
    <main class="flex-shrink-o">
        <section class="hero-marketplace page-header">
            <div class="bg-holder bg-body bg-opacity-25"></div>
            <!--// bg-holder  -->
            <div class="container bg-primary col-sm-8 col-md-8 col-lg-8 p-5 rounded ">
                <div class="d-flex justify-content-center">
                    <i class="fa-solid fa-circle-check fa-shake fa-2xl mt-2 mx-2" style="color: white;"></i>
                    <p class="text-white text-center mb-0">
                        Payment Successfull!
                    </p>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <a href="{{ url('/promptscripting-chat') }}" class="btn btn-dark btn-md">Visit Promptscripting Chatting <i class="fa-solid fa-arrow-right fa-beat fa-lg" style="color: #ffffff;"></i></a>
                </div>
                
            </div>

        </section>
    </main>
@endsection
