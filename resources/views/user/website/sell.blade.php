@extends('user.website.includes.master')

@section('title')
    | Sell
@endsection
@section('sell', 'active')
@section('content')
    <main class="flex-shrink-o">
        <!-- Hero Home -->
        <section class="hero-marketplace page-header bg-body">
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
                      <a href="{{route('sell.create')}}" class="btn btn-primary">
                        Sell a prompt
                      <i class="fa-solid fa-arrow-right-long"></i>
                    </a>
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
        <!-- Hero Home -->
    </main>
@endsection
