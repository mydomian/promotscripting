@extends('user.website.includes.master')
@section('title')
   Prompt Edit
@endsection
@section('content')
<main class="flex-shrink-0 bg-body">
    <!-- Hero Marketplace -->
    <section class="hero-marketplace page-header">
      <div class="bg-holder bg-black bg-opacity-25"></div>
      <!--// bg-holder  -->
      <div class="container">
        <h2 class="text-center text-capitalize text-white mb-1">
          prompt
          <span class="fw-semibold text-primary">Edit</span>
        </h2>
      </div>
    </section>
    <!-- Hero Marketplace -->

    <section class="profile-details mt-5 text-white">
        <div class="container">
            <form action="{{ route('user.promptsEdit',['product'=>$prompt->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row" style="background: linear-gradient(to right, #485563, #29323c);">
                    <div class="col-sm-12 col-md-6  d-flex h-100">
                        <div class="w-100 p-5 m-0" >
                            <div>
                                <input
                                type="file"
                                name="image"
                                id="image"
                                hidden
                                class="d-none"
                                />
                                <label
                                for="image"
                                class="form-label custom-file-upload-box"
                                style="background: linear-gradient(to right, #5b6c7d, #3a4450);"
                                
                                >
                                <svg
                                    class="ps-icon"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                    d="M1.10132 18.6662H6.66665V23.9995H17.3333V18.6662H22.8987L12 5.9502L1.10132 18.6662ZM14.6667 15.9995V21.3329H9.33332V15.9995H6.89865L12 10.0489L17.1013 15.9995H14.6667Z"
                                    fill="#9AC6B7"
                                    />
                                    <path
                                    d="M0 0V8H2.66667V2.66667H21.3333V8H24V0H0Z"
                                    fill="#9AC6B7"
                                    />
                                </svg>
                                <span class="text-body-tertiary d-block">
                                    Profile Photo
                                </span>
                                <span class="text-body-tertiary d-block"> or </span>
                                <span class="d-block"> Drop or Browse file </span>
                                </label>
                            </div>
                            <small class="form-label">Title</small>
                            <input type="text" name="title" value="{{$prompt->title}}" class="form-control opacity-50 input-sm bg-body  @error('title') is-invalid @enderror" placeholder="Enter Title...">
                            <small class="form-label">Description</small>
                            <textarea name="description" class="form-control bg-body opacity-50 w-100 mt-2 @error('description') is-invalid @enderror" placeholder="Enter Your Description">{{ $prompt->description }}</textarea>
                            <small class="form-label">Price</small>
                            <input type="number" name="price" value="{{$prompt->price}}" class="form-control opacity-50 input-sm bg-body  @error('price') is-invalid @enderror" placeholder="Enter Price..." step="any">
                            <small class="form-label">Category</small>
                            <select name="category_id" class="form-control bg-body opacity-50">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if($category->id == $prompt->subSubCategory->subCategory->category->id) selected @endif disabled>{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            <small class="form-label">Subcategory</small>
                            <select name="sub_category_id" class="form-control bg-body opacity-50">
                                @foreach ($subCategories as $subCategory)
                                    <option value="{{ $subCategory->id }}" @if($subCategory->id == $prompt->subSubCategory->subCategory->id) selected @endif disabled>{{ $subCategory->category_name }}</option>
                                @endforeach
                            </select>
                            <small class="form-label">Sub Subcategory</small>
                            <select name="sub_sub_category_id" class="form-control bg-body opacity-50">
                                @foreach ($subCategories as $subCategory)
                                    <option disabled>{{ $subCategory->category_name }}</option>
                                    @foreach ($subCategory['subSubCategories'] as $subSubCategory)
                                    <option value="{{ $subSubCategory->id }}" @if($subSubCategory->id == $prompt->sub_sub_category_id) selected @endif>{{ $subSubCategory->category_name }}</option>
                                        
                                    @endforeach
                                @endforeach
                            </select>
                            <small class="form-label">Instruction</small>
                            <textarea name="instructions" class="form-control bg-body opacity-50 w-100 mt-2 @error('instructions') is-invalid @enderror" placeholder="Enter Instructions">{{$prompt->instructions}}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6  d-flex h-100">
                        <div class="w-100 py-5 px-2 m-0" >
                            @if($prompt->subSubCategory->subCategory->category->id == 1)
                                <small class="form-label">Prompt Testing</small>
                                <textarea name="prompt_testing" class="form-control bg-body opacity-50 w-100 mt-2 @error('prompt_testing') is-invalid @enderror" placeholder="Enter Prompt Testing">{{ $prompt->prompt_testing }}</textarea>
                                <small class="form-label">Preview Input</small>
                                <textarea name="preview_input" class="form-control bg-body opacity-50 w-100 mt-2 @error('preview_input') is-invalid @enderror" placeholder="Enter Preview Input">{{$prompt->preview_input}}</textarea>
                                <small class="form-label">Preview Output</small>
                                <textarea name="preview_output" class="form-control bg-body opacity-50 w-100 mt-2 @error('preview_output') is-invalid @enderror" placeholder="Enter Preview Output">{{$prompt->preview_output}}</textarea>
                            @endif
                            
                            
                        
                            @if($prompt->subSubCategory->subCategory->category->id == 5 )
                                <small class="form-label">Mid Journey Text</small>
                                <textarea name="midjourney_text" class="form-control bg-body opacity-50 w-100 mt-2 @error('midjourney_text') is-invalid @enderror" placeholder="Enter Mid Journey Text">{{$prompt->midjourney_text}}</textarea>
                                <small class="form-label">Mid Journey Profile</small>
                                <textarea name="midjourney_profile" class="form-control bg-body opacity-50 w-100 mt-2 @error('midjourney_profile') is-invalid @enderror" placeholder="Enter Mid Journey Profile">{{$prompt->midjourney_profile}}</textarea>
                                <small class="form-label">Images (images*6)</small>
                                <input type="file" name="images[]" class="form-control bg-body opacity-50" accept="image/*" multiple>
                            @endif 


                            @if($prompt->subSubCategory->subCategory->category->id == 6 )
                                <small class="form-label">Model</small>
                                <select name="model_version" class="form-control bg-body opacity-50 @error('model_version') is-invalid @enderror" id="">
                                    <option class="bg-body" value="">Select Your Model</option>
                                    @foreach ($models = model() as $key=>$value)
                                        <option class="bg-body" value="{{ $key }}" @if($prompt->model_version == $key) selected @endif>{{ $value }}</option>
                                    @endforeach
                                    
                                </select>
                                <small class="form-label">Sampler</small>
                                <select name="sampler" class="form-control bg-body opacity-50 @error('sampler') is-invalid @enderror" id="">
                                    <option class="bg-body" value="">Select Your Sampler</option>
                                    @foreach ($samplers = sampler() as $key=>$value)
                                        <option class="bg-body" value="{{ $key }}" @if($prompt->sampler == $key) selected @endif>{{ $value }}</option>
                                    @endforeach
                                </select>
                                <small class="form-label">Image Width</small>
                                <div class="d-flex justify-content-between">
                                    <input type="range" class="col-sm-10 @error('image_width') is-invalid @enderror" id="image_width" name="image_width" value="{{ $prompt->image_width }}" min="512" step="64" max="1024">
                                    <span class="col-md-2 mx-1" id="img_wdth">512px</span>
                                </div>
                                <small class="form-label">Image Height</small>
                                <div class="d-flex justify-content-between">
                                    <input type="range" class="col-md-10 @error('image_height') is-invalid @enderror" id="image_height" name="image_height" min="512" value="{{ $prompt->image_height }}" step="64" max="1024">
                                    <span class="col-md-2 mx-1" id="img_hght">512px</span>
                                </div>
                                <small class="form-label">Cfg Scale</small>
                                <div class="d-flex justify-content-between">
                                    <input type="range" class="col-md-10" @error('cfg_scale') is-invalid @enderror id="cfg_scale" name="cfg_scale" min="0.0" value="{{ $prompt->cfg_scale }}" step="0.5" max="20.0" >
                                    <span class="col-md-2 mx-1" id="cfg_value">7.0</span>
                                </div>
                                <small class="form-label">Step</small>
                                <div class="d-flex justify-content-between">
                                    <input type="range" class="col-md-10 @error('step') is-invalid @enderror" id="step" name="step" min="10 " value="{{ $prompt->step }}" step="1" max="150" >
                                    <span class="col-md-2 mx-1" id="step_value">50</span>
                                </div>
                                <small class="form-label">Speed (Optional)</small>
                                <input type="text" class="form-control bg-body opacity-50" id="" name="speed" placeholder="Random speed" >

                                <small class="form-label">Negative Prompt</small>
                                <input type="text" name="negative_prompt" placeholder="Enter Negative Prompt" class="form-control bg-body opacity-50 @error('negative_prompt') is-invalid @enderror" value="{{ $prompt->negative_prompt }}" id="">

                                
                                <small class="form-label">Images (images*6)</small>
                                <input type="file" name="images[]" class="form-control bg-body opacity-50" accept="image/*" multiple>
                                
                                <small class="form-label">Clip Guidance</small>
                                <input type="checkbox" class="form-check-input @error('clip') is-invalid @enderror" value="1" id="" name="clip" checked>
                            @endif 

                            @if($prompt->subSubCategory->subCategory->category->id == 7 )
                                <small class="form-label">Images (images*6)</small>
                                <input type="file" name="images[]" class="form-control bg-body opacity-50 " accept="image/*" multiple>
                                <small class="form-label">Image Verification Links</small>
                                <input type="text" class="form-control bg-body opacity-50 @error('image_verification') is-invalid @enderror" placeholder="Enter Image Verification Link" value="{{ $prompt->image_verification }}" name="image_verification">
                            @endif

                        @if($prompt->subSubCategory->subCategory->category->id == 8 )
                            <small class="form-label">Images (images*6)</small>
                            <input type="file" name="images[]" class="form-control bg-body opacity-50" accept="image/*" multiple>
                        @endif
                        
                    </div>
                </div>
                <button type="submit" class="btn btn-md btn-outline-primary mb-5 w-50" style="margin: auto">Update Your Prompt</button>
            </div>
        </form>
    </section>

  </main>
@endsection
@push('scripts')
@endpush
