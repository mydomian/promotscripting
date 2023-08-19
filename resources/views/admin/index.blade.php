@extends('admin.layout.master')

@section('title')
    Dashboard
@endsection

@section('content')

    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
            </div>
        </div>

       {{-- <div class="row">
            <div class="col-12 col-xl-12 stretch-card">
                <div class="row flex-grow-1">

                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Total Job Post</h6>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-10 col-md-12 col-xl-10">
                                        <h3 class="mb-2">{{ $jobPosts }}</h3>
                                        <div class="d-flex align-items-baseline">
                                            <p class="text-success">
                                                <span>{{ $jobPosts }}</span>
                                                <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-2 col-md-12 col-xl-2">
                                        <h1><span data-feather="sliders"></span></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Total Gigs</h6>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-10 col-md-12 col-xl-10">
                                        <h3 class="mb-2">{{ $gigs }}</h3>
                                        <div class="d-flex align-items-baseline">
                                            <p class="text-success">
                                                <span>{{ $gigs }}</span>
                                                <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-2 col-md-12 col-xl-2">
                                        <h1><span data-feather="layers"></span></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Total Blogs</h6>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-10 col-md-12 col-xl-10">
                                        <h3 class="mb-2">{{ $totalblogs }}</h3>
                                        <div class="d-flex align-items-baseline">
                                            <p class="text-success">
                                                <span>{{ $totalblogs }}</span>
                                                <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-2 col-md-12 col-xl-2">
                                        <h1><span data-feather="book-open"></span></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Total Users</h6>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-10 col-md-12 col-xl-10">
                                        <h3 class="mb-2">{{ totalUsers() }}</h3>
                                        <div class="d-flex align-items-baseline">
                                            <p class="text-success">
                                                <span>{{ totalUsers() }}</span>
                                                <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-2 col-md-12 col-xl-2">
                                        <h1><span data-feather="book-open"></span></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Total Messages</h6>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-10 col-md-12 col-xl-10">
                                        <h3 class="mb-2">{{ $messages->count() }}</h3>
                                        <div class="d-flex align-items-baseline">
                                            <p class="text-success">
                                                <span>{{ $messages->count() }}</span>
                                                <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-2 col-md-12 col-xl-2">
                                        <h1><span data-feather="book-open"></span></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Total Categories</h6>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-10 col-md-12 col-xl-10">
                                        <h3 class="mb-2">{{ $categories }}</h3>
                                        <div class="d-flex align-items-baseline">
                                            <p class="text-success">
                                                <span>{{ $categories }}</span>
                                                <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-2 col-md-12 col-xl-2">
                                        <h1><span data-feather="book-open"></span></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>
@endsection


