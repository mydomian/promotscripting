@extends('website.includes.master')

@section('title')
    Services
@endsection
@section('hire','active')

@section('content')

 <!-- >>>>>>>>>> Main Sections <<<<<<<<< -->
 <main class="flex-shrink-0">
    <!-- Hero Marketplace -->
    <section class="hero-marketplace page-header bg-body">
      <div class="bg-holder bg-black bg-opacity-25"></div>
      <!--// bg-holder  -->
      <div class="container">
        <h2 class="text-center text-capitalize text-white mb-4">
          Find
          <span class="fw-semibold text-primary">Seller</span>
        </h2>
        <p class="text-white text-center mb-0">
          Find the very best ChatGPT Prompt Scripts for your Project today
        </p>
      </div>
    </section>
    <!-- Hero Marketplace -->

    <!-- Marketplace Area -->
    <section class="marketplace-area section pt-4 bg-body">
      <div class="container">
        <div class="row">
          <div class="col-xl-3">
            <aside
              class="offcanvas offcanvas-start marketplace--sidebar"
              tabindex="-1"
              id="offcanvasMarketplaceSidebar"
              aria-labelledby="offcanvasMarketplaceSidebarLabel"
            >
              <div class="offcanvas-header">
                <button
                  type="button"
                  class="btn-close d-xl-none ms-auto"
                  data-bs-dismiss="offcanvas"
                  aria-label="Close"
                ></button>
              </div>
              <div class="offcanvas-body">
                <div class="marketplace--sidebar-block mb-4">
                  <header
                    class="d-flex gap-3 align-items-start justify-content-between py-3"
                    style="cursor: pointer"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseMarketplaceItem1"
                    aria-expanded="false"
                    aria-controls="collapseMarketplaceItem1"
                  >
                    <h5>Price range</h5>
                    <i class="fa-solid fa-chevron-up icon"></i>
                  </header>
                  <div class="collapse show" id="collapseMarketplaceItem1">
                    <form id="leftGigFilter">
                      <div class="row gy-3">
                        <div class="col-6">
                            <input
                            type="hidden"
                            name="price"
                            value="priceFilter"
                            />
                          <input
                            type="text"
                            name="price_start"
                            placeholder="0.00"
                            class="form-control form-outline-control"
                          />
                        </div>
                        <div class="col-6">
                          <input
                            type="text"
                            name="price_end"
                            placeholder="0.00"
                            class="form-control form-outline-control"
                          />
                        </div>
                        <div class="col-12 d-grid">
                          <button
                            class="btn ps-marketplace--item"
                            type="submit"
                          >
                            Filter
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <hr class="ps-hr" />
                <div class="marketplace--sidebar-block">
                  <header
                    class="d-flex gap-3 align-items-start justify-content-between py-3"
                    style="cursor: pointer"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseMarketplaceItem2"
                    aria-expanded="false"
                    aria-controls="collapseMarketplaceItem2"
                  >
                    <h5>Categories</h5>
                    <i class="fa-solid fa-chevron-up icon"></i>
                  </header>
                  <div class="collapse show" id="collapseMarketplaceItem2">
                    <form action="#" method="post">
                      <div class="d-flex flex-column gap-3">

                        @foreach ($categories  as $category)
                        <div class="ps-marketplace--item d-flex align-items-center justify-content-between gap-3">
                          <div class="form-check">
                            <input
                              class="form-check-input serviceCategory"
                              type="checkbox"
                              value="{{$category->id}}"
                              id="category"
                            />
                            <label
                              class="form-check-label text-white"
                              for="category1"
                            >
                              {{$category->category_name}}
                            </label>
                          </div>
                         {{categoryWiseServiceCount($category->id)}}
                        </div>
                        @endforeach
                        
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </aside>
          </div>
          <div class="col-xl-9">
            <div
              class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3"
            >
              <span class="text-body-tertiary">
                Showing {{ $services->count() }} of {{ totalGigs() }} results
              </span>
              <div class="d-flex align-items-center gap-2 gap-lg-3 ms-auto">
                <select class="ps-select ps-select--unstyled right filter-gig-price">
                  <option value="default">Default</option>
                  <option value="high">Low to High</option>
                  <option value="low">High to Low</option>
                </select>
                <button
                  class="btn btn-outline-primary px-2 py-1 d-xl-none"
                  style="--bs-border-radius: 0.375rem"
                  type="button"
                  data-bs-toggle="offcanvas"
                  data-bs-target="#offcanvasMarketplaceSidebar"
                  aria-controls="offcanvasMarketplaceSidebar"
                >
                  <i class="fa-solid fa-bars"></i>
                </button>
              </div>
            </div>
            <div class="row g-3 mb-5 service_append_data">

              @include('website.includes.service_append')
              
            </div>
            <div class="d-flex justify-content-center">
              {!! $services->render() !!}
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
<script>
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  </script>

    <script>
        $(document).ready(function() {
            
            $('.filter-gig-price').on('change', function() {
                var type = $(this).val();
                $.ajax({
                url: "{{ route('filter.gigs') }}",
                method: 'POST',
                contentType: "application/json",
                data: JSON.stringify({
                    filterType: type,
                }),
                success:function(res) {

                    $(".service_append_data").html("");
                    $(".service_append_data").html(res);
                },
                error: function(res){
                    console.log((res));
                }
            });
            });

            $('#leftGigFilter').submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();
               
                $.ajax({
                    type: 'POST',
                    url: "{{ route('filter.gigs') }}",
                    data: formData,
                    success: function(response) {
                        
                        $(".service_append_data").html("");
                        $(".service_append_data").html(response);
                    },
                    error: function(error) {
                            console.log('Form submission error:', error);
                    }
                });
                });

            $('.serviceCategory').on('click', function(){
              
              var category_id = $(this).val();
             $.ajax({
                type: 'POST',
                url: "{{ route('filter.category')}}",
                data:{
                  category_id: category_id
                },success:function(res){
                      
                        $('.serviceCategory').prop("checked", false)
                        $(".service_append_data").html("");
                        $(".service_append_data").html(res);
                }
             });
            })
            
        });
         
    </script>
@endpush
