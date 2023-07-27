@extends('user.website.includes.master')

@section('title')
   Favoutes
@endsection
@section('prompts','active')
@section('content')
<main class="flex-shrink-0 bg-body">
    <!-- Hero Marketplace -->
    <section class="hero-marketplace page-header">
      <div class="bg-holder bg-black bg-opacity-25"></div>
      <!--// bg-holder  -->
      <div class="container">
        <h2 class="text-center text-capitalize text-white mb-4">
          Favourites
          <span class="fw-semibold text-primary">Page</span>
        </h2>
        {{-- <p class="text-white text-center mb-0">
          Find Your ChatGPT And Midjourney Prompt Scripts for your Project
        </p> --}}
      </div>
    </section>
    <!-- Hero Marketplace -->
<section class="marketplace-area section pt-4">
      <div class="container">
        <div class="row text-white">
            <div class="col-sm-12 d-flex justify-content-center">
                <input type="search" class="form-control bg-body" placeholder="Search Favourites By Title........" id="searchFavourites" name="favourites">
            </div>
            <hr class="mt-3">
        </div>
        <div class="row favourite_append_data">
          @include('user.website.includes.favourite_append')
        </div>
        <div class="d-flex justify-content-center mt-5">
            {!! $favs->render() !!}
        </div>
        </div>
      </div>
  </section>
  
  </main>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {

           //search
           $("#searchFavourites").on("keyup change", function(e) {
                var value = $(this).val();
                $.ajax({
                url: "{{ route('user.favourites') }}",
                method: "post",
                contentType: "application/json",
                data: JSON.stringify({
                    filterType: "search",
                    value:value
                }),
                success: function(res) {
                    $(".favourite_append_data").html("");
                    $(".favourite_append_data").html(res);
                },
                error: function(res){
                    console.log((res));
                }
              });
           });

        });
         
    </script>
@endpush