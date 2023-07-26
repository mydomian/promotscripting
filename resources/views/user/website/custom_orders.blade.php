@extends('user.website.includes.master')

@section('title')
   Custom Orders
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
          Custom
          <span class="fw-semibold text-primary">Orders Page</span>
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
                <input type="search" class="form-control bg-body" placeholder="Search Your seller name........" userId="{{ Auth::id() }}" id="customOrderSearch" name="orders">
                

            </div>
            <hr class="mt-3">
        </div>
        <div class="row custom_order_append_data">
          @include('user.website.includes.custom_order_append')
        </div>
        <div class="d-flex justify-content-center mt-5">
            {!! $customOrders->render() !!}
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
           $("#customOrderSearch").on("keyup", function(e) {
       
                var value = $(this).val();
                var userId = $(this).attr('userId');
                $.ajax({
                url: "{{ route('user.customOrderLists','') }}"+"/"+userId,
                method: "post",
                contentType: "application/json",
                data: JSON.stringify({
                    filterType: "search",
                    value:value
                }),
                success: function(res) {
                    
                    $(".custom_order_append_data").html("");
                    $(".custom_order_append_data").html(res);
                },
                error: function(res){
                    console.log((res));
                }
              });
           });

        });
         
    </script>
@endpush