<div class="col-lg-10">
    @forelse ($users as $user)
            <div class="search-result--item">
          <div class="d-flex gap-3">
            <h4 class="mb-0">{{ $user->name ?? "" }}</h4>
            @php
                $rating = App\Models\Rating::where(['from_id'=>Auth::id(),'to_id'=>$user->id])->first();
                $ratingSum = App\Models\Rating::where('to_id',$user->id)->sum('rating') ;
                $ratingCount = App\Models\Rating::where('to_id',$user->id)->count();

                if ($ratingCount != 0) {
                    $ratingAvg = $ratingSum / $ratingCount;
                }else{
                  $ratingAvg = 0;
                }
            @endphp
            @if (isset($rating))
              <div>
                <?php $count = 1; while ($count <= $rating->rating) { ?>
                  <span class="star fa fa-star checked" data-id="{{ $user->id }}" value="{{ $rating->rating }}"></span>
                <?php $count ++; } ?>
              </div> ({{$ratingAvg }})
            @else
              <div class="rating" userId="{{ $user->id }}">
                <span class="star fa fa-star" data-id="{{ $user->id }}" value="1"></span>
                <span class="star fa fa-star" data-id="{{ $user->id }}" value="2"></span>
                <span class="star fa fa-star" data-id="{{ $user->id }}" value="3"></span>
                <span class="star fa fa-star" data-id="{{ $user->id }}" value="4"></span>
                <span class="star fa fa-star" data-id="{{ $user->id }}" value="5"></span>
              </div> ({{ $ratingAvg }})
            @endif
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
                <p>{{ $user->profession ?? "" }} with +{{ $user->experience ?? "0" }} yr(s) of experience</p>
              </div>
              @if (isset($user->description))
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
              @endif
              @if (isset($user->profession))
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
              @endif
              @if (isset($user->language))
              <div class="search-result--block">
                <div class="ps-icon">
                  <i class="fa-solid fa-globe"></i>
                </div>
                <div>
                  @php
                    $languages = explode(',', $user->language)
                   @endphp
                  
                    @foreach ($languages as $language)
                    <div class="d-flex flex-wrap gap-2 align-items-center mb-2">
                        <a href="#" class="btn btn-sm btn-primary">
                          {{ $language }}
                        </a>
                    </div>
                  @endforeach 
                 
                </div>
              </div>
              @endif
              
              <div class="d-flex flex-wrap gap-2 align-items-center">
                <a
                  href="{{ url('/promptscripting-chat/'.$user->id) }}"
                  target="_blank"
                  class="btn btn-primary-reverse"
                >
                  Send Message
                  <i class="fa-regular fa-comments"></i>
                </a>
                @php
                    $hireDev = App\Models\HireDeveloper::where(['to_id'=>$user->id,'from_id'=>Auth::id()])->where('status','accept')->first()
                @endphp
                @if (isset($hireDev))
                    <a href="#" class="btn btn-warning disabled" data-bs-toggle="modal" data-bs-target="#hireDevModal{{ $user->id }}">
                      Already Hired
                      <i class="fa-solid fa-hand-holding-dollar"></i>
                    </a>
                 @else
                  <a href="#" class="btn btn-lime-green" data-bs-toggle="modal" data-bs-target="#hireDevModal{{ $user->id }}">
                    Hire Me
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                  </a>
                @endif
                
              </div>
             
            </div>
            <div class="col-lg-5 videoPart">
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

        @push('all-modals')
        <!-- Modal -->
        <div class="modal fade" id="hireDevModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999">
          <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('user.hireDeveloperStore') }}" method="post" enctype="multipart/form-data">
              @csrf
            <div class="modal-content bg-dark">
              <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Hire Developer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                      <div class="card-body">
                          <div class="row g-4">
                           
                            
                            <div class="col-sm-6">
                              <label class="text-primary">Type?</label>
                              <select name="type" id="type" class="ps-select wide bg-transparent text-primary" required>
                                <option value="">Select</option>
                                <option value="hourly">Hourly</option>
                                <option value="daily">Daily</option>
                                <option value="weekly">Weekly</option>
                                <option value="byweekly">By Weekly</option>
                                <option value="monthly">Monthly</option>
                              </select>
                            </div>
                            <div class="col-sm-6">
                              <label class="text-primary">Price?</label>
                              <input
                                type="number"
                                name="price"
                                id="price"
                                placeholder="Enter Price..."
                                class="form-control bg-transparent" 
                                style="border:1px solid #9AC6B7"
                                step="any"
                                required
                              />
                            </div>
                            <div class="col-sm-12">
                              <label class="text-primary">Title?</label>
                              <input
                                  type="text"
                                  name="title"
                                  id="title"
                                  placeholder="Enter Title..."
                                  class="form-control bg-transparent" 
                                  style="border:1px solid #9AC6B7"
                                  required
                              />
                            </div>
                            <div class="col-sm-12">
                              <label class="text-primary">Description?</label>
                              <textarea name="description" style="border:1px solid #9AC6B7" id="description" class="form-control bg-transparent"  placeholder="Enter Description..." required></textarea>
                             
                            </div>
                            <div class="col-sm-12">
                              <label class="text-primary">Sample? (Optional)</label>
                              <input type="file" name="sample[]" class="form-control bg-transparent" style="border:1px solid #9AC6B7" accept="image/*" multiple>
                             
                            </div>
                            <input type="hidden" name="to_id" id="to_id"  value="{{ $user->id }}">
                          </div>
                        </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary customOfferOrder">Hire</button>
              </div>
            </div>
          </form>
          </div>
        </div>
      @endpush




    @empty
        No Data Found
    @endforelse
  </div>



 








  @push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $(".star").on('click',function () {
                  var userId = $(this).data('id');
                  var value = $(this).attr('value');
                 
                  $.ajax({
                    url:"{{ route('user.rating') }}",
                    method:"post",
                    data:{userId:userId,value:value},
                    success:function (response) {
                      if(response.status == 'added'){
                        Swal.fire({
                            title: response.title,
                            icon: 'success',
                          }).then((result) => {
                            if (result.isConfirmed) {
                              location.reload(true);
                            }
                          })
                      }
                      if(response.status == 'exits'){
                        Swal.fire({
                            title: response.title,
                            icon: 'warning',
                          }).then((result) => {
                            if (result.isConfirmed) {
                            }
                          })
                        
                      }
                    },
                    error: function(error) {
                       console.log((error));
                    }
                  });
              });
  </script>
  @endpush