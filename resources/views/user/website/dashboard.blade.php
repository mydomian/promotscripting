@php
    $purchases = purchases();
    $sales = sales();
    $favourites = favourites();
    $prompts = prompts();
@endphp
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
                            id="pills-dashboard-tab" data-bs-toggle="pill" data-bs-target="#pills-dashboard" type="button"
                            role="tab" aria-controls="pills-dashboard" aria-selected="true">Dashboard</a>
                    </li>
                    {{-- <li class="nav-item" role="presentation">
                        <a class="nav-link badge rounded-pill text-secondary text-decoration-none p-2"
                            id="pills-payouts-tab" data-bs-toggle="pill" data-bs-target="#pills-payouts" type="button"
                            role="tab" aria-controls="pills-payouts" aria-selected="false">Payouts</a>
                    </li> --}}
                    <li class="nav-item" role="presentation">
                        <a class="nav-link badge rounded-pill text-secondary text-decoration-none p-2"
                            id="pills-prompts-tab" data-bs-toggle="pill" data-bs-target="#pills-prompts" type="button"
                            role="tab" aria-controls="pills-prompts" aria-selected="false">Prompts</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link badge rounded-pill text-secondary text-decoration-none p-2" id="pills-sells-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-sells" type="button" role="tab"
                            aria-controls="pills-sells" aria-selected="false">Sales</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link badge rounded-pill text-secondary text-decoration-none p-2"
                            id="pills-purchase-tab" data-bs-toggle="pill" data-bs-target="#pills-purchase" type="button"
                            role="tab" aria-controls="pills-purchase" aria-selected="false">Purchase</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link badge rounded-pill text-secondary text-decoration-none p-2"
                            id="pills-favourites-tab" data-bs-toggle="pill" data-bs-target="#pills-favourites"
                            type="button" role="tab" aria-controls="pills-favourites"
                            aria-selected="false">Favourites</a>
                    </li>
                    {{-- <li class="nav-item" role="presentation">
                        <a class="nav-link badge rounded-pill text-secondary text-decoration-none p-2"
                            id="pills-settings-tab" data-bs-toggle="pill" data-bs-target="#pills-settings" type="button"
                            role="tab" aria-controls="pills-settings" aria-selected="false">Settings</a>
                    </li> --}}
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
                        <a href=""
                            class="nav-link  badge text-bg-light rounded-pill text-secondary text-decoration-none mx-1 p-2">Public
                            Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="hero-marketplace bg-body">
        <div class="container">
            <div class="col-12 text-white">
                <div class="tab-content" id="pills-tabContent">

                    <div class="tab-pane fade  show active" id="pills-dashboard" role="tabpanel" aria-labelledby="pills-dashboard-tab"
                        tabindex="0">
                        <div>
                            <h5>Overview</h5>
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
                    </div>


                    <div class="tab-pane fade" id="pills-payouts" role="tabpanel" aria-labelledby="pills-payouts-tab"
                        tabindex="0">
                        <div>
                            <h5>Payouts</h5>
                            <hr>
                        </div>
                        <div class="col-sm-10 col-md-8 col-lg-6">
                            <h4 class="mb-0">Account</h4>
                            <small class="text-secondary">Your unique username displayed across PromptScripting.</small>
                            <div class="col-md-4 col-sm-10 col-lg-4 d-flex mt-3 mb-5">
                                <h5 class="fw-bolder mt-3 d-block">@</h5>
                                <input type="text" name="username" class="form-control bg-transparent mx-2"
                                    value="{{ auth()->user()->username }}">
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
                                    <div class="col-md-3 col-sm-3 col-lg-3 d-flex justify-content-start"><input
                                            type="checkbox" name="sales_email" class="form-check-input" id=""
                                            checked></div>
                                    <div class="col-md-3 col-sm-3 col-lg-3 mx-2 d-flex justify-content-start"><input
                                            type="checkbox" name="sales_notification" class="form-check-input"
                                            id="" checked></div>
                                </div>
                                <hr class="mt-1">
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12 d-flex justify-content-end mb-2">
                                <div class="col-md-6 col-sm-6 cl-lg-6"></div>
                                <div class="col-md-3 col-sm-3 col-lg-3"><input type="checkbox" name="sales_email"
                                        class="form-check-input" id="" checked></div>
                                <div class="col-md-3 col-sm-3 col-lg-3"><input type="checkbox" name="sales_email"
                                        class="form-check-input" id="" checked></div>
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
                            <a href="{{ route('user.logout') }}" class="btn btn-outline-secondary my-4 px-5"><span
                                    class="fw-bolder fs-5">Log Out</span></a>
                        </div>
                        <div
                            class="col-md-12 col-sm-12 col-lg-12 border border-danger rounded mt-5 p-3 d-flex flex-column">
                            <h5>Danger Zone</h5>
                            <small class="">Delete Account</small>
                            <small class="text-secondary"><i>Once you delete your account there is no going back, please be
                                    certain.</i></small>
                            <a href=""
                                class="btn btn-outline-secondary btn-box col-md-2 col-lg-2 col-sm-4 btn-sm mt-3 p-1">Delete
                                Account</a>
                        </div>

                    </div>


                    <div class="tab-pane fade" id="pills-prompts" role="tabpanel" aria-labelledby="pills-prompts-tab"
                        tabindex="0">
                        <div>
                            <h5>Prompts</h5>
                            <hr>
                        </div>
                        <div class="row g-3 mb-5">

                            @forelse ($prompts as $prompt)
                                <div class="col-md-4 col-lg-3">
                                    <div class="card marketplace--card rounded-3">

                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="position-relative z-0">
                                                    <img src="@if (isset($prompt->user->profile_photo_path)) {{ asset('/storage/profile/' . $prompt->user->profile_photo_path) }} @else data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAHcAlQMBIgACEQEDEQH/xAAbAAEBAAMBAQEAAAAAAAAAAAAABwQFBgEDAv/EADkQAAEEAQICBgYJBAMAAAAAAAABAgMEBQYRBzESEyEiUWFBcYGRodEXIzJSU5KUscEUcoKjFSQl/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/ALiAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAXsAA5LUPEfSunpXQXsmx9hi7Ohrosrmr4Lty9pooON+j5JOi91+Fv33190+CqoFKBq8HqHE5+v1+HvwW40+11b03Z5OTmntNmi7gegAAAAAAAAAAAAAAAAADxV25kr1vqDMan1K7RGj5lgVif+lfTdEhb6Woqezl2qq7eJSM1dTG4i7fdyrV3y/laq/wT/gNjOq0rNmbHfu5Wy+WWVyd5URVRPj0l9oG90pw405puFvU0Y7Vvbv2rTUe9y+Kb9jfUh0tnHUbMSw2KVeWNU2Vj4mqn7GWAJXqzho7GSO1Dw/e/HZSv31qxu+rnRObUTki+XJfLmdTw71fDq/B/1Ks6m7A7qrcGyp0Hp4b+hfmnoOqXkSfGwt03x2tVK/cqZyn16xtTZOsTvKvva9f8gKyAAAAAAAAAAAAAAAAAANbqOk7JYDJUWfas1ZIk9atVDi+A+RZc0HDV32mozyQyNVNlTt6SfB3wKKqbke1DDe4Y6ym1Jj6759OZN3/fhjTtheqr2p4dq7ovmqeAFiBrMBnsXqCiy5iLsVmJybr0V7zfJyc0XyU2YBSUukTM8f4kg7zMPj1SVyckcqL2f7ET2KbvX3ESjp2J1HFubfzs3cgqQ99WuXkrtv25qe8LNI2NPY2e/l1WTNZN/XW3Ku6s7d0Zv7VVfNfIDugAAAAAAAAAAAAAAAADHv3K+PpzW7kjYq8DFfJI5exrUTtUDIMO5Pj1bJXuzVei9NnxTPbs5PBUUk8V3VXFS5N/xVuTB6XierEnYipLZ25+fu2RN/Spt6vA/SccW1h+RsyL2rI+dEVfciAY+W4ZaYkuOuaez0mDsO3Vf6S0nQ38k3RU9SLsYq6ByNlOqyHE61LX9LGTbKqeffNx9Cejfwbv6lfkPoT0b+Dd/Ur8gM/SOkNH6Vf19KWvNdVO9bs2Gvk9nob7EQ7SGaKZvSglZI3xY5FT4E8+hPRv4N39SvyMG7waq0XLb0hm8hi77U7quk6TF8l2RF/f1AVUE30HrfJLmZNJ6zhbBnIk+pmTsbaaib7pt2b7JvunPt5KmxSAAAAAAAAAAAAAAATLjrbndhcVg6z1Y7L3mQuVPuoqdnvVpTTX5TCYzLT05sjTjsSUpetrufv9W/xT3J7gP3h8bXxGMrY6nGjK9eJI2Ingnp9a8zNAAAAAeKnkegCX8dMf1GGoamqfV38Tajc2ROasV3L823xKPjbSXsdVttTZJ4WSIn9yIv8AJ88viqOax8lDKVmWKsu3Tjfvsuy7py80MmvDHWgjggYjIo2oxjE5NRE2RAPoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA//Z @endif"
                                                        alt="Avatar" width="32" height="32"
                                                        class="rounded-pill object-fit-cover" />
                                                    <svg class="ps-icon position-absolute top-100 start-100 translate-middle"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24"
                                                        style="
                                                  fill: rgba(
                                                  var(--ps-primary),
                                                  var(--ps-text-opacity)
                                                  );
                                                  margin-top: -0.375rem;
                                              ">
                                                        <path
                                                            d="M19.965 8.521C19.988 8.347 20 8.173 20 8c0-2.379-2.143-4.288-4.521-3.965C14.786 2.802 13.466 2 12 2s-2.786.802-3.479 2.035C6.138 3.712 4 5.621 4 8c0 .173.012.347.035.521C2.802 9.215 2 10.535 2 12s.802 2.785 2.035 3.479A3.976 3.976 0 0 0 4 16c0 2.379 2.138 4.283 4.521 3.965C9.214 21.198 10.534 22 12 22s2.786-.802 3.479-2.035C17.857 20.283 20 18.379 20 16c0-.173-.012-.347-.035-.521C21.198 14.785 22 13.465 22 12s-.802-2.785-2.035-3.479zm-9.01 7.895-3.667-3.714 1.424-1.404 2.257 2.286 4.327-4.294 1.408 1.42-5.749 5.706z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <a href="javascript:;" class="text-white text-decoration-none fw-semibold"
                                                    style="padding-left: 10px;"> <small>
                                                        {{ $prompt->user ? $prompt->user->name : '' }}</small></a>
                                            </div>
                                            <a href="{{ route('marketplaceDetails', ['slug' => Str::slug($prompt->title, '-'), 'product' => $prompt->id]) }}"
                                                class="d-block rounded-3 mb-3 ratio ratio-4x3"
                                                style="background-color: #c4c4c4">
                                                @php
                                                    $slug = Str::slug($prompt->title, '-');
                                                @endphp
                                                <img src="@if ($prompt->image) {{ asset('/storage/products/thumbnil/' . $prompt->image) }} @else https://picsum.photos/200/300 @endif"
                                                    alt="{{ $slug }}"
                                                    class="img-fluid w-100 rounded-3 object-fit-cover" />
                                                <span class="bg-dark mx-2 mt-2 text-white text-center opacity-50"
                                                    style="height: 25px;">{{ $prompt->subSubCategory->subCategory->category ? $prompt->subSubCategory->subCategory->category->category_name : $prompt->subSubCategory->category_name }}</span>
                                            </a>
                                            <div class="d-flex justify-content-between gap-3">
                                                <a href="{{ route('marketplaceDetails',['slug'=>Str::slug($prompt->title,'-'),'product'=>$prompt->id]) }}" class="link-light text-decoration-none">{{ Str::limit($prompt->title,15) ?? "" }}</a>
                                                <div class="dropdown">
                                                    <button
                                                      class="btn dropdown-toggle"
                                                      type="button"
                                                      data-bs-toggle="dropdown"
                                                      aria-expanded="false"
                                                    >
                                                      <i class="fa-solid fa-ellipsis"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-dark">
                                                      <li>
                                                        <a class="dropdown-item" href="{{ route('user.promptsEdit',['product'=>$prompt->id]) }}">Prompts Edit</a>
                                                      </li>
                                                      <li>
                                                        <a class="dropdown-item onPromptDeleted" getUrl="{{ route('user.promptDelete',['product'=>$prompt->id]) }}" href="jacascript:;"
                                                          >Prompts Delete</a
                                                        >
                                                      </li>
                                                    </ul>
                                                  </div>
                                            </div>
                                            <small class="text-body-tertiary">$ {{ $prompt->price }}</small>
                                        </div>

                                    </div>
                                </div>
                            @empty
                                <p class="text-white">Nothing to show!</p>
                            @endforelse
                        </div>



                    </div>


                    <div class="tab-pane fade" id="pills-sells" role="tabpanel" aria-labelledby="pills-sells-tab"
                        tabindex="0">

                        <div class="row g-3 mb-5">

                            <table class="table text-white">
                                <thead>
                                    <tr>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Prompt</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($sales as $sale)
                                        <tr>
                                            <td>{{ $sale->price }}</td>
                                            <td>{{ $sale->order->is_paid ?? 'unknown' }}</td>
                                            <td>{{ $sale->product->title }}</td>
                                            <td>{{ $sale->user->name }}</td>
                                            <td>{{ $sale->created_at->format("D, M 'y") }}</td>
                                        </tr>
                                    @empty
                                        <p class="text-white">No sales yet!</p>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>



                    </div>


                    <div class="tab-pane fade" id="pills-purchase" role="tabpanel" aria-labelledby="pills-purchase-tab"
                        tabindex="0">
                        <div>
                            <h5>Purchases</h5>
                            <hr>
                        </div>
                        <div class="row g-3 mb-5">

                            @forelse ($purchases as $purchase)
                                <div class="col-md-4 col-lg-3">
                                    <div class="card marketplace--card rounded-3">

                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="position-relative z-0">
                                                    <img src="@if (isset($purchase->product->user->profile_photo_path)) {{ asset('/storage/profile/' . $purchase->product->user->profile_photo_path) }} @else data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAHcAlQMBIgACEQEDEQH/xAAbAAEBAAMBAQEAAAAAAAAAAAAABwQFBgEDAv/EADkQAAEEAQICBgYJBAMAAAAAAAABAgMEBQYRBzESEyEiUWFBcYGRodEXIzJSU5KUscEUcoKjFSQl/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/ALiAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAXsAA5LUPEfSunpXQXsmx9hi7Ohrosrmr4Lty9pooON+j5JOi91+Fv33190+CqoFKBq8HqHE5+v1+HvwW40+11b03Z5OTmntNmi7gegAAAAAAAAAAAAAAAAADxV25kr1vqDMan1K7RGj5lgVif+lfTdEhb6Woqezl2qq7eJSM1dTG4i7fdyrV3y/laq/wT/gNjOq0rNmbHfu5Wy+WWVyd5URVRPj0l9oG90pw405puFvU0Y7Vvbv2rTUe9y+Kb9jfUh0tnHUbMSw2KVeWNU2Vj4mqn7GWAJXqzho7GSO1Dw/e/HZSv31qxu+rnRObUTki+XJfLmdTw71fDq/B/1Ks6m7A7qrcGyp0Hp4b+hfmnoOqXkSfGwt03x2tVK/cqZyn16xtTZOsTvKvva9f8gKyAAAAAAAAAAAAAAAAAANbqOk7JYDJUWfas1ZIk9atVDi+A+RZc0HDV32mozyQyNVNlTt6SfB3wKKqbke1DDe4Y6ym1Jj6759OZN3/fhjTtheqr2p4dq7ovmqeAFiBrMBnsXqCiy5iLsVmJybr0V7zfJyc0XyU2YBSUukTM8f4kg7zMPj1SVyckcqL2f7ET2KbvX3ESjp2J1HFubfzs3cgqQ99WuXkrtv25qe8LNI2NPY2e/l1WTNZN/XW3Ku6s7d0Zv7VVfNfIDugAAAAAAAAAAAAAAAADHv3K+PpzW7kjYq8DFfJI5exrUTtUDIMO5Pj1bJXuzVei9NnxTPbs5PBUUk8V3VXFS5N/xVuTB6XierEnYipLZ25+fu2RN/Spt6vA/SccW1h+RsyL2rI+dEVfciAY+W4ZaYkuOuaez0mDsO3Vf6S0nQ38k3RU9SLsYq6ByNlOqyHE61LX9LGTbKqeffNx9Cejfwbv6lfkPoT0b+Dd/Ur8gM/SOkNH6Vf19KWvNdVO9bs2Gvk9nob7EQ7SGaKZvSglZI3xY5FT4E8+hPRv4N39SvyMG7waq0XLb0hm8hi77U7quk6TF8l2RF/f1AVUE30HrfJLmZNJ6zhbBnIk+pmTsbaaib7pt2b7JvunPt5KmxSAAAAAAAAAAAAAAATLjrbndhcVg6z1Y7L3mQuVPuoqdnvVpTTX5TCYzLT05sjTjsSUpetrufv9W/xT3J7gP3h8bXxGMrY6nGjK9eJI2Ingnp9a8zNAAAAAeKnkegCX8dMf1GGoamqfV38Tajc2ROasV3L823xKPjbSXsdVttTZJ4WSIn9yIv8AJ88viqOax8lDKVmWKsu3Tjfvsuy7py80MmvDHWgjggYjIo2oxjE5NRE2RAPoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA//Z @endif"
                                                        alt="Avatar" width="32" height="32"
                                                        class="rounded-pill object-fit-cover" />
                                                    <svg class="ps-icon position-absolute top-100 start-100 translate-middle"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24"
                                                        style="
                                                      fill: rgba(
                                                      var(--ps-primary),
                                                      var(--ps-text-opacity)
                                                      );
                                                      margin-top: -0.375rem;
                                                  ">
                                                        <path
                                                            d="M19.965 8.521C19.988 8.347 20 8.173 20 8c0-2.379-2.143-4.288-4.521-3.965C14.786 2.802 13.466 2 12 2s-2.786.802-3.479 2.035C6.138 3.712 4 5.621 4 8c0 .173.012.347.035.521C2.802 9.215 2 10.535 2 12s.802 2.785 2.035 3.479A3.976 3.976 0 0 0 4 16c0 2.379 2.138 4.283 4.521 3.965C9.214 21.198 10.534 22 12 22s2.786-.802 3.479-2.035C17.857 20.283 20 18.379 20 16c0-.173-.012-.347-.035-.521C21.198 14.785 22 13.465 22 12s-.802-2.785-2.035-3.479zm-9.01 7.895-3.667-3.714 1.424-1.404 2.257 2.286 4.327-4.294 1.408 1.42-5.749 5.706z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <a href="javascript:;" class="text-white text-decoration-none fw-semibold"
                                                    style="padding-left: 10px;"> <small>
                                                        {{ $purchase->product->user ? $purchase->product->user->name : '' }}</small></a>
                                            </div>
                                            <a href="{{ route('marketplaceDetails', ['slug' => Str::slug($purchase->product->title, '-'), 'product' => $purchase->product->id]) }}"
                                                class="d-block rounded-3 mb-3 ratio ratio-4x3"
                                                style="background-color: #c4c4c4">
                                                @php
                                                    $slug = Str::slug($purchase->product->title, '-');
                                                @endphp
                                                <img src="@if ($purchase->product->image) {{ asset('/storage/products/thumbnil/' . $purchase->product->image) }} @else https://picsum.photos/200/300 @endif"
                                                    alt="{{ $slug }}"
                                                    class="img-fluid w-100 rounded-3 object-fit-cover" />
                                                <span class="bg-dark mx-2 mt-2 text-white text-center opacity-50"
                                                    style="height: 25px;">{{ $purchase->product->subSubCategory->subCategory->category ? $purchase->product->subSubCategory->subCategory->category->category_name : $purchase->product->subSubCategory->category_name }}</span>
                                            </a>
                                            <div class="d-flex justify-content-between gap-3">
                                                <a href="{{ route('marketplaceDetails', ['slug' => Str::slug($purchase->product->title, '-'), 'product' => $purchase->product->id]) }}"
                                                    class="link-light text-decoration-none">{{ Str::limit($purchase->product->title, 22) ?? '' }}</a>
                                                <small class="text-body-tertiary">$
                                                    {{ $purchase->product->price }}</small>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @empty
                                <p class="text-white">Nothing to show!</p>
                            @endforelse
                        </div>



                    </div>


                    <div class="tab-pane fade " id="pills-favourites" role="tabpanel"
                        aria-labelledby="pills-favourites-tab" tabindex="0">
                        <div>
                            <h5>Favourites</h5>
                            <hr>
                        </div>

                        <div class="row g-3 mb-5">

                            @forelse ($favourites as $favourite)
                                <div class="col-md-4 col-lg-3">
                                    <div class="card marketplace--card rounded-3">

                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="position-relative z-0">
                                                    <img src="@if (isset($favourite->product->user->profile_photo_path)) {{ asset('/storage/profile/' . $favourite->product->user->profile_photo_path) }} @else data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAHcAlQMBIgACEQEDEQH/xAAbAAEBAAMBAQEAAAAAAAAAAAAABwQFBgEDAv/EADkQAAEEAQICBgYJBAMAAAAAAAABAgMEBQYRBzESEyEiUWFBcYGRodEXIzJSU5KUscEUcoKjFSQl/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/ALiAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAXsAA5LUPEfSunpXQXsmx9hi7Ohrosrmr4Lty9pooON+j5JOi91+Fv33190+CqoFKBq8HqHE5+v1+HvwW40+11b03Z5OTmntNmi7gegAAAAAAAAAAAAAAAAADxV25kr1vqDMan1K7RGj5lgVif+lfTdEhb6Woqezl2qq7eJSM1dTG4i7fdyrV3y/laq/wT/gNjOq0rNmbHfu5Wy+WWVyd5URVRPj0l9oG90pw405puFvU0Y7Vvbv2rTUe9y+Kb9jfUh0tnHUbMSw2KVeWNU2Vj4mqn7GWAJXqzho7GSO1Dw/e/HZSv31qxu+rnRObUTki+XJfLmdTw71fDq/B/1Ks6m7A7qrcGyp0Hp4b+hfmnoOqXkSfGwt03x2tVK/cqZyn16xtTZOsTvKvva9f8gKyAAAAAAAAAAAAAAAAAANbqOk7JYDJUWfas1ZIk9atVDi+A+RZc0HDV32mozyQyNVNlTt6SfB3wKKqbke1DDe4Y6ym1Jj6759OZN3/fhjTtheqr2p4dq7ovmqeAFiBrMBnsXqCiy5iLsVmJybr0V7zfJyc0XyU2YBSUukTM8f4kg7zMPj1SVyckcqL2f7ET2KbvX3ESjp2J1HFubfzs3cgqQ99WuXkrtv25qe8LNI2NPY2e/l1WTNZN/XW3Ku6s7d0Zv7VVfNfIDugAAAAAAAAAAAAAAAADHv3K+PpzW7kjYq8DFfJI5exrUTtUDIMO5Pj1bJXuzVei9NnxTPbs5PBUUk8V3VXFS5N/xVuTB6XierEnYipLZ25+fu2RN/Spt6vA/SccW1h+RsyL2rI+dEVfciAY+W4ZaYkuOuaez0mDsO3Vf6S0nQ38k3RU9SLsYq6ByNlOqyHE61LX9LGTbKqeffNx9Cejfwbv6lfkPoT0b+Dd/Ur8gM/SOkNH6Vf19KWvNdVO9bs2Gvk9nob7EQ7SGaKZvSglZI3xY5FT4E8+hPRv4N39SvyMG7waq0XLb0hm8hi77U7quk6TF8l2RF/f1AVUE30HrfJLmZNJ6zhbBnIk+pmTsbaaib7pt2b7JvunPt5KmxSAAAAAAAAAAAAAAATLjrbndhcVg6z1Y7L3mQuVPuoqdnvVpTTX5TCYzLT05sjTjsSUpetrufv9W/xT3J7gP3h8bXxGMrY6nGjK9eJI2Ingnp9a8zNAAAAAeKnkegCX8dMf1GGoamqfV38Tajc2ROasV3L823xKPjbSXsdVttTZJ4WSIn9yIv8AJ88viqOax8lDKVmWKsu3Tjfvsuy7py80MmvDHWgjggYjIo2oxjE5NRE2RAPoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA//Z @endif"
                                                        alt="Avatar" width="32" height="32"
                                                        class="rounded-pill object-fit-cover" />
                                                    <svg class="ps-icon position-absolute top-100 start-100 translate-middle"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24"
                                                        style="
                                                      fill: rgba(
                                                      var(--ps-primary),
                                                      var(--ps-text-opacity)
                                                      );
                                                      margin-top: -0.375rem;
                                                  ">
                                                        <path
                                                            d="M19.965 8.521C19.988 8.347 20 8.173 20 8c0-2.379-2.143-4.288-4.521-3.965C14.786 2.802 13.466 2 12 2s-2.786.802-3.479 2.035C6.138 3.712 4 5.621 4 8c0 .173.012.347.035.521C2.802 9.215 2 10.535 2 12s.802 2.785 2.035 3.479A3.976 3.976 0 0 0 4 16c0 2.379 2.138 4.283 4.521 3.965C9.214 21.198 10.534 22 12 22s2.786-.802 3.479-2.035C17.857 20.283 20 18.379 20 16c0-.173-.012-.347-.035-.521C21.198 14.785 22 13.465 22 12s-.802-2.785-2.035-3.479zm-9.01 7.895-3.667-3.714 1.424-1.404 2.257 2.286 4.327-4.294 1.408 1.42-5.749 5.706z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <a href="javascript:;" class="text-white text-decoration-none fw-semibold"
                                                    style="padding-left: 10px;"> <small>
                                                        {{ $favourite->product->user ? $favourite->product->user->name : '' }}</small></a>
                                            </div>
                                            <a href="{{ route('marketplaceDetails', ['slug' => Str::slug($favourite->product->title, '-'), 'product' => $favourite->product->id]) }}"
                                                class="d-block rounded-3 mb-3 ratio ratio-4x3"
                                                style="background-color: #c4c4c4">
                                                @php
                                                    $slug = Str::slug($favourite->product->title, '-');
                                                @endphp
                                                <img src="@if ($favourite->product->image) {{ asset('/storage/products/thumbnil/' . $favourite->product->image) }} @else https://picsum.photos/200/300 @endif"
                                                    alt="{{ $slug }}"
                                                    class="img-fluid w-100 rounded-3 object-fit-cover" />
                                                <span class="bg-dark mx-2 mt-2 text-white text-center opacity-50"
                                                    style="height: 25px;">{{ $favourite->product->subSubCategory->subCategory->category ? $favourite->product->subSubCategory->subCategory->category->category_name : $favourite->product->subSubCategory->category_name }}</span>
                                            </a>
                                            <div class="d-flex justify-content-between gap-3">
                                                <a href="{{ route('marketplaceDetails', ['slug' => Str::slug($favourite->product->title, '-'), 'product' => $favourite->product->id]) }}"
                                                    class="link-light text-decoration-none">{{ Str::limit($favourite->product->title, 22) ?? '' }}</a>
                                                <small class="text-body-tertiary">$
                                                    {{ $favourite->product->price }}</small>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @empty
                                <p class="text-white">Nothing to show!</p>
                            @endforelse
                        </div>
                    </div>


                    <div class="tab-pane fade" id="pills-settings" role="tabpanel" aria-labelledby="pills-settings-tab"
                        tabindex="0">
                        <div>
                            <h5>Settings</h5>
                            <hr>
                        </div>
                        <div class="col-sm-10 col-md-8 col-lg-6">
                            <h4 class="mb-0">Account</h4>
                            <small class="text-secondary">Your unique username displayed across PromptScripting.</small>
                            <div class="col-md-4 col-sm-10 col-lg-4 d-flex mt-3 mb-5">
                                <h5 class="fw-bolder mt-3 d-block">@</h5>
                                <input type="text" name="username" class="form-control bg-transparent mx-2"
                                    value="{{ auth()->user()->username }}">
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
                                    <div class="col-md-3 col-sm-3 col-lg-3 d-flex justify-content-start"><input
                                            type="checkbox" name="sales_email" class="form-check-input" id=""
                                            checked></div>
                                    <div class="col-md-3 col-sm-3 col-lg-3 mx-2 d-flex justify-content-start"><input
                                            type="checkbox" name="sales_notification" class="form-check-input"
                                            id="" checked></div>
                                </div>
                                <hr class="mt-1">
                            </div>
                            {{-- <div class="col-md-12 col-sm-12 col-lg-12 d-flex justify-content-end mb-2">
                                <div class="col-md-6 col-sm-6 cl-lg-6"></div>
                                <div class="col-md-3 col-sm-3 col-lg-3"><input type="checkbox" name="sales_email"
                                        class="form-check-input" id="" checked></div>
                                <div class="col-md-3 col-sm-3 col-lg-3"><input type="checkbox" name="sales_email"
                                        class="form-check-input" id="" checked></div>
                            </div> --}}

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
                            <a href="{{ route('user.logout') }}" class="btn btn-outline-secondary my-4 px-5"><span
                                    class="fw-bolder fs-5">Log Out</span></a>
                        </div>
                        <div
                            class="col-md-12 col-sm-12 col-lg-12 border border-danger rounded mt-5 p-3 d-flex flex-column">
                            <h5>Danger Zone</h5>
                            <small class="">Delete Account</small>
                            <small class="text-secondary"><i>Once you delete your account there is no going back, please be
                                    certain.</i></small>
                            <a href=""
                                class="btn btn-outline-secondary btn-box col-md-2 col-lg-2 col-sm-4 btn-sm mt-3 p-1">Delete
                                Account</a>
                        </div>

                    </div>




                </div>

            </div>
        </div>
        <!-- Hero Marketplace -->
    @endsection

    @push('scripts')
    @endpush
