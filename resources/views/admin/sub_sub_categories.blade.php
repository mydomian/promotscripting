@extends('admin.layout.master')

@section('title')
Sub Sub Category
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endpush
@section('content')

<div class="page-content">

<nav class="page-breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Sub-Sub-Categories</li>
</ol>
</nav>

<div class="row">
<div class="col-md-12">
<div class="card">
    <div class="card-body">
        <div class="row mb-5">
            <div class="col-md-9"><h6 class="card-title">Sub Sub Categories</h6></div>
            <div class="col-md-3">
                <button class="btn btn-sm btn-outline-primary w-100" type="button" data-bs-toggle="modal"
                        data-bs-target="#AddSubSubCategory">Add SubSubCategory
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table id="dataTableSubCategory" class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category name</th>
                        <th>Subcategory name</th>
                        <th>Sub Subcategory name</th>
                        <th>Created At</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subSubCategories as $subSubCategory)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $subSubCategory->subCategory->category ? $subSubCategory->subCategory->category->category_name : "" }}</td>
                            <td>{{ $subSubCategory->subCategory ? $subSubCategory->subCategory->category_name : "" }}</td>
                            <td>{{ $subSubCategory->category_name ?? "" }}</td>
                            <td>{{ Carbon\Carbon::parse($subSubCategory->created_at)->format('d-m-Y') }}</td>
                            <td>
                                <a data-bs-toggle="modal"
                                data-bs-target="#UpdateTeam{{ $subSubCategory->id }}"
                                class="btn btn-outline-info btn-icon">
                                    <i data-feather="edit"></i>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:;" getUrl="{{ route('admin.subSubCategoryDestroy',['subsubcategory'=>$subSubCategory->id]) }}" class="btn btn-outline-danger btn-icon onsubSubCategoryDelete">
                                    <i data-feather="trash"></i>
                                </a>
                            </td>
                        </tr>

                        {{--  update modal--}}
                        <div class="modal fade" id="UpdateTeam{{ $subSubCategory->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header bg-dark">
                                        <h5 class="modal-title text-white" id="exampleModalLabel">Update
                                           Sub Subcategory</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="btn-close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <form action="{{ route('subsubcategories.update',['subsubcategory'=>$subSubCategory->id]) }}" method="post">
                                                @csrf
                                                @method('PUT')

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Sub Category Name </label>
                                                            <select name="sub_category_id" class="form-control" id="subcategory" required>
                                                                <option value="">Select Your Sub Category</option>
                                                                @foreach ($categories as $category)
                                                                    <option value="#" disabled><strong>{{ $category->category_name }}</strong></option>
                                                                    @if(!empty($category['subCategories']))
                                                                        @foreach($category['subCategories'] as $subCat)
                                                                            <option value="{{$subCat->id}}" @if($subCat->id === $subSubCategory->sub_category_id) selected @endif> ➥ {{$subCat->category_name}}</option>
                                                                        @endforeach
                                                                    @endempty
                                                                @endforeach
                                                            </select>
                                                            <label class="mt-2">Sub Subcategory name</label>
                                                            <input type="text" name="category_name" class="form-control" value="{{ $subSubCategory->category_name }}" placeholder="Enter Your Sub Subcategory Name..." required>
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
<div class="modal fade" id="AddSubSubCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="exampleModalLabel">Add Sub Subcategory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="{{ route('subsubcategories.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Sub Category Name </label>
                                    <select name="sub_category_id" class="form-control" id="subcategory" required>
                                        <option value="">Select Your Sub Category</option>
                                        @foreach ($categories as $category)
                                            <option value="#" disabled><strong>{{ $category->category_name }}</strong></option>
                                            @if(!empty($category['subCategories']))
                                                @foreach($category['subCategories'] as $subCat)
                                                    <option value="{{$subCat->id}}"> ➥ {{$subCat->category_name}}</option>
                                                @endforeach
                                            @endempty
                                        @endforeach
                                    </select>
                                    <label class="mt-2">Sub Subcategory name</label>
                                    <input type="text" name="category_name" class="form-control" placeholder="Enter Your Sub Subcategory Name..." required>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
$(document).ready(function() {
    $(document).on("click", ".onsubSubCategoryDelete", function () {
        var url = $(this).attr('getUrl');
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this sub subcategory!",
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

    $('#dataTableSubCategory').DataTable( {
        "paging":   false,
    } );
});

</script>
@endpush
    

