@extends('admin.layout.master')

@section('title')
    Job Post Lists
@endsection

<link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">


@section('content')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">job-post-lists</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-md-10"><h6 class="card-title">Job Post Lists</h6></div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableJobPostLists" class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>User</th>
                                    <th>Category</th>
                                    <th>Sub-Category</th>
                                    <th>Title</th>
                                    <th>Budget</th>
                                    <th>Deadline</th>
                                    <th>Bids</th>
                                    <th>Job Status</th>
                                    <th>Status</th>
                                    <th>Payment_id</th>
                                    <th>Payment Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($jobPostLists as $jobPostList)
                                        
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $jobPostList->user->name }}</td>
                                            <td>{{ $jobPostList->category->category_name }}</td>
                                            <td>{{ $jobPostList->subCategory->sub_category_name }}</td>
                                            <td>{{ $jobPostList->title }}</td>
                                            <td>{{ $jobPostList->budget }}</td>
                                            <td>{{ $jobPostList->deadline }}</td>
                                            <td>
                                                <table style="width:100%; border:1px solid black">
                                                    <tr>
                                                      <th style="border:1px solid black">User</th>
                                                      <th style="border:1px solid black">Bidding</th> 
                                                      <th style="border:1px solid black">Deadline</th>
                                                    </tr>
                                                    @forelse ($bids = $jobPostList->bids as $bid)
                                                    <tr>
                                                        <td style="border:1px solid black">{{ $bid->user->name }}</td>
                                                        <td style="border:1px solid black">{{ $bid->biding_budget }}</td>
                                                        <td style="border:1px solid black">{{ $bid->biding_deadline }}</td>
                                                    </tr>
                                                    @empty
                                                    @endforelse
                                                   
                                                  </table>
                                            </td>
                                            <td>{{ $jobPostList->job_status }}</td>
                                            <td>{{ $jobPostList->status }}</td>
                                            <td>{{ $jobPostList->payment_id }}</td>
                                            <td>{{ $jobPostList->payment_status }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    View
                                                  </button>
                                                  @if ($jobPostList->job_status == "Ban")
                                                  <a href="javascript:;" class="btn btn-sm btn-warning jobPostUnban" getUrl="{{ route('admin.jobPostUnban',['jobPost'=>$jobPostList->id]) }}" jobPostId="{{ $jobPostList->id }}">Unban</a>
                                                  @else
                                                  <a href="javascript:;" class="btn btn-sm btn-warning jobPostBan" getUrl="{{ route('admin.jobPostBan',['jobPost'=>$jobPostList->id]) }}" jobPostId="{{ $jobPostList->id }}">Ban</a>
                                                  @endif
                                            </td>
                                            {{-- view --}}
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Job Post View</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <h5 class="text-center"><strong>Description</strong></h5>
                                                                <p>{!! $jobPostList->description !!}</p>
                                                                
                                                            </div>
                                                            <div class="col-sm-12 mt-3">
                                                                <h5 class="text-center"><strong>Post Thumbnil</strong></h5>
                                                                <a href="{{ asset('/storage/job_post_thumbnil/'.$jobPostList->job_post_thumbnil) }}" download><img style="width: 100%; height:220px;" src="{{ asset('/storage/job_post_thumbnil/'.$jobPostList->job_post_thumbnil) }}" alt="job-post-thumbnil"></a>
                                                                
                                                            </div>
                                                            <div class="col-sm-12 mt-3">
                                                                <h5 class="text-center"><strong>Post Images</strong></h5>
                                                                @foreach ($images = $jobPostList->jobPostImages as $image)
                                                                <a href="{{ asset('/storage/job_post_images/'.$image->image) }}" download>
                                                                    <img style="width: 100%; height:220px;" src="{{ asset('/storage/job_post_images/'.$image->image) }}" alt="job-post-thumbnil">
                                                                </a>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="float: right;">
                                {{ $jobPostLists->links() }}
                           </div>
                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')

    <script src="{{ URL::asset('admin/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/data-table.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
       $(document).ready(function() {

           

            $(document).on("click", ".jobPostBan", function () {
                var jobPostId = $(this).attr('jobPostId');
                var url = $(this).attr('getUrl');
                
                Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to ban this job!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Ban it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href=url
                    }
                })
            });

            $(document).on("click", ".jobPostUnban", function () {
                var jobPostId = $(this).attr('jobPostId');
                var url = $(this).attr('getUrl');
        
                Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to unban this job!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Unban it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href=url
                    }
                })
            });

            $('#dataTableJobPostLists').DataTable( {
                "paging":   false,
                "ordering": false,
                "info":     false
            } );
        } );

   </script>
@endsection
