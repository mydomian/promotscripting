@extends('user.website.includes.master')

@section('title')
  | Home
@endsection
@section('home','active')


@section('content')
<!-- >>>>>>>>>> Main Sections <<<<<<<<< -->
<main class="flex-shrink-0 bg-body">


  <section class="hero-marketplace page-header">
    <div class="bg-holder bg-black bg-opacity-25"></div>
      <div class="container">
          <div class="row">
              <div class="col-md-6 m-auto">
                <h4 class="text-white fw-bold">
                  <span class="fw-bolder">
                    Introducing Prompt<span class="text-primary bubble-gradient"
                      >Scripting</span
                    >.ai
                    <br class="d-none d-sm-block" />
                    A Revolution in AI <br class="d-none d-sm-block" />
                    Collaboration
                  </span>
                </h4>
                <p class="text-body-secondary fs-5">
                  Find unique prompts to work with every project.
                </p>
              <div class="d-flex align-items-center gap-1 gap-xl-5 pt-4 mt-4 pt-xxl-2 mt-xl-2">
                <a href="{{ route('marketplace') }}" class="btn btn-primary">
                  Find a Prompt
                  <i class="fa-solid fa-arrow-right-long"></i>
                </a>
                <a href="{{ route('sell.index') }}" class="link-light"> Sell a prompt </a>
              </div>
              </div>
              <div class="col-md-6 mt-sm-4">
                <div class="top-author-slider">
                  @foreach ($categories as $item)
                      <div class="slick-slide">
                          <a href="{{ route('marketplace') }}" class="card top-author--card">
                              <div class="top-img-wrapper">
                              <img
                                  src="{{ asset('/storage/category_icon/'.$item->category_icon) }}"
                                  width="420"
                                  height="240"
                                  alt="Author Banner"
                                  class="img-fluid top-banner-img"
                                  style="aspect-ratio: 420 / 350; object-fit:fill"
                                  
                              />
                              </div>
                              <small class="text-white text-center mt-2">{{ $item->category_name }}</small>
                          </a>
                      </div>
                  @endforeach
              </div>
               
              </div>
                
              </div>
          </div>
          
      </div>
      
  </div>
  </section>

    <!-- Features Prompts -->
    <section class="prompts-section section">
      <div class="container">
        <h2 class="text-center text-white text-capitalize mb-4">
          Our Featured AI
          <span class="fw-semibold text-lime-green">Prompts</span>
        </h2>
        <p class="text-white text-center mb-5">
          Browse our unique prompts for Data Engineering, Programmers,
          Developers, Engineers, Cloud Architecture, and more..
        </p>
        <nav class="isotope-navbar mb-5">
          <ul
            class="navbar-nav flex-row flex-wrap justify-content-center isotope-navbar-nav prompt-isotope-navbar-nav"
          >
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="*">
                Show All
              </a>
            </li>
            @foreach ($categories as $item)
                <li class="nav-item">
                  <a class="nav-link" href=".filter{{ $item->id }}">{{ $item->category_name }} </a>
                </li>
            @endforeach
          </ul>
        </nav>
        <div class="prompt-isotope-grid">

          @foreach ($categories as $item)

            @php
            $subCategories = App\Models\SubCategory::where('category_id',$item->id)->select('id')->get();
            $subSubCategories = App\Models\SubSubCategory::whereIn('sub_category_id',$subCategories)->select('id')->get();
            
            $products = App\Models\Product::whereIn('sub_sub_category_id',$subSubCategories)->where('status','active')->inRandomOrder()->limit(20)->get();
            @endphp
            @foreach($products as $product)
              <a href="{{ route('marketplaceDetails',['slug'=>Str::slug($product->title,'-'),'product'=>$product->id]) }}">
                <div class="prompt-isotope--item filter{{$item->id}}" style="background-color: #222222; background-image: url('{{ asset('/storage/products/thumbnil/'.$product->image) }}');background-repeat: no-repeat;background-size: 100%;">
                  <div class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50">
                    <h6 class="fw-normal">⛵ {{ $product->subSubCategory->subCategory->category->category_name ?? '-' }}</h6>
                    <p class="mb-0">{{ $product->title ?? '-' }}</p>
                  </div>
               </div>
              </a>
            @endforeach
          @endforeach
          


        </div>
      </div>
    </section>
    <!-- Features Prompts -->

    <!-- Hottest Prompts -->
    <section class="hottest-prompts section">
      <div class="container">
        <h2 class="text-center text-white text-capitalize mb-4">
          Hottest
          <span class="fw-semibold text-lime-green">Prompts</span>
        </h2>
        <p class="text-white text-center mb-5">
          We make your events smart & impactful by personalised event
          management services
        </p>
        <div class="row gx-4 gy-5">
          @foreach ($prompts as $prompt)
          <div class="col-lg-6">
            <a href="{{ route('marketplaceDetails',['slug'=>Str::slug($prompt->title,'-'),'product'=>$prompt->id]) }}" class="text-decoration-none">
            <div class="hottest-prompts--item">
              <div
                class="hottest-prompts--preview bg-image"
                style="
                  background-color: #c4c4c4;
                  background-image: url('{{ asset('/storage/products/thumbnil/'.$prompt->image) }}');
                "
              >
                <div
                  class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
                >
                  <h6 class="fw-normal">⛵ {{ $prompt->subSubCategory->subCategory->category->category_name }}</h6>
                </div>
              </div>
              <div class="hottest-prompts--desc">
                <h5 class="text-white mb-0">{{ $prompt->title ?? '' }}</h5>
                  <p class="mb-5 text-light">
                    {{ strlen($prompt->description) > 70 ? trim(substr($prompt->description,0,65)).'....' : '-' }}
                  </p>
              </div>
            </div>
            </a>
          </div>
          @endforeach
         
          
        </div>

        <div class="text-center mt-5">
          <a
            href="{{ route('marketplace') }}"
            class="btn btn-lg btn-primary text-capitalize rounded-0 px-lg-5 py-lg-3"
          >
            Explore All
            <i class="fa-solid fa-arrow-right-long"></i>
          </a>
        </div>
      </div>
    </section>
    <!-- Hottest Prompts -->

 

    <!-- PromptScripting -->
    <section class="prompt-scripting section">
      <div class="bg-holder bg-primary bg-opacity-50"></div>
      <!--// bg-holder  -->
      <div class="container">
        <h2 class="text-center text-capitalize text-white mb-4">
          What is
          <span class="fw-semibold text-white">PromptScripting</span>
        </h2>
        <p class="text-white text-center">
          Prompts are becoming a powerful new way of programming AI models
          like DALL·E, Midjourney & GPT.
        </p>
        <p class="text-white text-center">
          However, it's hard to find good quality prompts online.
        </p>
        <p class="text-white text-center">
          If you're good at prompt engineering, there's also no clear way to
          make a living from your skills.
        </p>
        <p class="text-white text-center">
          PromptScripting is a marketplace for buying and selling quality prompts
          that produce the best results, and save you money on API costs.
        </p>
      </div>
    </section>
    <!-- PromptScripting -->


    <!-- Network Prompt -->
    <section class="network-prompt section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-11 col-xxl-10">
            <div class="card network-prompt--card text-white rounded-3">
              <div class="card-body">
                <div class="network-prompt--desc fw-semibold">
                  <h2>Build your network of Prompt Engineers.</h2>
                  <p class="mb-5">Sign up today to get started.</p>
                  <a href="{{ route('user.register') }}" class="btn btn-outline-light text-capitalize">
                    Register Now
                  </a>
                </div>
                <div class="network-prompt--grid">
                  <div class="network-prompt--item">
                    <img
                      src="https://images.unsplash.com/photo-1685194926944-9750afc26e39?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw1fHx8ZW58MHx8fHx8&auto=format&fit=crop&w=500&q=60"
                      alt=""
                      class="img-fluid"
                      width="165"
                      height="165"
                      style="background-color: #c4c4c4"
                    />
                  </div>
                  <div
                    class="network-prompt--item network-prompt--item-bordered"
                  >
                    <img
                      src="https://images.unsplash.com/photo-1684872305252-ca5c9e1947fd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxOHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                      alt=""
                      class="img-fluid"
                      width="165"
                      height="165"
                      style="background-color: #c4c4c4"
                    />
                  </div>
                  <div
                    class="network-prompt--item network-prompt--item-bordered"
                  >
                    <img
                      src="https://images.unsplash.com/photo-1685276151314-7fe5f99650ee?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwzfHx8ZW58MHx8fHx8&auto=format&fit=crop&w=500&q=60"
                      alt=""
                      class="img-fluid"
                      width="165"
                      height="165"
                      style="background-color: #c4c4c4"
                    />
                  </div>
                  <div class="network-prompt--item">
                    <img
                      src="https://plus.unsplash.com/premium_photo-1677362425101-a11ef7eaae03?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyfHx8ZW58MHx8fHx8&auto=format&fit=crop&w=500&q=60"
                      alt=""
                      class="img-fluid"
                      width="165"
                      height="165"
                      style="background-color: #c4c4c4"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Network Prompt -->
  </main>
  <!-- >>>>>>>>>> Main Sections <<<<<<<<< -->
@endsection
