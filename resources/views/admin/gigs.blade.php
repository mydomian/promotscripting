@extends('admin.layout.master')

@section('title')
    Gig Lists
@endsection

<link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">


@section('content')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">gig-lists</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-md-10"><h6 class="card-title">Gig Lists</h6></div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTablegigLists" class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>User</th>
                                    <th>Category</th>
                                    <th>Sub-Category</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Tags</th>
                                    <th>Created</th>
                                    <th>Views</th>
                                    <th>Reacts</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($gigs as $gig)
                                        
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $gig->user->name }}</td>
                                            <td>{{ $gig->getCategory->category_name }}</td>
                                            <td>{{ $gig->getSubCategory->sub_category_name ?? "" }}</td>
                                            <td>{{ $gig->gig_title }}</td>
                                            <td>{{ $gig->starting_price }}</td>
                                            <td>{{ $gig->gig_tags }}</td>
                                            <td>{{ $gig->created_at }}</td>
                                            <td>{{ $gig->views ?? 0 }}</td>
                                            <td>{{ $gig->reacts ?? 0}}</td>
                                            <td>{{ $gig->status }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalGigView{{ $gig->id }}">
                                                    View
                                                  </button>
                                                  @if ($gig->status == "Ban")
                                                  <a href="javascript:;" class="btn btn-sm btn-warning gigUnban" getUrl="{{ route('admin.gigUnban',['gig'=>$gig->id]) }}" gigId="{{ $gig->id }}">Unban</a>
                                                  @else
                                                  <a href="javascript:;" class="btn btn-sm btn-warning gigBan" getUrl="{{ route('admin.gigBan',['gig'=>$gig->id]) }}" gigId="{{ $gig->id }}">Ban</a>
                                                  @endif
                                            </td>
                                            {{-- view --}}
                                            <div class="modal fade" id="exampleModalGigView{{ $gig->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Gig View</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <h5 class="text-center"><strong>Description</strong></h5>
                                                                <p>{!! $gig->gig_description !!}</p>
                                                                
                                                            </div>
                                                            <div class="col-sm-12 mt-3">
                                                                <h5 class="text-center"><strong>Gig Image</strong></h5>
                                                                <a href="{{ asset('/uploads/gigs/'.$gig->gig_image) }}" download><img style="width: 100%; height:220px;" src="{{ asset('/uploads/gigs/'.$gig->gig_image) }}" alt="Gig Image"></a>
                                                                
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
                                {{ $gigs->links() }}
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

           

            $(document).on("click", ".gigBan", function () {
                var gigId = $(this).attr('gigId');
                var url = $(this).attr('getUrl');
                
                Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to ban this gig!",
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

            $(document).on("click", ".gigUnban", function () {
                var jobPostId = $(this).attr('gigId');
                var url = $(this).attr('getUrl');
        
                Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to unban this gig!",
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

            $('#dataTablegigLists').DataTable( {
                "paging":   false,
                "ordering": false,
                "info":     false
            } );
        } );

   </script>
@endsection
