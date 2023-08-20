<?php
$system = App\Models\Setting::first();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $system->name ?? '' }} @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- favicon -->


    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/storage/images/favicon/' . $system->favicon) }}">
    <link rel="icon" type="image/png" href="{{ asset('/storage/images/favicon/' . $system->favicon) }}"
        sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('/storage/images/favicon/' . $system->favicon) }}"
        sizes="16x16">


    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Nunito+Sans:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('storage/website/assets') }}/libs/bootstrap/css/bootstrap.min.css" />
    <!-- font awesome -->
    <link rel="stylesheet" href="{{ asset('storage/website/assets') }}/libs/fontawesome/css/all.min.css" />
    <!-- jquery nice select -->
    <link rel="stylesheet" href="{{ asset('storage/website/assets') }}/libs/jquery-nice-select/css/nice-select.css" />
    <!-- slick -->
    <link rel="stylesheet" href="{{ asset('storage/website/assets') }}/libs/slick/slick.css" />
    <link rel="stylesheet" href="{{ asset('storage/website/assets') }}/libs/slick/slick-theme.css" />
    <!-- styles -->
    <link rel="stylesheet" href="{{ asset('storage/website/assets') }}/styles/main.css" />
    <link rel="stylesheet" href="{{ asset('storage/website/assets') }}/styles/main.res.css" />
    <link rel="stylesheet" href="{{ asset('storage/website/assets') }}/styles/style.css" />
    <link rel="stylesheet" href="{{ asset('storage/assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel='stylesheet' href='https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css'>
    @stack('css')
    <style>
        
        .hide {
            display: none;
        }

        #prompt_file {
            overflow-y: auto;
            height: 250px;
            resize: none;
            /* Remove this if you want the user to resize the textarea */
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

        #cart_menu,
        #cart_menu1 {
            position: relative;
        }

        #cart_menu .cart_count {
            position: absolute;
            top: -2px;
            right: 5px;
            background-color: black;
            color: red;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 15px;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        #cart_menu1 .cart_count {
            position: absolute;
            top: -8px;
            right: -6px;
            background-color: black;
            color: red;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 15px;
            font-weight: 700;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .bootstrap-tagsinput {
            background-color: transparent !important;
            width: 100%;
        }

        .bootstrap-tagsinput input {
            color: white !important;
        }

        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: white !important;
            background-color: #9ac6b7;
            padding: .0em .5em;
            font-size: 90%;
            font-weight: 500;
            vertical-align: baseline;
            border-radius: .25em;
        }

        .apexcharts-legend-text {
            color: white !important;
        }

        text {
            fill: white !important;
        }
        .profile-avatar .offline-status{
            width: 1rem;
            height: 1rem;
            border-radius: 50rem;
            position: absolute;
            top: 80%;
            left: 90%;
            transform: translate(-50%, -50%);
            background-color: #969696;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- >>>>>>>>>> Header Main <<<<<<<<< -->
    <header class="header-main fixed-top">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('/storage/images/logo/' . $system->logo) }}" alt="Prompt Scripting"
                        width="316" height="118" class="img-fluid" />
                </a>
                <button class="navbar-toggler order-1 order-lg-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarMainContent" aria-controls="navbarMainContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span id="burger" class="navbar-toggler-icon"></span>
                    <span class="d-flex"><i class="fa-solid fa-xmark align-self-center cross hide"
                            style="color: #9ac6b7;"></i></span>

                </button>
                <div class="collapse navbar-collapse order-2 order-lg-0" id="navbarMainContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link @yield('home')" aria-current="page" href="{{ route('home') }}">
                                Home
                            </a>
                        </li>
                        @auth
                            <li class="nav-item d-none mobile-dashboard">
                                <a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard</a>
                            </li>
                        @endauth
                        <li class="nav-item">
                            {{-- {{route('marketplace')}} --}}
                            <a class="nav-link @yield('marketplace')" href="{{ route('marketplace') }}"> Marketplace </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('sell')" href="{{ route('sell.index') }}"> Sell </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('hire')" href="{{ route('hire') }}"> Hire </a>
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
                            <li class="nav-item chat-icon">
                                <a class="nav-link @yield('chat')" href="{{ url('/promptscripting-chat') }}"><i
                                        class="fa-solid fa-message fa-lg" style="color: #ffffff;"></i></a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;" data-bs-toggle="modal"
                                    data-bs-target="#notificationModal">
                                    <i class="fa fa-bell fa-lg" style="color: #ffffff;"></i>
                                </a>
                            </li>
                            <li class="nav-item menu-chat d-none">
                                <a class="nav-link" href="{{ url('/promptscripting-chat') }}"> Chat </a>
                            </li>
                        @endauth
{{-- Cart --}}

                        <li class="nav-item" id="cart_menu">
                            <a class="nav-link @yield('cart')" href="{{ route('cart.list') }}"> <i
                                    class="fa-solid fa-cart-shopping fa-lg cart_icon" style="color: #ffffff;"></i></a>
                            <span class="cart_count {{cartCount() == 0 ? 'd-none' : ''}}">{{ cartCount() ?? 0 }}</span>
                        </li>
                        {{-- <li class="nav-item d-none mobile-cart">
                            <a class="nav-link" href="{{ route('cart.list') }}">Cart</a>
                        </li> --}}


                        @auth
                            <li class="nav-item logout d-none">
                                <a class="nav-link" href="{{ route('user.logout') }}"> Log Out </a>
                            </li>
                        @endauth
                    </ul>
                    @auth
                        <div class="dropdown ms-lg-3 flex-shrink-0" id="user_profile">
                            <a href="" class="btn btn-outline-primary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Profile
                            </a>


                            <ul class="dropdown-menu bg-dark w-100 ">
                                <li><a class="dropdown-item text-primary"
                                        href="{{ route('public.profile', ['user' => Auth::user()->id]) }}"><i
                                            class="fa fa-user-circle"></i> <small class="mx-1">Public
                                            Profile</small></a>
                                            {{-- {{ route('user.profile', ['user' => Auth::user()->id]) }} --}}
                                </li>
                                <li><a class="dropdown-item text-primary" href="{{ route('user.dashboard') }}"><i
                                            class="fa-solid fa-dashboard"></i> <small class="mx-1">Dashboard</small></a>
                                </li>
                                <li><a class="dropdown-item text-primary" href="{{ route('user.prompts') }}"><i
                                            class="fa fa-list"></i> <small class="mx-1">Prompts</small></a></li>
                                <li><a class="dropdown-item text-primary" href="{{ route('user.sales') }}"><i
                                            class="fa-solid fa-scale-balanced"></i> <small
                                            class="mx-1">Sales</small></a></li>
                                <li><a class="dropdown-item text-primary" href="{{ route('user.purchases') }}"><i
                                            class="fa-solid fa-bag-shopping"></i> <small
                                            class="mx-1">Purchases</small></a></li>
                                <li><a class="dropdown-item text-primary" href="{{ route('user.customOrderLists') }}"><i
                                            class="fa-solid fa-arrow-down-up-across-line"></i> <small
                                            class="mx-1">Custom Orders</small></a></li>

                                @if (Auth::user()->stripe_id)
                                    <li><a class="dropdown-item text-primary" href="{{ route('user.payout') }}"><i
                                                class="fa-solid fa-money-check-dollar"></i> <small
                                                class="mx-1">Payouts</small></a></li>
                                @endif

                                <li><a class="dropdown-item text-primary" href="{{ route('user.favourites') }}"><i
                                            class="fa-regular fa-heart"></i> <small class="mx-1">Favourites</small></a>
                                </li>
                                <li><a class="dropdown-item text-primary" href="{{ route('user.settings') }}"><i
                                            class="fa-solid fa-gear"></i> <small class="mx-1">Settings</small></a></li>

                                @if (Auth::user()->is_admin == 'admin')
                                    <li><a class="dropdown-item text-primary" href="{{ route('admin.dashboard') }}"><i
                                                class="fa-solid fa-sign-out"></i> <small class="mx-1">Logout</small></a>
                                    </li>
                                @else
                                    <li><a class="dropdown-item text-primary" href="{{ route('user.logout') }}"><i
                                                class="fa-solid fa-sign-out"></i> <small class="mx-1">Logout</small></a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    @endauth
                    @guest
                        <a href="{{ route('user.register') }}"
                            class="btn btn-outline-primary btn-sm ms-2 ms-sm-3 me-2 me-sm-3 me-lg-0 d-none d-sm-inline  @yield('register')">Create
                            Account</a>
                        <a href="{{ route('user.login') }}"
                            class="btn btn-outline-primary btn-sm ms-2 ms-sm-3 me-2 me-sm-3 me-lg-0 d-none d-sm-inline @yield('login')">Login
                        </a>
                    @endguest

                </div>
                <button class="btn btn-outline-primary rounded-pill ms-auto search-trigger-btn d-lg-none"
                    type="button">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
                <div class="navbar-search navbar-search-mobile">
                    <form action="{{route('search')}}" class="d-lg-none" role="search" method="POST">
                        @csrf
                        <div class="d-flex search-box">
                            <input class="form-control" type="text" name="search" placeholder="Search" />
                            <button class="btn btn-outline-primary" type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>
                </div>


                {{-- @endif --}}

                <div class="btn btn-outline-primary rounded-pill mx-1 d-sm-none px-2 mx-2"
                    id="cart_menu1"  style="height: 30px; width:30px">
                    <a  href="{{ route('cart.list') }}"> <i
                            class="fa-solid fa-cart-shopping fa-sm cart_icon" style="color: #9ac6b7;"></i></a>
                    <span class="cart_count {{cartCount() == 0 ? 'd-none' : ''}}">{{ cartCount() ?? 0 }}</span>
                </div>


                @guest
                    <a href="{{ route('user.login') }}"
                        class="btn btn-outline-primary rounded-pill  p-0 guest-avatar d-none" style="height: 30px; width:30px">
                        <i class="fa-solid fa-user"></i>
                    </a>
                @endguest


                @auth
                    <a href="{{ route('public.profile', ['user' => Auth::user()->id]) }}"
                        class="btn btn-outline-primary rounded-pill p-0 user-photo d-none">
                        <img class="rounded-circle bg-primary"
                            src="{{ asset('/storage/profile') }}/{{ Auth::user()->profile_photo_path ?? 'avatar.png' }}"
                            alt="{{ Auth::user()->name }}" style="height: 30px; width:30px">
                    </a>
                @endauth


            </div>
        </nav>
    </header>

    @push('all-modals')
        <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            @php
                                $setting = App\Models\NotificationSetting::where('user_id', Auth::id())->first();
                            @endphp
                            @if (isset($setting))
                                <div class="col-sm-12">
                                    @if ($setting->new_favourites_notification == 1)
                                        @php
                                            $notifications = App\Models\Notification::where('type', 'favourites')
                                                ->where(
                                                    'created_at',
                                                    '>',
                                                    Carbon\Carbon::now()
                                                        ->subHours(3)
                                                        ->toDateTimeString(),
                                                )
                                                ->get();
                                        @endphp
                                        <small class="text-primary px-2">Favourites</small><br>

                                        @foreach ($notifications as $notification)
                                            @php
                                                $notific = App\Models\Favourite::with('product')->find($notification->type_id);
                                            @endphp

                                            @if (isset($notific) && $notific->product->user_id == Auth::id())
                                                <a href="{{ route('marketplaceDetails', ['slug' => Str::slug($notific->product->title, '-'), 'product' => $notific->product->id]) }}"
                                                    class="text-decoration-none">
                                                    <img src="@if ($notific->product->image) {{ asset('/storage/products/thumbnil/' . $notific->product->image) }} @else https://picsum.photos/200 @endif"
                                                        alt="Avatar" width="50" height="40"
                                                        class="rounded-pill object-fit-cover mx-2 my-2" />
                                                    <small
                                                        class="text-primary mx-atuo">{{ $notific->product->title }}</small>
                                                </a><br>
                                            @endif
                                        @endforeach
                                    @endif
                                    @if ($setting->new_prompt_notification == 1)
                                        @php
                                            $notifications = App\Models\Notification::where('type', 'prompts')
                                                ->where(
                                                    'created_at',
                                                    '>',
                                                    Carbon\Carbon::now()
                                                        ->subHours(3)
                                                        ->toDateTimeString(),
                                                )
                                                ->get();
                                        @endphp
                                        <br><br><small class="text-primary px-2">Prompts</small><br>

                                        @foreach ($notifications as $notification)
                                            @php
                                                $prompt = App\Models\Product::with('user')->find($notification->type_id);
                                            @endphp

                                            @if (isset($prompt) && $prompt->user_id == Auth::id())
                                                <a href="{{ route('marketplaceDetails', ['slug' => Str::slug($prompt->title, '-'), 'product' => $prompt->id]) }}"
                                                    class="text-decoration-none">
                                                    <img src="@if ($prompt->image) {{ asset('/storage/products/thumbnil/' . $prompt->image) }} @else https://picsum.photos/200 @endif"
                                                        alt="Avatar" width="50" height="40"
                                                        class="rounded-pill object-fit-cover mx-2 my-2" />
                                                    <small class="text-primary mx-auto">{{ $prompt->title }}</small>
                                                </a>

                                                <br>
                                            @endif
                                        @endforeach
                                    @endif
                                    @if ($setting->new_sale_notification == 1)
                                        @php
                                            $notifications = App\Models\Notification::where('type', 'orders')
                                                ->where(
                                                    'created_at',
                                                    '>',
                                                    Carbon\Carbon::now()
                                                        ->subHours(3)
                                                        ->toDateTimeString(),
                                                )
                                                ->get();
                                        @endphp
                                        <br><br><small class="text-primary px-2">Sales</small><br>

                                        @foreach ($notifications as $notification)
                                            @php
                                                $sale = App\Models\Order::with('product')->find($notification->type_id);
                                            @endphp

                                            @if (isset($sale) && $sale->seller_id == Auth::id())
                                                <a href="{{ route('marketplaceDetails', ['slug' => Str::slug($sale->product->title, '-'), 'product' => $sale->product->id]) }}"
                                                    class="text-decoration-none">
                                                    <img src="@if ($sale->product->image) {{ asset('/storage/products/thumbnil/' . $sale->product->image) }} @else https://picsum.photos/200 @endif"
                                                        alt="Avatar" width="50" height="40"
                                                        class="rounded-pill object-fit-cover mx-2 my-2" />
                                                    <small class="text-primary m-atuo">{{ $sale->product->title }}</small>
                                                </a><br>
                                            @endif
                                        @endforeach
                                    @endif
                                    <br>
                                    @if ($setting->new_purchase_notification == 1)
                                        @php
                                            $notifications = App\Models\Notification::where('type', 'orders')
                                                ->where(
                                                    'created_at',
                                                    '>',
                                                    Carbon\Carbon::now()
                                                        ->subHours(3)
                                                        ->toDateTimeString(),
                                                )
                                                ->get();
                                        @endphp
                                        <br><br><small class="text-primary px-2">New Purchases</small><br>

                                        @foreach ($notifications as $notification)
                                            @php
                                                $purchase = App\Models\Order::with('product')->find($notification->type_id);
                                            @endphp

                                            @if (isset($purchase) && $purchase->user_id == Auth::id())
                                                <a href="{{ route('marketplaceDetails', ['slug' => Str::slug($purchase->product->title, '-'), 'product' => $purchase->product->id]) }}"
                                                    class="text-decoration-none">
                                                    <img src="@if ($purchase->product->image) {{ asset('/storage/products/thumbnil/' . $purchase->product->image) }} @else https://picsum.photos/200 @endif"
                                                        alt="Avatar" width="50" height="40"
                                                        class="rounded-pill object-fit-cover mx-2 my-2" />
                                                    <small
                                                        class="text-primary mx-auto">{{ $purchase->product->title }}</small>
                                                </a><br>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            @endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endpush


        <!-- >>>>>>>>>> Header Main <<<<<<<<< -->
        @push('scripts')
            <script>
                $(document).ready(function() {
                    $('#burger').on('click', function() {
                        var value = $('.order-1').attr("aria-expanded")
                        if (value == 'true') {
                            $('#burger').addClass('hide')
                            $('.cross').removeClass('hide')
                        }
                    })
                    $('.cross').on('click', function() {
                        $('.cross').addClass('hide')
                        $('#burger').removeClass('hide')
                    })
                })
            </script>
        @endpush
