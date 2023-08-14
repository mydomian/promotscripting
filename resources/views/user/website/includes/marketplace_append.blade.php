@forelse ($marketPlaces as $marketPlace)

    <div class="col-md-6 col-lg-4">
        <div class="card marketplace--card rounded-3">
            
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="position-relative z-0">
                            <img src="@if(isset($marketPlace->user->profile_photo_path)) {{ asset('/storage/profile/'.$marketPlace->user->profile_photo_path) }} @else data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAHcAlQMBIgACEQEDEQH/xAAbAAEBAAMBAQEAAAAAAAAAAAAABwQFBgEDAv/EADkQAAEEAQICBgYJBAMAAAAAAAABAgMEBQYRBzESEyEiUWFBcYGRodEXIzJSU5KUscEUcoKjFSQl/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/ALiAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAXsAA5LUPEfSunpXQXsmx9hi7Ohrosrmr4Lty9pooON+j5JOi91+Fv33190+CqoFKBq8HqHE5+v1+HvwW40+11b03Z5OTmntNmi7gegAAAAAAAAAAAAAAAAADxV25kr1vqDMan1K7RGj5lgVif+lfTdEhb6Woqezl2qq7eJSM1dTG4i7fdyrV3y/laq/wT/gNjOq0rNmbHfu5Wy+WWVyd5URVRPj0l9oG90pw405puFvU0Y7Vvbv2rTUe9y+Kb9jfUh0tnHUbMSw2KVeWNU2Vj4mqn7GWAJXqzho7GSO1Dw/e/HZSv31qxu+rnRObUTki+XJfLmdTw71fDq/B/1Ks6m7A7qrcGyp0Hp4b+hfmnoOqXkSfGwt03x2tVK/cqZyn16xtTZOsTvKvva9f8gKyAAAAAAAAAAAAAAAAAANbqOk7JYDJUWfas1ZIk9atVDi+A+RZc0HDV32mozyQyNVNlTt6SfB3wKKqbke1DDe4Y6ym1Jj6759OZN3/fhjTtheqr2p4dq7ovmqeAFiBrMBnsXqCiy5iLsVmJybr0V7zfJyc0XyU2YBSUukTM8f4kg7zMPj1SVyckcqL2f7ET2KbvX3ESjp2J1HFubfzs3cgqQ99WuXkrtv25qe8LNI2NPY2e/l1WTNZN/XW3Ku6s7d0Zv7VVfNfIDugAAAAAAAAAAAAAAAADHv3K+PpzW7kjYq8DFfJI5exrUTtUDIMO5Pj1bJXuzVei9NnxTPbs5PBUUk8V3VXFS5N/xVuTB6XierEnYipLZ25+fu2RN/Spt6vA/SccW1h+RsyL2rI+dEVfciAY+W4ZaYkuOuaez0mDsO3Vf6S0nQ38k3RU9SLsYq6ByNlOqyHE61LX9LGTbKqeffNx9Cejfwbv6lfkPoT0b+Dd/Ur8gM/SOkNH6Vf19KWvNdVO9bs2Gvk9nob7EQ7SGaKZvSglZI3xY5FT4E8+hPRv4N39SvyMG7waq0XLb0hm8hi77U7quk6TF8l2RF/f1AVUE30HrfJLmZNJ6zhbBnIk+pmTsbaaib7pt2b7JvunPt5KmxSAAAAAAAAAAAAAAATLjrbndhcVg6z1Y7L3mQuVPuoqdnvVpTTX5TCYzLT05sjTjsSUpetrufv9W/xT3J7gP3h8bXxGMrY6nGjK9eJI2Ingnp9a8zNAAAAAeKnkegCX8dMf1GGoamqfV38Tajc2ROasV3L823xKPjbSXsdVttTZJ4WSIn9yIv8AJ88viqOax8lDKVmWKsu3Tjfvsuy7py80MmvDHWgjggYjIo2oxjE5NRE2RAPoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA//Z @endif" alt="Avatar" width="32" height="32" class="rounded-pill object-fit-cover" />
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
                        <a href="javascript:;" class="text-white text-decoration-none fw-semibold" style="padding-left: 10px;"> <small> {{ $marketPlace->user ? $marketPlace->user->name : ''  }}</small></a>
                    </div>
                    <a
                    href="{{ route('marketplaceDetails',['slug'=>Str::slug($marketPlace->title,'-'),'product'=>$marketPlace->id]) }}"
                    class="d-block rounded-3 mb-3 ratio ratio-4x3"
                    style="background-color: #c4c4c4"
                    >
                    @php
                        $slug = Str::slug($marketPlace->title,'-');
                    @endphp
                    <img src="@if($marketPlace->image) {{ asset('/storage/products/thumbnil/'.$marketPlace->image) }} @else https://picsum.photos/200/300 @endif" alt="{{ $slug }}" class="img-fluid w-100 rounded-3 object-fit-cover"/>
                    <span class="bg-dark mx-2 mt-2 text-white text-center opacity-50" style="height: 25px;">{{ $marketPlace->subCategory->category ? $marketPlace->subCategory->category->category_name : '-' }}</span>
                    </a>
                   
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('marketplaceDetails',['slug'=>Str::slug($marketPlace->title,'-'),'product'=>$marketPlace->id]) }}" class="link-light text-decoration-none"><small>{{ Str::limit($marketPlace->title,18) ?? "" }}</small></a>
                            <div class="d-flex justify-content-end mt-1">
                                @if (Auth::id() !== $marketPlace->user_id)
                                    <a href="" class="cart-pic" data-id="{{$marketPlace->id}}"> 
                                        <img src="{{asset('storage/brands/cart.png')}}" alt=""  style="height: auto; width:22px; margin-right: 5px;">
                                    </a>
                                @endif
                                 <a class="text-light btn btn-primary btn-sm px-1"><small>{{'$'.$marketPlace->price }}</small></a>
                                 {{-- <span class="badge rounded text-bg-primary">Primary</span> --}}
                            </div>
                        </div>
                       <div class="d-flex justify-content-strat">
                                <div>
                                    <small class="text-secondary mx-2">{{$marketPlace->subCategory->category_name}}</small>
                                </div>
                            </div>
                    
                </div>
           
        </div>
    </div>
@empty
    <p class="text-light">Nothing Found!</p>
@endforelse

      
