@extends('website.includes.master')

@section('title')
    Service Details
@endsection

@section('content')
<main class="flex-shrink-0">
    <section class="hero-marketplace marketplace-area section bg-body">
        <div class="container pt-4">
            <div class="row">
                <div class="col-8">
                    
                    <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="{{asset('uploads/gigs/'.$service->gig_image)}}" class="d-block w-100" alt="{{$service->gig_title}}" style="max-height: 436px">
                          </div>
                        </div>
                        {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button> --}}
                      </div>
                    
                    <h3 class="text-white mt-3 mb-0">
                        {{ucwords($service->gig_title)}}
                    </h3>
                    <div class="card-header mute text-secondary d-flex justify-content-between">
                            <small>Posted By: {{ucwords($service->user->name)}}, {{date("M jS 'y",strtotime($service->created_at))}}</small>
                            <div class="">
                               <span class="mx-2"> <i class="fa-regular fa-eye me-1"></i><small>{{$service->views}}</small></span>
                               
                                <span><a href="" class="updateReact text-decoration-none" data-id={{$service->id}}><i id="changeColor" class="fa-solid fa-heart text-danger me-1"></i><small class="reactCount">{{$service->reacts}}</small></a></span>
                            </div>
                    </div>
                    <div class="text-white mt-3">
                        {!!ucwords($service->gig_description)!!}
                    </div>
                    {{-- comment section --}}
                   @if($service->getComment()->count())
                    <div class="text-secondary">
                        <div class="card-header my-2">
                            Comments {{'('.$service->getComment()->count().')'}}
                        </div>
                        <div class="card-body mb-3">
                            @foreach ($service->getComment as $comment)
                                <div class="mt-0 p-3">
                                    <div class="d-flex justify-content-between me-3">
                                            <div class="d-flex">
                                                <a href="#"><img class="img-fluid"  height="30px" width="30px" alt="{{$service->user->name}}" src="{{asset('uploads/seller')}}/{{'default.png'}}" style="border-radius: 50%"> </a>
                                                <h6 class="mt-1 mb-1 mx-2">{{ucwords($comment->getUser->name)}}</h6>
                                            </div>
                                            <div class="">
                                                <small class=""><i class="fa-regular fa-clock"></i> {{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</small>
                                            </div>
                                    </div>
                                    <p class="font-13  mb-2 mt-0 text-light" style="margin-left: 40px">
                                        {{$comment->comment}}
                                    </p>
                                    {{-- Replies --}}
                                        @if($comment->getReply->count())
                
                                            @foreach ($comment->getReply as $reply)
                                            <div class="d-flex justify-content-between me-3 mt-4" style="margin-left:40px">
                                                <div class="d-flex">
                                                    <a href="#"><img class="img-fluid"  height="30px" width="30px" alt="{{$reply->getUser->name}}" src="{{asset('uploads/seller')}}/{{'default.png'}}" style="border-radius: 50%"> </a>
                                                    <h6 class="mt-1 mb-1 mx-2">{{ucwords($reply->getUser->name)}}</h6>
                                                </div>
                                                <div class="">
                                                    <small class=""><i class="fa-regular fa-clock"></i> {{\Carbon\Carbon::parse($reply->created_at)->diffForHumans()}}</small>
                                                </div>
                                            </div>
                                            <p class="mb-2 mt-0 text-light" style="margin-left: 80px">
                                                {{$reply->reply}}
                                            </p>
                                            @endforeach
                                        @endif
                                   
                                        <a href="" class="text-decoration-none d-flex justify-content-end" data-bs-toggle="modal" data-bs-target="#replyModal-{{$comment->id}}">Reply</a>
                                </div>
                               @push('all-modals')
                                    <!-- Modal -->
                                        <div class="modal fade" id="replyModal-{{$comment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h1 class="modal-title fs-6 text-muted" id="exampleModalLabel">Wtite Your Reply</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <form action="{{route('reply.store')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                                    <div class="from-group mb-3">
                                                        <textarea name="reply" id="reply" class="form-control mb-3 border border-secondary" cols="30" rows="5" placeholder="say something..."></textarea>
                                                        @error('reply')
                                                            <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Send Reply <i class="fa-solid fa-paper-plane me-1"></i></button>
                                                    </div>
                                                </form>
                                                </div>
                                               
                                            </div>
                                            </div>
                                        </div>
                                @endpush
                                
                            @endforeach
                        </div>
                    </div>
                   @endif

                    
                    @if(Auth::guard('buyer')->user() || Auth::guard('seller')->user())
                        
                    
                    <div class="card-header bg-body text-secondary">
                        <h5>
                            <strong>Leave a comment</strong>
                        </h5>
                        <form action="" class="form-ontrol">
                            @csrf
                            <input type="hidden" name="serviceId" id="serviceId" value="{{$service->id}}">
                            {{-- <div class="form-group">
                                <input type="text" id="name" class="form-control mb-3 bg-body border border-secondary" value="{{Auth::guard('buyer')->user()->name ?? ''}}" name="name" placeholder="Your Name *" >
                                <small class="error text-danger" id="name-error"></small>
                            </div>
                            <div class="form-group">
                                <input type="email" id="email" class="form-control mb-3 bg-body border border-secondary" value="{{Auth::guard('buyer')->user()->email ?? ''}}" name="email" placeholder="Email Address *">
                                <small class="error text-danger" id="email-error"></small>
                            </div> --}}
                            <div class="from-group">
                                <textarea name="comment" id="comment" class="form-control mb-3 bg-body border border-secondary" cols="30" rows="5" placeholder="say something..."></textarea>
                                <small class="error text-danger" id="comment-error"></small>
                            </div>
                            <div class="from-group">
                                <button type="submit" id="serviceComment" class="bg-body btn btn-primary form-control">Send Comment <i class="fa-solid fa-paper-plane me-1"></i></button>
                            </div>
                            <div class="alert alert-primary mt-2 hide text-center" id="commentSuccess"><i class="fa-solid fa-circle-check me-1"></i>Comment Sent Successfully</div>
                            <div class="alert alert-danger mt-2 hide  commentDanger" id="commentDanger"></div>
                            
                        </form>
                               
                    </div>

                    @else

                    
                        <div class="bg-body" role="alert">
                            <h5 class="text-secondary"><a href="{{route('login')}}">Login</a>  to leave a comment</h5>
                        </div>
                    @endif
                    
                    
                    
                    
                </div>
                <div class="col-4">
                    <div  class="border  bg-primary  rounded  w-100" style="height: 50px">
                        <h5 class="text-center text-bold pt-2">
                            Related Posts
                        </h5>
                    </div>
                    @forelse ($relatedPosts  as $post )
                    <div class="card mt-2 bg-body  border-secondary">
                        <a href="{{route('gig.details', $post->id)}}">
                        <img src="{{asset('uploads/gigs/'.$service->gig_image)}}" class="card-img-top" alt="..." style="max-height: 150px">
                        </a>
                        <div class="card-body">
                          <a href="{{route('gig.details', $post->id)}}" class="text-decoration-none">
                            <h6 class="card-title text-white mb-0">{{Str::limit($post->gig_title,30)}}</h6>
                        </a>
                          <div class="d-flex justify-content-between mt-1">
                            <small class="text-secondary">Category: {{$post->getCategory->category_name}}</small>
                            <small class="text-secondary mx-1"><i class="fa-solid fa-calendar-days"></i> {{$post->created_at->format("M jS 'y")}}</small>
                          </div>
                          <div class="d-flex justify-content-between">
                            <small class="text-secondary">Author: <b class="text-primary">{{ucwords($post->user->name)}}</b></small>
                            <small class="text-secondary mx-1">
                                <span class="mx-2"> <i class="fa-regular fa-eye me-1"></i><small>{{$post->views ?? '0'}} {{$post->tags}}</small></span>
                                <span class="mx-2"> <i class="fa-regular fa-heart me-1"></i><small>{{$post->reacts ?? '0'}}</small></span>
                            </small>
                          </div>
                          
                          {{-- <p class="card-text">{{Str::limit($post->gig_description,50)}}</p> --}}
                        </div>
                    </div>
                    
                    @empty
                       <div class="alert alert-light mt-2"> Nothing Found</div>
                    @endforelse
                    
                </div>
            </div>
        </div>
    </section>
</main>


@endsection

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
    <script>
        $(document).ready(function(){
           
            $('.updateReact').on('click', function(e){
               e.preventDefault();
               var id = $(this).attr('data-id');
              
               $.ajax({
                    type: "get",
                    url: "{{route('service.react')}}",
                    data:{
                        id: id
                    },success: function(res){
                        if(res.status == 1){
                            $('#changeColor').removeClass('fa-regular')
                            $('#changeColor').addClass('fa-solid')
                        }
                        if(res.status == 0){
                            $('#changeColor').removeClass('fa-solid')
                            $('#changeColor').addClass('fa-regular')
                        }
                        $('.reactCount').text(res.data)
                    }
               });
            })

            $('#serviceComment').click(function(e){
                e.preventDefault();
                var serviceId = $('#serviceId').val();
                var name = $('#name').val();
                var email = $('#email').val();
                var comment = $('#comment').val();

                $.ajax({
                    type: "post",
                    url:"{{route('servicecomment.store')}}",
                    data:{
                        id:serviceId,
                        name:name,
                        email:email,
                        comment:comment
                    },success:function(res){
                       if(res.status == 'success'){
                        $('#commentDanger').addClass('hide');
						$('#comment').val('')
                        $('#commentSuccess').removeClass('hide')
                        setTimeout(() => {
                            $('#commentSuccess').fadeOut()
                        }, 2000);
						
						location.reload()
                       }
                    },error:function(err){
                        let error = err.responseJSON;
                        console.log(error)
                        $.each(error.errors,function(index, value){
								$('#commentDanger').html('');
								$('#commentDanger').removeClass('hide');
						 		$('#commentDanger').append('<li>'+value+'</li>');
								
                            })
                       }
                })
            })
        })
    </script>
     
      <script>
          $(document).ready(function(){
              @if($errors->has('reply')) {
                  $('#replyModal-{{$comment->id}}').modal('show')
              }
              @endif
          })
      </script>
     
@endpush
