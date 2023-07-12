@extends('website.includes.master')
@section('marketplace','active')

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
          Explore
          <span class="fw-semibold text-primary">Marketplace</span>
        </h2>
        <p class="text-white text-center mb-0">
          Find the very best ChatGPT Prompt Scripts for your Project today
        </p>
      </div>
    </section>
    <!-- Hero Marketplace -->

    <!-- Marketplace Area -->
    <section class="marketplace-area section pt-4">
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
                    <form id="priceFilterLeft">
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
                        @foreach ($categories as $category)
                          <div class="ps-marketplace--item d-flex align-items-center justify-content-between gap-3">
                            <div class="form-check">
                              <input class="form-check-input left_category" name="filter_category" type="checkbox" value="{{ $category->id }}" id="category{{ $category->id }}"
                              />
                              <label class="form-check-label text-white" for="category{{ $category->id }}">{{ $category->category_name ?? "" }}</label>
                            </div>
                            {{ $category->job_post_count }}
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
                Showing {{ $jobPosts->count() }} of {{ totalJobPosts() }} results
              </span>
              <div class="d-flex align-items-center gap-2 gap-lg-3 ms-auto">
                <select class="ps-select ps-select--unstyled filter-right">
                    <option value="default">Default</option>
                    <option value="low">Low to High</option>
                    <option value="high">High to Low</option>
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
            <div class="row g-3 mb-5 marketplace_append_data">
               @include('website.includes.marketplace_append')
            </div>
            
            <div class="d-flex justify-content-center">
                {!! $jobPosts->render() !!}
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
        $(document).ready(function() {
            
            $('.filter-right').on('change', function() {
                var type = $(this).val();

                $.ajax({
                url: "{{ route('marketplace') }}",
                method: "post",
                contentType: "application/json",
                data: JSON.stringify({
                    filterType: type,
                }),
                success: function(res) {
                    $(".marketplace_append_data").html("");
                    $(".marketplace_append_data").html(res);
                },
                error: function(res){
                    console.log((res));
                }
              });
            });

            $('#priceFilterLeft').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();
                console.log(formData)
                $.ajax({
                    type: 'POST',
                    url: "{{ route('marketplace') }}",
                    data: formData,
                    success: function(response) {
                        console.log(response);
                        $(".marketplace_append_data").html("");
                        $(".marketplace_append_data").html(response);
                    },
                    error: function(error) {
                            console.log('Form submission error:', error);
                    }
                });
            });

            //left category checkbox
            $('.left_category').change(function check(){
              $('.left_category').each(function(idx, el){
                  if($(el).is(':checked')){ 
                  
                      var selectedValue = $(el).val();
                      var type = $(this).attr('name');
                      $.ajax({
                        type: 'POST',
                        url: "{{ route('marketplace') }}",
                        data: {
                          selectedValue: selectedValue,
                          type:type
                        },
                        success: function(response) {
                            
                            $(".marketplace_append_data").prepend("");
                            $(".marketplace_append_data").prepend(response);
                        },
                        error: function(error) {
                                console.log(error);
                        }
                      });
                  }
              });

            });
            
        });
         
    </script>
@endpush