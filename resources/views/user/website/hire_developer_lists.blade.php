
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
        {{-- <p class="text-white text-center mb-0">
          Find Your ChatGPT And Midjourney Prompt Scripts for your Project
        </p> --}}
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
          
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                

            <div class="row g-3 mb-5">
                @forelse ($hireDevs as $hireDev)
                    {{-- <div class="col-md-6 col-lg-4">
                    <div class="card marketplace--card rounded-3">
                        <div class="card-body">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="position-relative z-0">
                            <img
                                src="https://images.unsplash.com/photo-1603415526960-f7e0328c63b1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8cHJvZmlsZSUyMHBpY3R1cmV8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60"
                                alt="Avatar"
                                width="32"
                                height="32"
                                class="rounded-pill object-fit-cover"
                            />
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
                            <a
                            href="#"
                            class="text-white text-decoration-none fw-semibold"
                            >@narandro</a
                            >
                        </div>
                        <a
                            href="#"
                            class="d-block rounded-3 mb-3 ratio ratio-4x3"
                            style="background-color: #c4c4c4"
                        >
                            <img
                            src="https://images.unsplash.com/photo-1684873877875-d2b55f8df0f0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw4fHx8ZW58MHx8fHx8&auto=format&fit=crop&w=500&q=60"
                            alt="Marketplace Item"
                            class="img-fluid w-100 rounded-3 object-fit-cover"
                            />
                        </a>
                        <div class="d-flex justify-content-between gap-3">
                            <h5 class="card-title text-white">
                            <a href="#" class="link-light text-decoration-none">
                                Сolorful 3D object
                            </a>
                            </h5>
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
                                <a class="dropdown-item" href="#">Action</a>
                                </li>
                                <li>
                                <a class="dropdown-item" href="#"
                                    >Another action</a
                                >
                                </li>
                                <li>
                                <a class="dropdown-item" href="#"
                                    >Something else here</a
                                >
                                </li>
                            </ul>
                            </div>
                        </div>
                        <div class="fw-medium mb-2">
                            <span class="text-body-tertiary me-2">$0.08</span>
                            <span class="text-white">1/1</span>
                        </div>
                        <div class="d-flex justify-content-between gap-3">
                            <a
                            href="#"
                            class="fw-semibold link-primary text-decoration-none"
                            >
                            Place a bid
                            </a>
                            <small class="text-body-tertiary">
                            <i class="fa-regular fa-heart"></i>
                            220
                            </small>
                        </div>
                        </div>
                    </div>
                    </div> --}}

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
                                                <a class="dropdown-item" href="#">Action</a>
                                                </li>
                                                <li>
                                                <a class="dropdown-item" href="#"
                                                    >Another action</a
                                                >
                                                </li>
                                                <li>
                                                <a class="dropdown-item" href="#"
                                                    >Something else here</a
                                                >
                                                </li>
                                            </ul>
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
                                    </div>
                                    
                                </div>
                          
                        </div>
                    </div>
                    
                @empty
                    <p class="text-white">No Data Available</p>
                @endforelse
            </div>

            
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
           
            {{-- @forelse ($buyingOrders as $buyingOrder)
                  <div class="col-md-4 col-lg-3">
                      <div class="card marketplace--card rounded-3 mt-2">
                              <div class="card-body">
                                  <div class="d-flex align-items-center mb-3">
                                      <div class="position-relative z-0">
                                          <img src="@if(isset($buyingOrder->to_user->profile_photo_path)) {{ asset('/storage/profile/'.$buyingOrder->to_user->profile_photo_path) }} @else data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAHcAlQMBIgACEQEDEQH/xAAbAAEBAAMBAQEAAAAAAAAAAAAABwQFBgEDAv/EADkQAAEEAQICBgYJBAMAAAAAAAABAgMEBQYRBzESEyEiUWFBcYGRodEXIzJSU5KUscEUcoKjFSQl/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/ALiAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAXsAA5LUPEfSunpXQXsmx9hi7Ohrosrmr4Lty9pooON+j5JOi91+Fv33190+CqoFKBq8HqHE5+v1+HvwW40+11b03Z5OTmntNmi7gegAAAAAAAAAAAAAAAAADxV25kr1vqDMan1K7RGj5lgVif+lfTdEhb6Woqezl2qq7eJSM1dTG4i7fdyrV3y/laq/wT/gNjOq0rNmbHfu5Wy+WWVyd5URVRPj0l9oG90pw405puFvU0Y7Vvbv2rTUe9y+Kb9jfUh0tnHUbMSw2KVeWNU2Vj4mqn7GWAJXqzho7GSO1Dw/e/HZSv31qxu+rnRObUTki+XJfLmdTw71fDq/B/1Ks6m7A7qrcGyp0Hp4b+hfmnoOqXkSfGwt03x2tVK/cqZyn16xtTZOsTvKvva9f8gKyAAAAAAAAAAAAAAAAAANbqOk7JYDJUWfas1ZIk9atVDi+A+RZc0HDV32mozyQyNVNlTt6SfB3wKKqbke1DDe4Y6ym1Jj6759OZN3/fhjTtheqr2p4dq7ovmqeAFiBrMBnsXqCiy5iLsVmJybr0V7zfJyc0XyU2YBSUukTM8f4kg7zMPj1SVyckcqL2f7ET2KbvX3ESjp2J1HFubfzs3cgqQ99WuXkrtv25qe8LNI2NPY2e/l1WTNZN/XW3Ku6s7d0Zv7VVfNfIDugAAAAAAAAAAAAAAAADHv3K+PpzW7kjYq8DFfJI5exrUTtUDIMO5Pj1bJXuzVei9NnxTPbs5PBUUk8V3VXFS5N/xVuTB6XierEnYipLZ25+fu2RN/Spt6vA/SccW1h+RsyL2rI+dEVfciAY+W4ZaYkuOuaez0mDsO3Vf6S0nQ38k3RU9SLsYq6ByNlOqyHE61LX9LGTbKqeffNx9Cejfwbv6lfkPoT0b+Dd/Ur8gM/SOkNH6Vf19KWvNdVO9bs2Gvk9nob7EQ7SGaKZvSglZI3xY5FT4E8+hPRv4N39SvyMG7waq0XLb0hm8hi77U7quk6TF8l2RF/f1AVUE30HrfJLmZNJ6zhbBnIk+pmTsbaaib7pt2b7JvunPt5KmxSAAAAAAAAAAAAAAATLjrbndhcVg6z1Y7L3mQuVPuoqdnvVpTTX5TCYzLT05sjTjsSUpetrufv9W/xT3J7gP3h8bXxGMrY6nGjK9eJI2Ingnp9a8zNAAAAAeKnkegCX8dMf1GGoamqfV38Tajc2ROasV3L823xKPjbSXsdVttTZJ4WSIn9yIv8AJ88viqOax8lDKVmWKsu3Tjfvsuy7py80MmvDHWgjggYjIo2oxjE5NRE2RAPoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA//Z @endif" alt="Avatar" width="32" height="32" class="rounded-pill object-fit-cover" />
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
                                      <a href="javascript:;" class="text-white text-decoration-none fw-semibold" style="padding-left: 10px;"> <small> {{$buyingOrder->to_user->name ?? ""}}</small></a>
                                  </div>
                                  <a
                                  href="javascript:;"
                                  class="d-block rounded-3 mb-3 ratio ratio-4x3"
                                  style="background-color: #c4c4c4"
                                  >
                              
                                  <img src="@if(isset($buyingOrder->from_user->profile_photo_path)) {{ asset('/storage/profile/'.$buyingOrder->from_user->profile_photo_path) }} @else data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAHcAlQMBIgACEQEDEQH/xAAbAAEBAAMBAQEAAAAAAAAAAAAABwQFBgEDAv/EADkQAAEEAQICBgYJBAMAAAAAAAABAgMEBQYRBzESEyEiUWFBcYGRodEXIzJSU5KUscEUcoKjFSQl/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/ALiAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAXsAA5LUPEfSunpXQXsmx9hi7Ohrosrmr4Lty9pooON+j5JOi91+Fv33190+CqoFKBq8HqHE5+v1+HvwW40+11b03Z5OTmntNmi7gegAAAAAAAAAAAAAAAAADxV25kr1vqDMan1K7RGj5lgVif+lfTdEhb6Woqezl2qq7eJSM1dTG4i7fdyrV3y/laq/wT/gNjOq0rNmbHfu5Wy+WWVyd5URVRPj0l9oG90pw405puFvU0Y7Vvbv2rTUe9y+Kb9jfUh0tnHUbMSw2KVeWNU2Vj4mqn7GWAJXqzho7GSO1Dw/e/HZSv31qxu+rnRObUTki+XJfLmdTw71fDq/B/1Ks6m7A7qrcGyp0Hp4b+hfmnoOqXkSfGwt03x2tVK/cqZyn16xtTZOsTvKvva9f8gKyAAAAAAAAAAAAAAAAAANbqOk7JYDJUWfas1ZIk9atVDi+A+RZc0HDV32mozyQyNVNlTt6SfB3wKKqbke1DDe4Y6ym1Jj6759OZN3/fhjTtheqr2p4dq7ovmqeAFiBrMBnsXqCiy5iLsVmJybr0V7zfJyc0XyU2YBSUukTM8f4kg7zMPj1SVyckcqL2f7ET2KbvX3ESjp2J1HFubfzs3cgqQ99WuXkrtv25qe8LNI2NPY2e/l1WTNZN/XW3Ku6s7d0Zv7VVfNfIDugAAAAAAAAAAAAAAAADHv3K+PpzW7kjYq8DFfJI5exrUTtUDIMO5Pj1bJXuzVei9NnxTPbs5PBUUk8V3VXFS5N/xVuTB6XierEnYipLZ25+fu2RN/Spt6vA/SccW1h+RsyL2rI+dEVfciAY+W4ZaYkuOuaez0mDsO3Vf6S0nQ38k3RU9SLsYq6ByNlOqyHE61LX9LGTbKqeffNx9Cejfwbv6lfkPoT0b+Dd/Ur8gM/SOkNH6Vf19KWvNdVO9bs2Gvk9nob7EQ7SGaKZvSglZI3xY5FT4E8+hPRv4N39SvyMG7waq0XLb0hm8hi77U7quk6TF8l2RF/f1AVUE30HrfJLmZNJ6zhbBnIk+pmTsbaaib7pt2b7JvunPt5KmxSAAAAAAAAAAAAAAATLjrbndhcVg6z1Y7L3mQuVPuoqdnvVpTTX5TCYzLT05sjTjsSUpetrufv9W/xT3J7gP3h8bXxGMrY6nGjK9eJI2Ingnp9a8zNAAAAAeKnkegCX8dMf1GGoamqfV38Tajc2ROasV3L823xKPjbSXsdVttTZJ4WSIn9yIv8AJ88viqOax8lDKVmWKsu3Tjfvsuy7py80MmvDHWgjggYjIo2oxjE5NRE2RAPoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA//Z @endif" alt="" class="img-fluid w-100 rounded-3 object-fit-cover"/>
                                  <span class="bg-dark mx-2 mt-2 text-white text-center opacity-50" style="height: 25px;">Custom Order</span>
                                  </a>
                                  <div>
                                    <div class="col-sm-12">
                                      <h6 class="text-primary">{{ $buyingOrder->title }}</h6>
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-between">
                                      <small class="text-body-tertiary"><strong>Revision: </strong>{{ $buyingOrder->revision }}</small>
                                      <small class="text-body-tertiary"><strong>Delivery: </strong>{{ $buyingOrder->delivery }}</small>
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-between">
                                      <small class="text-body-tertiary"><strong>Expire: </strong>{{ $buyingOrder->expire }}</small>
                                      <small class="text-body-tertiary"><strong>Price: </strong>${{ $buyingOrder->price }}</small>
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-between">
                                      <small class="text-body-tertiary"><strong>Charge: </strong> ${{ $buyingOrder->charge_amount }}</small>
                                    </div>
                                    <small class="text-body-tertiary" style="text-align: justify"><strong>Transaction: </strong>{!! $buyingOrder->transaction_id !!}</small>
                                    <small class="text-body-tertiary" style="text-align: justify"><strong>Desctription: </strong>{!! $buyingOrder->description !!}</small>
                                </div>
                                  
                              </div>
                        
                      </div>
                  </div>
                @empty
                    <p class="text-white">No Orders Available</p>
                @endforelse --}}
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