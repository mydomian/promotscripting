@extends('user.website.includes.master')

@section('title')
   Hire
@endsection
@section('hire','active')
@section('content')
<main class="flex-shrink-0 bg-body">
    <!-- Hero Marketplace -->




    <section class="hero-hire page-header pb-xl-0 overflow-hidden">
        <div
          class="bg-holder bg-holder--lg"
          style="background-image: url('/storage/assets/images/home/hero-home-bg.png')"
        ></div>
        <div class="bg-holder bg-holder-overlay"></div>
        <!--// bg-holder  -->
        <div class="container">
          <div class="row gy-5 gx-5">
            <div class="col-sm-9 col-md-7 col-lg-4">
              <h1 class="text-white fw-bold mb-4 bubble-gradient">
                <span class="fw-bolder">
                  Hire <br />
                  Dedicated <br />
                  Engineers
                </span>
              </h1>
              <p class="text-white fs-5">
                Our AI-backed Intelligent Talent Cloud helps you source, vet,
                match, and manage the world's best software developers remotely.
              </p>
              <div class="d-grid gap-3 pt-4 mt-4 pb-xl-5 mb-xl-5">
                <a href="{{ route('user.hireDeveloper') }}" class="btn btn-lg btn-primary text-uppercase">
                  <span class="btn-text">HIRE DEVELOPER</span>
                  <span class="btn-trigger bg-black text-white">Go</span>
                </a>
                <a
                  href="{{ route('user.login') }}"
                  class="btn btn-lg btn-primary-reverse text-uppercase"
                >
                  <span class="btn-text">BECOME AN ENGINEER</span>
                  <span class="btn-trigger bg-black text-white">Go</span>
                </a>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="row gx-2 gx-sm-3 h-100">
                <div class="col-md-1"></div>
                <div class="col-4 col-md-4 col-lg-5">
                  <div class="horo-hire--item">
                    <div
                      class="bg-holder"
                      style="
                        background-image: url('/storage/assets/images/hire/hero-hire-1.png');
                      "
                    ></div>
                    <!--// bg-holder  -->
                    <p
                      class="overlay-text text-uppercase fw-semibold"
                      style="color: #e5e5e5"
                    >
                      easy sign up
                    </p>
                  </div>
                </div>
                <div class="col-4 col-md-3">
                  <div class="horo-hire--item">
                    <div
                      class="bg-holder"
                      style="
                        background-image: url('/storage/assets/images/hire/hero-hire-2.png');
                      "
                    ></div>
                    <!--// bg-holder  -->
                    <p
                      class="overlay-text text-uppercase fw-semibold"
                      style="color: #e5e5e5"
                    >
                      {{ totalScriptUser() }}+ talents
                    </p>
                  </div>
                </div>
                <div class="col-4 col-md-3">
                  <div class="horo-hire--item">
                    <div
                      class="bg-holder"
                      style="
                        background-image: url('/storage/assets/images/hire/hero-hire-3.png');
                      "
                    ></div>
                    <!--// bg-holder  -->
                    <p
                      class="overlay-text text-uppercase fw-semibold"
                      style="color: #e5e5e5"
                    >
                    {{ totalScriptPrompt() }}+ jobs
                    </p>
                  </div>
                </div>
                <div class="col-md-1"></div>
              </div>
            </div>
          </div>
        </div>
      </section>




 
<!-- Features Prompts -->
<section class="prompts-section section">
  <div class="container">
    <h2 class="text-center text-white text-capitalize mb-4">
      Top GPT
      <span class="fw-semibold text-lime-green">Prompts</span> Scripts 
    </h2>
    <p class="text-white text-center mb-5">
      Find the very best ChatGPT Prompt Scripts for your Project today 
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
        $products = App\Models\Product::whereIn('sub_category_id',$subCategories)->where('status','active')->inRandomOrder()->limit(20)->get();
        @endphp
        @foreach($products as $product)
          <a href="{{ route('marketplaceDetails',['slug'=>Str::slug($product->title,'-'),'product'=>$product->id]) }}">
            <div class="prompt-isotope--item filter{{$item->id}}" style="background-color: #222222; background-image: url('{{ asset('/storage/products/thumbnil/'.$product->image) }}');background-repeat: no-repeat;background-size: 100%;">
              <div class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50">
                <h6 class="fw-normal">⛵ {{ $product->subCategory->category->category_name ?? '-' }}</h6>
                <p class="mb-0">{{ $product->title ?? '-' }}</p>
              </div>
           </div>
          </a>
        @endforeach
      @endforeach
      


    </div>
  </div>
