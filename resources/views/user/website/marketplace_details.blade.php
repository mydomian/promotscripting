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
          Details
          <span class="fw-semibold text-primary">Marketplace</span>
        </h2>
        <p class="text-white text-center mb-0">
          Show in details of the prompt
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
                    <li class="list-inline-item"><small>Tested @if($product->is_tested == 'yes') <i class="fa fa-check-circle"></i> @else <i class="fa fa-times-circle"></i> @endif</small></li>
                    <li class="list-inline-item"><small>Tips @if($product->is_tips == 'yes') <i class="fa fa-check-circle"></i> @else <i class="fa fa-times-circle"></i> @endif</small></li>
                    <li class="list-inline-item"><small>HQ Images @if($product->is_hq_images == 'yes') <i class="fa fa-check-circle"></i> @else <i class="fa fa-times-circle"></i> @endif</small></li>
                    <li class="list-inline-item"><small><i class="fa fa-eye"></i> {{ $product->views }}</small></li>
                    <li class="list-inline-item"><small><i class="fa fa-heart"></i> {{ $product->favourites }}</small></li>
                </ul>
                <hr>
                <p style="text-align: justify;"><small >{{ $product->preview_input }}</small></p>
                <p style="text-align: justify;"><small >{{ $product->description }}</small></p>
                <h4><i class="fa fa-dollar" style="font-size:15px"></i>{{ $product->price }}</h4>
                <a href="" class="btn btn-md btn-outline-primary">Get Promot</a>
                <p style="text-align: justify; margin-top:10px;"><small >{{ $product->instructions}}</small></p>
                <p style="text-align: justify;"><small >By purchasing this prompt, you agree to our <a href="#">terms of service.</a></small></p>
                <h6>{{ $product->created_at->diffForHumans() }}</h6>
            </div>

            <div class="col-md-6 col-sm-12">
               
                @if ($product->subSubCategory->subCategory->category->id == 1)
                    <div class="d-flex justify-content-center" style="height:1000px;">
                        <div class="col-sm-4">dfrerftret</div>
                        <div class="col-sm-4">esdfregr</div>
                        <div class="col-sm-4">edfregtg</div>
                    </div>
                @elseif($product->subSubCategory->subCategory->category->id == 5)
                
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
                            No images found
                        @endforelse
                    </div>
                    <p style="text-align: justify;"><small >Puzzle effect is a watermark and not part of the image.</small></p>

                @endif
            </div>
        </div>
        </div>
    </section>


    <section class="profile-details mt-5 text-white">
        <div class="container">
            
            <div class="row">
                <div class="col-sm-12 p-0 m-0 gap-0">
                    <div class="search-profiles section text-white">
                        <div class="container-fluid">
                          <h6>More from @ {{ strstr($product->user->name, ' ', true) ?? "" }}</h6>
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
                            <h6>More from @ {{ strstr($product->user->name, ' ', true) ?? "" }}</h6>
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
                            <h6>More from @ {{ strstr($product->user->name, ' ', true) ?? "" }}</h6>
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
                </div>
                
            </div>
        </div>
    </section>





  </main>
@endsection
@push('scripts')
 <script>
    $(document).ready(function () {
        // document.oncontextmenu = function() {return false;};
        // $('body').mousedown(function(e) { return false;});
        // $('body').mouseup(function(e) { return false;});
        // $('body').keyup(function(e) { return false;});
        // $('body').keydown(function(e) { return false;});
    });
 </script>
@endpush