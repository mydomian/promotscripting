@php
  $latestFirst = $blogs->first();
@endphp
@extends('user.website.includes.master')
@section('title')
   Blog
@endsection
@section('blog','active')
@section('content')
<main class="flex-shrink-0 pt-3 bg-body">
    <!-- Hero Blog -->
    <section class="custom-offers section text-white">
      <div class="container mt-5">
          <h5 class="mb-4 text-center">
              Your
              <span class="text-primary">Latest Blogs</span>
            </h5>
            <p class="mb-4 text-center">
              This guide is for you! In it, you'll learn everything you need to start a successful blog and boost your website's Rankings. From setting up your blog to developing an effective SEO strategy, this guide has everything you need to start building your personal brand today!
            </p>
      </div>
    </section>
    <!-- Hero Blog -->

    <!-- Latest Articles -->
    <section class="latest-articles section pt-0 overflow-hidden">
      <div
        class="bg-holder"
        style="background-color: rgba(var(--ps-primary), 1)"
      ></div>
      <!--// bg-holder  -->
      <div class="container">
        <h2 class="text-white display-4 mb-4 mb-lg-5 fw-bold">
          Latest Articles
        </h2>
        <div class="row gy-4 g-md-3 mb-5">
          <div class="col-12">
            <div class="card latest-post--card latest-post--card-featured">
              <div class="card-body" style="height: 100%; overflow:auto">
                <a href="#" class="latest-post--img">
                  <img
                    src=" @if(isset($latestFirst->image)) {{ asset('/storage/blog/'.$latestFirst->image) }} @else @endif"
                    alt="Post"
                    width="600"
                    height="700"
                    class="img-fluid object-fit-cover"
                  />
                </a>
                <div>
                  <h3 class="h2 fw-bold">
                    <a
                      href="#"
                      class="link-dark text-decoration-none line-clamp line-clamp-3"
                    >
                      {{ $latestFirst->title ?? "" }}
                    </a>
                  </h3>
                  <small class=""><strong>Writer:</strong> {{ $latestFirst->user->name ?? "" }}</small><br>
                  <small class=""><strong>Category:</strong> {{ $latestFirst->category->category_name ?? ""}}</small><br>
                  <small class=""><strong>Subcategory:</strong> {{ $latestFirst->subCategory->category_name ?? ""}}</small><br>
                  <small class="published-date">{{ date('d F Y', strtotime($latestFirst->created_at ?? "")) }}</small><br>
                  <div class="peraAppend overflow-hidden">
                    <p class="text-body-tertiary latestFirstDes">
                      {{ $latestFirst->description ?? "" }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          @foreach ($blogs as $blog)
            <div class="col-md-6 col-lg-4">
            <div class="card latest-post--card">
              <div class="card-body" style="height: 100%; overflow:auto">
                <a href="#" class="latest-post--img">
                  <img
                    src="@if(isset($blog->image)){{ asset('/storage/blog/'.$blog->image) }} @else @endif"
                    alt="Post"
                    width="600"
                    height="700"
                    class="img-fluid object-fit-cover"
                  />
                  <span class="related-tag">{{ $blog->subCategory ? $blog->subCategory->category_name : "" }}</span>
                </a>
                <div>
                  <h6 class="h6 fw-bold">
                    <a href="#" class="link-dark text-decoration-none line-clamp line-clamp-3">{{ $blog->title }}</a>
                  </h6>
                  <span class="published-date">Writer: {{ $blog->user->name ?? "" }}, {{ date('d F Y', strtotime($blog->created_at)) }}</span>
                  <div class="">
                    <p class="text-body-tertiary mb-4 mb-lg-5  blogDescriptionAppend-{{ $blog->id }}">
                      {{ Str::limit($blog->description,350) ?? "" }}
                    </p>
                  </div>
                  <a href="javascript:;" class="link-primary text-decoration-none blogSeeMore-{{ $blog->id }}" blogId="{{ $blog->id }}">See more</a>
                  <a href="javascript:;" class="link-danger text-decoration-none blogLessMore-{{ $blog->id }}" blogId="{{ $blog->id }}">Less more</a>
                </div>
              </div>
            </div>
          </div>
          @push('scripts')
            <script>
               $(document).ready(function(){
                   //blog
                    
                    $('.blogLessMore-{{ $blog->id }}').hide();
                    $( ".blogSeeMore-{{ $blog->id }}").click(function() {
                       //blog
                       var blog = $(this).attr('blogId');
                        $.ajax({
                          url: "{{ route('blogSeeMoreLoad','') }}"+"/"+blog,
                          method: "get",
                          success: function(res) {
                            $('.blogSeeMore-{{ $blog->id }}').hide();
                            $('.blogDescriptionAppend-{{ $blog->id }}').empty("");
                            $('.blogDescriptionAppend-{{ $blog->id }}').html(res.blog.description);
                            $('.blogLessMore-{{ $blog->id }}').show();
                          },
                          error: function(res){
                              console.log((res));
                          }
                        });
                    });

                    $( ".blogLessMore-{{ $blog->id }}").click(function() {
                        location.reload(true);
                    });
                    
               })
            </script>
          @endpush
          @endforeach
        </div>
        <div class="ps-pagination text-white">
         {{ $blogs->links() }}
        </div>
      </div>
    </section>
    <!-- Latest Articles -->

  </main>
@endsection
@push('scripts')
 
@endpush