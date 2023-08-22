
@extends('user.website.includes.master')

@section('title')
   Hire Developer Lists
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
          Hire
          <span class="fw-semibold text-primary">Developer Lists</span>
        </h2>
        
      </div>
    </section>
    <!-- Hero Marketplace -->
<section class="marketplace-area section pt-4">
      <div class="container">
        <ul class="nav nav-tabs d-flex justify-content-center" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link text-primary " id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Developer Hire</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link text-primary" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Hire Me</button>
          </li>
        </ul>
        <div class="tab-content mt-5 text-primary" id="myTabContent">
          
          <div class="tab-pane fade  " id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row g-3 mb-5">
                @forelse ($hireDevs as $hireDev)
                    <div class="col-md-4 col-lg-3">
                        <div class="card marketplace--card rounded-3 mt-2">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="position-relative z-0">
                                            <img src="@if(isset($hireDev->from_user->profile_photo_path)) {{ asset('/storage/profile/'.$hireDev->from_user->profile_photo_path) }} @else data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAHcAlQMBIgACEQEDEQH/xAAbAAEBAAMBAQEAAAAAAAAAAAAABwQFBgEDAv/EADkQAAEEAQICBgYJBAMAAAAAAAABAgMEBQYRBzESEyEiUWFBcYGRodEXIzJSU5KUscEUcoKjFSQl/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/ALiAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAXsAA5LUPEfSunpXQXsmx9hi7Ohrosrmr4Lty9pooON+j5JOi91+Fv33190+CqoFKBq8HqHE5+v1+HvwW40+11b03Z5OTmntNmi7gegAAAAAAAAAAAAAAAAADxV25kr1vqDMan1K7RGj5lgVif+lfTdEhb6Woqezl2qq7eJSM1dTG4i7fdyrV3y/laq/wT/gNjOq0rNmbHfu5Wy+WWVyd5URVRPj0l9oG90pw405puFvU0Y7Vvbv2rTUe9y+Kb9jfUh0tnHUbMSw2KVeWNU2Vj4mqn7GWAJXqzho7GSO1Dw/e/HZSv31qxu+rnRObUTki+XJfLmdTw71fDq/B/1Ks6m7A7qrcGyp0Hp4b+hfmnoOqXkSfGwt03x2tVK/cqZyn16xtTZOsTvKvva9f8gKyAAAAAAAAAAAAAAAAAANbqOk7JYDJUWfas1ZIk9atVDi+A+RZc0HDV32mozyQyNVNlTt6SfB3wKKqbke1DDe4Y6ym1Jj6759OZN3/fhjTtheqr2p4dq7ovmqeAFiBrMBnsXqCiy5iLsVmJybr0V7zfJyc0XyU2YBSUukTM8f4kg7zMPj1SVyckcqL2f7ET2KbvX3ESjp2J1HFubfzs3cgqQ99WuXkrtv25qe8LNI2NPY2e/l1WTNZN/XW3Ku6s7d0Zv7VVfNfIDugAAAAAAAAAAAAAAAADHv3K+PpzW7kjYq8DFfJI5exrUTtUDIMO5Pj1bJXuzVei9NnxTPbs5PBUUk8V3VXFS5N/xVuTB6XierEnYipLZ25+fu2RN/Spt6vA/SccW1h+RsyL2rI+dEVfciAY+W4ZaYkuOuaez0mDsO3Vf6S0nQ38k3RU9SLsYq6ByNlOqyHE61LX9LGTbKqeffNx9Cejfwbv6lfkPoT0b+Dd/Ur8gM/SOkNH6Vf19KWvNdVO9bs2Gvk9nob7EQ7SGaKZvSglZI3xY5FT4E8+hPRv4N39SvyMG7waq0XLb0hm8hi77U7quk6TF8l2RF/f1AVUE30HrfJLmZNJ6zhbBnIk+pmTsbaaib7pt2b7JvunPt5KmxSAAAAAAAAAAAAAAATLjrbndhcVg6z1Y7L3mQuVPuoqdnvVpTTX5TCYzLT05sjTjsSUpetrufv9W/xT3J7gP3h8bXxGMrY6nGjK9eJI2Ingnp9a8zNAAAAAeKnkegCX8dMf1GGoamqfV38Tajc2ROasV3L823xKPjbSXsdVttTZJ4WSIn9yIv8AJ88viqOax8lDKVmWKsu3Tjfvsuy7py80MmvDHWgjggYjIo2oxjE5NRE2RAPoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA//Z @endif" alt="Avatar" width="32" height="32" class="rounded-pill object-fit-cover" />
                                            <svg
                                            class="ps-icon position-absolute top-100 start-100 translate-middle"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            style="
                                                fill: rgba(
                                                var(--ps-primary),
                                                var(--ps-text-opacity)
                                                );
                                                margin-top: -0.375rem;
                                            "
                                            >
                                            <path
                                                d="M19.965 8.521C19.988 8.347 20 8.173 20 8c0-2.379-2.143-4.288-4.521-3.965C14.786 2.802 13.466 2 12 2s-2.786.802-3.479 2.035C6.138 3.712 4 5.621 4 8c0 .173.012.347.035.521C2.802 9.215 2 10.535 2 12s.802 2.785 2.035 3.479A3.976 3.976 0 0 0 4 16c0 2.379 2.138 4.283 4.521 3.965C9.214 21.198 10.534 22 12 22s2.786-.802 3.479-2.035C17.857 20.283 20 18.379 20 16c0-.173-.012-.347-.035-.521C21.198 14.785 22 13.465 22 12s-.802-2.785-2.035-3.479zm-9.01 7.895-3.667-3.714 1.424-1.404 2.257 2.286 4.327-4.294 1.408 1.42-5.749 5.706z"
                                            ></path>
                                            </svg>
                                        </div>
                                        <a href="javascript:;" class="text-white text-decoration-none fw-semibold" style="padding-left: 10px;"> <small> {{$hireDev->from_user->name ?? ""}}</small></a>
                                    </div>
                                    <a
                                    href="javascript:;"
                                    class="d-block rounded-3 mb-3 ratio ratio-4x3"
                                    style="background-color: #c4c4c4"
                                    >
                                
                                    <img src="@if(isset($hireDev->to_user->profile_photo_path)) {{ asset('/storage/profile/'.$hireDev->to_user->profile_photo_path) }} @else data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAHcAlQMBIgACEQEDEQH/xAAbAAEBAAMBAQEAAAAAAAAAAAAABwQFBgEDAv/EADkQAAEEAQICBgYJBAMAAAAAAAABAgMEBQYRBzESEyEiUWFBcYGRodEXIzJSU5KUscEUcoKjFSQl/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/ALiAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAXsAA5LUPEfSunpXQXsmx9hi7Ohrosrmr4Lty9pooON+j5JOi91+Fv33190+CqoFKBq8HqHE5+v1+HvwW40+11b03Z5OTmntNmi7gegAAAAAAAAAAAAAAAAADxV25kr1vqDMan1K7RGj5lgVif+lfTdEhb6Woqezl2qq7eJSM1dTG4i7fdyrV3y/laq/wT/gNjOq0rNmbHfu5Wy+WWVyd5URVRPj0l9oG90pw405puFvU0Y7Vvbv2rTUe9y+Kb9jfUh0tnHUbMSw2KVeWNU2Vj4mqn7GWAJXqzho7GSO1Dw/e/HZSv31qxu+rnRObUTki+XJfLmdTw71fDq/B/1Ks6m7A7qrcGyp0Hp4b+hfmnoOqXkSfGwt03x2tVK/cqZyn16xtTZOsTvKvva9f8gKyAAAAAAAAAAAAAAAAAANbqOk7JYDJUWfas1ZIk9atVDi+A+RZc0HDV32mozyQyNVNlTt6SfB3wKKqbke1DDe4Y6ym1Jj6759OZN3/fhjTtheqr2p4dq7ovmqeAFiBrMBnsXqCiy5iLsVmJybr0V7zfJyc0XyU2YBSUukTM8f4kg7zMPj1SVyckcqL2f7ET2KbvX3ESjp2J1HFubfzs3cgqQ99WuXkrtv25qe8LNI2NPY2e/l1WTNZN/XW3Ku6s7d0Zv7VVfNfIDugAAAAAAAAAAAAAAAADHv3K+PpzW7kjYq8DFfJI5exrUTtUDIMO5Pj1bJXuzVei9NnxTPbs5PBUUk8V3VXFS5N/xVuTB6XierEnYipLZ25+fu2RN/Spt6vA/SccW1h+RsyL2rI+dEVfciAY+W4ZaYkuOuaez0mDsO3Vf6S0nQ38k3RU9SLsYq6ByNlOqyHE61LX9LGTbKqeffNx9Cejfwbv6lfkPoT0b+Dd/Ur8gM/SOkNH6Vf19KWvNdVO9bs2Gvk9nob7EQ7SGaKZvSglZI3xY5FT4E8+hPRv4N39SvyMG7waq0XLb0hm8hi77U7quk6TF8l2RF/f1AVUE30HrfJLmZNJ6zhbBnIk+pmTsbaaib7pt2b7JvunPt5KmxSAAAAAAAAAAAAAAATLjrbndhcVg6z1Y7L3mQuVPuoqdnvVpTTX5TCYzLT05sjTjsSUpetrufv9W/xT3J7gP3h8bXxGMrY6nGjK9eJI2Ingnp9a8zNAAAAAeKnkegCX8dMf1GGoamqfV38Tajc2ROasV3L823xKPjbSXsdVttTZJ4WSIn9yIv8AJ88viqOax8lDKVmWKsu3Tjfvsuy7py80MmvDHWgjggYjIo2oxjE5NRE2RAPoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA//Z @endif" alt="" class="img-fluid w-100 rounded-3 object-fit-cover"/>
                                    <span class="bg-dark mx-2 mt-2 text-white text-center opacity-50" style="height: 25px;">{{ $hireDev->to_user->name ?? "" }}</span>
                                    </a>
                                    <div>
                                        <div class="dropdown" style="float: right">
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
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#hireDevModal{{ $hireDev->id }}">Delivery Work</a>
                                                </li>
                                                <li>
                                            </ul>


                                            <div class="modal fade" id="hireDevModal{{ $hireDev->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Delivery Work</h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <div class="row">
                                                        <div class="col-sm-12 col-md-8 mt-2">
                                                            <div class="card marketplace--card rounded-3">
                                                                <div class="card-body">
                                                                    <h6>Description</h6>
                                                                    <small style="text-align: justify">{{ $hireDev->description ?? "" }}</small>
                                                                    <br><br><h6>Samples</h6>
                                                                    <div class="row">
                                                                        @forelse ($hireDev->samples as $sample)
                                                                        <div class="col-sm-4 my-2">
                                                                            <a class="" href="{{ asset('/storage/hire_developer/'.$sample->sample) }}" download=""> <img style="width:100%; height:120px;" src="{{ asset('/storage/hire_developer/'.$sample->sample) }}" alt=""></a>
                                                                         </div>
                                                                        @empty
                                                                        <p class="text-center">No Data Found</p>
                                                                        @endforelse
                                                                    </div>

                                                                    @if ($hireDev->status == 'delivered')
                                                                        <div class="mt-2">
                                                                            <strong>Work Note</strong><br>
                                                                            <small>{{ $hireDev->note }}</small><br><br>
                                                                            <strong>Work Submitted</strong><br>

                                                                            <a class="btn btn-sm btn-success" href="{{ asset('/storage/hire_developer/delivered/'.$hireDev->delivery_file) }}" download><i class="fa fa-download"></i> Project Download</a>
                                                                        </div>
                                                                    @endif
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-4 mt-sm-2 mt-2">
                                                            <div class="card marketplace--card rounded-3 ">
                                                                <div class="card-body">
                                                                    <h5 class="text-center">Order Details</h5>
                                                                    <hr>
                                                                    <h6 class="text-justify">{{ $hireDev->title ?? "" }}</h6>
                                                                    <div class="d-flex justify-content-between">
                                                                        <span class="text-center">Order By</span>
                                                                        <small>{{ $hireDev->from_user->name }}</small>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between">
                                                                        <span>Dalivery Date</span>
                                                                        @if ($hireDev->type == 'hourly')
                                                                            @php
                                                                                $delivery_time = Carbon\Carbon::parse($hireDev->created_at)->addHours(1);
                                                                            @endphp
                                                                        @elseif($hireDev->type == 'daily')
                                                                            @php
                                                                                $delivery_time = Carbon\Carbon::parse($hireDev->created_at)->addDays(1);
                                                                               
                                                                            @endphp
                                                                        @elseif($hireDev->type == 'weekly')
                                                                            @php
                                                                                $delivery_time = Carbon\Carbon::parse($hireDev->created_at)->addDays(7);
                                                                            @endphp   
                                                                        @elseif($hireDev->type == 'byweekly')
                                                                            @php
                                                                                $delivery_time = Carbon\Carbon::parse($hireDev->created_at)->addDays(15);
                                                                            @endphp  
                                                                        @elseif($hireDev->type == 'monthly')   
                                                                            @php
                                                                                $delivery_time = Carbon\Carbon::parse($hireDev->created_at)->addDays(30);
                                                                            @endphp 
                                                                        @endif                                                                       
                                                                        <small>{{ $delivery_time->format('d M H:i') }}</small>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between">
                                                                        <span class="text-center">Total price</span>
                                                                        <small>{{ $hireDev->price }}</small>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between">
                                                                        <span class="text-center">Order By</span>
                                                                        <small>{{ $hireDev->from_user->name }}</small>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between">
                                                                        <span class="text-center">Order Type</span>
                                                                        <small>{{ $hireDev->type }}</small>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between">
                                                                        <span class="text-center">Order Staus</span>
                                                                        <small>
                                                                            @if ($hireDev->status == 'pending')
                                                                                <span class="badge bg-info">Pending</span>
                                                                            @elseif($hireDev->status == 'accept')    
                                                                                <span class="badge bg-primary">Processing</span>
                                                                            @elseif($hireDev->status == 'cancel')
                                                                                <span class="badge bg-danger">Canceled</span>
                                                                            @elseif($hireDev->status == 'delivered')    
                                                                                <span class="badge bg-success">Delivered</span>
                                                                            @endif
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>


                                            </div>
                                        <div class="col-sm-12">
                                          <h6 class="text-primary">{{ $hireDev->title }}</h6>
                                        </div>
                                        
                                        <div class="col-sm-12 d-flex justify-content-between">
                                          <small class="text-body-tertiary"><strong>Type: </strong>{{ $hireDev->type }}</small>
                                          <small class="text-body-tertiary"><strong>Price: </strong>${{ $hireDev->price }}</small>
                                        </div>
                                        <small class="text-body-tertiary" style="text-align: justify"><strong>Desctription: </strong>
                                            {!! Str::limit($hireDev->description, 70) !!}
                                        </small>
                                        <div class="dropdown flex-shrink-0" id="user_profile">
                                            <a href="" class="btn btn-outline-primary dropdown-toggle col-sm-12 w-100" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                @if ($hireDev->status == 'pending')
                                                    Pending
                                                @elseif($hireDev->status == 'accept')    
                                                    Processing
                                                @elseif($hireDev->status == 'cancel')    
                                                    Canceled
                                                @elseif($hireDev->status == 'delivered')    
                                                    Delivered
                                                @endif
                                            </a>
                                            <ul class="dropdown-menu bg-dark w-100 ">
                                                
                                                <li><a class="dropdown-item text-primary" href="{{ route('user.hireDevStatus',['hireDev'=>$hireDev->id,'type'=>'cancel']) }}"><i
                                                    class="fa fa-close"></i> <small class="mx-1">Cancel</small></a>
                                                </li>
                                            </ul>
                                        </div>
                                      
                                    </div>
                                    
                                </div>
                          
                        </div>
                    </div>
                    
                @empty
                    <p class="text-white">No Data Available</p>
                @endforelse
            </div>

          </div>
          <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
           
            <div class="row g-3 mb-5">
                @forelse ($hireMine as $hireMe)
                    <div class="col-md-4 col-lg-3">
                        <div class="card marketplace--card rounded-3 mt-2">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="position-relative z-0">
                                            <img src="@if(isset($hireMe->to_user->profile_photo_path)) {{ asset('/storage/profile/'.$hireMe->to_user->profile_photo_path) }} @else data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAHcAlQMBIgACEQEDEQH/xAAbAAEBAAMBAQEAAAAAAAAAAAAABwQFBgEDAv/EADkQAAEEAQICBgYJBAMAAAAAAAABAgMEBQYRBzESEyEiUWFBcYGRodEXIzJSU5KUscEUcoKjFSQl/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/ALiAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAXsAA5LUPEfSunpXQXsmx9hi7Ohrosrmr4Lty9pooON+j5JOi91+Fv33190+CqoFKBq8HqHE5+v1+HvwW40+11b03Z5OTmntNmi7gegAAAAAAAAAAAAAAAAADxV25kr1vqDMan1K7RGj5lgVif+lfTdEhb6Woqezl2qq7eJSM1dTG4i7fdyrV3y/laq/wT/gNjOq0rNmbHfu5Wy+WWVyd5URVRPj0l9oG90pw405puFvU0Y7Vvbv2rTUe9y+Kb9jfUh0tnHUbMSw2KVeWNU2Vj4mqn7GWAJXqzho7GSO1Dw/e/HZSv31qxu+rnRObUTki+XJfLmdTw71fDq/B/1Ks6m7A7qrcGyp0Hp4b+hfmnoOqXkSfGwt03x2tVK/cqZyn16xtTZOsTvKvva9f8gKyAAAAAAAAAAAAAAAAAANbqOk7JYDJUWfas1ZIk9atVDi+A+RZc0HDV32mozyQyNVNlTt6SfB3wKKqbke1DDe4Y6ym1Jj6759OZN3/fhjTtheqr2p4dq7ovmqeAFiBrMBnsXqCiy5iLsVmJybr0V7zfJyc0XyU2YBSUukTM8f4kg7zMPj1SVyckcqL2f7ET2KbvX3ESjp2J1HFubfzs3cgqQ99WuXkrtv25qe8LNI2NPY2e/l1WTNZN/XW3Ku6s7d0Zv7VVfNfIDugAAAAAAAAAAAAAAAADHv3K+PpzW7kjYq8DFfJI5exrUTtUDIMO5Pj1bJXuzVei9NnxTPbs5PBUUk8V3VXFS5N/xVuTB6XierEnYipLZ25+fu2RN/Spt6vA/SccW1h+RsyL2rI+dEVfciAY+W4ZaYkuOuaez0mDsO3Vf6S0nQ38k3RU9SLsYq6ByNlOqyHE61LX9LGTbKqeffNx9Cejfwbv6lfkPoT0b+Dd/Ur8gM/SOkNH6Vf19KWvNdVO9bs2Gvk9nob7EQ7SGaKZvSglZI3xY5FT4E8+hPRv4N39SvyMG7waq0XLb0hm8hi77U7quk6TF8l2RF/f1AVUE30HrfJLmZNJ6zhbBnIk+pmTsbaaib7pt2b7JvunPt5KmxSAAAAAAAAAAAAAAATLjrbndhcVg6z1Y7L3mQuVPuoqdnvVpTTX5TCYzLT05sjTjsSUpetrufv9W/xT3J7gP3h8bXxGMrY6nGjK9eJI2Ingnp9a8zNAAAAAeKnkegCX8dMf1GGoamqfV38Tajc2ROasV3L823xKPjbSXsdVttTZJ4WSIn9yIv8AJ88viqOax8lDKVmWKsu3Tjfvsuy7py80MmvDHWgjggYjIo2oxjE5NRE2RAPoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA//Z @endif" alt="Avatar" width="32" height="32" class="rounded-pill object-fit-cover" />
                                            <svg
                                            class="ps-icon position-absolute top-100 start-100 translate-middle"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            style="
                                                fill: rgba(
                                                var(--ps-primary),
                                                var(--ps-text-opacity)
                                                );
                                                margin-top: -0.375rem;
                                            "
                                            >
                                            <path
                                                d="M19.965 8.521C19.988 8.347 20 8.173 20 8c0-2.379-2.143-4.288-4.521-3.965C14.786 2.802 13.466 2 12 2s-2.786.802-3.479 2.035C6.138 3.712 4 5.621 4 8c0 .173.012.347.035.521C2.802 9.215 2 10.535 2 12s.802 2.785 2.035 3.479A3.976 3.976 0 0 0 4 16c0 2.379 2.138 4.283 4.521 3.965C9.214 21.198 10.534 22 12 22s2.786-.802 3.479-2.035C17.857 20.283 20 18.379 20 16c0-.173-.012-.347-.035-.521C21.198 14.785 22 13.465 22 12s-.802-2.785-2.035-3.479zm-9.01 7.895-3.667-3.714 1.424-1.404 2.257 2.286 4.327-4.294 1.408 1.42-5.749 5.706z"
                                            ></path>
                                            </svg>
                                        </div>
                                        <a href="javascript:;" class="text-white text-decoration-none fw-semibold" style="padding-left: 10px;"> <small> {{$hireMe->to_user->name ?? ""}}</small></a>
                                    </div>
                                    <a
                                    href="javascript:;"
                                    class="d-block rounded-3 mb-3 ratio ratio-4x3"
                                    style="background-color: #c4c4c4"
                                    >
                                
                                    <img src="@if(isset($hireMe->from_user->profile_photo_path)) {{ asset('/storage/profile/'.$hireMe->from_user->profile_photo_path) }} @else data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAHcAlQMBIgACEQEDEQH/xAAbAAEBAAMBAQEAAAAAAAAAAAAABwQFBgEDAv/EADkQAAEEAQICBgYJBAMAAAAAAAABAgMEBQYRBzESEyEiUWFBcYGRodEXIzJSU5KUscEUcoKjFSQl/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/ALiAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAXsAA5LUPEfSunpXQXsmx9hi7Ohrosrmr4Lty9pooON+j5JOi91+Fv33190+CqoFKBq8HqHE5+v1+HvwW40+11b03Z5OTmntNmi7gegAAAAAAAAAAAAAAAAADxV25kr1vqDMan1K7RGj5lgVif+lfTdEhb6Woqezl2qq7eJSM1dTG4i7fdyrV3y/laq/wT/gNjOq0rNmbHfu5Wy+WWVyd5URVRPj0l9oG90pw405puFvU0Y7Vvbv2rTUe9y+Kb9jfUh0tnHUbMSw2KVeWNU2Vj4mqn7GWAJXqzho7GSO1Dw/e/HZSv31qxu+rnRObUTki+XJfLmdTw71fDq/B/1Ks6m7A7qrcGyp0Hp4b+hfmnoOqXkSfGwt03x2tVK/cqZyn16xtTZOsTvKvva9f8gKyAAAAAAAAAAAAAAAAAANbqOk7JYDJUWfas1ZIk9atVDi+A+RZc0HDV32mozyQyNVNlTt6SfB3wKKqbke1DDe4Y6ym1Jj6759OZN3/fhjTtheqr2p4dq7ovmqeAFiBrMBnsXqCiy5iLsVmJybr0V7zfJyc0XyU2YBSUukTM8f4kg7zMPj1SVyckcqL2f7ET2KbvX3ESjp2J1HFubfzs3cgqQ99WuXkrtv25qe8LNI2NPY2e/l1WTNZN/XW3Ku6s7d0Zv7VVfNfIDugAAAAAAAAAAAAAAAADHv3K+PpzW7kjYq8DFfJI5exrUTtUDIMO5Pj1bJXuzVei9NnxTPbs5PBUUk8V3VXFS5N/xVuTB6XierEnYipLZ25+fu2RN/Spt6vA/SccW1h+RsyL2rI+dEVfciAY+W4ZaYkuOuaez0mDsO3Vf6S0nQ38k3RU9SLsYq6ByNlOqyHE61LX9LGTbKqeffNx9Cejfwbv6lfkPoT0b+Dd/Ur8gM/SOkNH6Vf19KWvNdVO9bs2Gvk9nob7EQ7SGaKZvSglZI3xY5FT4E8+hPRv4N39SvyMG7waq0XLb0hm8hi77U7quk6TF8l2RF/f1AVUE30HrfJLmZNJ6zhbBnIk+pmTsbaaib7pt2b7JvunPt5KmxSAAAAAAAAAAAAAAATLjrbndhcVg6z1Y7L3mQuVPuoqdnvVpTTX5TCYzLT05sjTjsSUpetrufv9W/xT3J7gP3h8bXxGMrY6nGjK9eJI2Ingnp9a8zNAAAAAeKnkegCX8dMf1GGoamqfV38Tajc2ROasV3L823xKPjbSXsdVttTZJ4WSIn9yIv8AJ88viqOax8lDKVmWKsu3Tjfvsuy7py80MmvDHWgjggYjIo2oxjE5NRE2RAPoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA//Z @endif" alt="" class="img-fluid w-100 rounded-3 object-fit-cover"/>
                                    <span class="bg-dark mx-2 mt-2 text-white text-center opacity-50" style="height: 25px;">{{ $hireMe->from_user->name ?? "" }}</span>
                                    </a>
                                    <div>
                                        <div class="dropdown" style="float: right">
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
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#hireDevViewModal{{ $hireMe->id }}">Delivery Work</a>
                                                </li>
                                                <li>
                                            </ul>


                                            {{-- Delivery Work modal --}}
                                            <div class="modal fade" id="hireDevViewModal{{ $hireMe->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Delivery Work</h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <div class="row">
                                                        <div class="col-sm-12 col-md-8 mt-2">
                                                            <div class="card marketplace--card rounded-3">
                                                                <div class="card-body">
                                                                    <h6>Description</h6>
                                                                    <small style="text-align: justify">{{ $hireMe->description ?? "" }}</small>
                                                                    <br><br><h6>Samples</h6>
                                                                        <div class="row">
                                                                        @forelse ($hireMe->samples as $sample)
                                                                        <div class="col-sm-4 my-2">
                                                                            <a class="" href="{{ asset('/storage/hire_developer/'.$sample->sample) }}" download=""> <img style="width:100%; height:120px;" src="{{ asset('/storage/hire_developer/'.$sample->sample) }}" alt=""></a>
                                                                         </div>
                                                                        @empty
                                                                        <p class="text-center">No Data Found</p>
                                                                        @endforelse
                                                                    </div>
                                                                    @if ($hireMe->status == 'delivered')
                                                                        <div class="mt-2">
                                                                            <strong>Work Note</strong><br>
                                                                            <small>{{ $hireMe->note }}</small><br><br>
                                                                            <strong>Work Submitted</strong><br>

                                                                            <a class="btn btn-sm btn-success" href="{{ asset('/storage/hire_developer/delivered/'.$hireMe->delivery_file) }}" download><i class="fa fa-download"></i> Project Download</a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-4 mt-sm-2 mt-2">
                                                            <div class="card marketplace--card rounded-3 ">
                                                                <div class="card-body">
                                                                    <h5 class="text-center">Order Details</h5>
                                                                    <hr>
                                                                    <h6 class="text-justify">{{ $hireMe->title ?? "" }}</h6>
                                                                    <div class="d-flex justify-content-between">
                                                                        <span class="text-center">Order By</span>
                                                                        <small>{{ $hireMe->from_user->name }}</small>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between">
                                                                        <span>Dalivery Date</span>
                                                                        @if ($hireMe->type == 'hourly')
                                                                            @php
                                                                                $delivery_time = Carbon\Carbon::parse($hireMe->created_at)->addHours(1);
                                                                            @endphp
                                                                        @elseif($hireMe->type == 'daily')
                                                                            @php
                                                                                $delivery_time = Carbon\Carbon::parse($hireMe->created_at)->addDays(1);
                                                                               
                                                                            @endphp
                                                                        @elseif($hireMe->type == 'weekly')
                                                                            @php
                                                                                $delivery_time = Carbon\Carbon::parse($hireMe->created_at)->addDays(7);
                                                                            @endphp   
                                                                        @elseif($hireMe->type == 'byweekly')
                                                                            @php
                                                                                $delivery_time = Carbon\Carbon::parse($hireMe->created_at)->addDays(15);
                                                                            @endphp  
                                                                        @elseif($hireMe->type == 'monthly')   
                                                                            @php
                                                                                $delivery_time = Carbon\Carbon::parse($hireMe->created_at)->addDays(30);
                                                                            @endphp 
                                                                        @endif                                                                       
                                                                        <small>{{ $delivery_time->format('d M H:i') }}</small>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between">
                                                                        <span class="text-center">Total price</span>
                                                                        <small>{{ $hireMe->price }}</small>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between">
                                                                        <span class="text-center">Order By</span>
                                                                        <small>{{ $hireMe->from_user->name }}</small>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between">
                                                                        <span class="text-center">Order Type</span>
                                                                        <small>{{ $hireMe->type }}</small>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between">
                                                                        <span class="text-center">Order Staus</span>
                                                                        <small>
                                                                            @if ($hireMe->status == 'pending')
                                                                                <span class="badge bg-info">Pending</span>
                                                                            @elseif($hireMe->status == 'accept')    
                                                                                <span class="badge bg-primary">Processing</span>
                                                                            @elseif($hireMe->status == 'cancel')
                                                                                <span class="badge bg-danger">Canceled</span>
                                                                            @elseif($hireMe->status == 'delivered')    
                                                                                <span class="badge bg-success">Delivered</span>
                                                                            @endif
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                                @if ($hireMe->status == 'accept' || $hireMe->status == 'delivered')
                                                                    <a href="" data-bs-toggle="modal" data-bs-target="#deliverWorkModal" class="btn btn-sm btn-primary w-100">Delivery</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>


                                            <!-- Click Delivery Modal -->
                                            <div class="modal fade" id="deliverWorkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form action="{{ route('user.deliveredProject') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delivery Your Work</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label class="">Work Note?</label>
                                                                    <textarea name="description" style="border:1px solid #9AC6B7" id="description" class="form-control bg-transparent"  placeholder="Enter Description..." required></textarea>

                                                                </div>
                                                                <div class="col-sm-12 mt-2">
                                                                    <label class="">Work Upload (Note: upload your files as zip)</label>
                                                                    <input type="file" class="form-control" name="delivery_file"  accept=".zip,.rar,.7zip" required>
                                                                </div>
                                                                <input type="hidden" name="hire_developer_id" value="{{ $hireMe->id }}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Deliver</button>
                                                        </div>
                                                    </div>
                                                    
                                                </form>
                                                </div>
                                            </div>
                                            </div>
                                        <div class="col-sm-12">
                                          <h6 class="text-primary">{{ $hireMe->title }}</h6>
                                        </div>
                                        
                                        <div class="col-sm-12 d-flex justify-content-between">
                                          <small class="text-body-tertiary"><strong>Type: </strong>{{ $hireMe->type }}</small>
                                          <small class="text-body-tertiary"><strong>Price: </strong>${{ $hireMe->price }}</small>
                                        </div>
                                        <small class="text-body-tertiary" style="text-align: justify"><strong>Desctription: </strong>
                                            {!! Str::limit($hireMe->description, 70) !!}
                                        </small>
                                        <div class="dropdown flex-shrink-0" id="user_profile">
                                            <a href="" class="btn btn-outline-primary dropdown-toggle col-sm-12 w-100" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                @if ($hireMe->status == 'pending')
                                                    Pending
                                                @elseif($hireMe->status == 'accept')    
                                                    Processing
                                                @elseif($hireMe->status == 'cancel')    
                                                    Canceled
                                                @elseif($hireMe->status == 'delivered')    
                                                    Delivered
                                                @endif
                                            </a>
                                            <ul class="dropdown-menu bg-dark w-100 ">
                                                
                                               @if ($hireMe->status == 'cancel')
                                               @else
                                               <li>
                                                    <a class="dropdown-item text-primary" href="{{ route('user.hireDevStatus',['hireDev'=>$hireMe->id,'type'=>'accept']) }}"><i
                                                    class="fa fa-check"></i> <small class="mx-1">Accept</small>
                                                    </a>
                                                </li>
                                                <li><a class="dropdown-item text-primary" href="{{ route('user.hireDevStatus',['hireDev'=>$hireMe->id,'type'=>'cancel']) }}"><i
                                                    class="fa fa-close"></i> <small class="mx-1">Cancel</small></a>
                                                </li>
                                               @endif
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    
                                </div>
                          
                        </div>
                    </div>
                    
                @empty
                    <p class="text-white">No Data Available</p>
                @endforelse
            </div>

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