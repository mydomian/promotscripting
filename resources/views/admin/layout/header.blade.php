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
                <img src="{{ URL::asset('admin/assets/uploads/'.$system->adminlogo) }}" alt="Logo" style="width:80%; background-color:black" >
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
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#blogs" role="button" aria-expanded="false"
                       aria-controls="emails">
                        <i class="link-icon" data-feather="book-open"></i>
                        <span class="link-title">Category & Subcategory</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="blogs">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('categories.index') }}" class="nav-link">
                                    <i class="link-icon" data-feather="circle"></i>
                                    <span class="link-title">Categories</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('subcategories.index') }}" class="nav-link">
                                    <i class="link-icon" data-feather="square"></i>
                                    <span class="link-title">Sub Categories</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#blogs" role="button" aria-expanded="false"
                       aria-controls="emails">
                        <i class="link-icon" data-feather="book-open"></i>
                        <span class="link-title">Jobs & Gigs</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="blogs">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="" class="nav-link">Job Posts Lists</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">Gigs Lists</a>
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
                            {{-- <li class="nav-item">
                                <a href="{{ route('admin.blogsbanner') }}" class="nav-link">Banner</a>
                            </li> --}}
                            
                            <li class="nav-item">
                                <a href="" class="nav-link">Add Blogs</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">Blogs List</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#aboutus" role="button" aria-expanded="false"
                       aria-controls="emails">
                        <i class="link-icon" data-feather="book"></i>
                        <span class="link-title">About Us</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="aboutus">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="" class="nav-link">Banner</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">About Company</a>
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
                                <a href="" class="nav-link">Contact Messages</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#privacy" role="button" aria-expanded="false"
                       aria-controls="emails">
                        <i class="link-icon" data-feather="flag"></i>
                        <span class="link-title">Privacy Policy</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="privacy">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="" class="nav-link">Banner</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">Privacy&Policy
                                    Content</a>
                            </li>
                        </ul>
                    </div>
                </li>
              
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="link-icon" data-feather="settings"></i>
                        <span class="link-title">Setting</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:;" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" class="nav-link">
                        <i class="link-icon" data-feather="log-out"></i>
                        <span class="link-title">Logout</span>
                        <form id="logout-form" action="" method="POST"
                              class="d-none">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="settings-sidebar">
        <div class="sidebar-body">
            <h6 class="text-muted mb-2">Sidebar:</h6>
            <div class="mb-3 pb-3 border-bottom">
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight"
                           value="sidebar-light" checked>
                    <label class="form-check-label" for="sidebarLight">
                        Light
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark"
                           value="sidebar-dark">
                    <label class="form-check-label" for="sidebarDark">
                        Dark
                    </label>
                </div>
            </div>
            <div class="theme-wrapper">
                <h6 class="text-muted mb-2">Light Theme:</h6>
                <a class="theme-item active" href="../demo1/dashboard.html">
                    <img src="{{ URL::asset('admin/assets/images/screenshots/light.jpg')}}" alt="light theme">
                </a>
                <h6 class="text-muted mb-2">Dark Theme:</h6>
                <a class="theme-item" href="../demo2/dashboard.html">
                    <img src="{{ URL::asset('admin/assets/images/screenshots/dark.jpg')}}" alt="light theme">
                </a>
            </div>
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
                                     src="{{ url::asset('admin/assets/uploads/'.Auth::user()->profile_photo_path) }}"
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
                                             src="{{ url::asset('admin/assets/uploads/'.Auth::user()->profile_photo_path) }}"
                                             alt="">
                                    @else
                                        <img class="wd-80 ht-80 rounded-circle" src="https://via.placeholder.com/80x80"
                                             alt="">
                                    @endif
                                </div>
                                <div class="text-center">
                                    <p class="tx-16 fw-bolder">{{ Auth::user()->name }}</p>
                                    <p class="tx-12 text-muted">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            <ul class="list-unstyled p-1">
                                <li class="dropdown-item py-2">
                                    <a href="" class="text-body ms-0">
                                        <i class="me-2 icon-md" data-feather="user"></i>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li class="dropdown-item py-2">
                                    <a href="javascript:;" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" class="text-body ms-0">
                                        <i class="me-2 icon-md" data-feather="log-out"></i>
                                        <span>Log Out</span>
                                        <form id="logout-form" action="" method="POST"
                                              class="d-none">
                                            @csrf
                                        </form>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- partial -->
