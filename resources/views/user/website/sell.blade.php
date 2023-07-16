
@extends('user.website.includes.master')

@section('title')
    | Sell
@endsection
@section('sell','active')
@section('content')
    <main class="flex-shrink-o">
         <!-- Hero Home -->
    <section class="hero-home bg-body">
        <div
          class="bg-holder bg-holder--lg"
          style="background-image: url('{{asset("storage/website/assets")}}/frontend_assets/images/home/hero-home-bg.png')"
        ></div>
        <div
          class="bg-holder bg-holder--sm"
          style="
            background-image: url('{{asset("storage/website/assets")}}/frontend_assets/images/home/hero-home-figure.png');
          "
        ></div>
        <!--// bg-holder  -->
        <div class="container">
          <div class="row gx-4 align-items-center">
            <div class="col-lg-7 col-xl-8">
              <h1 class="text-white fw-bold mb-4">
                <span class="fw-bolder">
                  Start Selling Your<span class="text-primary bubble-gradient"
                    >Prompts
              </h1>
              <p class="text-secondary fs-5 w-75">voluptates in nostrum laborum? Adipisci autem officiis ab aut! Deleniti, et corrupti?
              </p>
              <p class="text-secondary fs-5 w-75">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque, mollitia nostrum ea beatae culpa ab minus reiciendis perspiciatis exercitationem quos.
              </p>
              <div
                class="d-flex align-items-center gap-4 gap-xl-5 pt-4 mt-4 pt-xxl-5 mt-xl-5"
              >
                <a href="{{route('sell.create')}}" class="btn btn-primary">
                    Sell a prompt
                  <i class="fa-solid fa-arrow-right-long"></i>
                </a>
                {{-- <a href="#" class="link-light"> Sell a prompt </a> --}}
              </div>
            </div>
            <div class="col-lg-5 col-xl-4">
              <div class="prompt-grid page-header">
                {{-- <div
                  class="prompt-grid--item bg-image bg-dark-deep"
                  style="
                    background-image: url('https://images.unsplash.com/photo-1589526261866-ab0d34f8dc19?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8YmVlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60');
                  "
                >
                  <div
                    class="prompt-grid--header text-gray-light bg-black bg-opacity-50"
                  >
                    <h6 class="fw-normal">⛵ Midjourney</h6>
                    <p class="mb-0">Abstract Halftone Risograph Prints</p>
                  </div>
                </div> --}}
                <div
                  class="prompt-grid--item bg-image"
                  style="
                    background-image: url('https://images.unsplash.com/photo-1601039727490-458d3e7f2799?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8YmVlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60');
                  "
                >
                  <div
                    class="prompt-grid--header text-gray-light bg-black bg-opacity-75"
                  >
                    <h6 class="fw-normal">⛵ Midjourney</h6>
                    <p class="mb-0">Lego Minifigures</p>
                  </div>
                </div>
                <div
                  class="prompt-grid--item bg-image"
                  style="
                    background-image: url('https://images.unsplash.com/photo-1572551798500-53e7d9513aa8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTd8fGJlZXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60');
                  "
                >
                  <div
                    class="prompt-grid--header text-gray-light bg-black bg-opacity-75"
                  >
                    <h6 class="fw-normal">⛵ Midjourney</h6>
                    <p class="mb-0">Lego Minifigures</p>
                  </div>
                </div>
  
                <div
                  class="prompt-grid--item bg-image"
                  style="background-color: #567d70"
                >
                  <div class="propmt-grid--testimonial text-light">
                    <p>
                      "You won't regret it. I was amazed at the quality of it. I
                      am really satisfied with my it."
                    </p>
                    <div
                      class="d-flex align-items-center gap-2 justify-content-between mt-4"
                    >
                      <h6 class="fw-bold mb-0">-Nathan-</h6>
                      <i class="fa-solid fa-quote-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Hero Home -->
    </main>
@endsection