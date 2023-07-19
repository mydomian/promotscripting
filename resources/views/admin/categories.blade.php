@extends('admin.layout.master')

@section('title')
Categories
@endsection
@section('categories','active')
@push('styles')
<link rel="stylesheet" href="{{ asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
@endpush
@section('content')

<div class="page-content">

<nav class="page-breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Categories</li>
</ol>
</nav>

<div class="row">
<div class="col-md-12">
<div class="card">
    <div class="card-body">
        <div class="row mb-5">
            <div class="col-md-9"><h6 class="card-title">Categories</h6></div>
            {{-- <div class="col-md-3">
                <button class="btn btn-outline-primary w-100" type="button" data-bs-toggle="modal"
                        data-bs-target="#AddCategory">Add Category
                </button>
            </div> --}}
        </div>
        <div class="table-responsive">
            <table id="dataTableCategory" class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Icon</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Edit</th>
                    {{-- <th>Delete</th> --}}
                </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>
                                @if ($category->category_icon)
                                    <a href="{{ asset('/storage/category_icon/'.$category->category_icon) }}" download><img width="60px" height="40px" src="{{ asset('/storage/category_icon/'.$category->category_icon) }}" alt="category-icon"></a>
                                @else
                                @endif
                            </td>
                            <td>
                                @if($category->status === 'active')
                                    <span class="btn btn-sm btn-warning CateogryActive" getUrl="{{ route('admin.categoryStatusInactive',['category'=>$category->id]) }}">Inactive</span>
                                @else
                                    <span class="btn btn-sm btn-danger CategoryInactive" getUrl="{{ route('admin.categoryStatusActive',['category'=>$category->id]) }}">Active</span>
                                @endif
                                
                            </td>
                            <td>{{ Carbon\Carbon::parse($category->created_at)->format('d-m-Y') }}</td>
                            <td>
                                <a data-bs-toggle="modal"
                                data-bs-target="#UpdateTeam{{ $category->id }}"
                                class="btn btn-outline-info btn-icon">
                                    <i data-feather="edit"></i>
                                </a>
                            </td>
                            {{-- <td>
                                <a href="javascript:;" getUrl="{{ route('admin.categoryDestroy',['category'=>$category->id]) }}" class="btn btn-outline-danger btn-icon oncategoryDelete">
                                    <i data-feather="trash"></i>
                                </a>
                            </td> --}}
                        </tr>

                        {{--  update modal--}}
                        <div class="modal fade" id="UpdateTeam{{ $category->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header bg-dark">
                                        <h5 class="modal-title text-white" id="exampleModalLabel">Update
                                            Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="btn-close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <form action="{{ route('categories.update',['category'=>$category->id]) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label> Category Name </label>
                                                            <input type="text" name="category_name" autocomplete="off" class="form-control"
                                                                    required="" placeholder="Category Name . . . " value="{{ $category->category_name }}">
                                                            <label class="mt-2"> Category Icon </label>
                                                            <input type="file" name="category_icon" autocomplete="off" class="form-control" accept="image/*">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 text-end mt-2">
                                                        <button class="btn btn-dark" type="submit">Update <i data-feather="save"></i></button>
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
{{-- <div class="modal fade" id="AddCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> Category Name </label>
                                    <input type="text" name="category_name" autocomplete="off" class="form-control"
                                            required="" placeholder="Category Name . . . ">
                                    <label class="mt-2"> Category Icon </label>
                                    <input type="file" name="category_icon" autocomplete="off" class="form-control"
                                            required="" accept="image/*">
                                </div>
                                <div class="col-md-12 text-end mt-2">
                                    <button class="btn btn-sm btn-dark" type="submit">Save <i data-feather="save"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection
@push('scripts')
<script src="{{ URL::asset('admin/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
<script src="{{ URL::asset('admin/assets/js/data-table.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {
    $(document).on("click", ".oncategoryDelete", function () {
        var url = $(this).attr('getUrl');
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this category!",
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

    $(document).on("click", ".CategoryInactive", function () {
        var url = $(this).attr('getUrl');
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to active this category!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, active it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href=url
            }
        })

    });

    $(document).on("click", ".CateogryActive", function () {
        var url = $(this).attr('getUrl');
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to inactive this category!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, inactive it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href=url
            }
        })

    });

    $('#dataTableCategory').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false,
    } );
});

</script>
@endpush
    

