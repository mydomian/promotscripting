@extends('user.website.includes.master')

@section('title')
    Public Profile
@endsection
@section('profile', 'active')
@push('css')
@endpush

@section('content')
    <main class="flex-shrink-0 bg-body">
        <!-- Hero Marketplace -->
        <section class="hero-marketplace" style="margin-top:4.7rem">
            <div class="bg-holder bg-black bg-opacity-25"></div>
            <div class="container">
                <div class="row">

                    <div class="col-sm-12">
                        <img src="https://picsum.photos/200" id="profile-cover" class="img-fluid  w-100 position-relative rounded"
                            style="z-index: -1; height:250px">

                        <div style="margin-top:-90px; margin-left:5px; z-index: 1 ">
                            <img src="@if (isset($user->profile_photo_path)) {{ asset('/storage/profile/' . $user->profile_photo_path) }} @else https://picsum.photos/200 @endif"
                                class="img-fluid object-fit-fill rounded-circle" style="width: 160px; height:160px">
                        </div>
                        <div class=" mt-3 d-flex justify-content-between">
                            
                           <div class="text-white">
                            <strong>{{ strtolower('@'.strstr($user->name . ' ', ' ', true)) }}</strong>
                            <img src="{{ $countryFlagUrl }}" class="mx-1" alt="HappyFace" width="32px" height="32px">
                           </div>
<div class="d-flex gap-3">
                        @php
                            $rating = App\Models\Rating::where(['from_id'=>Auth::id(),'to_id'=>$user->id])->first();
                            $ratingSum = App\Models\Rating::where('to_id',$user->id)->sum('rating') ;
                            $ratingCount = App\Models\Rating::where('to_id',$user->id)->count();
            
                            if ($ratingCount != 0) {
                                $ratingAvg = rand($ratingSum / $ratingCount,2);
                            }else{
                              $ratingAvg = 0;
                            }
                        @endphp
                        @if (isset($rating))
                          <div>
                            <?php $count = 1; while ($count <= $rating->rating) { ?>
                              <span class="star fa fa-star checked" data-id="{{ $user->id }}" value="{{ $rating->rating }}"></span>
                            <?php $count ++; } ?>
                          </div> ({{$ratingAvg }})
                        @else
                          <div class="rating" userId="{{ $user->id }}">
                            <span class="star fa fa-star" data-id="{{ $user->id }}" value="1"></span>
                            <span class="star fa fa-star" data-id="{{ $user->id }}" value="2"></span>
                            <span class="star fa fa-star" data-id="{{ $user->id }}" value="3"></span>
                            <span class="star fa fa-star" data-id="{{ $user->id }}" value="4"></span>
                            <span class="star fa fa-star" data-id="{{ $user->id }}" value="5"></span>
                          </div> ({{ $ratingAvg }})
                        @endif
                      </div>
                            <div>
                                @auth
                                    <a href="{{ route('user.profile', ['user' => Auth::user()->id]) }}"
                                        class="btn btn-primary btn-sm text-light">Edit Profile</a>
                                @endauth
                                <a href="@if (Auth::check()) {{ url('promptscripting-chat', $user->id) }} @else {{ route('user.login') }} @endif"
                                    class="btn btn-sm btn-primary text-light">Message</a>
                                <a href="{{ route('person.favourite', ['person' => $user->id]) }}" 
                                    data-id="{{ $user->id }}" class="btn btn-secondary btn-sm text-light">
                                    <i class=" {{ checkFavouriteUser($user->id) ? 'fa-solid' : 'fa-regular' }} fa-heart  fs-5"
                                        style="color: #b42020;"></i>
                                </a>
                            </div>
                        </div>

                        <div class="text-white">
                            <small>Is artificial intelligence less than our intelligence?</small>
                            <div class="d-flex d-inline">
                                <small><i class="fa fa-eye text-primary"></i> {{ userAllProductView($user->id) }}
                                    &nbsp;&nbsp;&nbsp;</small>
                                <small><i class="fa fa-heart text-primary"></i> {{ userAllProductFav($user->id) }}
                                    &nbsp;&nbsp;&nbsp;</small>
                                <small><i class="fa fa-tags text-primary"></i> {{ totalPromptSell($user->id) }}
                                    &nbsp;&nbsp;&nbsp;</small>
                                <small>Joined: {{ $user->created_at->format('d M Y') }}</small>
                            </div>
                            <small>@ {{ strstr($user->name . ' ', ' ', true) }} Charges $49.99 custom prompt</small>
                            <div class=" mt-2">
                                @foreach (userPromotCategoriesWise($user->id) as $item)
                                    <small
                                        class="badge rounded-pill bg-primary mr-1">{{ $item->subCategory->category->category_name }}</small>
                                @endforeach
                            </div>
                        </div>
                        <hr class="text-primary">
                        <div class="search-profiles section text-white append-profile-prompt-data">
                            <div class="container-fluid">
                                @php
                                    $userCategoryWisePrompts = App\Models\Product::where(['status' => 'active', 'user_id' => $user->id])
                                        ->get()
                                        ->unique('is_type');
                                @endphp
                                @forelse ($userCategoryWisePrompts as $item)
                                    <h6 class="text-primary mt-3">{{ $item->subCategory->category->category_name }}</h6>
                                    <div class="search-profiles-slider">
                                        @forelse (userPromotSubCategoryWise($user->id, $item->sub_category_id) as $prompt)
                                            <div class="slick-slide gpa-0">
                                                <a href="{{ route('marketplaceDetails', ['slug' => Str::slug($prompt->title, '-'), 'product' => $prompt->id]) }}"
                                                    class="card search-profile--card ">
                                                    <div class="card-body bg-image"
                                                        style="background-color: #c4c4c4; background-image: url('@if (isset($prompt->image)) {{ asset('/storage/products/thumbnil/' . $prompt->image) }} @endif');">
                                                        <div class="bg-holder"></div>

                                                    </div>
                                                    <h6 class="h6 text-white mt-2 mb-1">
                                                        {{ Str::limit($prompt->title, 25) ?? '' }}</h6>
                                                    <p class="fw-medium mb-1 text-white">${{ $prompt->price }}</p>
                                                </a>
                                            </div>
                                        @empty
                                            No data found
                                        @endforelse
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            </div>
        </section>
        <!-- Hero Marketplace -->



    </main>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".star").on('click',function () {
                var userId = $(this).data('id');
                var value = $(this).attr('value');
               
                $.ajax({
                  url:"{{ route('user.rating') }}",
                  method:"post",
                  data:{userId:userId,value:value},
                  success:function (response) {
                    if(response.status == 'added'){
                      Swal.fire({
                          title: response.title,
                          icon: 'success',
                        }).then((result) => {
                          if (result.isConfirmed) {
                            location.reload(true);
                          }
                        })
                    }
                    if(response.status == 'exits'){
                      Swal.fire({
                          title: response.title,
                          icon: 'warning',
                        }).then((result) => {
                          if (result.isConfirmed) {
                          }
                        })
                      
                    }
                  },
                  error: function(error) {
                     console.log((error));
                  }
                });
            });
</script>
@endpush