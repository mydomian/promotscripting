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

                            <form action="{{ route('sell.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="category_id" value="{{ $data['category_id'] }}" id="">
                                <input type="hidden" name="title" value="{{ $data['title'] }}" id="">
                                <input type="hidden" name="description" value="{{ $data['description'] }}" id="">
                                <input type="hidden" name="price" value="{{ $data['price'] }}" id="">
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
                                            <option class="bg-body" value="" selected>Select sub category</option>
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
                                <div class="col-md-12 d-flex flex-column text-white mb-3">
                                    <label for="" class="form-label">Prompt Sub Type</label>
                                    <p class="text-secondary">
                                        Which sub type is that GPT?
                                    </p>
                                    <i class="text-secondary"><small>Select what sub type of GPT prompt this is.</small></i>
                                    <div class="col-md-4">
                                        <select name="sub_sub_category_id"
                                            class="form-control mt-2 bg-transparent form-select @error('sub_sub_category_id')is-invalid  @enderror"
                                            id="">
                                            <option class="bg-body" value="" selected>Select sub sub category</option>

                                            <option class="bg-body" value="1">Ads</option>
                                            <option class="bg-body" value="2">Business</option>
                                            <option class="bg-body" value="3">Chatbots</option>
                                            <option class="bg-body" value="4">Emails</option>
                                            <option class="bg-body" value="5">Fashion</option>
                                            <option class="bg-body" value="6">Finance</option>

                                        </select>
                                        @error('sub_sub_category_id')
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
                                    <textarea name="prompt_file" id="prompt_file" class="form-control bg-transparent" rows="10"></textarea>
                                    <div class="error-div"></div>
                                </div>

                                <div class="col-md-12 mb-3 d-flex flex-column text-white ">
                                    <label for="" class="form-label"><span class="text-danger">*</span> Prompt
                                        Testing</label>
                                    <small class="text-secondary">One example of your prompt with all variables filled in,
                                        e.g. if your prompt contained a variable like [Tone of voice], this variable should
                                        be changed to "happy" or "sad" in your test prompt. Buyers will not see this, it is
                                        only for PromptBase's internal testing.</small>
                                    <textarea name="prompt_testing" id="testing_prompt" class="form-control bg-transparent" rows="10"></textarea>
                                    <div class="error-div"></div>
                                </div>

                                <div class="col-md-12 mb-3 d-flex flex-column text-white ">
                                    <label for="" class="form-label"><span class="text-danger">*</span>
                                        Engine</label>
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
                                    <label for="" class="form-label"><span class="text-danger">*</span> Preview
                                        input</label>
                                    <i class="text-secondary mb-1"><small class="">A preview input to this prompt to
                                            show a potential buyer. Don't include your whole prompt here, just the bits that
                                            are editable - e.g. [Company]: Microsoft, [Tone of voice]: Happy.</small></i>
                                    <textarea name="preview_input" class="form-control bg-transparent @error('preview_input') is-invalid @enderror"
                                        rows="3" placeholder="To use this prompt you need to..."></textarea>
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
                                        placeholder="To use this prompt you need to..."></textarea>
                                </div>
                                <div class="col-md-12 mb-3 d-flex flex-column text-white ">
                                    <label for="" class="form-label"><span class="text-danger">*</span>Prompt
                                        Instructions</label>
                                    <i class="text-secondary mb-1"><small>Any extra tips or examples for the buyer on how
                                            to use
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
                @endif


                @if ($data['category_id'] == 2)
                    <div class="row">
                        <div class="col-md-6">
                                <div class="text-secondary mb-4">
                                    <h3 class="mb-4">Prompt File</h3>
                                    <p class="mb-0">Copy and paste your Midjourney prompt.</p>
                                    <strong class="mt-0 "><span>*</span> Include all your settings as tags within the prompt (e.g. --v 4 --q 2)</strong>
                                </div>
                            <form action="{{ route('sell.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="category_id" value="{{ $data['category_id'] }}"
                                    id="">
                                <input type="hidden" name="title" value="{{ $data['title'] }}" id="">
                                <input type="hidden" name="description" value="{{ $data['description'] }}"
                                    id="">
                                <input type="hidden" name="price" value="{{ $data['price'] }}" id="">
                                <div class="col-md-12 d-flex flex-column text-white mb-3">
                                    <label for="" class="form-label">Prompt sub Type</label>
                                    <p>
                                        What type of GPT prompt is this?
                                    </p>
                                    <i class="text-secondary"><small>Select what type of GPT prompt this is.</small></i>
                                    <div class="col-md-4">
                                        <select name="sub_category_id"
                                            class="form-control mt-2 bg-transparent form-select @error('sub_category_id')is-invalid  @enderror"
                                            id="">
                                            <option class="bg-body" value="" selected>Select sub category</option>
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
                                <div class="col-md-12 d-flex flex-column text-white mb-3">
                                    <label for="" class="form-label">Prompt sub sub Type</label>
                                    <p>
                                        What type of GPT prompt is this?
                                    </p>
                                    <i class="text-secondary"><small>Select what type of GPT prompt this is.</small></i>
                                    <div class="col-md-4">
                                        <select name="sub_sub_category_id"
                                            class="form-control mt-2 bg-transparent form-select @error('sub_sub_category_id')is-invalid  @enderror"
                                            id="">
                                            <option class="bg-body" value="" selected>Select sub category</option>
                                          
                                                <option class="bg-body" value="1">sub_sub_1 </option>
                                                <option class="bg-body" value="2">sub_sub_2 </option>
                                                <option class="bg-body" value="3">sub_sub_3 </option>
                                                <option class="bg-body" value="4">sub_sub_4 </option>
                                                <option class="bg-body" value="5">sub_sub_5 </option>
                                            
                                        </select>
                                        @error('sub_sub_category_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 d-flex flex-column text-white mb-3">
                                    <label for="" class="form-label"><span class="text-danger">*</span> Prompt</label>
                                    <small class="text-secondary mb-1">Put any variables in [square brackets].</small>
                                    <textarea name="midjourney_text" id="midjourney_text" class="form-control bg-transparent" rows="5"></textarea>
                                    <div class="error-div"></div>
                                </div>
                                <div class="col-md-12 mb-3 d-flex flex-column text-white ">
                                    <label for="" class="form-label"><span class="text-danger">*</span>Prompt
                                        Instructions</label>
                                    <i class="text-secondary mb-1"><small>Any extra tips or examples for the buyer on how
                                            to use
                                            this prompt.</small></i>
                                    <textarea name="instructions" class="form-control bg-transparent" rows="3"
                                        placeholder="To use this prompt you need to..."></textarea>
                                </div>
                                <div class="col-md-12 d-flex flex-column text-white mb-3">
                                    <label for="" class="form-label"><span class="text-danger">*</span> Upload 9
                                        example images generated by this prompt (no collages or edits)</label>
                                    <small class="text-secondary">Only upload your images generated by Midjourney.</small>
                                    <small class="text-secondary">Prompts with more example images usually get more
                                        sales.</small>

                                    {{-- <div class="images bg-transparent">
                                        <div class="pic">
                                            add
                                        </div>
                                    </div> --}}
                                    <input type="file" name="images" class="uploader form-conrol bg-transparent mt-2" multiple accept="image/*" />

                                </div>
                                <div class="col-md-12  d-flex flex-column text-white mt-1 mb-3">
                                    <label for="" class="form-label"><span class="text-danger">*</span> Midjourney Profile</label>
                                    <small class="text-secondary">Copy the midjourney.com/app/users link to your profile (watch our video if you can't find this). You'll need an active Midjourney subscription to get this link.</small>
                                    <input type="text" class="form-control bg-transparent" name="midjourney_profile" placeholder="www.midjourney.com/app/user">
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
        (function ($) {
  $(document).ready(function () {
    
    // generateID()
    choose()
    generateOption()
    selectionOption()
    removeClass()
    uploadImage()
    submit()
    resetButton()
    removeNotification()
    autoRemoveNotification()
    autoDequeue()
    
    var ID
    var way = 0
    var queue = []
    var fullStock = 10
    var speedCloseNoti = 1000

    
    function choose() {
      var li = $('.ways li')
      var section = $('.sections section')
      var index = 0
      li.on('click', function () {
        index = $(this).index()
        $(this).addClass('active')
        $(this).siblings().removeClass('active')
        
        section.siblings().removeClass('active')
        section.eq(index).addClass('active')
        if(!way) {
          way = 1
        }  else {
          way = 0
        }
      })
    }
    
    function generateOption() {
      var select = $('select option')
      var selectAdd = $('.select-option .option')
      $.each(select, function (i, val) {
          $('.select-option .option').append('<div rel="'+ $(val).val() +'">'+ $(val).html() +'</div>')
      })
    }
    
    function selectionOption() {
      var select = $('.select-option .head')
      var option = $('.select-option .option div')
    
      select.on('click', function (event) {
        event.stopPropagation()
        $('.select-option').addClass('active')
      })
      
      option.on('click', function () {
        var value = $(this).attr('rel')
        $('.select-option').removeClass('active')  
        select.html(value)
    
        $('select#category').val(value)
      })
    }
    
    function removeClass() {
      $('body').on('click', function () { 
        $('.select-option').removeClass('active')   
      })                  
    }
   
    function uploadImage() {
      var button = $('.images .pic')
      var uploader = $('.uploader')
      var images = $('.images')
      var imageArr = []

      
      button.on('click', function () {
        var len = $('.img-len').length+1;
        console.log(len)
        if(len <=9){
            uploader.click()
            
        }else{
            button.addClass('hide')
        }
        
        
      })
      
      uploader.on('change', function () {
        
      
          var reader = new FileReader()
          reader.onload = function(event) {
            images.prepend('<div class="img img-len" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"><span>remove</span></div>')
          }
          reader.readAsDataURL(uploader[0].files[0])
          for(var i = 0; i < images.length; i++) {
        imageArr.push({url: $(images[i]).attr('rel')})
        consle.log(imageArr)
}
       })
      
      images.on('click', '.img', function () {
        button.removeClass('hide')
        $(this).remove()
      })
    
    }
    
    function submit() {  
      var button = $('#send')
      
      button.on('click', function () {
        if(!way) {
          var title = $('#title')
          var cate  = $('#category')
          var images = $('.images .img')
        //   var imageArr = []

          
        //   for(var i = 0; i < images.length; i++) {
        //     imageArr.push({url: $(images[i]).attr('rel')})
        //   }
          
          var newStock = {
            title: title.val(),
            category: cate.val(),
            images: imageArr,
            type: 1
          }
          
          saveToQueue(newStock)
        } else {
          // discussion
          var topic = $('#topic')
          var message = $('#msg')
          
          var newStock = {
            title: topic.val(),
            message: message.val(),
            type: 2
          }
          
          saveToQueue(newStock)
        }
      })
    }
    
    function removeNotification() {
      var close = $('.notification')
      close.on('click', 'span', function () {
        var parent = $(this).parent()
        parent.fadeOut(300)
        setTimeout(function() {
          parent.remove()
        }, 300)
      })
    }
    
    function autoRemoveNotification() {
      setInterval(function() {
        var notification = $('.notification')
        var notiPage = $(notification).children('.btn')
        var noti = $(notiPage[0])
        
        setTimeout(function () {
          setTimeout(function () {
           noti.remove()
          }, speedCloseNoti)
          noti.fadeOut(speedCloseNoti)
        }, speedCloseNoti)
      }, speedCloseNoti)
    }
    
    function autoDequeue() {
      var notification = $('.notification')
      var text
      
      setInterval(function () {

          if(queue.length > 0) {
            if(queue[0].type == 2) {
              text = ' Your discusstion is sent'
            } else {
              text = ' Your order is allowed.'
            }
            
            notification.append('<div class="success btn"><p><strong>Success:</strong>'+ text +'</p><span><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></div>')
            queue.splice(0, 1)
            
          }  
      }, 10000)
    }
    
    function resetButton() {
      var resetbtn = $('#reset')
      resetbtn.on('click', function () {
        reset()
      })
    }
    
    // helpers
    function saveToQueue(stock) {
      var notification = $('.notification')
      var check = 0
      
      if(queue.length <= fullStock) {
        if(stock.type == 2) {
            if(!stock.title || !stock.message) {
              check = 1
            }
        } else {
          if(!stock.title || !stock.category || stock.images == 0) {
            check = 1
          }
        }
        
        if(check) {
          notification.append('<div class="error btn"><p><strong>Error:</strong> Please fill in the form.</p><span><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></div>')
        } else {
          notification.append('<div class="success btn"><p><strong>Success:</strong> '+ ID +' is submitted.</p><span><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></div>')
          queue.push(stock)
          reset()
        }
      } else {
        notification.append('<div class="error btn"><p><strong>Error:</strong> Please waiting a queue.</p><span><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></div>')
      } 
    }
    function reset() {
      
      $('#title').val('')
      $('.select-option .head').html('Category')
      $('select#category').val('')
      
      var images = $('.images .img')
      for(var i = 0; i < images.length; i++) {
        $(images)[i].remove()
      }
      
      var topic = $('#topic').val('')
      var message = $('#msg').val('')
    }
  })
})(jQuery)
    </script>
@endpush

@push('css')
    <style>
        .images {
            display: flex;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .images .img,
        .images .pic {
            flex-basis: 20%;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid white;
        }

        .images .img {
            width: 100px;
            height: 93px;
            background-size: cover;
            margin-right: 10px;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .images .img:nth-child(4n) {
            margin-right: 0;
        }

        .images .img span {
            display: none;
            text-transform: capitalize;
            z-index: 2;
        }

        .images .img::after {
            content: '';
            width: 100%;
            height: 100%;
            display: block;
            transition: opacity .1s ease-in;
            border-radius: 4px;
            opacity: 0;
            position: absolute;
        }

        .images .img:hover::after {
            display: block;
            background-color: #000;
            opacity: .5;
        }

        .images .img:hover span {
            display: block;
            color: #fff;
        }

        .images .pic {
            /* background-color: #F5F7FA; */
            align-self: center;
            text-align: center;
            padding: 40px 0;
            text-transform: uppercase;
            color: #848EA1;
            font-size: 12px;
            cursor: pointer;
        }
    </style>
@endpush
