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
   
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/storage/images/favicon/'.$system->favicon) }}">
    <link rel="icon" type="image/png" href="{{ asset('/storage/images/favicon/'.$system->favicon) }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('/storage/images/favicon/'.$system->favicon) }}" sizes="16x16">
    
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
    @stack('css')
    <style>
      .hide{
        display: none;
      }

      #prompt_file{
        overflow-y: auto;
        height: 250px;
        resize: none; /* Remove this if you want the user to resize the textarea */
      }
      .preview {
            display: inline-block;
            width: auto;
            height: 100px;
            margin: 10px;
        }
      .preview img {
            max-width: 10px;
            max-height: 10px;
            border: 1px solid #ccc;
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
              src="{{ asset('/storage/images/logo/'.$system->logo) }}"
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
                <a class="nav-link @yield('marketplace')" href="{{ route('marketplace') }}"> Marketplace </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @yield('sell')" href="{{route('sell.index')}}"> Sell </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @yield('hire')" href="{{route('hire')}}"> Hire </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @yield('blog')" href="{{ route('blogs') }}"> Blog </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @yield('about')" href="{{ route('aboutus') }}"> About </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @yield('contact')" href="{{ route('contactus') }}"> Contact </a>
              </li>

              @auth
                <li class="nav-item">
                  <a class="nav-link @yield('chat')" href="{{ url('/promptscripting-chat') }}" style="font-size: 22px;"> <i class="fas fa-comment-dots"></i> </a>
                </li>
                {{-- <div class="dropdown ms-lg-3 flex-shrink-0">
                  <button type="button" class=" btn btn-sm btn-primary rounded-5 position-relative" style="margin-top:10px;" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell"></i> <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">+99 <span class="visually-hidden">unread messages</span></span>
                  </button>
                

                <ul class="dropdown-menu bg-dark w-auto p-2">
                  <li class="p-1 d-flex justify-content">
                    <img src="https://picsum.photos/200" alt="Avatar" width="50" height="50" class="rounded-pill object-fit-cover" />
                    <h6 class="text-white">dsfgfdhfthythjytjuy</h6>
                  </li>
                  
                </ul>
              </div> --}}


              <div class="dropstart">
                <button type="button" class=" btn btn-sm btn-outline-primary rounded-5 position-relative" style="margin-top:10px;" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-bell"></i> {{-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">+99</span> --}}
                  
                </button>
                @php
                  $setting = App\Models\NotificationSetting::where('user_id',Auth::id())->first();
                @endphp
                @if (isset($setting))
                  <ul class="dropdown-menu bg-dark" style="width:400px;">
                    

                    @if($setting->new_favourites_notification == 1)
                      @php
                        $notifications = App\Models\Notification::where('type','favourites')->where('created_at','>',Carbon\Carbon::now()->subHours(3)->toDateTimeString())->get();
                      @endphp
                      <small class="text-primary px-2">Favourites</small>
                      <hr class="text-primary">

                      @foreach ($notifications as $notification)
                        @php
                            $notific = App\Models\Favourite::with('product')->find($notification->type_id);
                        @endphp
          
                        @if ($notific->product->user_id == Auth::id())
                          <li class="p-1 d-flex justify-content w-atuo mb-2">
                            <img src="@if($notific->product->image) {{ asset('/storage/products/thumbnil/'.$notific->product->image) }} @else https://picsum.photos/200 @endif" alt="Avatar" width="50" height="40" class="rounded-pill object-fit-cover" />
                            <small class="text-white m-atuo p-2">{{ $notific->product->title }}</small>
                          </li>
                        @endif
                        
                      @endforeach
                    @endif

                    @if($setting->new_prompt_notification == 1)
                      @php
                        $notifications = App\Models\Notification::where('type','prompts')->where('created_at','>',Carbon\Carbon::now()->subHours(3)->toDateTimeString())->get();
                      @endphp
                      <small class="text-primary px-2">New Prompts</small>
                      <hr class="text-primary">

                      @foreach ($notifications as $notification)
                        @php
                            $prompt = App\Models\Product::with('user')->find($notification->type_id);
                        @endphp
          
                        @if ($prompt->user_id == Auth::id())
                          <li class="p-1 d-flex justify-content" >
                            <img src="@if($prompt->image) {{ asset('/storage/products/thumbnil/'.$prompt->image) }} @else https://picsum.photos/200 @endif" alt="Avatar" width="50" height="40" class="rounded-pill object-fit-cover" />
                            <small class="text-white m-atuo p-2">{{ $prompt->title }}</small>
                          </li>
                        @endif
                        
                      @endforeach
                    @endif
                    @if($setting->new_sale_notification == 1)
                        @php
                          $notifications = App\Models\Notification::where('type','orders')->where('created_at','>',Carbon\Carbon::now()->subHours(3)->toDateTimeString())->get();
                        @endphp
                        <small class="text-primary px-2">New Sales</small>
                        <hr class="text-primary">

                        @foreach ($notifications as $notification)
                          @php
                              $sale = App\Models\Order::with('product')->find($notification->type_id);
                          @endphp
            
                          @if ($sale->seller_id == Auth::id())
                            <li class="p-1 d-flex justify-content" >
                              <img src="@if($sale->product->image) {{ asset('/storage/products/thumbnil/'.$sale->product->image) }} @else https://picsum.photos/200 @endif" alt="Avatar" width="50" height="40" class="rounded-pill object-fit-cover" />
                              <small class="text-white m-atuo p-2">{{ $sale->product->title }}</small>
                            </li>
                          @endif
                          
                        @endforeach
                    @endif
                    @if($setting->new_purchase_notification == 1)
                        @php
                          $notifications = App\Models\Notification::where('type','orders')->where('created_at','>',Carbon\Carbon::now()->subHours(3)->toDateTimeString())->get();
                        @endphp
                        <small class="text-primary px-2">New Purchases</small>
                        <hr class="text-primary">

                        @foreach ($notifications as $notification)
                          @php
                              $purchase = App\Models\Order::with('product')->find($notification->type_id);
                          @endphp
            
                          @if ($purchase->user_id == Auth::id())
                            <li class="p-1 d-flex justify-content" >
                              <img src="@if($purchase->product->image) {{ asset('/storage/products/thumbnil/'.$purchase->product->image) }} @else https://picsum.photos/200 @endif" alt="Avatar" width="50" height="40" class="rounded-pill object-fit-cover" />
                              <small class="text-white m-auto p-2">{{ $purchase->product->title }}</small>
                            </li>
                          @endif
                          
                        @endforeach
                    @endif
                    
                  
                  </ul>
                @endif
              </div>



              @endauth
              
              
            </ul>
            {{-- <a href="#" class="link-primary ms-lg-3 flex-shrink-0">
              Create Account
            </a> --}}
            @auth
               <div class="dropdown ms-lg-3 flex-shrink-0">
                  <a href="" class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Profile
                  </a>
                

                <ul class="dropdown-menu bg-dark w-100 ">
                  <li><a class="dropdown-item text-primary" href="{{ route('user.profile',['user'=>Auth::user()->id]) }}"><i class="fa fa-user-circle"></i> <small>Public Profile</small></a></li>
                  <li><a class="dropdown-item text-primary" href="{{ route('user.dashboard') }}"><i class="fa fa-dashboard"></i> <small>Dashboard</small></a></li>
                  <li><a class="dropdown-item text-primary" href="{{ route('user.prompts') }}"><i class="fa fa-list"></i> <small>Prompts</small></a></li>
                  <li><a class="dropdown-item text-primary" href="{{ route('user.sales') }}"><i class="fa fa-shopping-cart"></i> <small>Sales</small></a></li>
                  <li><a class="dropdown-item text-primary" href="{{route('user.purchases')}}"><i class="fa fa-shopping-cart"></i> <small>Purchases</small></a></li>
                  <li><a class="dropdown-item text-primary" href="{{ route('user.customOrderLists',['user'=>Auth::user()->id]) }}"><i class="fa fa-shopping-cart"></i> <small>Custom Orders</small></a></li>
                  <li><a class="dropdown-item text-primary" href=""><i class="fa-solid fa-money-check-dollar"></i> <small>Payouts</small></a></li>
                  <li><a class="dropdown-item text-primary" href="{{ route('user.favourites') }}"><i class="fa fa-heart"></i> <small>Favourites</small></a></li>
                  <li><a class="dropdown-item text-primary" href="{{ route('user.settings')}}"><i class="fa fa-gear"></i> <small>Settings</small></a></li>

                  @if (Auth::user()->is_admin == 'admin')
                    <li><a class="dropdown-item text-primary" href="{{route('admin.dashboard')}}"><i class="fa fa-sign-out"></i> <small>Logout</small></a></li>
                  @else
                    <li><a class="dropdown-item text-primary" href="{{route('user.logout')}}"><i class="fa fa-sign-out"></i> <small>Logout</small></a></li>
                  @endif
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
