@extends('user.website.includes.master')

@section('title')
    | Sell
@endsection
@section('sell','active')
@section('content')
<main class="flex-shrink-o">
    <section class="hero-home bg-body">
        <div class="container  page-header">
            <div class="row align-items-center">

              <div class="col-sm-12 col-md-6 col-lg-7 col-xl-8">
                <h3 class="text-white fw-bold mb-4">
                  <span class="fw-bolder">
                    Prompt <span class="text-primary bubble-gradient"
                      >Details
                </h1>
                <p class="text-body-secondary fs-5 mb-0">Tell us about the prompt you want to sell
                </p>
                <p class="text-secondary fs-5 ">
                    These details are not final. Our team will make edits if it goes live.
                </p>
                <form action="{{route('sell.subcategory')}}" method="post">
                    @csrf
                   <div class="col-md-12 d-flex flex-column text-white mb-3">
                        <label for="" class="form-label">Prompt Type</label>
                        <i class="text-secondary"><small>Select the type of prompt you want to sell</small></i>
                        <div class="col-md-12">
                            <select name="category_id" class="form-control mt-2 bg-transparent form-select @error('category_id')is-invalid  @enderror" id="">
                                <option class="bg-body" value="" selected>Select category</option>
                                @forelse ($categories  as $category )
                                <option  class="bg-body" value="{{$category->id}}">{{$category->category_name}}</option>
                                @empty
                                  
                                @endforelse
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                   </div>
                   <div class="col-md-12 d-flex flex-column text-white mb-3">
                        <label for="" class="form-label">Title</label>
                        <i class="text-secondary"><small>Suggest a title for this prompt.</small></i>
                        <div>
                            <input type="text" name="title" id="" class="form-control bg-transparent @error('title') is-invalid @enderror" value="{{old('title')}}" placeholder="">
                            @error('title')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                   </div>
                   <div class="col-md-12 d-flex flex-column text-white mb-3">
                        <label for="" class="form-label">Description</label>
                        <i class="text-secondary"><small>Describe what your prompt does to a potential buyer. A more detailed description will increase your sales.</small></i>
                        <div>
                          <textarea name="description" id="" cols="10" rows="5" class="form-control bg-transparent  @error('description') is-invalid @enderror">{{old('description')}}</textarea>
                            @error('description')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                   </div>
                   <div class="col-md-12 d-flex flex-column text-white mb-3">
                        <label for="" class="form-label">Estimeted Price</label>
                        <i class="text-secondary"><small class="">What do you think the price of this prompt should be?</small></i>
                        <div class="col-md-12">
                          <input type="number" name="price" class="form-control bg-body @error('price') is-invalid  @enderror" placeholder="Enter your price" step="any" min="1">
                          @error('price')
                              <small class="text-danger">{{$message}}</small>
                          @enderror
                      </div>
                   </div>

                   <div
                  class="d-flex align-items-center gap-4 gap-xl-5 pt-4 mt-4 pt-xxl-5 mt-xl-5"
                >
                  <button type="submit" class="btn btn-primary">
                      Next
                    <i class="fa-solid fa-arrow-right-long"></i>
                  </button>
                  {{-- <a href="#" class="link-light"> Sell a prompt </a> --}}
                </div>
                  </form>
                
              </div>

              
              
            </div>
          </div>
    </section>
</main>
@endsection