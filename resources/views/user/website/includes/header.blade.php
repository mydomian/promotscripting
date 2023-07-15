<?php
$system = App\Models\Setting::first();
?>

    <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $system->name ?? "" }} @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- favicon -->
   
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('admin/assets/uploads/'.$system->favicon) }}">
    <link rel="icon" type="image/png" href="{{ asset('admin/assets/uploads/'.$system->favicon) }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('admin/assets/uploads/'.$system->favicon) }}" sizes="16x16">
    
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Nunito+Sans:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset("storage/website/assets")}}/libs/bootstrap/css/bootstrap.min.css" />
    <!-- font awesome -->
    <link rel="stylesheet" href="{{asset("storage/website/assets")}}/libs/fontawesome/css/all.min.css" />
    <!-- jquery nice select -->
    <link
      rel="stylesheet"
      href="{{asset("storage/website/assets")}}/libs/jquery-nice-select/css/nice-select.css"
    />
    <!-- slick -->
    <link rel="stylesheet" href="{{asset("storage/website/assets")}}/libs/slick/slick.css" />
    <link rel="stylesheet" href="{{asset("storage/website/assets")}}/libs/slick/slick-theme.css" />
    <!-- styles -->
    <link rel="stylesheet" href="{{asset("storage/website/assets")}}/styles/main.css" />
    <link rel="stylesheet" href="{{asset("storage/website/assets")}}/styles/main.res.css" />
    <link rel="stylesheet" href="{{asset("storage/website/assets")}}/styles/style.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style>
      .hide{
        display: none;
      }

      #prompt_file{
        overflow-y: auto;
        height: 250px;
        resize: none; /* Remove this if you want the user to resize the textarea */
    }
    </style>
  </head>
  <body class="d-flex flex-column min-vh-100">
    <!-- >>>>>>>>>> Header Main <<<<<<<<< -->
    <header class="header-main fixed-top">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="{{ route("home")}}">
            <img
              src="{{asset('admin/assets/uploads/1687609193brand-logo.png')}}"
              alt="Prompt Scripting"
              width="316"
              height="118"
              class="img-fluid"
            />
          </a>
          <button
            class="navbar-toggler order-1 order-lg-0"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarMainContent"
            aria-controls="navbarMainContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div
            class="collapse navbar-collapse order-2 order-lg-0"
            id="navbarMainContent"
          >
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-lg-auto">
              <li class="nav-item">
                <a
                  class="nav-link @yield('home')"
                  aria-current="page"
                  href="{{route('home')}}"
                >
                  Home
                </a>
              </li>
              <li class="nav-item">
                {{-- {{route('marketplace')}} --}}
                <a class="nav-link @yield('marketplace')" href="#"> Marketplace </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @yield('hire')" href="#"> Hire </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @yield('sell')" href="{{route('sell.index')}}"> Sell </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @yield('blog')" href="#"> Blog </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @yield('about')" href="#"> About </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @yield('contact')" href="#"> Contact </a>
              </li>
              
            </ul>
            {{-- <a href="#" class="link-primary ms-lg-3 flex-shrink-0">
              Create Account
            </a> --}}
           @auth
              <div class="dropdown ms-lg-3 flex-shrink-0">
                <a class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Profile 
                </a>
                <ul class="dropdown-menu bg-primary w-100 text-center">
                  <li><a class="dropdown-item" href="#">Profile View</a></li>
                  <li><a class="dropdown-item" href="{{route('user.logout')}}">Logout</a></li>
                  <li><a class="dropdown-item" href="">Favourites</a></li>
                  <li><a class="dropdown-item" href="">Settings</a></li>
                </ul>
              </div>
           @endauth
              
           
            
           @guest
              <a href="{{route('user.register')}}" class="btn btn-outline-primary ms-2 ms-sm-3 me-2 me-sm-3 me-lg-0 d-none d-sm-inline  @yield('register')">Create Account</a>
              <a href="{{route('user.login')}}" class="btn btn-outline-primary ms-2 ms-sm-3 me-2 me-sm-3 me-lg-0 d-none d-sm-inline @yield('login')">Login </a>
            @endguest
              
            
           
          </div>
          <button
            class="btn btn-outline-primary rounded-pill ms-auto search-trigger-btn d-lg-none"
            type="button"
          >
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
          <div class="navbar-search navbar-search-mobile">
            <form class="d-lg-none" role="search">
              <div class="d-flex search-box">
                <input
                  class="form-control"
                  type="search"
                  placeholder="Search"
                  aria-label="Search"
                />
                <button class="btn btn-outline-primary" type="submit">
                  <i class="fa-solid fa-magnifying-glass"></i>
                </button>
              </div>
            </form>
          </div>
         
          
          {{-- @endif --}}


          <a
            href="{{route('user.login')}}"
            class="btn btn-outline-primary rounded-pill ms-2 ms-sm-3 me-2 me-sm-3 me-lg-0 d-sm-none px-2"
          >
            <i class="fa-solid fa-user"></i>
          </a>
        </div>
      </nav>
    </header>
    <!-- >>>>>>>>>> Header Main <<<<<<<<< -->