</section>
<section class="prompts-section section">
  <div class="container">
    <h2 class="text-center text-white text-capitalize mb-4">
      Top 
      <span class="fw-semibold text-lime-green">Midjourney</span> Image Prompts 
    </h2>
    <p class="text-white text-center mb-5">
      We make your events smart & impactful by personalised event management services 
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
        $products = App\Models\Product::whereIn('sub_category_id',$subCategories)->where('status','active')->inRandomOrder()->limit(20)->get();
        @endphp
        @foreach($products as $product)
          <a href="{{ route('marketplaceDetails',['slug'=>Str::slug($product->title,'-'),'product'=>$product->id]) }}">
            <div class="prompt-isotope--item filter{{$item->id}}" style="background-color: #222222; background-image: url('{{ asset('/storage/products/thumbnil/'.$product->image) }}');background-repeat: no-repeat;background-size: 100%;">
              <div class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50">
                <h6 class="fw-normal">⛵ {{ $product->subCategory->category->category_name ?? '-' }}</h6>
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

    {{-- <section class="profile-details mt-5 text-white">
        <div class="container">
            
            <div class="row">
                <div class="col-sm-12 p-0 m-0 gap-0">
                    <div class="search-profiles section text-white">
                        

                        <div class="container-fluid">
                            <h6 class="text-primary">Top Midjourney Prompt Enginer ({{ $midjourneys->count() }})</h6>
                            <div class="search-profiles-slider">
                                  @forelse ($midjourneys as $midJourney)
                                    <div class="slick-slide">
                                        <a href="{{ route('public.profile',['user'=>$midJourney->user->id]) }}" class="card top-author--card">
                                            <div class="top-img-wrapper">
                                            <img
                                                src="https://picsum.photos/200"
                                                width="420"
                                                height="240"
                                                alt="Author Banner"
                                                class="img-fluid top-banner-img"
                                            />
                                    
                                            <div class="profile-avatar--sm position-relative">
                                                <img
                                                src="@if(isset($midJourney->user->profile_photo_path)) {{ asset('/storage/profile/'.$midJourney->user->profile_photo_path) }} @else data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAHcAlQMBIgACEQEDEQH/xAAbAAEBAAMBAQEAAAAAAAAAAAAABwQFBgEDAv/EADkQAAEEAQICBgYJBAMAAAAAAAABAgMEBQYRBzESEyEiUWFBcYGRodEXIzJSU5KUscEUcoKjFSQl/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/ALiAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAXsAA5LUPEfSunpXQXsmx9hi7Ohrosrmr4Lty9pooON+j5JOi91+Fv33190+CqoFKBq8HqHE5+v1+HvwW40+11b03Z5OTmntNmi7gegAAAAAAAAAAAAAAAAADxV25kr1vqDMan1K7RGj5lgVif+lfTdEhb6Woqezl2qq7eJSM1dTG4i7fdyrV3y/laq/wT/gNjOq0rNmbHfu5Wy+WWVyd5URVRPj0l9oG90pw405puFvU0Y7Vvbv2rTUe9y+Kb9jfUh0tnHUbMSw2KVeWNU2Vj4mqn7GWAJXqzho7GSO1Dw/e/HZSv31qxu+rnRObUTki+XJfLmdTw71fDq/B/1Ks6m7A7qrcGyp0Hp4b+hfmnoOqXkSfGwt03x2tVK/cqZyn16xtTZOsTvKvva9f8gKyAAAAAAAAAAAAAAAAAANbqOk7JYDJUWfas1ZIk9atVDi+A+RZc0HDV32mozyQyNVNlTt6SfB3wKKqbke1DDe4Y6ym1Jj6759OZN3/fhjTtheqr2p4dq7ovmqeAFiBrMBnsXqCiy5iLsVmJybr0V7zfJyc0XyU2YBSUukTM8f4kg7zMPj1SVyckcqL2f7ET2KbvX3ESjp2J1HFubfzs3cgqQ99WuXkrtv25qe8LNI2NPY2e/l1WTNZN/XW3Ku6s7d0Zv7VVfNfIDugAAAAAAAAAAAAAAAADHv3K+PpzW7kjYq8DFfJI5exrUTtUDIMO5Pj1bJXuzVei9NnxTPbs5PBUUk8V3VXFS5N/xVuTB6XierEnYipLZ25+fu2RN/Spt6vA/SccW1h+RsyL2rI+dEVfciAY+W4ZaYkuOuaez0mDsO3Vf6S0nQ38k3RU9SLsYq6ByNlOqyHE61LX9LGTbKqeffNx9Cejfwbv6lfkPoT0b+Dd/Ur8gM/SOkNH6Vf19KWvNdVO9bs2Gvk9nob7EQ7SGaKZvSglZI3xY5FT4E8+hPRv4N39SvyMG7waq0XLb0hm8hi77U7quk6TF8l2RF/f1AVUE30HrfJLmZNJ6zhbBnIk+pmTsbaaib7pt2b7JvunPt5KmxSAAAAAAAAAAAAAAATLjrbndhcVg6z1Y7L3mQuVPuoqdnvVpTTX5TCYzLT05sjTjsSUpetrufv9W/xT3J7gP3h8bXxGMrY6nGjK9eJI2Ingnp9a8zNAAAAAeKnkegCX8dMf1GGoamqfV38Tajc2ROasV3L823xKPjbSXsdVttTZJ4WSIn9yIv8AJ88viqOax8lDKVmWKsu3Tjfvsuy7py80MmvDHWgjggYjIo2oxjE5NRE2RAPoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA//Z @endif"
                                                alt="Avatar"
                                                width="121"
                                                height="121"
                                                />
                                                <span class="online-status"></span>
                                            </div>
                                            </div>
                                            <h6 class="text-center text-white">@ {{ strstr( $midJourney->user->name . ' ', ' ', true ) }}</h6>
                                            <div class="text-primary d-flex justify-content-between">
                                                <small><i class="fa fa-eye"></i> {{ userAllProductView($midJourney->user->id) }}</small>
                                                <small><i class="fa fa-heart"></i> {{ userAllProductFav($midJourney->user->id) }}</small>
                                                <small><i class="fas fa-tags"></i> {{ totalPromptSell($midJourney->user_id) }}</small>
                                            </div>
                                        </a>
                                    </div>
                                  @empty
                                      No data found
                                  @endforelse
                              
                            </div>
                        </div>

                        <div class="container-fluid mt-4">
                            <h6 class="text-primary">Top GPT Prompt Enginer ({{ $gpts->count() }})</h6>
                            <div class="search-profiles-slider">
                                  @forelse ($gpts as $gpt)
                                    <div class="slick-slide">
                                        <a href="{{ route('public.profile',['user'=>$gpt->user->id]) }}" class="card top-author--card">
                                            <div class="top-img-wrapper">
                                            <img
                                                src="https://picsum.photos/200"
                                                width="420"
                                                height="240"
                                                alt="Author Banner"
                                                class="img-fluid top-banner-img"
                                            />
                                    
                                            <div class="profile-avatar--sm position-relative">
                                                <img
                                                src="@if(isset($gpt->user->profile_photo_path)) {{ asset('/storage/profile/'.$gpt->user->profile_photo_path) }} @else data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAHcAlQMBIgACEQEDEQH/xAAbAAEBAAMBAQEAAAAAAAAAAAAABwQFBgEDAv/EADkQAAEEAQICBgYJBAMAAAAAAAABAgMEBQYRBzESEyEiUWFBcYGRodEXIzJSU5KUscEUcoKjFSQl/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/ALiAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAXsAA5LUPEfSunpXQXsmx9hi7Ohrosrmr4Lty9pooON+j5JOi91+Fv33190+CqoFKBq8HqHE5+v1+HvwW40+11b03Z5OTmntNmi7gegAAAAAAAAAAAAAAAAADxV25kr1vqDMan1K7RGj5lgVif+lfTdEhb6Woqezl2qq7eJSM1dTG4i7fdyrV3y/laq/wT/gNjOq0rNmbHfu5Wy+WWVyd5URVRPj0l9oG90pw405puFvU0Y7Vvbv2rTUe9y+Kb9jfUh0tnHUbMSw2KVeWNU2Vj4mqn7GWAJXqzho7GSO1Dw/e/HZSv31qxu+rnRObUTki+XJfLmdTw71fDq/B/1Ks6m7A7qrcGyp0Hp4b+hfmnoOqXkSfGwt03x2tVK/cqZyn16xtTZOsTvKvva9f8gKyAAAAAAAAAAAAAAAAAANbqOk7JYDJUWfas1ZIk9atVDi+A+RZc0HDV32mozyQyNVNlTt6SfB3wKKqbke1DDe4Y6ym1Jj6759OZN3/fhjTtheqr2p4dq7ovmqeAFiBrMBnsXqCiy5iLsVmJybr0V7zfJyc0XyU2YBSUukTM8f4kg7zMPj1SVyckcqL2f7ET2KbvX3ESjp2J1HFubfzs3cgqQ99WuXkrtv25qe8LNI2NPY2e/l1WTNZN/XW3Ku6s7d0Zv7VVfNfIDugAAAAAAAAAAAAAAAADHv3K+PpzW7kjYq8DFfJI5exrUTtUDIMO5Pj1bJXuzVei9NnxTPbs5PBUUk8V3VXFS5N/xVuTB6XierEnYipLZ25+fu2RN/Spt6vA/SccW1h+RsyL2rI+dEVfciAY+W4ZaYkuOuaez0mDsO3Vf6S0nQ38k3RU9SLsYq6ByNlOqyHE61LX9LGTbKqeffNx9Cejfwbv6lfkPoT0b+Dd/Ur8gM/SOkNH6Vf19KWvNdVO9bs2Gvk9nob7EQ7SGaKZvSglZI3xY5FT4E8+hPRv4N39SvyMG7waq0XLb0hm8hi77U7quk6TF8l2RF/f1AVUE30HrfJLmZNJ6zhbBnIk+pmTsbaaib7pt2b7JvunPt5KmxSAAAAAAAAAAAAAAATLjrbndhcVg6z1Y7L3mQuVPuoqdnvVpTTX5TCYzLT05sjTjsSUpetrufv9W/xT3J7gP3h8bXxGMrY6nGjK9eJI2Ingnp9a8zNAAAAAeKnkegCX8dMf1GGoamqfV38Tajc2ROasV3L823xKPjbSXsdVttTZJ4WSIn9yIv8AJ88viqOax8lDKVmWKsu3Tjfvsuy7py80MmvDHWgjggYjIo2oxjE5NRE2RAPoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA//Z @endif"
                                                alt="Avatar"
                                                width="121"
                                                height="121"
                                                />
                                                <span class="online-status"></span>
                                            </div>
                                            </div>
                                            <h6 class="text-center text-white">@ {{ strstr( $gpt->user->name . ' ', ' ', true ) }}</h6>
                                            <div class="text-primary d-flex justify-content-between">
                                                <small><i class="fa fa-eye"></i> {{ userAllProductView($gpt->user->id) }}</small>
                                                <small><i class="fa fa-heart"></i> {{ userAllProductFav($gpt->user->id) }}</small>
                                                <small><i class="fas fa-tags"></i> {{ totalPromptSell($gpt->user_id) }}</small>
                                            </div>
                                        </a>
                                    </div>
                                  @empty
                                      No data found
                                  @endforelse
                              
                            </div>
                        </div>

                        <div class="container-fluid mt-4">
                            <h6 class="text-primary">Top Stable Diffusion Prompt Enginer ({{ $stablediffusions->count() }})</h6>
                            <div class="search-profiles-slider">
                                  @forelse ($stablediffusions as $stablediffusion)
                                    <div class="slick-slide">
                                        <a href="{{ route('public.profile',['user'=>$stablediffusion->user->id]) }}" class="card top-author--card">
                                            <div class="top-img-wrapper">
                                            <img
                                                src="https://picsum.photos/200"
                                                width="420"
                                                height="240"
                                                alt="Author Banner"
                                                class="img-fluid top-banner-img"
                                            />
                                    
                                            <div class="profile-avatar--sm position-relative">
                                                <img
                                                src="@if(isset($stablediffusion->user->profile_photo_path)) {{ asset('/storage/profile/'.$stablediffusion->user->profile_photo_path) }} @else data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAHcAlQMBIgACEQEDEQH/xAAbAAEBAAMBAQEAAAAAAAAAAAAABwQFBgEDAv/EADkQAAEEAQICBgYJBAMAAAAAAAABAgMEBQYRBzESEyEiUWFBcYGRodEXIzJSU5KUscEUcoKjFSQl/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/ALiAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAXsAA5LUPEfSunpXQXsmx9hi7Ohrosrmr4Lty9pooON+j5JOi91+Fv33190+CqoFKBq8HqHE5+v1+HvwW40+11b03Z5OTmntNmi7gegAAAAAAAAAAAAAAAAADxV25kr1vqDMan1K7RGj5lgVif+lfTdEhb6Woqezl2qq7eJSM1dTG4i7fdyrV3y/laq/wT/gNjOq0rNmbHfu5Wy+WWVyd5URVRPj0l9oG90pw405puFvU0Y7Vvbv2rTUe9y+Kb9jfUh0tnHUbMSw2KVeWNU2Vj4mqn7GWAJXqzho7GSO1Dw/e/HZSv31qxu+rnRObUTki+XJfLmdTw71fDq/B/1Ks6m7A7qrcGyp0Hp4b+hfmnoOqXkSfGwt03x2tVK/cqZyn16xtTZOsTvKvva9f8gKyAAAAAAAAAAAAAAAAAANbqOk7JYDJUWfas1ZIk9atVDi+A+RZc0HDV32mozyQyNVNlTt6SfB3wKKqbke1DDe4Y6ym1Jj6759OZN3/fhjTtheqr2p4dq7ovmqeAFiBrMBnsXqCiy5iLsVmJybr0V7zfJyc0XyU2YBSUukTM8f4kg7zMPj1SVyckcqL2f7ET2KbvX3ESjp2J1HFubfzs3cgqQ99WuXkrtv25qe8LNI2NPY2e/l1WTNZN/XW3Ku6s7d0Zv7VVfNfIDugAAAAAAAAAAAAAAAADHv3K+PpzW7kjYq8DFfJI5exrUTtUDIMO5Pj1bJXuzVei9NnxTPbs5PBUUk8V3VXFS5N/xVuTB6XierEnYipLZ25+fu2RN/Spt6vA/SccW1h+RsyL2rI+dEVfciAY+W4ZaYkuOuaez0mDsO3Vf6S0nQ38k3RU9SLsYq6ByNlOqyHE61LX9LGTbKqeffNx9Cejfwbv6lfkPoT0b+Dd/Ur8gM/SOkNH6Vf19KWvNdVO9bs2Gvk9nob7EQ7SGaKZvSglZI3xY5FT4E8+hPRv4N39SvyMG7waq0XLb0hm8hi77U7quk6TF8l2RF/f1AVUE30HrfJLmZNJ6zhbBnIk+pmTsbaaib7pt2b7JvunPt5KmxSAAAAAAAAAAAAAAATLjrbndhcVg6z1Y7L3mQuVPuoqdnvVpTTX5TCYzLT05sjTjsSUpetrufv9W/xT3J7gP3h8bXxGMrY6nGjK9eJI2Ingnp9a8zNAAAAAeKnkegCX8dMf1GGoamqfV38Tajc2ROasV3L823xKPjbSXsdVttTZJ4WSIn9yIv8AJ88viqOax8lDKVmWKsu3Tjfvsuy7py80MmvDHWgjggYjIo2oxjE5NRE2RAPoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA//Z @endif"
                                                alt="Avatar"
                                                width="121"
                                                height="121"
                                                />
                                                <span class="online-status"></span>
                                            </div>
                                            </div>
                                            <h6 class="text-center text-white">@ {{ strstr( $stablediffusion->user->name . ' ', ' ', true ) }}</h6>
                                            <div class="text-primary d-flex justify-content-between">
                                                <small><i class="fa fa-eye"></i> {{ userAllProductView($stablediffusion->user->id) }}</small>
                                                <small><i class="fa fa-heart"></i> {{ userAllProductFav($stablediffusion->user->id) }}</small>
                                                <small><i class="fas fa-tags"></i> {{ totalPromptSell($stablediffusion->user_id) }}</small>
                                            </div>
                                        </a>
                                    </div>
                                  @empty
                                      No data found
                                  @endforelse
                              
                            </div>
                        </div>

                        <div class="container-fluid mt-4">
                            <h6 class="text-primary">Top Dall-E Prompt Enginer ({{ $dalles->count() }})</h6>
                            <div class="search-profiles-slider">
                                  @forelse ($dalles as $dalle)
                                    <div class="slick-slide">
                                        <a href="{{ route('public.profile',['user'=>$dalle->user->id]) }}" class="card top-author--card">
                                            <div class="top-img-wrapper">
                                            <img
                                                src="https://picsum.photos/200"
                                                width="420"
                                                height="240"
                                                alt="Author Banner"
                                                class="img-fluid top-banner-img"
                                            />
                                    
                                            <div class="profile-avatar--sm position-relative">
                                                <img
                                                src="@if(isset($dalle->user->profile_photo_path)) {{ asset('/storage/profile/'.$dalle->user->profile_photo_path) }} @else data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAHcAlQMBIgACEQEDEQH/xAAbAAEBAAMBAQEAAAAAAAAAAAAABwQFBgEDAv/EADkQAAEEAQICBgYJBAMAAAAAAAABAgMEBQYRBzESEyEiUWFBcYGRodEXIzJSU5KUscEUcoKjFSQl/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/ALiAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAXsAA5LUPEfSunpXQXsmx9hi7Ohrosrmr4Lty9pooON+j5JOi91+Fv33190+CqoFKBq8HqHE5+v1+HvwW40+11b03Z5OTmntNmi7gegAAAAAAAAAAAAAAAAADxV25kr1vqDMan1K7RGj5lgVif+lfTdEhb6Woqezl2qq7eJSM1dTG4i7fdyrV3y/laq/wT/gNjOq0rNmbHfu5Wy+WWVyd5URVRPj0l9oG90pw405puFvU0Y7Vvbv2rTUe9y+Kb9jfUh0tnHUbMSw2KVeWNU2Vj4mqn7GWAJXqzho7GSO1Dw/e/HZSv31qxu+rnRObUTki+XJfLmdTw71fDq/B/1Ks6m7A7qrcGyp0Hp4b+hfmnoOqXkSfGwt03x2tVK/cqZyn16xtTZOsTvKvva9f8gKyAAAAAAAAAAAAAAAAAANbqOk7JYDJUWfas1ZIk9atVDi+A+RZc0HDV32mozyQyNVNlTt6SfB3wKKqbke1DDe4Y6ym1Jj6759OZN3/fhjTtheqr2p4dq7ovmqeAFiBrMBnsXqCiy5iLsVmJybr0V7zfJyc0XyU2YBSUukTM8f4kg7zMPj1SVyckcqL2f7ET2KbvX3ESjp2J1HFubfzs3cgqQ99WuXkrtv25qe8LNI2NPY2e/l1WTNZN/XW3Ku6s7d0Zv7VVfNfIDugAAAAAAAAAAAAAAAADHv3K+PpzW7kjYq8DFfJI5exrUTtUDIMO5Pj1bJXuzVei9NnxTPbs5PBUUk8V3VXFS5N/xVuTB6XierEnYipLZ25+fu2RN/Spt6vA/SccW1h+RsyL2rI+dEVfciAY+W4ZaYkuOuaez0mDsO3Vf6S0nQ38k3RU9SLsYq6ByNlOqyHE61LX9LGTbKqeffNx9Cejfwbv6lfkPoT0b+Dd/Ur8gM/SOkNH6Vf19KWvNdVO9bs2Gvk9nob7EQ7SGaKZvSglZI3xY5FT4E8+hPRv4N39SvyMG7waq0XLb0hm8hi77U7quk6TF8l2RF/f1AVUE30HrfJLmZNJ6zhbBnIk+pmTsbaaib7pt2b7JvunPt5KmxSAAAAAAAAAAAAAAATLjrbndhcVg6z1Y7L3mQuVPuoqdnvVpTTX5TCYzLT05sjTjsSUpetrufv9W/xT3J7gP3h8bXxGMrY6nGjK9eJI2Ingnp9a8zNAAAAAeKnkegCX8dMf1GGoamqfV38Tajc2ROasV3L823xKPjbSXsdVttTZJ4WSIn9yIv8AJ88viqOax8lDKVmWKsu3Tjfvsuy7py80MmvDHWgjggYjIo2oxjE5NRE2RAPoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA//Z @endif"
                                                alt="Avatar"
                                                width="121"
                                                height="121"
                                                />
                                                <span class="online-status"></span>
                                            </div>
                                            </div>
                                            <h6 class="text-center text-white">@ {{ strstr( $dalle->user->name . ' ', ' ', true ) }}</h6>
                                            <div class="text-primary d-flex justify-content-between">
                                                <small><i class="fa fa-eye"></i> {{ userAllProductView($dalle->user->id) }}</small>
                                                <small><i class="fa fa-heart"></i> {{ userAllProductFav($dalle->user->id) }}</small>
                                                <small><i class="fas fa-tags"></i> {{ totalPromptSell($dalle->user_id) }}</small>
                                            </div>
                                        </a>
                                    </div>
                                  @empty
                                      No data found
                                  @endforelse
                              
                            </div>
                        </div>

                        <div class="container-fluid mt-4">

                            <h6 class="text-primary">Top PromptScripting Prompt Enginer ({{ $promptbases->count() }})</h6>

                            <div class="search-profiles-slider">
                                  @forelse ($promptbases as $promptbase)
                                    <div class="slick-slide">
                                        <a href="{{ route('public.profile',['user'=>$promptbase->user->id]) }}" class="card top-author--card">
                                            <div class="top-img-wrapper">
                                            <img
                                                src="https://picsum.photos/200"
                                                width="420"
                                                height="240"
                                                alt="Author Banner"
                                                class="img-fluid top-banner-img"
                                            />
                                    
                                            <div class="profile-avatar--sm position-relative">
                                                <img
                                                src="@if(isset($promptbase->user->profile_photo_path)) {{ asset('/storage/profile/'.$promptbase->user->profile_photo_path) }} @else data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAHcAlQMBIgACEQEDEQH/xAAbAAEBAAMBAQEAAAAAAAAAAAAABwQFBgEDAv/EADkQAAEEAQICBgYJBAMAAAAAAAABAgMEBQYRBzESEyEiUWFBcYGRodEXIzJSU5KUscEUcoKjFSQl/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/ALiAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAXsAA5LUPEfSunpXQXsmx9hi7Ohrosrmr4Lty9pooON+j5JOi91+Fv33190+CqoFKBq8HqHE5+v1+HvwW40+11b03Z5OTmntNmi7gegAAAAAAAAAAAAAAAAADxV25kr1vqDMan1K7RGj5lgVif+lfTdEhb6Woqezl2qq7eJSM1dTG4i7fdyrV3y/laq/wT/gNjOq0rNmbHfu5Wy+WWVyd5URVRPj0l9oG90pw405puFvU0Y7Vvbv2rTUe9y+Kb9jfUh0tnHUbMSw2KVeWNU2Vj4mqn7GWAJXqzho7GSO1Dw/e/HZSv31qxu+rnRObUTki+XJfLmdTw71fDq/B/1Ks6m7A7qrcGyp0Hp4b+hfmnoOqXkSfGwt03x2tVK/cqZyn16xtTZOsTvKvva9f8gKyAAAAAAAAAAAAAAAAAANbqOk7JYDJUWfas1ZIk9atVDi+A+RZc0HDV32mozyQyNVNlTt6SfB3wKKqbke1DDe4Y6ym1Jj6759OZN3/fhjTtheqr2p4dq7ovmqeAFiBrMBnsXqCiy5iLsVmJybr0V7zfJyc0XyU2YBSUukTM8f4kg7zMPj1SVyckcqL2f7ET2KbvX3ESjp2J1HFubfzs3cgqQ99WuXkrtv25qe8LNI2NPY2e/l1WTNZN/XW3Ku6s7d0Zv7VVfNfIDugAAAAAAAAAAAAAAAADHv3K+PpzW7kjYq8DFfJI5exrUTtUDIMO5Pj1bJXuzVei9NnxTPbs5PBUUk8V3VXFS5N/xVuTB6XierEnYipLZ25+fu2RN/Spt6vA/SccW1h+RsyL2rI+dEVfciAY+W4ZaYkuOuaez0mDsO3Vf6S0nQ38k3RU9SLsYq6ByNlOqyHE61LX9LGTbKqeffNx9Cejfwbv6lfkPoT0b+Dd/Ur8gM/SOkNH6Vf19KWvNdVO9bs2Gvk9nob7EQ7SGaKZvSglZI3xY5FT4E8+hPRv4N39SvyMG7waq0XLb0hm8hi77U7quk6TF8l2RF/f1AVUE30HrfJLmZNJ6zhbBnIk+pmTsbaaib7pt2b7JvunPt5KmxSAAAAAAAAAAAAAAATLjrbndhcVg6z1Y7L3mQuVPuoqdnvVpTTX5TCYzLT05sjTjsSUpetrufv9W/xT3J7gP3h8bXxGMrY6nGjK9eJI2Ingnp9a8zNAAAAAeKnkegCX8dMf1GGoamqfV38Tajc2ROasV3L823xKPjbSXsdVttTZJ4WSIn9yIv8AJ88viqOax8lDKVmWKsu3Tjfvsuy7py80MmvDHWgjggYjIo2oxjE5NRE2RAPoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA//Z @endif"
                                                alt="Avatar"
                                                width="121"
                                                height="121"
                                                />
                                                <span class="online-status"></span>
                                            </div>
                                            </div>
                                            <h6 class="text-center text-white">@ {{ strstr( $promptbase->user->name . ' ', ' ', true ) }}</h6>
                                            <div class="text-primary d-flex justify-content-between">
                                                <small><i class="fa fa-eye"></i> {{ userAllProductView($promptbase->user->id) }}</small>
                                                <small><i class="fa fa-heart"></i> {{ userAllProductFav($promptbase->user->id) }}</small>
                                                <small><i class="fas fa-tags"></i> {{ totalPromptSell($promptbase->user_id) }}</small>
                                            </div>
                                        </a>
                                    </div>
                                  @empty
                                      No data found
                                  @endforelse
                              
                            </div>
                        </div>
                       
                      </div>
                      <div class="col-sm-4 d-flex justify-content-center m-auto">
                        <a href="{{ route('marketplace') }}" class="btn btn-lg btn-outline-primary ">Browse Marketplace</a>
                      </div>
                      
                </div>
                
            </div>
        </div>
    </section> --}}

    <!-- Marketplace Area -->
  </main>
@endsection
@push('scripts')
    
@endpush