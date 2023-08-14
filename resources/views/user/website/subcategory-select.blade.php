@extends('user.website.includes.master')
@section('title')
    | Sell
@endsection
@section('sell', 'active')
@section('content')
    <main class="flex-shrink-o">
        <section class="hero-home bg-body">
            <div class="container page-header">
                @if ($data['category_id'] == 1)
                    <div class="row">
                        <div class="col-md-6">

                            <form action="{{ route('sell.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="category_id"
                                    value="{{ $data['category_id'] ?? old('category_id') }}" id="">
                                <input type="hidden" name="title" value="{{ $data['title'] ?? old('title') }}"
                                    id="">
                                <input type="hidden" name="description"
                                    value="{{ $data['description'] ?? old('description') }}" id="">
                                <input type="hidden" name="price" value="{{ $data['price'] ?? old('price') }}"
                                    id="">
                                <div class="col-md-12 d-flex flex-column text-white mb-3">
                                    <label for="" class="form-label">Prompt Type</label>
                                    <p>
                                        What type of GPT prompt is this?
                                    </p>
                                    <i class="text-secondary"><small>Select what type of GPT prompt this is.</small></i>
                                    <div class="col-md-12">
                                        <select name="sub_category_id"
                                            class="form-control mt-2 bg-transparent form-select @error('sub_category_id')is-invalid  @enderror"
                                            id="">
                                            <option class="bg-body" value="" selected>Select sub category</option>
                                            @forelse ($categories  as $category)
                                                <option class="bg-body" value="" disabled>
                                                    {{ $category->category_name }}</option>
                                                @forelse ($category['subCategories'] as $subCategory)
                                                    <option class="bg-body" value="{{ $subCategory->id }}"> ➥
                                                        {{ $subCategory->category_name }}</option>
                                                @empty
                                                @endforelse
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('sub_category_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                             
                                <div class="col-md-12 mb-3">
                                    <small class="text-secondary">Copy and paste the JSON GPT prompt file from the OpenAI
                                        playground.
                                        Ensure any editable parts of your prompt are indicated by [square brackets].</small>
                                </div>

                                <div class="col-md-12 mb-3 d-flex flex-column text-white ">
                                    <label for="" class="form-label"><span class="text-danger">*</span> Prompt
                                        File</label>
                                    <textarea name="prompt_file" id="prompt_file" class="form-control bg-transparent" rows="10">{{ old('prompt_file') }}</textarea>
                                    <div class="error-div"></div>
                                </div>

                                <div class="col-md-12 mb-3 d-flex flex-column text-white ">
                                    <label for="" class="form-label"><span class="text-danger">*</span> Prompt
                                        Testing</label>
                                    <small class="text-secondary">One example of your prompt with all variables filled in,
                                        e.g. if your prompt contained a variable like [Tone of voice], this variable should
                                        be changed to "happy" or "sad" in your test prompt. Buyers will not see this, it is
                                        only for PromptScripting's internal testing.</small>
                                    <textarea name="prompt_testing" id="testing_prompt" class="form-control bg-transparent" rows="10">{{ old('prompt_testing') }}</textarea>
                                    {{-- <div class="error-div"></div> --}}
                                </div>

                                <div class="col-md-12 mb-3 d-flex flex-column text-white ">
                                    <label for="" class="form-label"><span class="text-danger">*</span>
                                        Engine</label>
                                    <small class="text-secondary">What GPT Engine does this prompt use?</small>
                                    <div class="col-md-12">
                                        <select name="gpt_engine"
                                            class="form-control mt-2 bg-transparent form-select @error('gpt_engine')is-invalid  @enderror"
                                            id="">
                                            <option class="bg-body" value="" selected>Select enginee</option>

                                            @forelse ($gptEngines as $engine)
                                                <option class="bg-body" value="{{ $engine }}">{{ $engine }}
                                                </option>
                                            @empty
                                            @endforelse

                                        </select>
                                        @error('gpt_engine')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                    {{-- <div class="error-div"></div> --}}
                                </div>
                                <div class="c0l-md-12 d-flex flex-column text-white mb-3">
                                    <label for="" class="form-label"><span class="text-danger">*</span> Upload
                                        thumbnail image</label>
                                    <small class="text-secondary">Only upload your thumbnail image </small>

                                    <input type="file" name="image"
                                        class="form-conrol bg-transparent mt-2 @error('image')is-invalid @enderror"
                                        accept="image/*" />
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3 d-flex flex-column text-white ">
                                    <label for="" class="form-label"><span class="text-danger">*</span> Preview
                                        input</label>
                                    <i class="text-secondary mb-1"><small class="">A preview input to this prompt to
                                            show a potential buyer. Don't include your whole prompt here, just the bits that
                                            are editable - e.g. [Company]: Microsoft, [Tone of voice]: Happy.</small></i>
                                    <textarea name="preview_input" class="form-control bg-transparent @error('preview_input') is-invalid @enderror"
                                        rows="3" placeholder="To use this prompt you need to...">{{ old('preview_input') }}</textarea>
                                    @error('preview_input')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3 d-flex flex-column text-white ">
                                    <label for="" class="form-label"><span class="text-danger">*</span> Preview
                                        output</label>
                                    <i class="text-secondary mb-1"><small>A preview output generated this prompt to
                                            demonstrate to a potential buyer what your prompt does. Do not include your
                                            input prompt.</small></i>
                                    <textarea name="preview_output" class="form-control bg-transparent" rows="3"
                                        placeholder="To use this prompt you need to...">{{ old('preview_output') }}</textarea>
                                </div>
                                <div class="col-md-12 mb-3 d-flex flex-column text-white ">
                                    <label for="" class="form-label"><span class="text-danger">*</span>Prompt
                                        Instructions</label>
                                    <i class="text-secondary mb-1"><small>Any extra tips or examples for the buyer on how
                                            to use
                                            this prompt.</small></i>
                                    <textarea name="instructions" class="form-control bg-transparent" rows="3"
                                        placeholder="To use this prompt you need to...">{{ old('instructions') }}</textarea>
                                </div>
                                <div class="col-md-12 mb-3 d-flex flex-column text-white ">
                                    <label for="" class="form-label"><span class="text-danger">*</span>Prompt
                                        Tags</label>
                                    <i class="text-secondary mb-1"><small>Keywords of your prompt. Example: Keyword1, Keyword2...</small></i>
                                    <input name="prompt_tags" class="form-control prompt_tags" value="{{old('prompt_tags')}}" rows="3"
                                    data-role="tagsinput">
                                    @error('prompt_tags')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex align-items-center  pt-4 mt-4 pt-xxl-5 mt-xl-5">
                                        <a href="{{ URL::previous() }}" class="btn btn-outline-secondary">
                                            <i class="fa-solid fa-arrow-left-long"></i>
                                            Back
                                        </a>
                                        <button type="submit" class="btn btn-outline-primary mx-3">
                                            Next
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif

                @if ($data['category_id'] == 6 || $data['category_id'] == 7 || $data['category_id'] == 8 || $data['category_id'] == 5)

                    <div class="row">
                        <div class="col-md-6">
                            <div class="text-secondary mb-4">
                                <h3 class="mb-4">Prompt File</h3>
                                <p class="mb-0">Copy and paste your Midjourney prompt.</p>
                                <strong class="mt-0 "><span>*</span> Include all your settings as tags within the prompt
                                    (e.g. --v 4 --q 2)</strong>
                            </div>
                            <form action="{{ route('sell.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="category_id"
                                    value="{{ $data['category_id'] ?? old('category_id') }}" id="">
                                <input type="hidden" name="title" value="{{ $data['title'] ?? old('title') }}"
                                    id="">
                                <input type="hidden" name="description"
                                    value="{{ $data['description'] ?? old('description') }}" id="">
                                <input type="hidden" name="price" value="{{ $data['price'] ?? old('price') }}"
                                    id="">
                                <div class="col-md-12 d-flex flex-column text-white mb-3">
                                    <label for="" class="form-label">Prompt sub Type</label>
                                    <p>
                                        What type of GPT prompt is this?
                                    </p>
                                    <i class="text-secondary"><small>Select what type of GPT prompt this is.</small></i>
                                    <div class="col-md-12">
                                        <select name="sub_category_id"
                                            class="form-control mt-2 bg-transparent form-select @error('sub_category_id')is-invalid  @enderror"
                                            id="">
                                            <option class="bg-body" value="" selected>Select sub category</option>
                                            @forelse ($categories  as $category)
                                                <option class="bg-body" value="" disabled>
                                                    {{ $category->category_name }}</option>
                                                @forelse ($category['subCategories'] as $subCategory)
                                                    <option class="bg-body" value="{{ $subCategory->id }}"> ➥
                                                        {{ $subCategory->category_name }}</option>
                                                @empty
                                                @endforelse
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('sub_category_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                              
                                <div class="col-md-12 d-flex flex-column text-white mb-3">
                                    <label for="" class="form-label"><span class="text-danger">*</span>
                                        Prompt</label>
                                    <small class="text-secondary mb-1">Put any variables in [square brackets].</small>
                                    <textarea name="midjourney_text" id="midjourney_text" class="form-control bg-transparent" rows="5">{{ old('midjourney_text') }}</textarea>
                                    <div class="error-div"></div>
                                    @error('midjourney_text')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                @if ($data['category_id'] == 6)
                                    <div class="col-md-12 d-flex flex-column text-white  mb-3">
                                        <h6 class="text-secondary mt-2">Enter Your Diffusion Setting</h6>
                                        <label for="" class="form-label">Model</label>
                                        <div class="col-md-6">
                                            <select name="model_version" class="form-control bg-transparent form-select"
                                                id="">
                                                <option class="bg-body" value="1">verson_1</option>
                                                <option class="bg-body" value="2">verson_2</option>
                                                <option class="bg-body" value="3">verson_3</option>
                                                <option class="bg-body" value="4">verson_4</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 d-flex flex-column text-white  mb-3">

                                        <label for="" class="form-label">Sampler</label>
                                        <div class="col-md-6">
                                            <select name="sampler" class="form-control bg-transparent form-select"
                                                id="">
                                                <option class="bg-body" value="1">sample_1</option>
                                                <option class="bg-body" value="2">sample_2</option>
                                                <option class="bg-body" value="3">sample_3</option>
                                                <option class="bg-body" value="4">sample_4</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 d-flex flex-column text-white mb-3">
                                        <label for="points">Image Width</label>
                                        <div class="d-flex justify-content-between">
                                            <input type="range" class="col-md-9" id="image_width" name="image_width"
                                                value="512" min="512" step="64" max="1024">
                                            <span class="col-md-2 mx-1" id="img_wdth">512px</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 d-flex flex-column text-white mb-3">
                                        <label for="points">Image height</label>
                                        <div class="d-flex justify-content-between">
                                            <input type="range" class="col-md-9" id="image_height" name="image_height"
                                                min="512" value="512" step="64" max="1024">
                                            <span class="col-md-2 mx-1" id="img_hght">512px</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 d-flex flex-column text-white mb-3">
                                        <label for="points">Cfg Scale</label>
                                        <div class="d-flex justify-content-between">
                                            <input type="range" class="col-md-9" id="cfg_scale" name="cfg_scale"
                                                min="0.0" value="7.0" step="0.5" max="20.0">
                                            <span class="col-md-2 mx-1" id="cfg_value">7.0</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 d-flex flex-column text-white mb-3">
                                        <label for="points">Step</label>
                                        <div class="d-flex justify-content-between">
                                            <input type="range" class="col-md-9" id="step" name="step"
                                                min="10 " value="50" step="1" max="150">
                                            <span class="col-md-2 mx-1" id="step_value">50</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 d-flex flex-column text-white mb-3">
                                        <label for="points" class="form-label">Speed (Optional)</label>
                                        <input type="text" class="form-control bg-transparent" id=""
                                            name="speed" placeholder="Random speed">

                                    </div>
                                    <div class="col-md-12  text-white mb-3">
                                        <input type="checkbox" class="form-check-input" value="1" id=""
                                            name="clip" checked>
                                        <label for="" class="form-label mx-1">Clip Guidance</label>
                                    </div>

                                    <div class="col-md-12 d-flex flex-column text-white mb-3">
                                        <label for="" class="form-label">Negative Prompt</label>
                                        <input type="text" name="negative_prompt" class="form-control bg-transparent"
                                            id="">
                                    </div>
                                @endif

                                <div class="col-md-12 mb-3 d-flex flex-column text-white ">
                                    <label for="" class="form-label"><span class="text-danger">*</span>Prompt
                                        Instructions</label>
                                    <i class="text-secondary mb-1"><small>Any extra tips or examples for the buyer on how
                                            to use
                                            this prompt.</small></i>
                                    <textarea name="instructions" class="form-control bg-transparent" rows="3"
                                        placeholder="To use this prompt you need to...">{{ old('instructions') }}</textarea>
                                    @error('instructions')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="c0l-md-12 d-flex flex-column text-white mb-3">
                                    <label for="" class="form-label"><span class="text-danger">*</span> Upload
                                        thumbnail image</label>
                                    <small class="text-secondary">Only upload your thumbnail image </small>

                                    <input type="file" name="image"
                                        class="uploader form-conrol bg-transparent mt-2 @error('image')is-invalid @enderror"
                                        accept="image/*" />
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 d-flex flex-column text-white mb-3">
                                    <label for="" class="form-label"><span class="text-danger">*</span> Upload 6
                                        example images generated by this prompt (no collages or edits)</label>
                                    <small class="text-secondary">Only upload your images generated by Midjourney.</small>
                                    <small class="text-secondary">Prompts with more example images usually get more
                                        sales.</small>

                                    {{-- <div class="images bg-transparent">
                                        <div class="pic">
                                            add
                                        </div>
                                    </div> --}}
                                    <input type="file" name="images[]" id="imageInput"
                                        class="uploader form-conrol bg-transparent mt-2 @error('images')is-invalid @enderror"
                                        multiple accept="image/*" />
                                    @error('images')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div id="previewContainer"></div>
                                </div>
                                <div id="max_warning" class="my-2 hide">
                                    <li class="text-danger">Sorry, You've uploaded more than 6 images, we accpet only 6 images</li>
                                </div>
                                @if ($data['category_id'] == 5)
                                    <div class="col-md-12  d-flex flex-column text-white mt-1 mb-3">
                                        <label for="" class="form-label"><span class="text-danger">*</span>
                                            Midjourney Profile</label>
                                        <small class="text-secondary">Copy the midjourney.com/app/users link to your
                                            profile (watch our video if you can't find this). You'll need an active
                                            Midjourney subscription to get this link.</small>
                                        <input type="text" class="form-control bg-transparent"
                                            name="midjourney_profile" value="{{ old('midjourney_profile') }}"
                                            placeholder="www.midjourney.com/app/user">
                                        @error('midjourney_profile')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                @endif



                                @if ($data['category_id'] == 7)
                                    <div class="col-md-12  d-flex flex-column text-white mt-1 mb-3">
                                        <label for="" class="form-label"><span class="text-danger">*</span> Image
                                            Verification Link</label>
                                        <small class="text-secondary">Copy the labs.openai.com share link to one of your
                                            images.</small>
                                        <input type="text" class="form-control bg-transparent"
                                            name="image_verification" value="{{ old('image_verification') }}"
                                            placeholder="https://labs.openai.com/a/abcd123">
                                        @error('image_verification')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                @endif

                                <div class="col-md-12 mb-3 d-flex flex-column text-white ">
                                    <label for="" class="form-label"><span class="text-danger">*</span>Prompt
                                        Tags</label>
                                    <i class="text-secondary mb-1"><small>Keywords of your prompt. Example: Keyword1, Keyword2...</small></i>
                                    <input name="prompt_tags" class="form-control prompt_tags" value="{{old('prompt_tags')}}" rows="3"
                                    data-role="tagsinput">
                                    @error('prompt_tags')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                </div>

                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Next
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif

            </div>
        </section>
    </main>
@endsection
@push('scripts')
<script src='https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js'></script>

<script>
   $(function () {
      $('input').on('change', function (event) {

         var $element = $(event.target);
         var $container = $element.closest('.example');

         if (!$element.data('tagsinput'))
            return;

         var val = $element.val();
         if (val === null)
            val = "null";
         var items = $element.tagsinput('items');

         $('code', $('pre.val', $container)).html(($.isArray(val) ? JSON.stringify(val) : "\"" + val.replace('"', '\\"') + "\""));
         $('code', $('pre.items', $container)).html(JSON.stringify($element.tagsinput('items')));


      }).trigger('change');
   });
</script>
    <script>
        $(document).ready(function() {
            $('#image_width').on('change', function() {
                $('#img_wdth').html($(this).val() + 'px')
            })
            $('#image_height').on('change', function() {
                $('#img_hght').html($(this).val() + 'px')
            })
            $('#cfg_scale').on('change', function() {
                $('#cfg_value').html($(this).val())
            })
            $('#step').on('change', function() {
                $('#step_value').html($(this).val())
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#prompt_file').on('keyup', function() {
                var data = $(this).val();

                try {
                    var data = JSON.parse(data);

                    var status = "true";
                } catch (e) {
                    var status = "false";
                }
                if (status !== 'true') {
                    $('.error-div').html('<small class="text-danger">Invalid JSON String</small>')
                } else {

                    $('.error-div').html('')

                    $('#testing_prompt').val(data.prompt)
                    if (isNaN(data.presence_penalty)) {
                        $('.error-div').html(
                            "<small class='text-danger'>'presence_penalty' field must be a number</small>"
                        )
                    }
                    if (isNaN(data.frequency_penalty)) {
                        $('.error-div').html(
                            "<small class='text-danger'>'frequency_penalty' field must be a number</small>"
                        )
                    }
                    if (isNaN(data.top_p)) {
                        $('.error-div').html(
                            "<small class='text-danger'>'top_p' field must be a number</small>")
                    }
                    if (isNaN(data.max_tokens)) {
                        $('.error-div').html(
                            "<small class='text-danger'>'max_tokens' field must be a number</small>")
                    }
                    if (isNaN(data.temperature)) {
                        $('.error-div').html(
                            "<small class='text-danger'>'temperature' field must be a number</small>")
                    }
                    if (!data.presence_penalty) {
                        $('.error-div').html(
                            "<small class='text-danger'>No 'presence_penalty' field detected</small>")
                    }
                    if (!data.frequency_penalty) {
                        $('.error-div').html(
                            "<small class='text-danger'>No 'frequency_penalty' field detected</small>")
                    }
                    if (!data.top_p) {
                        $('.error-div').html("<small class='text-danger'>No 'top_p' field detected</small>")
                    }
                    if (!data.max_tokens) {
                        $('.error-div').html(
                            "<small class='text-danger'>No 'max_tokens' field detected</small>")
                    }
                    if (!data.temperature) {
                        $('.error-div').html(
                            "<small class='text-danger'>No 'temperature' field detected</small>")
                    }
                    if (!data.prompt) {
                        $('.error-div').html(
                            "<small class='text-danger'>No 'prompt' field detected</small>")
                    }

                }
            })
        })
    </script>

    <script>
        $(document).ready(function() {
            $("#imageInput").change(function() {
                // Clear any previous previews
                $("#previewContainer").empty();

                // Get selected files
                const files = this.files;
                
                // Loop through the selected files
                for (let i = 0; i < 6; i++) {
                    const file = files[i];
                    const reader = new FileReader();

                    // Closure to capture the file information and display the preview
                    reader.onload = (function(file) {
                        return function(e) {
                            const img = $("<img />");
                            img.attr("src", e.target.result);
                            img.addClass("preview");
                            $("#previewContainer").append(img);
                        };
                    })(file);

                    // Read the image file as a data URL
                    reader.readAsDataURL(file);
                }

                if(files.length > 6){
                    $('#max_warning').removeClass('hide')
                }

            });
        });
    </script>

@endpush

