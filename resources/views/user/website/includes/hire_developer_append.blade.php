<div class="col-lg-10">
    @forelse ($users as $user)
            <div class="search-result--item">
          <div class="d-flex gap-3">
            <h4 class="mb-0">{{ $user->name ?? "" }}</h4>
            <ul class="list-unstyled rating-stars rating-stars--sm">
              <li><i class="fa-solid fa-star"></i></li>
              <li><i class="fa-solid fa-star"></i></li>
              <li><i class="fa-solid fa-star"></i></li>
              <li><i class="fa-solid fa-star-half-stroke"></i></li>
              <li><i class="fa-regular fa-star"></i></li>
            </ul>
          </div>
          <div class="row g-4">
            <div class="col-lg-7">
              <div class="search-result--block">
                <div class="profile-avatar">
                  <img
                    src="@if(isset($user->profile_photo_path)) {{ asset('/storage/profile/'.$user->profile_photo_path) }} @else {{ asset('/storage/profile/avatar.png') }} @endif"
                    alt="Avatar"
                    width="121"
                    height="121"
                  />
                  @if(isset($user->last_seen) && $user->last_seen == 'Online') <span class="online-status"></span> @else <span class="offline-status"></span> @endif
                  
                  
                </div>
                <p>{{ $user->profession ?? "" }} with +{{ $user->experience ?? "" }} yr(s) of experience</p>
              </div>
              <div class="search-result--block">
                <div class="ps-icon">
                  <i class="fa-solid fa-laptop-code"></i>
                </div>
                <div>
                  <p>
                    {{ $user->description ?? "" }}
                  </p>
                </div>
              </div>
              <div class="search-result--block">
                <div class="ps-icon">
                  <i class="fa-solid fa-briefcase"></i>
                </div>
                <p>{{ $user->profession ?? "" }}</p>
              </div>
              <div class="search-result--block">
                <div class="ps-icon">
                  <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <p>{{ $user->education ?? "" }}</p>
              </div>
              <div class="search-result--block">
                <div class="ps-icon">
                  <i class="fa-solid fa-globe"></i>
                </div>
                <div>
                  <div class="d-flex flex-wrap gap-2 align-items-center mb-2">
                    @php
                        $languages = explode(',', $user->language)
                    @endphp
                    @foreach ($languages as $language)
                        <a href="#" class="btn btn-sm btn-primary">
                          {{ $language ?? "" }}
                        </a>
                    @endforeach
                    
                   
                  </div>
                  <div class="d-flex flex-wrap gap-2 align-items-center">
                    <a
                      href="{{ url('/promptscripting-chat/'.$user->id) }}"
                      target="_blank"
                      class="btn btn-primary-reverse"
                    >
                      Send Message
                      <i class="fa-regular fa-comments"></i>
                    </a>
                    <a
                      href="#"
                      target="_blank"
                      class="btn btn-lime-green"
                    >
                      Hire Me
                      <i class="fa-solid fa-hand-holding-dollar"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="search-result--media">
                <div class="ratio ratio-16x9 rounded-3 mb-3">
                  <video
                    width="415"
                    height="240"
                    controls
                    class="rounded-3"
                  >
                    <source
                      src="@if(isset($user->video)) {{ asset('/storage/profile/'.$user->video) }} @else @endif"
                      type="video/mp4"
                    />
                    Your browser does not support the video tag.
                  </video>
                </div>
                <div class="d-grid">
                  <a href="{{ route('user.login') }}" class="btn btn-primary">
                    Sign up to view profile
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr class="ps-hr" />
    @empty
        No Data Found
    @endforelse
    
    
  </div>