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
        <p class="text-white text-center mb-0">
          Show details of the prompt
        </p>
      </div>
    </section>
    <!-- Hero Marketplace -->

    <section class="profile-details mt-5 text-white">
        <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <a href="javascript:;" class="d-block mb-3 ratio ratio-4x3">
                    @php
                        $slug = Str::slug($product->title,'-');
                    @endphp
                    <img  src="@if($product->image) {{ asset('/storage/products/thumbnil/'.$product->image) }} @else https://picsum.photos/200/300 @endif" alt="{{ $slug }}" class="img-fluid w-100 rounded-2 object-fit-fill"/>
                    <span class="bg-dark  mt-4 py-2 text-white text-center opacity-50" style="height:auto">{{ $product->subSubCategory->subCategory->category ? $product->subSubCategory->subCategory->category->category_name : $product->subSubCategory->category_name }}</span>
                </a>
                <h4>{{ $product->title ?? "" }}</h4>
                <ul class="list-inline">
                    <li class="list-inline-item"><small>@ {{ strstr($product->user->name, ' ', true) ?? "" }}</small></li>
                    <li class="list-inline-item"><small>{{ $product->words }} Words</small></li>
                    <li class="list-inline-item"><small>Tested @if($product->is_tested == 'yes') <i class="fa fa-check-circle text-primary"></i> @else <i class="fa fa-times-circle text-danger"></i> @endif</small></li>
                    <li class="list-inline-item"><small>Tips @if($product->is_tips == 'yes') <i class="fa fa-check-circle text-primary"></i> @else <i class="fa fa-times-circle text-danger"></i> @endif</small></li>
                    <li class="list-inline-item"><small>HQ Images @if($product->is_hq_images == 'yes') <i class="fa fa-check-circle text-primary"></i> @else <i class="fa fa-times-circle text-danger"></i> @endif</small></li>
                    <li class="list-inline-item"><small><i class="fa fa-eye text-primary"></i> {{ ProductViews($product->id) }}</small></li>
                
                   
                    <li class="list-inline-item" style="cursor: pointer"><small><i class="user-favourite fa fa-heart @if(userFav($product->id,userLocalIp())) > 0) text-danger @endif" productId="{{ $product->id }}"></i> {{ totalFav($product->id) }}</small></li>
               
                </ul>
                <hr>
                <p style="text-align: justify;"><small >{{ $product->preview_input }}</small></p>
                <p style="text-align: justify;"><small >{{ $product->description }}</small></p>
                <h4 class="fw-bolder"><i class="fa fa-dollar" style="font-size:15px"></i>{{ $product->price }}</h4>
                @if(Auth::id() !== $product->user_id)
                    <a href="{{route('get.prompt',encrypt($product->id))}}" class="btn btn-md btn-outline-primary">Get Prompt</a>
                    <a href="" id="add_cart" data-id="{{$product->id}}" class="btn btn-md btn-primary mx-2 text-light"><i class="fa-solid fa-cart-shopping fa-beat-fade" style="color: #ffffff;"></i> Add To Cart</a>
                @endif
                <p style="text-align: justify; margin-top:10px;"><small >{{ $product->instructions}}</small></p>
                <p style="text-align: justify;"><small >By purchasing this prompt, you agree to our <a href="#">terms of service.</a></small></p>
                <h6>{{ $product->created_at->diffForHumans() }}</h6>
               
                {{-- @if ($product->user_id == Auth::id())
                     <a href="{{route('delete.prompt',encrypt($product->id))}}" class="btn btn-outline-secondary">Delete Prompt</a>
                @endif --}}
                
            </div>

            <div class="col-md-6 col-sm-12">
               
                @if ($product->subSubCategory->subCategory->category->id == 1)
                    <div class="row gap-0 chatGpt rounded-2" style="overflow:auto">
                        <div class="col-12 m-0 p-4 border border-secondary">
                            <h5>Prompt Details</h5>
                            <strong>Category:</strong><br>
                            <small> {{ $product->subSubCategory->subCategory->category->category_name ?? "" }}</small> <br><br>
                            <strong>Subcategory:</strong><br>
                            <small > {{ $product->subSubCategory->subCategory->category_name ?? "" }}</small><br><br>
                            <strong>Sub Subcategory:</strong><br>
                            <small > {{ $product->subSubCategory->category_name ?? "" }}</small><br><br>
                            <strong>Prompt Testing:</strong><br>
                            <small > {{ $product->prompt_testing ?? "" }}</small><br><br>
                            <strong>Preview Input:</strong><br>
                            <small > {{ $product->preview_input ?? "" }}</small><br><br>
                            <strong>Preview Output:</strong><br>
                            <small > {{ $product->preview_output ?? "" }}</small><br><br>

                        </div>
                    </div>
                {{-- @elseif($product->subSubCategory->subCategory->category->id == 5)
                
                    <div class="row gap-0 midJourney" style="height:1000px; overflow:auto">
                        @forelse ($images = $product->productImages as $image)
                            <div class="col-4 d-flex justify-content m-0 p-0">
                                <img class="img-fluid w-100 object-fit-fill"  src="@if(isset($image->images)) {{ asset('/storage/products/'.$image->images) }} @else https://img.freepik.com/free-vector/white-blurred-background_1034-249.jpg @endif" alt="mid-journey">
                            </div>
                        @empty
                            No images found
                        @endforelse
                        @forelse ($images = $product->productImages as $image)
                            <div class="col-12 m-0 p-0">
                                <img class="img-fluid object-fit-fill" style="width:100%; height:300px;"  src="@if(isset($image->images)) {{ asset('/storage/products/'.$image->images) }} @else https://img.freepik.com/free-vector/white-blurred-background_1034-249.jpg @endif" alt="mid-journey">
                            </div>
                        @empty
                        @endforelse
                    </div>
                    <p style="text-align: justify;"><small >Puzzle effect is a watermark and not part of the image.</small></p>
                    <p style="text-align: justify;"><small >{{ $product->midjourney_text ?? "" }}</small></p>
                    <a href="#" style="text-align: justify;"><small >{{ $product->midjourney_profile ?? "" }}</small></a> --}}
                @endif
            </div>
        </div>
        </div>
    </section>


    <div class="profile-details  text-white">
        <div class="container">
            
            <div class="row">
                <div class="col-sm-12 p-0 m-0 gap-0">
                    <div class="search-profiles text-white">
                        <div class="container-fluid">
                          <h6 class="text-primary">More from  <a class="btn btn-primary btn-sm px-3 py-1 text-light">{{'@'. strstr($product->user->name, ' ', true) ?? "" }}</a></h6>
                          <div class="search-profiles-slider">
                            @if (Auth::check())
                                @php
                                    $marketPlaces = App\Models\Product::where('user_id',Auth::user()->id)->where('status','active')->get();
                                @endphp
                                @forelse ($marketPlaces as $marketPlace)
                                    <div class="slick-slide gpa-0">
                                        <a href="{{ route('marketplaceDetails',['slug'=>Str::slug($marketPlace->title,'-'),'product'=>$marketPlace->id]) }}" class="card search-profile--card ">
                                            <div class="card-body bg-image" style="background-color: #c4c4c4; background-image: url('@if(isset($marketPlace->image)) {{ asset('/storage/products/thumbnil/'.$marketPlace->image)}} @endif');">
                                            <div class="bg-holder"></div>
                                            <h4 class="h2 text-white">{{ Str::limit($marketPlace->title,25) ?? "" }}</h4>
                                            <p class="p text-white">{{ $marketPlace->subSubCategory->subCategory->category->category_name ?? "" }}</p>
                                            <p class="fw-medium">${{ $marketPlace->price }}</p>
                                            </div>
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
                                $marketPlaces = App\Models\Product::where('sub_sub_category_id',$product->sub_sub_category_id)->where('status','active')->get();
                            @endphp
                            <h6 class="text-primary">Similar Prompts ({{ $marketPlaces->count() }})</h6>
                            <div class="search-profiles-slider">
                                  @forelse ($marketPlaces as $marketPlace)
                                      <div class="slick-slide gpa-0">
                                          <a href="{{ route('marketplaceDetails',['slug'=>Str::slug($marketPlace->title,'-'),'product'=>$marketPlace->id]) }}" class="card search-profile--card ">
                                              <div class="card-body bg-image" style="background-color: #c4c4c4; background-image: url('@if(isset($marketPlace->image)) {{ asset('/storage/products/thumbnil/'.$marketPlace->image)}} @endif');">
                                              <div class="bg-holder"></div>
                                              <h4 class="h2 text-white">{{ Str::limit($marketPlace->title,25) ?? "" }}</h4>
                                              <p class="p text-white">{{ $marketPlace->subSubCategory->subCategory->category->category_name ?? "" }}</p>
                                              <p class="fw-medium">${{ $marketPlace->price }}</p>
                                              </div>
                                          </a>
                                      </div>
                                  @empty
                                      No data found
                                  @endforelse
                              
                            </div>
                        </div>
                        <div class="container-fluid mt-2">
                            @php
                                $marketPlaces = App\Models\Product::where('status','active')->latest()->limit(15)->get();
                            @endphp
                            <h6 class="text-primary">Latest Prompts ({{ $marketPlaces->count() }})</h6>
                            <div class="search-profiles-slider">
                                  @forelse ($marketPlaces as $marketPlace)
                                      <div class="slick-slide gpa-0">
                                          <a href="{{ route('marketplaceDetails',['slug'=>Str::slug($marketPlace->title,'-'),'product'=>$marketPlace->id]) }}" class="card search-profile--card ">
                                              <div class="card-body bg-image" style="background-color: #c4c4c4; background-image: url('@if(isset($marketPlace->image)) {{ asset('/storage/products/thumbnil/'.$marketPlace->image)}} @endif');">
                                              <div class="bg-holder"></div>
                                              <h4 class="h2 text-white">{{ Str::limit($marketPlace->title,25) ?? "" }}</h4>
                                              <p class="p text-white">{{ $marketPlace->subSubCategory->subCategory->category->category_name ?? "" }}</p>
                                              <p class="fw-medium">${{ $marketPlace->price }}</p>
                                              </div>
                                          </a>
                                      </div>
                                  @empty
                                      No data found
                                  @endforelse
                              
                            </div>
                        </div>
                      </div>
                      <div class="col-sm-4 d-flex justify-content-center m-auto">
                        <a href="{{ route('marketplace') }}" class="btn btn-lg btn-outline-primary ">Browse Marketplace</a>
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
    $(document).ready(function () {

        $( ".user-favourite" ).click(function() {

            var productId = $(this).attr('productId');
            var type = $(this).hasClass('text-danger');
            var url = "{{ route('userFavourite','') }}"+"/"+productId+"/"+type;

            if(type === true){
                
                var text = "Do you want to unfavourite this prompt!";
                var confirmButtonText = "Yes, Unfavourite it!";
            }else{
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
                    window.location.href=url
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
    $(document).ready(function(){
        $('#add_cart').on('click', function(e){
            e.preventDefault();
            const product_id = $(this).attr('data-id')
           
        })
    })
 </script>
@endpush