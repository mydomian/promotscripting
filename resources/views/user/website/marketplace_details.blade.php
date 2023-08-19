@extends('user.website.includes.master')
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
                <h2 class="text-center text-capitalize text-white mb-1">
                    Prompt
                    <span class="fw-semibold text-primary">Details</span>
                </h2>
                {{-- <p class="text-white text-center mb-0">
          Show details of the prompt
        </p> --}}
            </div>
        </section>
        <!-- Hero Marketplace -->

        <section class="profile-details mt-5 text-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <a href="javascript:;" class="d-block mb-3 ratio ratio-4x3">
                            @php
                                $slug = Str::slug($product->title, '-');
                            @endphp
                            <img src="@if ($product->image) {{ asset('/storage/products/thumbnil/' . $product->image) }} @else https://picsum.photos/200/300 @endif"
                                alt="{{ $slug }}" class="img-fluid w-100 rounded-2 object-fit-fill" />
                              
                            <span class="bg-dark  mt-4 py-2 text-white text-center opacity-50"
                                style="height:auto">{{ $product->subCategory->category ? $product->subCategory->category->category_name : '-' }}</span>
                        </a>
                        <h4>{{ $product->title ?? '' }}</h4>

                        <ul class="list-inline">
                            <li class="list-inline-item"><small>@
                                    {{ strstr($product->user->name, ' ', true) ?? '' }}</small></li>
                            <li class="list-inline-item"><small>{{ $product->words }} Words</small></li>
                            <li class="list-inline-item"><small>Tested @if ($product->is_tested == 'yes')
                                        <i class="fa fa-check-circle text-primary"></i>
                                    @else
                                        <i class="fa fa-times-circle text-danger"></i>
                                    @endif
                                </small>
                            </li>
                            <li class="list-inline-item"><small>Tips @if ($product->is_tips == 'yes')
                                        <i class="fa fa-check-circle text-primary"></i>
                                    @else
                                        <i class="fa fa-times-circle text-danger"></i>
                                    @endif
                                </small>
                            </li>
                            <li class="list-inline-item"><small>HQ Images @if ($product->is_hq_images == 'yes')
                                        <i class="fa fa-check-circle text-primary"></i>
                                    @else
                                        <i class="fa fa-times-circle text-danger"></i>
                                    @endif
                                </small></li>
                            <li class="list-inline-item"><small><i class="fa fa-eye text-primary"></i>
                                    {{ ProductViews($product->id) }}</small></li>


                            <li class="list-inline-item" style="cursor: pointer"><small><i
                                        class="user-favourite fa fa-heart @if (userFav($product->id, userLocalIp())) > 0) text-danger @endif"
                                        productId="{{ $product->id }}"></i> {{ totalFav($product->id) }}</small></li>

                        </ul>
                        <div class="" >     
                            @foreach ($product->tags as $tag)
                                <a href="{{route('tag.filter',$tag->tag)}}" class="text-decoration-none">
                                    <span class="badge bg-primary p-2 mb-1" data-id="{{$tag->id}}">{{'#'.$tag->tag}}</span>
                                </a>
                            @endforeach            
                                
                        </div>
                        <hr>
                        <p style="text-align: justify;"><small>{{ $product->preview_input }}</small></p>
                        <p style="text-align: justify;"><small>{{ $product->description }}</small></p>
                        <a href="{{ route('get.prompt', encrypt($product->id)) }}" class="btn btn-primary mb-3 text-light"><i class="fa fa-dollar" style="font-size:15px"></i>{{ $product->price }}</a>
                        <br>
                        @if (checkPurchaseOrder($product->id))
                            <a href="{{ route('user.fileDawonload', $product->id) }}"
                                class="btn btn-outline-success btn-sm">Download Files</a>
                        @else
                            @if (Auth::id() !== $product->user_id)
                                <a href="{{ route('get.prompt', encrypt($product->id)) }}"
                                    class="btn btn-md btn-outline-primary">Get Prompt</a>
                                @if (!checkCart($product->id))
                                    <a href="" id="add_cart" data-id="{{ $product->id }}"
                                        class="btn btn-md btn-primary mx-2 text-light"><i
                                            class="fa-solid fa-cart-shopping fa-beat-fade" style="color: #ffffff;"></i> Add
                                        To Cart</a>
                                @else
                                    <a href="{{ route('cart.list') }}" class="btn btn-secondary mx-2 text-light incart">In
                                        Your Cart</a>
                                @endif
                                <a href="{{ route('cart.list') }}"
                                    class="btn btn-secondary mx-2 text-light incart hide">Now, in your cart</a>
                            @endif
                        @endif

                        <p style="text-align: justify; margin-top:10px;"><small>{{ $product->instructions }}</small></p>
                        <p style="text-align: justify;"><small>By purchasing this prompt, you agree to our <a
                                    href="{{route('terms')}}" target="blank">terms of service.</a></small></p>
                        <h6>{{ $product->created_at->diffForHumans() }}</h6>

                    </div>

                    <div class="col-md-6 col-sm-12 mb-3">

                        @if ($product->subCategory->category->id == 1)
                            <div class="row gap-0 chatGpt rounded-2" style="overflow:auto">
                                <div class="col-12 m-0 p-4 border border-secondary">
                                    <h5>Prompt Details</h5>
                                    {{-- <strong>Category:</strong><br> --}}
                                    <small>
                                        {{ $product->subCategory->category->category_name ?? '' }}</small>
                                    <br><br>
                                    {{-- <strong>Subcategory:</strong><br> --}}
                                    <small>
                                        {{ $product->subCategory->category_name ?? '' }}</small><br><br>
                                    {{-- <strong>Prompt Testing:</strong><br> --}}
                                    <small> {{ $product->prompt_testing ?? '' }}</small><br><br>
                                    {{-- <strong>Preview Input:</strong><br> --}}
                                    <small> {{ $product->preview_input ?? '' }}</small><br><br>
                                    {{-- <strong>Preview Output:</strong><br> --}}
                                    <small> {{ $product->preview_output ?? '' }}</small><br><br>

                                </div>
                            </div>
                        @elseif(
                            $product->subCategory->category->id == 5 ||
                                $product->subCategory->category->id == 6 ||
                                $product->subCategory->category->id == 7 ||
                                $product->subCategory->category->id == 8)
                            <div class="row gap-0 chatGpt rounded-2" style="overflow:auto">
                                <div class="col-12 m-0 p-4 border border-secondary">
                                    <h5>Prompt Details</h5>
                                    {{-- <strong>Category:</strong><br> --}}
                                    <small>
                                        {{ $product->subCategory->category->category_name ?? '' }}</small>
                                    <br><br>
                                    {{-- <strong>Subcategory:</strong><br> --}}
                                    <small>
                                        {{ $product->subCategory->category_name ?? '' }}</small><br><br>
                                    @if ($product->midjourney_profile)
                                        {{-- <strong>Profile Link:</strong><br> --}}
                                        <small> {{ $product->midjourney_profile ?? '' }}</small><br><br>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>


        <div class="profile-details  text-white">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12 p-0 m-0 gap-0">
                        <div class="search-profiles text-white mb-5">
                            <div class="container-fluid">
                                <h6 class="text-primary">More from <a
                                        class="btn btn-primary btn-sm px-3 py-1 text-light">{{ '@' . strstr($product->user->name, ' ', true) ?? '' }}</a>
                                </h6>
                                <div class="search-profiles-slider">
                                    @if (Auth::check())
                                        @php
                                            $marketPlaces = App\Models\Product::where('user_id', Auth::user()->id)
                                                ->where('status', 'active')
                                                ->get();
                                        @endphp
                                        @forelse ($marketPlaces as $marketPlace)
                                            <div class="slick-slide gpa-0">
                                                <a href="{{ route('marketplaceDetails', ['slug' => Str::slug($marketPlace->title, '-'), 'product' => $marketPlace->id]) }}"
                                                    class="card search-profile--card ">
                                                    <div class="card-body bg-image"
                                                        style="background-color: #c4c4c4; background-image: url('@if (isset($marketPlace->image)) {{ asset('/storage/products/thumbnil/' . $marketPlace->image) }} @endif');">
                                                        <div class="bg-holder"></div>

                                                    </div>
                                                    <h6 class="h6 text-white mt-2 mb-1">
                                                        {{ Str::limit($marketPlace->title, 25) ?? '' }}</h6>
                                                    <p class="fw-medium mb-1 text-white">${{ $marketPlace->price }}</p>
                                                </a>

                                            </div>
                                        @empty
                                            No data found
                                        @endforelse
                                    @else
                                        No data found
                                    @endif


                                </div>
                            </div>

                            <div class="container-fluid mt-2">
                                @php
                                    $marketPlaces = App\Models\Product::where('sub_category_id', $product->sub_category_id)
                                        ->where('status', 'active')
                                        ->get();
                                @endphp
                                <h6 class="text-primary">Similar Prompts ({{ $marketPlaces->count() }})</h6>
                                <div class="search-profiles-slider">
                                    @forelse ($marketPlaces as $marketPlace)
                                        <div class="slick-slide gpa-0">
                                            <a href="{{ route('marketplaceDetails', ['slug' => Str::slug($marketPlace->title, '-'), 'product' => $marketPlace->id]) }}"
                                                class="card search-profile--card ">
                                                <div class="card-body bg-image"
                                                    style="background-color: #c4c4c4; background-image: url('@if (isset($marketPlace->image)) {{ asset('/storage/products/thumbnil/' . $marketPlace->image) }} @endif');">
                                                    <div class="bg-holder"></div>

                                                </div>
                                                <h6 class="h6 text-white mt-2 mb-1">
                                                    {{ Str::limit($marketPlace->title, 25) ?? '' }}</h6>
                                                <p class="fw-medium mb-1 text-white">${{ $marketPlace->price }}</p>
                                            </a>
                                        </div>
                                    @empty
                                        No data found
                                    @endforelse

                                </div>
                            </div>
                            <div class="container-fluid mt-2">
                                @php
                                    $marketPlaces = App\Models\Product::where('status', 'active')
                                        ->latest()
                                        ->limit(15)
                                        ->get();
                                @endphp
                                <h6 class="text-primary">Latest Prompts ({{ $marketPlaces->count() }})</h6>
                                <div class="search-profiles-slider">
                                    @forelse ($marketPlaces as $marketPlace)
                                        <div class="slick-slide gpa-0">
                                            <a href="{{ route('marketplaceDetails', ['slug' => Str::slug($marketPlace->title, '-'), 'product' => $marketPlace->id]) }}"
                                                class="card search-profile--card ">
                                                <div class="card-body bg-image"
                                                    style="background-color: #c4c4c4; background-image: url('@if (isset($marketPlace->image)) {{ asset('/storage/products/thumbnil/' . $marketPlace->image) }} @endif');">
                                                    <div class="bg-holder"></div>
                                                </div>
                                                <h6 class="h6 text-white mt-2 mb-1">
                                                    {{ Str::limit($marketPlace->title, 25) ?? '' }}</h6>
                                                <p class="fw-medium mb-1 text-white">${{ $marketPlace->price }}</p>
                                            </a>

                                        </div>
                                    @empty
                                        No data found
                                    @endforelse

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 d-flex justify-content-center my-5">
                            <a href="{{ route('marketplace') }}" class="btn btn-lg btn-outline-primary ">Browse
                                Marketplace</a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {

            $(".user-favourite").click(function() {

                var productId = $(this).attr('productId');
                var type = $(this).hasClass('text-danger');
                var url = "{{ route('userFavourite', '') }}" + "/" + productId + "/" + type;

                if (type === true) {

                    var text = "Do you want to unfavourite this prompt!";
                    var confirmButtonText = "Yes, Unfavourite it!";
                } else {
                    var text = "Do you want to favourite this prompt!";
                    var confirmButtonText = "Yes, Favourite it!";
                }

                Swal.fire({
                    title: 'Are you sure?',
                    text: text,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: confirmButtonText
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url
                    }
                })

            });


            // document.oncontextmenu = function() {return false;};
            // $('body').mousedown(function(e) { return false;});
            // $('body').mouseup(function(e) { return false;});
            // $('body').keyup(function(e) { return false;});
            // $('body').keydown(function(e) { return false;});
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#add_cart').on('click', function(e) {
                e.preventDefault();

                var product_id = $(this).attr('data-id')

                $.ajax({
                    url: "{{ route('add.cart') }}",
                    method: "get",
                    data: {
                        product_id: product_id
                    },
                    success: function(res) {
                        if (res.success == true) {
                            $('.cart_count').text(res.total)
                            console.log(res.total)
                            if(res.total > 0){
                                $(".cart_count").removeClass('d-none')
                            }
                            $('#add_cart').prop('disabled', true)
                            $('#add_cart').addClass('hide')
                            $('.incart').removeClass('hide')

                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                showCloseButton: true,
                                timer: 3000,
                                timerProgressBar: true,
                            });

                            Toast.fire({
                                icon: 'success',
                                title: 'Successfully added to Cart!',
                                text: "Total " + res.total + " items in cart.",
                                showCloseButton: true
                            })

                        }
                        if (res.success == false) {
                            $('#add_cart').addClass('hide')
                            $('.incart').removeClass('hide')
                            $('.incart').text(res.message)
                        }
                    }
                })
            })
        })
    </script>
    <script>
        $(document).ready(function(){
           $('.tagFilter').on('click', function(e){
                 e.preventDefault()
                var tag_id = $(this).attr('data-id')
                var tag_name = $(this).text()
                $.ajax({
                    url:"{{ route('marketplace') }}",
                    method:"post",
                    data:{
                        tag_id:tag_id,
                        tag_name:tag_name,
                        filterType:'tagFilter'},
                    success:function (response) {
                        // window.location.href = "/marketplace";
                      $(".marketplace_append_data").html("");
                      $(".marketplace_append_data").html(response);
                     
                    },
                    error: function(error) {
                       console.log((error));
                    }
                  });
           })
        })
    </script>
@endpush