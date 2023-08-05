{{-- @php
    $purchases = purchases();
    $sales = sales();
    $favourites = favourites();
    $prompts = prompts();
@endphp --}}
@extends('user.website.includes.master')

@section('title', '| Payouts')
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
                            id="pills-payouts-tab" data-bs-toggle="pill" data-bs-target="#pills-payouts" type="button"
                            role="tab" aria-controls="pills-payouts" aria-selected="false">Payouts</a>
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

                    <div class="tab-pane fade show active" id="pills-payouts" role="tabpanel"
                        aria-labelledby="pills-payouts-tab" tabindex="0">
                        <div>
                            <h5>Balance</h5>
                            <hr>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12  table-responsive mb-5">
                            <table class="table bg-transparent table-borderless">
                                <thead>
                                    <tr>
                                        <th class="text-primary">Total balance <i class="fa-solid fa-circle-exclamation tips" style="color: #9ac6b7;" ></i></th>
                                        <th class="text-primary">Available to payout <i class="fa-solid fa-circle-exclamation" style="color: #9ac6b7;"></i></th>
                                        <th class="text-primary">Available soon <i class="fa-solid fa-circle-exclamation" style="color: #9ac6b7;"></i></th>
                                        <th class="text-primary">Min. Payout Threshold <i class="fa-solid fa-circle-exclamation" style="color: #9ac6b7;"></i></th>
                                        <th class="text-primary">Payout Schedule <i class="fa-solid fa-circle-exclamation" style="color: #9ac6b7;"></i></th>
                                    </tr>
                                  </thead>
                                  <tbody class="text-white">
                                    <tr>
                                      <td class="fs-5">{{$userData["minimum_payout"]->symbol.number_format($userData["totalBalance"],2)}} <small style="font-size: 0.7rem">{{strtoupper($userData["currency"])}}</small></td>
                                      <td class="fs-5">{{$userData["minimum_payout"]->symbol.number_format($userData["availableAmount"],2)}} <small style="font-size: 0.7rem">{{strtoupper($userData["currency"])}}</small></td>
                                      <td class="fs-5">{{$userData["minimum_payout"]->symbol.number_format($userData["pendingAmount"],2)}} <small style="font-size: 0.7rem">{{strtoupper($userData["currency"])}}</small></td>
                                      <td class="fs-5">{{$userData["minimum_payout"]->symbol.number_format($userData["minimum_payout"]->minimum_payout,2)}}  <small style="font-size: 0.7rem">{{strtoupper($userData["currency"])}}</small></td>
                                      <td class="fs-5">{{ucfirst($userData["schedule"])}}</td>
                                    </tr>
                                  </tbody>
                            </table>
                        </div>
                        <div>
                            <h5 class="">Payouts</h5>
                            <hr>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12  table-responsive mb-3">
                            <table class="table bg-transparent table-borderless mb-0">
                                <thead>
                                    <tr>
                                      <th class="text-primary">Amount </th>
                                      <th class="text-primary">Status </th>
                                      <th class="text-primary">Initiated </th>
                                      <th class="text-primary">Est. Arrival </th>
                                    </tr>
                                  </thead>
                                  <tbody class="text-white">
                                    @foreach($userData['payoutList'] as $payout )
                                    <tr>
                                      <td class="fs-5">{{$userData["minimum_payout"]->symbol.number_format($payout->amount/100,2)}} <small style="font-size: 0.7rem">{{strtoupper($userData["currency"])}}</small></td>
                                      <td class="fs-5">{{$payout->status}}</td>
                                      <td class="fs-5">{{date('m-j-Y',$payout->created)}}</td>
                                      <td class="fs-5">{{date('m-j-Y',$payout->arrival_date)}}</td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                            </table>
                            @if (!count($userData["payoutList"]))
                                <p class="">No Payouts Yet!</p>
                             @endif
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
 <script>
    $(document).ready(function(){
        $('.tips').on('mouseover', function(){
            
        })
    })
 </script>
@endpush

