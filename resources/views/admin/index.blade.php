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
        </div>

        <div class="row">
            <div class="col-12 col-xl-12 grid-margin stretch-card">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <h6 class="card-title">Contact Messages</h6>

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($messages as $m=>$message)
                                    <tr>
                                        <td>{{ $m+1 }}</td>
                                        <td>{{ $message->name }}</td>
                                        <td><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></td>
                                        <td><a href="tel:{{ $message->phone }}">{{ $message->phone }}</a></td>
                                        <td>{{ $message->subject }}</td>
                                        <td>{{ $message->message }}</td>
                                        <td>{{ Carbon\Carbon::parse($message->created_at)->format('d-m-Y') }}</td>
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>
@endsection
