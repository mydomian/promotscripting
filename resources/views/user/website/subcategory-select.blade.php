@extends('user.website.includes.master')
@section('title')
    | Sell
@endsection
@section('sell', 'active')
@section('content')
    <main class="flex-shrink-o">
        <section class="hero-home bg-body">
            <div class="container page-header">
                <div class="row">
                    <div class="col-md-6">
                        
                        <form action="{{route('sell.country')}}" method="POST">
                            @csrf
                            <input type="hidden" name="category_id" value="{{$data['category_id']}}" id="">
                            <input type="hidden" name="title" value="{{$data['title']}}" id="">
                            <input type="hidden" name="description" value="{{$data['description']}}" id="">
                            <input type="hidden" name="price" value="{{$data['price']}}" id="">
                            <div class="col-md-12 d-flex flex-column text-white mb-3">
                                <label for="" class="form-label">Prompt Type</label>
                                <p>
                                    What type of GPT prompt is this?
                                </p>
                                <i class="text-secondary"><small>Select what type of GPT prompt this is.</small></i>
                                <div class="col-md-4">
                                    <select name="sub_category_id"
                                        class="form-control mt-2 bg-transparent form-select @error('sub_category_id')is-invalid  @enderror"
                                        id="">
                                        <option class="bg-body" value="" selected>Select category</option>
                                        @forelse ($subcategories  as $subcategory)
                                            <option class="bg-body" value="{{ $subcategory->id }}">
                                                {{ $subcategory->category_name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('category_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <small class="text-secondary">Copy and paste the JSON GPT prompt file from the OpenAI playground.
                                    Ensure any editable parts of your prompt are indicated by [square brackets].</small>
                            </div>

                            <div class="col-md-12 mb-3 d-flex flex-column text-white ">
                                <label for="" class="form-label"><span class="text-danger">*</span> Prompt
                                    File</label>
                                <textarea name="prompt_file" id="prompt_file" class="form-control bg-transparent" rows="10"></textarea>
                                <div class="error-div"></div>
                            </div>

                            <div class="col-md-12 mb-3 d-flex flex-column text-white ">
                                <label for="" class="form-label"><span class="text-danger">*</span> Prompt Testing</label>
                                <small class="text-secondary">One example of your prompt with all variables filled in, e.g. if your prompt contained a variable like [Tone of voice], this variable should be changed to "happy" or "sad" in your test prompt. Buyers will not see this, it is only for PromptBase's internal testing.</small>
                                <textarea name="prompt_testing" id="testing_prompt" class="form-control bg-transparent" rows="10"></textarea>
                                <div class="error-div"></div>
                            </div>

                            <div class="col-md-12 mb-3 d-flex flex-column text-white ">
                                <label for="" class="form-label"><span class="text-danger">*</span> Engine</label>
                                <small class="text-secondary">What GPT Engine does this prompt use?</small>
                                <div class="col-md-4">
                                    <select name="gpt_engine"
                                        class="form-control mt-2 bg-transparent form-select @error('gpt_engine')is-invalid  @enderror"
                                        id="">
                                        <option class="bg-body" value="" selected>Select enginee</option>
                                       
                                        <option class="bg-body" value="1">text-davinci-003</option>
                                        <option class="bg-body" value="2">text-davinci-002</option>
                                        <option class="bg-body" value="3">text-curie-001</option>
                                        <option class="bg-body" value="4">text-babbage-001</option>
                                        <option class="bg-body" value="5">text-ada-001</option>
                                        <option class="bg-body" value="6">text-davinci-001</option>
                                        <option class="bg-body" value="7">davinci-instruct-beta</option>
                                        <option class="bg-body" value="8">davinci</option>
                                        <option class="bg-body" value="9">curie</option>
                                        <option class="bg-body" value="10">babbage</option>
                                        <option class="bg-body" value="11">ada</option>
                                        
                                    </select>
                                    @error('gpt_engine')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                   
                                </div>
                                <div class="error-div"></div>
                            </div>
                            <div class="col-md-12 mb-3 d-flex flex-column text-white ">
                                <label for="" class="form-label"><span class="text-danger">*</span> Preview input</label>
                                <i class="text-secondary mb-1"><small class="">A preview input to this prompt to show a potential buyer. Don't include your whole prompt here, just the bits that are editable - e.g. [Company]: Microsoft, [Tone of voice]: Happy.</small></i>
                                <textarea name="preview_input" class="form-control bg-transparent @error('preview_input') is-invalid @enderror" rows="3"
                                    placeholder="To use this prompt you need to..."></textarea>
                                    @error('preview_input')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                            </div>
                            <div class="col-md-12 mb-3 d-flex flex-column text-white ">
                                <label for="" class="form-label"><span class="text-danger">*</span> Preview output</label>
                                <i class="text-secondary mb-1"><small>A preview output generated this prompt to demonstrate to a potential buyer what your prompt does. Do not include your input prompt.</small></i>
                                <textarea name="preview_output" class="form-control bg-transparent" rows="3"
                                    placeholder="To use this prompt you need to..."></textarea>
                            </div>
                            <div class="col-md-12 mb-3 d-flex flex-column text-white ">
                                <label for="" class="form-label"><span class="text-danger">*</span>Prompt
                                    Instructions</label>
                                <i class="text-secondary mb-1"><small>Any extra tips or examples for the buyer on how to use
                                        this prompt.</small></i>
                                <textarea name="instructions" class="form-control bg-transparent" rows="3"
                                    placeholder="To use this prompt you need to..."></textarea>
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
            </div>
        </section>
    </main>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#prompt_file').on('keyup', function() {
                var data = $(this).val();
               
                    try {
                       var data =  JSON.parse(data);
                       
                        var status = "true";
                    } catch (e) {
                        var status = "false";
                    }
               if(status !== 'true'){
                $('.error-div').html('<small class="text-danger">Invalid JSON String</small>')
               }else{
                
                $('.error-div').html('')

                    $('#testing_prompt').val(data.prompt)
                    if(!data.prompt ){
                        $('.error-div').html("<small class='text-danger'>No 'prompt' field detected</small>")
                    }
                    if(!data.temperature ){
                        $('.error-div').html("<small class='text-danger'>No 'temperature' field detected</small>")
                    }
                    if(!data.max_tokens ){
                        $('.error-div').html("<small class='text-danger'>No 'max_tokens' field detected</small>")
                    }
                    if(!data.top_p ){
                        $('.error-div').html("<small class='text-danger'>No 'top_p' field detected</small>")
                    }
                    if(!data.frequency_penalty ){
                        $('.error-div').html("<small class='text-danger'>No 'frequency_penalty' field detected</small>")
                    }
                    if(!data.presence_penalty ){
                        $('.error-div').html("<small class='text-danger'>No 'presence_penalty' field detected</small>")
                    }
                    if(isNaN(data.temperature)){
                        $('.error-div').html("<small class='text-danger'>'temperature' field must be a number</small>")
                    }
                    if(isNaN(data.max_tokens)){
                        $('.error-div').html("<small class='text-danger'>'max_tokens' field must be a number</small>")
                    }
                    if(isNaN(data.top_p)){
                        $('.error-div').html("<small class='text-danger'>'top_p' field must be a number</small>")
                    }
                    if(isNaN(data.frequency_penalty)){
                        $('.error-div').html("<small class='text-danger'>'frequency_penalty' field must be a number</small>")
                    }
                    if(isNaN(data.presence_penalty)){
                        $('.error-div').html("<small class='text-danger'>'presence_penalty' field must be a number</small>")
                    }
                  
               }
            })
        })
    </script>
@endpush
