@extends('user.website.includes.master')

@section('title',"| Profile")
@section('profile','active')
@section('content')


<!-- Hero Marketplace -->
<section class="hero-marketplace page-header bg-body">
    <div class="bg-holder bg-opacity-25"></div>
    <!--// bg-holder  -->
    <div class="container d-flex justify-content-between">
          <ul class="nav nav-pills" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active badge rounded-pill text-secondary text-decoration-none p-2" id="pills-favourites-tab" data-bs-toggle="pill" data-bs-target="#pills-favourites" type="button" role="tab" aria-controls="pills-favourites" aria-selected="true">Favourites</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link badge rounded-pill text-secondary text-decoration-none p-2" id="pills-settings-tab" data-bs-toggle="pill" data-bs-target="#pills-settings" type="button" role="tab" aria-controls="pills-settings" aria-selected="false">Settings</a>
              </li>
          </ul>
    </div>
   
  </section>

<section class="hero-marketplace bg-body">
  <div class="container">
    <div class="col-12 text-white">
      <div class="tab-content" id="pills-tabContent">

        <div class="tab-pane fade show active" id="pills-favourites" role="tabpanel" aria-labelledby="pills-favourites-tab" tabindex="0">
            <div>
                <h5>Favourites</h5>
                <hr>
            </div>

            <div class="row">
              <div class="col-md-6 col-lg-4">
                <a href="" class="text-decoration-none">
                  <div class="card marketplace--card rounded-3">
                    <div class="card-body text-center" style="color:white">
                       <h6>New Job Posts</h6>
                       <p>100</p>
                    </div>
                  </div>
                </a>
                
              </div>
              <div class="col-md-6 col-lg-4">
                <a href="" class="text-decoration-none">
                  <div class="card marketplace--card rounded-3">
                    <div class="card-body text-center" style="color:white">
                      <h6>Processing Job Posts</h6>
                      <p>100</p>
                  </div>
                  </div>
                </a>
              </div>
              <div class="col-md-6 col-lg-4">
                <a href="" class="text-decoration-none">
                  <div class="card marketplace--card rounded-3">
                    <div class="card-body text-center" style="color:white">
                      <h6>Completed Job Posts</h6>
                      <p>100</p>
                  </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-6 col-lg-4">
                <div class="card marketplace--card rounded-3">
                  <div class="card marketplace--card rounded-3">
                    <div class="card-body text-center" style="color:white">
                       <h6>Total Bids</h6>
                       <p>100</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="card marketplace--card rounded-3">
                  <div class="card marketplace--card rounded-3">
                    <div class="card-body text-center" style="color:white">
                       <h6>Assigned Bids</h6>
                       <p>100</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="card marketplace--card rounded-3">
                  <div class="card-body text-center" style="color:white">
                    <h6>Unassigned Bids</h6>
                    <p>100</p>
                 </div>
                </div>
              </div>
            </div>
        </div>

        <div class="tab-pane fade" id="pills-settings" role="tabpanel" aria-labelledby="pills-settings-tab" tabindex="0">
            <div>
                <h5>Settings</h5>
                <hr>
            </div>
              <div class="row mt-3">
                <div class="col-md-6 col-lg-4">
                  <div class="card marketplace--card rounded-3">
                    <div class="card-body text-center" style="color:white">
                      <h6>Total Payment</h6>
                      <p>?</p>
                  </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <div class="card marketplace--card rounded-3">
                    <div class="card-body text-center" style="color:white">
                      <h6>Total Payment</h6>
                      <p>?</p>
                  </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <div class="card marketplace--card rounded-3">
                    <div class="card-body text-center" style="color:white">
                      <h6>Total Payment</h6>
                      <p>?</p>
                  </div>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-6 col-lg-4">
                  <div class="card marketplace--card rounded-3">
                    <div class="card-body text-center" style="color:white">
                      <h6>Total Blog</h6>
                      <p>100</p>
                  </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <div class="card marketplace--card rounded-3">
                    <div class="card-body text-center" style="color:white">
                      <h6>Total Category</h6>
                      <p>100</p>
                  </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <div class="card marketplace--card rounded-3">
                    <div class="card-body text-center" style="color:white">
                      <h6>Total Subcategory</h6>
                      <p>100</p>
                  </div>
                  </div>
                </div>
              </div>
        </div>
        
      </div>
    </div>

  </div>

  <!-- Hero Marketplace -->
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script>
   $(document).ready(function() {
    $(document).on("click", ".switchSellerDashboard", function () {
        var url = $(this).attr('switchUrl');
        Swal.fire({
          title: 'Are you sure?',
          text: "Do you want to switch Seller Dashboard!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, switch it!'
        }).then((result) => {
          if (result.isConfirmed) {
              window.location.href=url;
          }
        });
    });
  });
 </script>
@endpush