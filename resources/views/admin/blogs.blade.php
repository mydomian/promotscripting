@extends('admin.layout.master')

@section('title')
Blogs
@endsection
@section('categories.index','active')
@push('styles')
<link rel="stylesheet" href="{{ asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
@endpush
@section('content')

<div class="page-content">

<nav class="page-breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Blogs</li>
</ol>
</nav>

<div class="row">
<div class="col-md-12">
<div class="card">
    <div class="card-body">
        <div class="row mb-5">
            <div class="col-md-10"><h6 class="card-title">Blogs</h6></div>
            <div class="col-md-2">
                <button class="btn btn-outline-primary w-100" type="button" data-bs-toggle="modal"
                        data-bs-target="#AddBlog">Add Blog
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table id="dataTableBlog" class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Category</th>
                    <th>SubCategory</th>
                    <th>Sub Subcategory</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $blog)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $blog->category ? $blog->category->category_name : "" }}</td>
                            <td>{{ $blog->subCategory ? $blog->subCategory->category_name : "" }}</td>
                            <td>{{ $blog->subSubCategory ? $blog->subSubCategory->category_name : "" }}</td>
                            <td>{{ $blog->title ?? "" }}</td>
                            <td>
                                <img src="{{ asset('/storage/blog/'.$blog->image) }}" style="width: 60px;height:40px;" alt="blog-image">
                            </td>
                            <td>
                                <textarea class="form-control" style="width: 100%;height:20px;">{{ $blog->description }}</textarea>
                            </td>
                            <td> -</td>
                            <td>-</td>
                        </tr>

                        {{--  update modal--}}
                        {{-- <div class="modal fade" id="UpdateTeam{{ $category->id }}" tabindex="-1"
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
                        </div> --}}
                    @empty
                    @endforelse
                </tbody>
            </table>
            <div style="float: right;">{{ $blogs->links() }}</div>
        </div>
    </div>

</div>
</div>
</div>
</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="AddBlog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="exampleModalLabel">Add Blog</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select name="category_id" class="form-control" id="category_id" required>
                                        <option value="">Select Your Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    <select name="sub_category_id" class="form-control mt-2" id="sub_category_id" required>
                                        <option value="">Select Your Subcategory</option>
                                        @if (!empty($categories))
                                            @foreach ($categories as $category)
                                                <option value="" disabled>{{ $category->category_name }}</option>
                                                @if(!empty($category['subCategories']))
                                                    @foreach ($category['subCategories'] as $subCategory)
                                                            <option value="{{ $subCategory->id }}"> ➥ {{ $subCategory->category_name }}</option> 
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                        
                                    </select>
                                    <select name="sub_sub_category_id" class="form-control mt-2" id="sub_sub_category_id" required>
                                        <option value="">Select Your Sub Subcategory</option>
                                        @if (!empty($subCategories))
                                            @foreach ($subCategories as $subCategory)
                                                <option value="" disabled>{{ $subCategory->category_name }}</option>
                                                @if(!empty($subCategory['subSubCategories']))
                                                    @foreach ($subCategory['subSubCategories'] as $subSubCategory)
                                                            <option value="{{ $subSubCategory->id }}"> ➥ {{ $subSubCategory->category_name }}</option> 
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                    <input type="file" name="image" autocomplete="off" class="form-control mt-2" required="" accept="image/*">
                                    <input type="text" name="title" class="form-control mt-2" placeholder="Enter your title" required>
                                    <textarea name="description" class="form-control mt-2" placeholder="Enter your description" required></textarea>
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
</div>

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

    $('#dataTableBlog').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false,
    } );
});

</script>
@endpush
    

