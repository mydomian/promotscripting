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
              <div class="col-sm-10 col-md-8 col-lg-6">
                  <h4 class="mb-0">Account</h4>
                  <small class="text-secondary">Your unique username displayed across PromptScripting.</small>
                  <div class="col-md-4 col-sm-10 col-lg-4 d-flex mt-3 mb-5">
                    <h5 class="fw-bolder mt-3 d-block">@</h5>
                    <input type="text" name="username" class="form-control bg-transparent mx-2" value="{{auth()->user()->username}}">
                  </div>

                  <h4>Notification Settings</h4>
                  <div class="col-md-12 col-sm-12 col-lg-12 d-flex justify-content-end mb-2">
                    <div class="col-md-6 col-sm-6 cl-lg-6"></div>
                    <div class="col-md-3 col-sm-3 col-lg-3">Email</div>
                    <div class="col-md-3 col-sm-3 col-lg-3 mx-2">Notification</div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="d-flex justify-content-start mb-0">
                      <div class="col-md-6 col-sm-6 col-lg-6 d-flex flex-column">
                        <p class="fw-bolder mb-0">New Sales</p>
                        <small class="text-secondary">Whenever you make a sale</small>
                      </div>
                      <div class="col-md-3 col-sm-3 col-lg-3 d-flex justify-content-start"><input type="checkbox" name="sales_email" class="form-check-input" id="" checked></div>
                      <div class="col-md-3 col-sm-3 col-lg-3 mx-2 d-flex justify-content-start"><input type="checkbox" name="sales_notification" class="form-check-input" id="" checked></div>
                    </div>
                    <hr class="mt-1">
                  </div>
                  <div class="col-md-12 col-sm-12 col-lg-12 d-flex justify-content-end mb-2">
                    <div class="col-md-6 col-sm-6 cl-lg-6"></div>
                    <div class="col-md-3 col-sm-3 col-lg-3"><input type="checkbox" name="sales_email" class="form-check-input" id="" checked></div>
                    <div class="col-md-3 col-sm-3 col-lg-3"><input type="checkbox" name="sales_email" class="form-check-input" id="" checked></div>
                  </div>
                  
                  {{-- <div class="col-md-12 ">
                    <div class="d-flex justify-content-end mb-0">
                      <div class="col-md-6 col-sm-8 col-lg-6 d-flex flex-column me-auto">
                        <p class="fw-bolder mb-0">New Favourites</p>
                        <small class="text-secondary">Whenever someone favorites your prompts.</small>
                      </div>
                      <div class="col-md-3 col-sm-2 col-lg-3"><input type="checkbox" name="favourite_email" class="form-check-input" id="" checked></div>
                      <div class="col-md-3 col-sm-2 col-lg-3 mx-2"><input type="checkbox" name="favourite_notification" class="form-check-input" id="" checked></div>
                    </div>
                    <hr class="mt-1">
                  </div>
                  
                  <div class="col-md-12 ">
                    <div class="d-flex justify-content-end mb-0">
                      <div class="col-md-6 col-sm-8 col-lg-6 d-flex flex-column me-auto">
                        <p class="fw-bolder mb-0">New Followers</p>
                        <small class="text-secondary">Whenever someone follows you.</small>
                      </div>
                      <div class="col-md-3 col-sm-2 col-lg-3"><input type="checkbox" name="follower_email" class="form-check-input" id="" checked></div>
                      <div class="col-md-3 col-sm-2 col-lg-3 mx-2"><input type="checkbox" name="follower_notification" class="form-check-input" id="" checked></div>
                    </div>
                    <hr class="mt-1">
                  </div> --}}
                  <a href="{{route('user.logout')}}" class="btn btn-outline-secondary my-4 px-5"><span class="fw-bolder fs-5">Log Out</span></a>
              </div>
              <div class="col-md-12 col-sm-12 col-lg-12 border border-danger rounded mt-5 p-3 d-flex flex-column">
                <h5>Danger Zone</h5>
                <small class="">Delete Account</small>
                <small class="text-secondary"><i>Once you delete your account there is no going back, please be certain.</i></small>
                <a href="" class="btn btn-outline-secondary btn-box col-md-2 col-lg-2 col-sm-4 btn-sm mt-3 p-1">Delete Account</a>
              </div>

        </div>

        
      </div>
    </div>

  </div>

  <!-- Hero Marketplace -->
@endsection

@push('scripts')

@endpush