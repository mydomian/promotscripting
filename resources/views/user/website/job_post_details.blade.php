@extends('website.includes.master')
@section('title')
   Marketplace
@endsection
@section('content')
<main class="flex-shrink-0 bg-body">
    <!-- Hero Marketplace -->
    <section class="hero-marketplace page-header">
      <div class="bg-holder bg-black bg-opacity-25"></div>
      <!--// bg-holder  -->
      <div class="container">
        <h2 class="text-center text-capitalize text-white mb-4">
          Details
          <span class="fw-semibold text-primary">Job Post In Marketplace</span>
        </h2>
        <p class="text-white text-center mb-0">
          Show In Details Of The Job Post
        </p>
      </div>
    </section>
    <!-- Hero Marketplace -->

    <section class="profile-details page-header text-white">
        <div class="container">
        <div class="card profile-details--card">
            <div class="card-body">
            <div class="row g-4">
                <div class="col-lg-7 pe-lg-5">
                <div
                    class="d-flex flex-wrap align-items-sm-end justify-content-between gap-3 mb-3"
                >
                    <div class="d-flex flex-wrap align-items-end gap-3">
                    <div class="profile-avatar position-relative">
                        @if($jobPost->user->image)
                        <img
                            src="{{ asset('/storage/buyer_profile/'.$jobPost->user->image) }}"
                            alt="Avatar"
                            width="121"
                            height="121"
                        />
                        @else
                        <img
                            src="https://images.unsplash.com/photo-1607990281513-2c110a25bd8c?ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8cHJvZmlsZSUyMHBob3RvfGVufDB8fDB8fHww&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60"
                            alt="Avatar"
                            width="121"
                            height="121"
                            />
                        @endif
                        <span class="online-status"></span>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <small class="fw-semibold" style="color: #bbbbbb">
                            <h5>{{ $jobPost->user->name ?? "" }}</h5>
                        </small>
                    </div>
                   
                    </div>
                   
                </div>
                
                <ul class="social-media mb-3">
                    <li class="social-media--item">
                    <a href="{{ $jobPost->user->profile ? $jobPost->user->profile->twitter : "#" }}" target="_blank" class="social-media--link">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    </li>
                    <li class="social-media--item">
                    <a href="{{ $jobPost->user->profile ? $jobPost->user->profile->facebook : "#" }}" target="_blank" class="social-media--link">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    </li>
                    <li class="social-media--item">
                    <a
                        href="{{ $jobPost->user->profile ? $jobPost->user->profile->instagram : "#" }}" target="_blank"
                        class="social-media--link"
                    >
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    </li>
                    <li class="social-media--item">
                        <a
                            href="{{ $jobPost->user->profile ? $jobPost->user->profile->linkedin : "#" }}" target="_blank"
                            class="social-media--link"
                        >
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                        </li>
                </ul>
                <p class="text-body-tertiary">
                    {{ $jobPost->user->profile ? $jobPost->user->profile->bio : "" }}
                </p>
                </div>
                <div class="col-lg-5 fw-bold mt-5">
                    <p class="fw-bolder">
                        “ {{ $jobPost->user->profile ? $jobPost->user->profile->quotes : "" }}!“
                    </p>
                    <div class="fw-bolder d-flex flex-wrap gap-3">
                        --- Recommended by
                        <div class="profile-avatar--sm position-relative">
                            @if($jobPost->user->image)
                            <img
                                src="{{ asset('/storage/buyer_profile/'.$jobPost->user->image) }}"
                                alt="Avatar"
                                width="121"
                                height="121"
                            />
                            @else
                            <img
                                src="https://images.unsplash.com/photo-1607990281513-2c110a25bd8c?ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8cHJvZmlsZSUyMHBob3RvfGVufDB8fDB8fHww&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60"
                                alt="Avatar"
                                width="121"
                                height="121"
                                />
                            @endif
                        <span class="online-status"></span>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Marketplace Area -->
    <section class="marketplace-area section pt-4">
      <div class="container">
        

        <div class="row">
            <div class="col-md-12">
                <div class="card marketplace--card rounded-3">
                    <div class="card-body">
                        <!-- Carousel -->
                        <div id="demo" class="carousel slide" data-bs-ride="carousel">

                            <!-- Indicators/dots -->
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                                <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
                                <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
                                <button type="button" data-bs-target="#demo" data-bs-slide-to="5"></button>
                            </div>
                            <!-- The slideshow/carousel -->
                            <div class="carousel-inner">
                                @if ($jobPost->jobPostImages)
                                    @foreach ($images = $jobPost->jobPostImages as $image)
                                        <div class="carousel-item active">
                                            <img src="{{ asset('/storage/job_post_images/'.$image->image) }}" alt="New York" class="d-block w-100">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        
                            <!-- Left and right controls/icons -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>

                        <div class=" text-primary mt-5">
                            <h4>{{ $jobPost->title ?? "" }}</h4> 
                            <p><strong>Deadline: </strong> {{ $jobPost->deadline ?? "" }}</p> 
                            <p><strong>Budget: </strong> ${{ $jobPost->budget ?? "" }}</p> 
                            <p><strong>Description: </strong>{!! $jobPost->description !!}</p>
                                <p><strong>Category:</strong> {{ $jobPost->category ? $jobPost->category->category_name : '' }}</p>
                                <p><strong>Sub Category: </strong> {{ $jobPost->subCategory ? $jobPost->subCategory->sub_category_name : '' }} </p>
                                <p><strong>Tags: </strong> {{ $jobPost->tag ?? '' }} </p>
                                <p><strong>Job Status: </strong> {{ $jobPost->job_status ?? '' }} </p>
                                <p><strong>Payment Status: </strong> {{ $jobPost->payment_status ?? '' }} </p>
                                <p><strong>Created At: </strong> {{ $jobPost->created_at ?? '' }} </p>
                                
                        </div>
                      
                      
                        <table id="" class="table table-bordered" style="width:100%">
                            <thead class="bg-primary">
                                <tr>
                                    <th>Sl</th>
                                    <th>Biding By</th>
                                    <th>Deadline</th>
                                    <th>Budget</th>
                                </tr>
                            </thead>
                            <tbody class="text-white">
                                @forelse ($bids = $jobPost->bids as $bid)
                                <tr>
                                    <td>{{$loop->iteration}} </td>
                                    <td>{{ $bid->user ? $bid->user->name : "" }}</td>
                                    <td>{{$bid->biding_deadline}} </td>
                                    <td>{{ $bid->biding_budget }}</td>
                                </tr>
                                @empty
                                @endforelse
                                    
                            </tbody>
                        </table>
                        <a href="{{ url('/place-bid/'.$jobPost->id) }}" class="btn btn-primary" style="float:right;">Place A Bid</a>
                    </div>
                </div>
            </div>
        </div>


      </div>
    </section>
    <!-- Marketplace Area -->
  </main>
@endsection
@push('scripts')
 
@endpush