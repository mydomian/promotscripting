@extends('user.website.includes.master')
@section('title')
    Aboutus
@endsection
@section('about','active')
@section('content')
    <!-- >>>>>>>>>> Main Sections <<<<<<<<< -->
    <main class="flex-shrink-0">
      <!-- Hero Marketplace -->
      <section class="hero-marketplace page-header bg-body">
        <div class="bg-holder bg-black bg-opacity-25"></div>
        <!--// bg-holder  -->
        <div class="container">
          <h2 class="text-center text-capitalize text-white mb-4">
            About
            <span class="fw-semibold text-primary">Us</span>
          </h2>
          <p class="text-white text-center mb-0">
            PromptScriptting is a Professional Marketplace Platform. Here we will provide you only interesting content, which you will like very much. We're dedicated to providing you the best of Marketplace, with a focus on dependability and job marketplace. We're working to turn our passion for Marketplace into a booming online website. We hope you enjoy our Marketplace as much as we enjoy offering them to you.I will keep posting more important posts on my Website for all of you. Please give your support and love.
          </p>
        </div>
      </section>
      <!-- Hero Marketplace -->
        <!-- Hero About -->
        <section class="hero-about page-header bg-dark">
          <div class="container">
            <div class="row align-items-center gy-5 gx-lg-5">
              <div class="col-lg-5 order-1 order-lg-0">
                <h1 class="display-6 fw-bold text-white">{{ $aboutus->heading ?? "" }}</h1>
                <p class="text-body-tertiary mb-4 mb-lg-5">
                  {{ $aboutus->short_des ?? "" }}
                </p>
                <a href="" class="link-primary text-decoration-none">
                  See our blog</a
                >
              </div>
              <div class="col-lg-7">
                <div class="text-center">
                  <img
             
                    src="{{ asset('/storage/images/logo/'.$setting->logo) }}"
                    alt="about-us"
                    width="960px"
                    height="800px"
                    class="img-fluid rounded"
                  />
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Hero About -->
  
        <!-- Konw About Us -->
        <section class="know-about-us section">
          <div class="container">
            <div class="card flex-row bg-transparent border-0">
              <div class="card-body">
                <div class="row gy-5 gy-lg-0 gx-lg-5">
                  <div class="col-lg-5">
                    <div class="ratio ratio-1x1">
                      <img
                        src="{{ asset('/storage/about_us/'.$aboutus->image) }}"
                        alt="Post"
                        width="600"
                        height="700"
                        class="img-fluid rounded object-fit-cover"
                      />
                    </div>
                  </div>
                  <div class="col-lg-7 align-self-end">
                    <h3 class="h2 fw-bold">Who we are?</h3>
                    <p class="text-body-tertiary">
                    {!!  $aboutus->details ?? "" !!}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Konw About Us -->
  
        <!-- Section Fancy -->
        <section class="section-fancy section overflow-hidden">
          <div
            class="bg-holder"
            style="
              background-image: url('{{asset('/storage/website/assets')}}/frontend_assets/images/about-us/curve-lines-bg.png');
            "
          ></div>
          <div class="section-fancy-slider">
            <div class="slick-slide">
              <h2 class="text-uppercase section-fancy-title fw-semibold mb-0">
               {{$aboutus->aboutus_slider_title1 ?? ""}}
              </h2>
            </div>
            <div class="slick-slide">
              <h2 class="text-uppercase section-fancy-title fw-semibold mb-0">
                 {{$aboutus->aboutus_slider_title1 ?? ""}}
              </h2>
            </div>
          </div>
        </section>
        <!-- Section Fancy -->
  
        <!-- Our Prompt Stats -->
        <section class="our-prompt-stats section">
          <div class="container">
            <div class="container">
              <div class="card mb-5">
                <div class="card-body p-0">
                  <div class="ratio ratio-21x9 rounded">
                    <video
                      width="320"
                      height="240"
                      loop
                      class="img-fluid object-fit-cover rounded"
                    >
              
                      <source src="{{asset('/storage/about_us/'.$aboutus->promotional_video)}}" type="video/mp4" />
                      Your browser does not support the video tag.
                    </video>
                  </div>
                  <button type="button" class="play-btn">
                    <i class="fa-solid fa-play"></i>
                  </button>
                </div>
              </div>
              <div class="row justify-content-center text-center ">
                <div class="col-lg-10 col-xl-7">
                  <h2 class="h4">Prompt statistics</h2>
                  <p class="text-body-tertiary mb-5">
                    PromptScriptting is a Professional Marketplace Platform. Here we will provide you only interesting content, which you will like very much. We're dedicated to providing you the best of Marketplace, with a focus on dependability and job marketplace. We're working to turn our passion for Marketplace into a booming online website. We hope you enjoy our Marketplace as much as we enjoy offering them to you.
                  </p>
                  <div class="row g-4">
                    <div class="col-md-6">
                      <div class="card our-prompt-stat--card">
                        <div class="card-body p-4">
                          <h4 class="h2 text-primary mb-2"></h4>
                          <p class="fs-5 text-white mb-0">Products</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="card our-prompt-stat--card">
                        <div class="card-body p-4">
                          <h4 class="h2 text-primary mb-2"></h4>
                          <p class="fs-5 text-white mb-0">Selling</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="card our-prompt-stat--card">
                        <div class="card-body p-4">
                          <h4 class="h2 text-primary mb-2"></h4>
                          <p class="fs-5 text-white mb-0">Users</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="card our-prompt-stat--card">
                        <div class="card-body p-4">
                          <h4 class="h2 text-primary mb-2"></h4>
                          <p class="fs-5 text-white mb-0">Blogs</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Our Prompt Stats -->
      
  
      
  
        <!-- Section Fancy -->
        <section class="section-fancy section overflow-hidden bg-body">
          <div class="section-fancy-slider">
            <div class="slick-slide">
              <h2 class="text-uppercase section-fancy-title fw-semibold mb-0">
                {{$aboutus->aboutus_slider_title2 ?? ""}}
              </h2>
            </div>
            <div class="slick-slide">
              <h2 class="text-uppercase section-fancy-title fw-semibold mb-0">
                {{$aboutus->aboutus_slider_title2 ?? ""}}
              </h2>
            </div>
          </div>
        </section>
        <!-- Section Fancy -->
  
      
      </main>
      <!-- >>>>>>>>>> Main Sections <<<<<<<<< -->
@endsection
