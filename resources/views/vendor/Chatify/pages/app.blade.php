@include('user.website.includes.header')



<main class="flex-shrink-0 bg-body">
    <!-- Hero Marketplace -->
    <section class="hero-marketplace page-header">
      <div class="bg-holder bg-black bg-opacity-25"></div>
      <div class="container">
        @include('Chatify::layouts.headLinks')
        <div class="messenger">
            <div class="messenger-listView {{ !!$id ? 'conversation-active' : '' }}">
                <div class="m-header">
                    <nav>
                        
                        <div>
                            <img class="rounded-circle" style="width: 60px;" src="@if(Auth::user()->profile_photo_path) {{ asset('/storage/profile/'.Auth::user()->profile_photo_path) }} @else {{ asset('/storage/profile/avatar.png') }} @endif" alt="">
                            <span class="text-primary">{{ Auth::user()->name }}</span>
                        </div>
                        {{-- <a href="#"><i class="fas fa-inbox"></i> <span class="messenger-headTitle">MESSAGES</span> </a> --}}
                        <nav class="m-header-right">
                            {{-- <a href="#"><i class="fas fa-cog settings-btn"></i></a> --}}
                            <a href="#" class="listView-x"><i class="fas fa-times text-primary"></i></a>
                        </nav> 
                    </nav>
                    <div class="user-search-box flex-grow-1 mx-2">
                        <i class="fa-solid fa-magnifying-glass-minus text-primary"></i>
                        <input
                          type="search"
                          name="user-search"
                          id="user-search"
                          placeholder="People, groups, messages..."
                          class="form-control messenger-search"
                        />
                    </div>
                    
                </div>
                <div class="m-body contacts-container">
                <div class="show messenger-tab users-tab app-scroll" data-view="users">
                    <div class="favorites-section">
                        <p class="messenger-title text-primary" style="margin-top:25px"><span>Favorites</span></p>
                        <div class="messenger-favorites app-scroll-hidden"></div>
                    </div>
                    <p class="messenger-title text-primary" style="margin-top:25px"><span>Your Space</span></p>
                    {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!}
                    <p class="messenger-title text-primary"><span>All Messages</span></p>
                    <div class="listOfContacts" style="width: 100%;height: calc(100% - 272px);position: relative;"></div>
                </div>
                <div class="messenger-tab search-tab app-scroll" data-view="search" style="margin-top:25px">
                        <p class="messenger-title text-primary"><span>Search</span></p>
                        <div class="search-records">
                            <p class="message-hint center-el text-primary"><small>Type to search..</small></p>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="messenger-messagingView" style="overflow: auto; height:700px;">
                <div class="m-header m-header-messaging" >
                    <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                    
                        <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                            <a href="#" class="show-listView"><i class="fas fa-arrow-left text-primary"></i></a>
                            <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                            </div>
                            <a href="#" class="user-name text-primary">{{ config('chatify.name') }}</a>
                        </div>
                        <nav class="m-header-right">
                            <a href="#" class="add-to-favorite"><i class="fas fa-star text-primary"></i></a>
                            <a href="/"><i class="fas fa-home text-primary"></i></a>
                            <a href="#" class="show-infoSide"><i class="fas fa-info-circle text-primary"></i></a>
                        </nav>
                    </nav>
                    <div class="internet-connection">
                        <span class="ic-connected">Connected</span>
                        <span class="ic-connecting">Connecting...</span>
                        <span class="ic-noInternet">No internet access</span>
                    </div>
                </div>
                <div class="m-body messages-container app-scroll">
                    <div class="messages">
                        <p class="message-hint center-el text-primary"><span>Please select a chat to start messaging</span></p>
                    </div>
                    <div class="typing-indicator">
                        <div class="message-card typing">
                            <div class="message">
                                <span class="typing-dots">
                                    <span class="dot dot-1"></span>
                                    <span class="dot dot-2"></span>
                                    <span class="dot dot-3"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                   
                </div>
                
                @include('Chatify::layouts.sendForm')
            </div>
            <div class="messenger-infoView app-scroll">
                <nav>
                    <p class="text-primary">User Details</p>
                    <a href="#"><i class="fas fa-times text-primary"></i></a>
                </nav>
                {!! view('Chatify::layouts.info')->render() !!}
            </div>
        </div>
        @include('Chatify::layouts.modals')
        @include('Chatify::layouts.footerLinks') 
      </div>
    </section>
</main>



<?php
$system = App\Models\Setting::first();
?>

  <!-- jQuery -->
  <script src="{{asset("storage/website/assets")}}/libs/jQuery/jquery-3.7.0.min.js"></script>
  <!-- bootstrap -->
  <script src="{{asset("storage/website/assets")}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- jquery nice select -->
  <script src="{{asset("storage/website/assets")}}/libs/jquery-nice-select/js/jquery.nice-select.min.js"></script>
  <!-- isotope -->
  <script src="{{asset("storage/website/assets")}}/libs/isotope/isotope.pkgd.min.js"></script>
  <!-- slick -->
  <script src="{{asset("storage/website/assets")}}/libs/slick/slick.min.js"></script>
  <!-- emoji mart -->
  <script src="{{asset("storage/website/assets")}}/libs/emoji-mart/emoji-mart.js"></script>
  <!-- scripts -->
  <script src="{{asset("storage/website/assets")}}/scripts/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

  @stack('modal_js')

 
  <script>
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //copy to clickboard
        $(document).on("click", ".copyToClick", function () {
            var id = $(this).data('id');
            // alert(id);
            // console.log(id);
            $.ajax({
                url: "{{ route('user.copyToClickBoard','') }}"+"/"+id,
                method: "get",
                contentType: "application/json",
                success: function(res) {
                    if(res.status === true){
                        var message = res.message;
                        var temp = $("<input>");
                        $("body").append(temp);
                        temp.val(message).select();
                        document.execCommand("copy");
                        temp.remove();
                        alert("Text Copied");
                       
                    }else{
                        console.log((res));
                    }
                },
                error: function(res){
                    console.log((res));
                }
              });
            
            
        });
        
        



      $('#burger').on('click',function(){
       var value= $('.order-1').attr("aria-expanded")
       if(value == 'true'){
        $('#burger').addClass('hide')
        $('.cross').removeClass('hide')
       }
      })
      $('.cross').on('click', function(){
        $('.cross').addClass('hide')
        $('#burger').removeClass('hide')
       })
    })
  </script>
</body>
</html>


