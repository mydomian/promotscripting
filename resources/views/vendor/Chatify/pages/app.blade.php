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
                    <div class="d-flex align-items-center gap-2 mb-2">
                      <div class="profile-avatar--sm position-relative">
                        <img
                          src="@if(Auth::user()->profile_photo_path) {{ asset('/storage/profile/'.Auth::user()->profile_photo_path) }} @else {{ asset('/storage/profile/'.Auth::user()->avatar) }} @endif"
                          alt="Avatar"
                          width="121"
                          height="121"
                        />
                        
                        <span
                          class="online-status"
                          style="
                            background-color: rgba(var(--ps-green), var(--ps-bg-opacity));
                          "
                        ></span>
                      </div>
                      <div>
                        <h6 class="current-user--username text-white mb-1 mb-md-2">{{ Auth::user()->name }}</h6>
                      </div>
                    </div>
                      <nav class="m-header-right">
                          {{-- <a href="#"><i class="fas fa-cog settings-btn"></i></a> --}}
                          <a href="#" class="listView-x" style="margin-top: -60px;"><i class="fas fa-times text-primary" ></i></a>
                      </nav> 
                  </nav>
                  <div class="d-flex gap-2 user-search-area mb-3 px-2 px-xl-3">
                    <div class="user-search-box flex-grow-1">
                      <i class="fa-solid fa-magnifying-glass-minus text-primary"></i>
                      <input
                        type="search"
                        name="user-search"
                        id="user-search"
                        placeholder="People, groups, messages..."
                        class="form-control messenger-search"
                      />
                    </div>
                    <button type="button" class="btn btn-light">
                      <svg
                        class="ps-icon"
                        width="30"
                        height="30"
                        viewBox="0 0 30 30"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M27.2359 6.96812V20.792C27.2359 22.5565 25.9703 23.2988 24.4249 22.447L22.0763 21.1327C21.8816 21.0232 21.7599 20.8163 21.7599 20.5973V11.6897C21.7599 8.59876 19.2409 6.07979 16.15 6.07979H11.1973C10.747 6.07979 10.4306 5.60521 10.6375 5.2158C11.2703 4.01108 12.5358 3.18359 13.9839 3.18359H23.4513C25.5322 3.18359 27.2359 4.88724 27.2359 6.96812Z"
                          fill="#9AC6B7"
                        />
                        <path
                          d="M16.1501 7.90625H6.68272C4.60184 7.90625 2.89819 9.6099 2.89819 11.6908V25.5147C2.89819 27.2791 4.16376 28.0215 5.70921 27.1696L10.4916 24.5046C11.0027 24.2248 11.8302 24.2248 12.3413 24.5046L17.1236 27.1696C18.6691 28.0215 19.9347 27.2791 19.9347 25.5147V11.6908C19.9347 9.6099 18.231 7.90625 16.1501 7.90625ZM13.8502 16.2663H12.3291V17.7874C12.3291 18.2863 11.9154 18.7001 11.4164 18.7001C10.9175 18.7001 10.5038 18.2863 10.5038 17.7874V16.2663H8.98265C8.48372 16.2663 8.06998 15.8525 8.06998 15.3536C8.06998 14.8547 8.48372 14.441 8.98265 14.441H10.5038V12.9198C10.5038 12.4209 10.9175 12.0072 11.4164 12.0072C11.9154 12.0072 12.3291 12.4209 12.3291 12.9198V14.441H13.8502C14.3491 14.441 14.7629 14.8547 14.7629 15.3536C14.7629 15.8525 14.3491 16.2663 13.8502 16.2663Z"
                          fill="#9AC6B7"
                        />
                      </svg>
                    </button>
                  </div>
                  <div class="px-2 px-xl-3">
                    <ul
                      class="nav nav-pills user-nav-pills"
                      id="pills-tab-users"
                      role="tablist"
                    >
                      <li class="nav-item" role="presentation">
                        <button
                          class="nav-link active"
                          id="pills-1-tab"
                          data-bs-toggle="pill"
                          data-bs-target="#pills-1-pane"
                          type="button"
                          role="tab"
                          aria-controls="pills-1-pane"
                          aria-selected="true"
                        >
                          All
                        </button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button
                          class="nav-link"
                          id="pills-2-tab"
                          data-bs-toggle="pill"
                          data-bs-target="#pills-2-pane"
                          type="button"
                          role="tab"
                          aria-controls="pills-2-pane"
                          aria-selected="false"
                        >
                          Unread
                        </button>
                      </li>
                    </ul>
                  </div>
                  {{-- <div class="user-search-box flex-grow-1 mx-2">
                      <i class="fa-solid fa-magnifying-glass-minus text-primary"></i>
                      <input
                        type="search"
                        name="user-search"
                        id="user-search"
                        placeholder="People, groups, messages..."
                        class="form-control messenger-search"
                      />
                  </div> --}}
                  <div class="m-body contacts-container px-2 px-xl-3 scrollbar-colored">
                    <div class="show messenger-tab users-tab app-scroll" data-view="users">
                        <div class="favorites-section">
                            <h6 class="text-primary text-uppercase">Favorite</h6>
                            <div class="messenger-favorites app-scroll-hidden "></div>
                        </div>
                        {{-- <p class="messenger-title text-primary" style="margin-top:25px"><span>Your Space</span></p> --}}
                        {{-- {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!} --}}
                        {{-- <p class="messenger-title text-primary"><span>All Messages</span></p> --}}
                        <div class="listOfContacts" style="width: 100%;height: calc(100% - 272px);position: relative;"></div>
                    </div>
                    <div class="messenger-tab search-tab app-scroll" data-view="search" style="margin-top:25px">
                      <h6 class="text-primary text-uppercase">chats</h6>
                            <div class="search-records">
                                {{-- <p class="message-hint center-el text-primary"><small>Type to search..</small></p> --}}
                            </div>
                    </div>
                  </div>
              </div>
          </div>
         
      
          <div class="messenger-messagingView" style="overflow: auto; height:1035px;">
              <div class="m-header m-header-messaging" >
                  <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">


                    <div class="d-flex align-items-center gap-1 gap-lg-1">
                      <a href="#" class="show-listView"><i class="fas fa-arrow-left text-primary"></i></a>
                      <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;"></div>
                      <div>
                        <a href="#" class="user-name text-dark mb-0 mb-md-1 line-clamp">{{ config('chatify.name') }}</a>
                        <div class="d-flex align-items-center gap-2 isOnline">
                          <span
                            class="flex-shrink-0 p-1 rounded-pill"
                            style="background-color: #27ae60"
                          ></span>
                          <small class="">Online</small>
                          
                        </div>
                        <div class="d-flex align-items-center gap-2 isOffline d-none">
                          <span
                            class="flex-shrink-0 p-1 rounded-pill"
                            style="background-color: #969696"
                          ></span>
                          <small class="">Offline</small>
                          
                        </div>
                      </div>
                    </div>
                  
                      {{-- <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                          <a href="#" class="show-listView"><i class="fas fa-arrow-left text-primary"></i></a>
                          <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;"></div>
                          
                          <a href="#" class="user-name text-dark mb-0 mb-md-1 line-clamp">{{ config('chatify.name') }}</a>
                          <div class="d-flex align-items-center gap-2">
                            
                            <span class="flex-shrink-0 p-1 rounded-pill"style="background-color: #27ae60"></span>
                            <small class="">Online</small>
                          </div>
                      </div> --}}
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

  @stack('all-modals')
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
           
            // console.log(id);
            $.ajax({
                url: "{{ route('user.copyToClickBoard','') }}"+"/"+id,
                method: "get",
                contentType: "application/json",
                success: function(res) {
                 
                
                  
                    if(res.status === true){

                      if(res.attachment === null){
                        var message = res.message;
                        var temp = $("<input>");
                        $("body").append(temp);
                        temp.val(message).select();
                        document.execCommand("copy");
                        temp.remove();
                        alert("Text Copied");
                      }else{
                        var message = "<img src='http://127.0.0.1:8000/storage/attachments/"+res.attachment+"'>";
                        var temp = $("<input>");
                        $("body").append(temp);
                        temp.val(message).select();
                        document.execCommand("copy");
                        temp.remove();
                        alert("Text Copied");
                      }
                    
                       
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


