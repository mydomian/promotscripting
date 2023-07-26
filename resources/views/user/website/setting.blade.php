{{-- @php
    $purchases = purchases();
    $sales = sales();
    $favourites = favourites();
    $prompts = prompts();
@endphp --}}
@extends('user.website.includes.master')

@section('title', '| Profile')
@section('profile', 'active')
@section('content')


    <!-- Hero Marketplace -->
    <section class="hero-marketplace page-header bg-body">
        <div class="bg-holder bg-opacity-25"></div>
        <!--// bg-holder  -->
        <div class="container">
            <div class="d-flex justify-content-between">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active badge rounded-pill text-secondary text-decoration-none p-2"
                            id="pills-settings-tab" data-bs-toggle="pill" data-bs-target="#pills-settings" type="button"
                            role="tab" aria-controls="pills-settings" aria-selected="false">Settings</a>
                    </li>
                </ul>
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    @if (Auth::user()->is_onboarding_completed == 0)
                        <li class="nav-item" role="presentation">
                            <a href="{{ route('sell.country') }}"
                                class="nav-link  badge text-bg-light rounded-pill text-secondary text-decoration-none p-2">Connect
                                Bank Account</a>
                        </li>
                    @endif
                    <li class="nav-item" role="presentation">
                        <a href="{{ route('user.profile', ['user' => Auth::user()->id]) }}"
                            class="nav-link  badge text-bg-light rounded-pill text-secondary text-decoration-none mx-1 p-2">Public
                            Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="hero-marketplace bg-body">
        <div class="container" style="margin-bottom: 100px">
            <div class="col-12 text-white">
                <div class="tab-content" id="pills-tabContent">


                    <div class="tab-pane fade show active" id="pills-settings" role="tabpanel"
                        aria-labelledby="pills-settings-tab" tabindex="0">
                        <div>
                            <h5>Settings</h5>
                            <hr>
                        </div>
                        <h4>Notification Setting</h4>
                        <div class="col-sm-12 col-md-8 col-lg-8  table-responsive">
                            <table class="table bg-transparent text-white">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="3" class="w-75"></th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Notification</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" colspan="3" class="w-75">
                                            <div class="d-flex flex-column">
                                                <strong class="mb-0"><small>New Sales</small></strong>
                                                <small class="text-secondary">Whenever you make a sale.</small>
                                            </div>
                                        </th>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""  checked>
                                                <label class="form-check-label" for="flexCheckChecked"> </label>
                                              </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""  checked>
                                                <label class="form-check-label" for="flexCheckChecked"> </label>
                                              </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" colspan="3" class="w-75">
                                            <div class="d-flex flex-column">
                                                <strong class="mb-0"><small>New Jobs</small></strong>
                                                <small class="text-secondary">Whenever you get a new custom prompt job.</small>
                                            </div>
                                        </th>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""  checked>
                                                <label class="form-check-label" for="flexCheckChecked"> </label>
                                              </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""  checked>
                                                <label class="form-check-label" for="flexCheckChecked"> </label>
                                              </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" colspan="3" class="w-75">
                                            <div class="d-flex flex-column">
                                                <strong class="mb-0"><small>New Favourites</small></strong>
                                                <small class="text-secondary">Whenever someone favorites your prompts.</small>
                                            </div>
                                        </th>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""  checked>
                                                <label class="form-check-label" for="flexCheckChecked"> </label>
                                              </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""  checked>
                                                <label class="form-check-label" for="flexCheckChecked"> </label>
                                              </div>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12 border border-danger rounded mt-5 p-3 d-flex flex-column">
                            <h5>Danger Zone</h5>
                            <small class="">Delete Stripe Account</small>
                            <small class="text-secondary"><i>Delete and disconnect your Stripe connect account.</i></small>
                            <a 
                                class="btn btn-outline-secondary btn-box col-md-2 col-lg-2 col-sm-4 btn-sm mt-3 p-1 stripe-del">Delete Stripe
                                Account</a>
                            <small class="mt-3">Delete Account</small>
                            <small class="text-secondary"><i>Once you delete your account there is no going back, please be
                                    certain.</i></small>
                            <a 
                                class="btn btn-outline-secondary btn-box col-md-2 col-lg-2 col-sm-4 btn-sm mt-3 p-1 user_delete">Delete
                                Account</a>
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
    $(document).ready(function () {
        
        $( ".user_delete" ).click(function() {
            var url = "{{ route('account.delete') }}";
            Swal.fire({
            title: 'Are you sure?',
            text: 'Delete Account',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href=url
                }
            })

        });
        $( ".stripe-del" ).click(function() {
            var url = "{{ route('account.stripe.delete') }}";
            Swal.fire({
            title: 'Think Twice!',
            text: 'Sure to delete stripe account?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Damn Sure!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href=url
                }
            })

        });
    });
 </script>
@endpush

