@extends('user.website.includes.master')

@section('title')
    Contact Us
@endsection
@section('contact','active')
@section('content')

    <section class="hero-marketplace page-header bg-body">
        <div class="bg-holder bg-black bg-opacity-25"></div>
        <!--// bg-holder  -->
        <div class="container">
        <h2 class="text-center text-capitalize text-white mb-4">
            Contact
            <span class="fw-semibold text-primary">Us</span>
        </h2>
        <p class="text-white text-center mb-0">
            Please {{ $setting->email ?? "email" }} or {{ $setting->phone ?? "phone" }} us if you have any queries about the site or anything else. <br>
            <p class="text-white text-center mb-0">Address: {{ $setting->location }}</p>
        </p>
      
        </div>
    </section>



    <section class="prompt-details custom-offers section text-white bg-body">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
              <div class="d-grid gap-5">
                <div class="text-center">
                  <span class="text-white ">Contact Us</span>
                </div>
                <form class="default-form2" action="{{ route('contactus') }}" method="post">
                    @csrf
                    <div>
                        <input type="text" name="name" id="formName" placeholder="Full Name" class="form-control" required="">
                        <input type="email" name="email" id="formEmail" class="form-control mt-3" placeholder="Email Address" required="">
                        <input type="text" name="phone" required id="formPhone" class="form-control mt-3" placeholder="Phone" >
                        <input type="text" name="subject" required id="formSubject" class="form-control mt-3" placeholder="Subject">
                        <textarea name="message" id="formMessage" class="form-control mt-3" placeholder="Write a Message" required=""></textarea>
                    </div>
                    <button class="btn btn-outline-primary btn-sm form-control mt-3"  type="submit"><i class="fa fa-paper-plane"></i> Send </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection


