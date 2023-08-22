@extends('user.website.includes.master')

@section('title')
    | Sell
@endsection
@section('sell', 'active')
@section('content')
    <main class="flex-shrink-o">
        <!-- Hero Home -->
        <section class="hero-home page-header bg-body">
          <div
            class="bg-holder bg-holder--lg"
            style="background-image: url('{{ asset('/storage/assets/images/home/hero-home-bg.png') }}')"
          ></div>
          <div
            class="bg-holder bg-holder--sm"
            style="
              background-image: url('{{ asset('/storage/assets/images/home/hero-home-figure.png') }}');
            "
          ></div>
  
        <div class="container">
          <div class="row gy-5 gx-4 align-items-center">
            <div class="col-lg-7 col-xl-8">
              <h1 class="text-white fw-bold mb-4">
                <span class="fw-bolder">
                  Introducing Prompt<span class="text-primary bubble-gradient"
                    >Scripting</span
                  >.ai
                  <br class="d-none d-sm-block" />
                  A Revolution in AI <br class="d-none d-sm-block" />
                  Collaboration
                </span>
              </h1>
              <p class="text-body-secondary fs-5">
                Find unique prompts to work with every project.
              </p>
              <div
                class="d-flex align-items-center gap-4 gap-xl-5 pt-4 mt-4 pt-xxl-5 mt-xl-5"
              >
                <a href="{{route('sell.create')}}" class="btn btn-primary">
                  Sell a Prompt
                  <i class="fa-solid fa-arrow-right-long"></i>
                </a>
                {{-- <a href="" class="link-light"> Sell a prompt </a> --}}
              </div>
            </div>
            <div class="col-lg-5 col-xl-4">
              <div class="prompt-grid">
                @foreach ($categories->take(4) as $item)
                  <div class="prompt-grid--item bg-image bg-dark-deep img-fluid" style="background-image: url('{{ asset('/storage/category_icon/'.$item->category_icon) }}">
                    <div class="prompt-grid--header text-gray-light bg-black bg-opacity-50">
                      <h6 class="fw-normal">
                        @if ($item->logo)
                             <img src="{{ asset('/storage/category_icon/'.$item->logo) }}" style="height:20px; width:20px; background:#ffffff;padding:1px; border-radius:50% " alt="">
                        @endif
                       
                         {{ $item->category_name }}</h6>
                      {{-- <p class="mb-0">Abstract Halftone Risograph Prints</p> --}}
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </section>
        <!-- Hero Home -->
    </main>
@endsection
