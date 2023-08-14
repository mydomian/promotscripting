@extends('user.website.includes.master')
@section('title')
   | Terms Of Service
@endsection

@section('content')
    <main class="flex-shrink-o">
        <section class="hero-marketplace page-header">
            <div class="bg-holder bg-body bg-opacity-25"></div>
            <!--// bg-holder  -->
            <div class="container col-sm-8 col-md-8 col-lg-8 p-5 rounded bg-opacity-70"
                style="background: rgb(128,166,159); background: linear-gradient(211deg, rgba(128,166,159,1) 0%, rgba(30,30,30,1) 0%, rgba(128,166,159,1) 100%);">

                <h3 class="text-white mb-0" style="font-weight: 900">
                    Terms of Service
                </h3>
                <hr class="border-3 border-light">

                <p class="text-light">Welcome to PromptScripting! <br>
                 These Terms of Service govern your use of the <a href="{{env("APP_URL")}}" class="text-decoration-none">PromptScripting Website</a> and the services provided by PromptScripting. By accessing or using our Website, you agree to comply with and be bound by these Terms. Please read them carefully.
                 </p>

                 <h5 class="text-white mb-2 mt-5" style="font-weight: 700"><u>Acceptance of Terms</u></h5>
                 <p class="text-light">
                    By accessing or using the <a href="{{env("APP_URL")}}" class="text-decoration-none">PromptScripting Website</a>, you acknowledge that you have read, understand and agreed to these Terms, as well as our Privacy Policy. If you do not agree wih these Terms , please don not use our Website.

                 </p>

                 <h5 class="text-white mb-2 mt-5" style="font-weight: 700"><u>Eligibility</u></h5>
                 <p class="text-light">
                   <strong class="text-primary"> a.</strong> 
                   You must be at least 16 years of age to use our website. If you are unser 16, you may use our Website only uder the supervision of a parent or legal guardian.

                 </p>
                 <p class="text-light">
                   <strong class="text-primary"> b.</strong> 
                   By using our <a href="{{env("APP_URL")}}" class="text-decoration-none">Website</a>, you
                   represent and warrant that you have the legal capacity to enter into these Terms. 
                   

                 </p>


                 <h5 class="text-white mb-2 mt-5" style="font-weight: 700"><u>User Accounts</u></h5>
                 <p class="text-light">
                   <strong class="text-primary"> a.</strong> 
                   To access certain features of our
                   <a href="{{env("APP_URL")}}" class="text-decoration-none">Website</a>, you may need to create a
                   user account. You are responsible for
                   maintaining the confidentiality of your
                   account credentials and for all
                   activities that occur under your
                   account.
                   
                 </p>
                 <p class="text-light">
                   <strong class="text-primary"> b.</strong> 
                   You agree to provide accurate,      
                    current, and complete information
                    when creating your account and to
                    update this information as needed.

                   

                 </p>
                <div class="d-flex justify-content-center mt-5">
                    <a href="{{ env("APP_URL") }}" class="btn btn-dark btn-md">Go to Website<i
                            class="fa-solid fa-arrow-right fa-beat fa-lg" style="color: #ffffff;"></i></a>
                </div>

            </div>

        </section>
    </main>
@endsection
