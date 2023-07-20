@extends('user.website.includes.master')

@section('title')
   Prompts
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
          Prompts
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
                <input type="search" class="form-control bg-body" placeholder="Search Your Prompts........" id="searchPrompts" name="prompt">
                
                <div class="d-flex align-items-center gap-2 gap-lg-3 ms-auto">
                  <select class="ps-select ps-select--unstyled promptStatus">
                      <option value="default">Status</option>
                      <option value="active">Active</option>
                      <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>
            <hr class="mt-3">
        </div>
        <div class="row prompts_append_data">
          @include('user.website.includes.prompts_append')
        </div>
        <div class="d-flex justify-content-center mt-5">
            {!! $prompts->render() !!}
        </div>
        </div>
      </div>
    </section>
  
  </main>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {

            //promptStatus
            $('.promptStatus').on('change', function() {
                var type = $(this).val();
                $.ajax({
                url: "{{ route('user.prompts') }}",
                method: "post",
                contentType: "application/json",
                data: JSON.stringify({
                    filterType: type,
                }),
                success: function(res) {
                    $(".prompts_append_data").html("");
                    $(".prompts_append_data").html(res);
                },
                error: function(res){
                    console.log((res));
                }
              });
            });

           //search
           $("#searchPrompts").on("keyup change", function(e) {
                var value = $(this).val();
                $.ajax({
                url: "{{ route('user.prompts') }}",
                method: "post",
                contentType: "application/json",
                data: JSON.stringify({
                    filterType: "search",
                    value:value
                }),
                success: function(res) {
                    $(".prompts_append_data").html("");
                    $(".prompts_append_data").html(res);
                },
                error: function(res){
                    console.log((res));
                }
              });
           });


        });
         
    </script>
@endpush