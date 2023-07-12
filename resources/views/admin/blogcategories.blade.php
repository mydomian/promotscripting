@extends('admin.layout.master')

@section('title')
    Categories
@endsection

<link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">

@section('content')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categories</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-md-10"><h6 class="card-title">Categories</h6></div>
                            <div class="col-md-2">
                                <button class="btn btn-outline-dark w-100" type="button" data-bs-toggle="modal"
                                        data-bs-target="#AddCategory">Add Categories
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ $category->status }}</td>
                                        <td>{{ Carbon\Carbon::parse($category->created_at)->format('d-m-Y') }}</td>
                                        <td>
                                            <a data-bs-toggle="modal"
                                               data-bs-target="#UpdateTeam{{ $category->id }}"
                                               class="btn btn-outline-info btn-icon">
                                                <i data-feather="edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="javascript:;"
                                               getUrl="{{ route('admin.deleteblogcategory',[encrypt($category->id)]) }}"
                                               class="btn btn-outline-danger btn-icon oncategoryDelete">
                                                <i data-feather="trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    {{--  update modal--}}
                                    <div class="modal fade" id="UpdateTeam{{ $category->id }}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Update
                                                        Category</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="btn-close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <form action="{{ route('admin.updatecategory') }}" method="post"
                                                              enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label> Category Name </label>
                                                                        <input type="text" name="category_name"
                                                                               autocomplete="off"
                                                                               class="form-control MyInput"
                                                                               required="" placeholder="Category Name . . . "
                                                                               value="{{ $category->category_name }}">
                                                                        <input type="hidden" name="id"
                                                                               value="{{ encrypt($category->id) }}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12 text-center">
                                                                    <button class="btn btn-dark" type="submit"> Save
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="AddCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="{{ route('admin.savecategory') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Category Name </label>
                                        <input type="text" name="category_name" autocomplete="off" class="form-control MyInput"
                                               required="" placeholder="Category Name . . . ">
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-dark" type="submit"> Save</button>
                                </div>
                            </div>
                        </form>
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
        $(document).on("click", ".oncategoryDelete", function () {
             
             var url = $(this).attr('getUrl');
             Swal.fire({
             title: 'Are you sure?',
             text: "Do you want to delete this job!",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Yes, Delete it!'
             }).then((result) => {
                 if (result.isConfirmed) {
                     window.location.href=url
                 }
             })
       
       });
   </script>

@endsection
