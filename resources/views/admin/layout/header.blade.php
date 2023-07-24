<?php
$system = App\Models\Setting::first();
?>
        <!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layout.head')
</head>
<body>
<div class="main-wrapper">
    <nav class="sidebar">
        <div class="sidebar-header">
            <a href="" class="sidebar-brand">
                <img src="{{ asset('storage/images/logo/'.$system->logo) }}" alt="Logo" style="width:80%; background-color:black" >
            </a>
            <div class="sidebar-toggler not-active">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="sidebar-body">
            <ul class="nav">
                <li class="nav-item nav-category">Main</li>
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link ">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#categories" role="button" aria-expanded="false"
                       aria-controls="emails">
                        <i class="link-icon" data-feather="book-open"></i>
                        <span class="link-title">Menus</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="categories">
                        <ul class="nav sub-menu">

                            <li class="nav-item">
                                <a href="{{ route('categories.index') }}" class="nav-link @yield('categories')">Categories</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('subcategories.index') }}" class="nav-link @yield('subcategories')">Sub Categories</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('subsubcategories.index') }}" class="nav-link @yield('subsubcategories')">Sub Sub Categories</a>

                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#prompts" role="button" aria-expanded="false"
                       aria-controls="emails">
                        <i class="link-icon" data-feather="book-open"></i>
                        <span class="link-title">Prompts</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="prompts">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('admin.prompts') }}" class="nav-link">Prompts</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#transactions" role="button" aria-expanded="false"
                       aria-controls="emails">
                        <i class="link-icon" data-feather="dollar-sign"></i>
                        <span class="link-title">Transactions</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="transactions">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{route('admin.checkouts')}}" class="nav-link">Checkouts</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#orders" role="button" aria-expanded="false"
                       aria-controls="emails">
                        <i class="link-icon" data-feather="book-open"></i>
                        <span class="link-title">Orders</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="orders">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('admin.orders') }}" class="nav-link">Orders</a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#blogs" role="button" aria-expanded="false"
                       aria-controls="emails">
                        <i class="link-icon" data-feather="book-open"></i>
                        <span class="link-title">Blogs</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="blogs">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('blogs.index') }}" class="nav-link">Blogs List</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#aboutUs" role="button" aria-expanded="false"
                       aria-controls="emails">
                        <i class="link-icon" data-feather="book"></i>
                        <span class="link-title">About Us</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="aboutUs">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('admin.aboutUs') }}" class="nav-link">About Company</a>
                            </li>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                       aria-controls="emails">
                        <i class="link-icon" data-feather="phone"></i>
                        <span class="link-title">Contact Us</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="emails">
                        <ul class="nav sub-menu">
                        
                            <li class="nav-item">
                                <a href="{{ route('admin.contactmessages') }}" class="nav-link">Contact Messages</a>
                            </li>
                        </ul>
                    </div>
                </li>
               
              
                <li class="nav-item">
                    <a href="{{ route('admin.setting') }}" class="nav-link @yield('settings')">
                        <i class="link-icon" data-feather="settings"></i>
                        <span class="link-title">Setting</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.payment')}}" class="nav-link">
                        <i class="link-icon" data-feather="anchor"></i>
                        <span class="link-title">Stripe Setting</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">Profile</span>
                    </a>
                </li>
            

            </ul>
        </div>
    </nav>
    
    <!-- partial -->

    <div class="page-wrapper">

        <!-- partial:partials/_navbar.html -->
        <nav class="navbar">
            <a href="#" class="sidebar-toggler">
                <i data-feather="menu"></i>
            </a>
            <div class="navbar-content">
          
                <ul class="navbar-nav">
                  
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if(!empty(Auth::user()->profile_photo_path))
                                <img class="wd-30 ht-30 rounded-circle"
                                     src="{{ asset('/storage/profile/'.Auth::user()->profile_photo_path) }}"
                                     alt="profile">
                            @else
                                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30"
                                     alt="profile">
                            @endif
                        </a>
                        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                            <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                <div class="mb-3">
                                    @if(!empty(Auth::user()->profile_photo_path))
                                        <img class="wd-80 ht-80 rounded-circle"
                                             src="{{ asset('/storage/profile/'.Auth::user()->profile_photo_path) }}"
                                             alt="">
                                    @else
                                        <img class="wd-80 ht-80 rounded-circle" src="https://via.placeholder.com/80x80"
                                             alt="">
                                    @endif
                                </div>
                                @if (Auth::check())
                                    <div class="text-center">
                                        <p class="tx-16 fw-bolder">{{ Auth::user()->name }}</p>
                                        <p class="tx-12 text-muted">{{ Auth::user()->email }}</p>
                                    </div>
                                @endif
                                
                            </div>
                            <ul class="list-unstyled p-1">
                                <li class="dropdown-item py-2">
                                    <a href="{{ route('admin.adminProfile',['user'=>Auth::user()->id]) }}" class="text-body ms-0">
                                        <i class="me-2 icon-md" data-feather="user"></i>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li class="dropdown-item py-2">
                                    <a href="{{ route('admin.logout') }}" class="text-body ms-0">
                                        <i class="me-2 icon-md" data-feather="log-out"></i>
                                        <span>Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- partial -->
