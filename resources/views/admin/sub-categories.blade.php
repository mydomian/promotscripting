@extends('admin.layout.master')

@section('title')
    Subcategories
@endsection

<link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">

@section('content')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Subcategories</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-md-10"><h6 class="card-title">Subcategories</h6></div>
                            <div class="col-md-2">
                                <button class="btn btn-outline-dark w-100" type="button" data-bs-toggle="modal"
                                        data-bs-target="#AddSubcategory">Add Subcategories
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Name</th>
                                    <th>Subcategory Name</th>
                                    <th>Created At</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($subcategories as $subcategory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $subcategory->getCategory->category_name }}</td>
                                        <td>{{ $subcategory->sub_category_name }}</td>
                                        <td>{{ Carbon\Carbon::parse($subcategory->created_at)->format('d-m-Y') }}</td>
                                        <td>
                                            <a data-bs-toggle="modal"
                                               data-bs-target="#UpdateSubcategory{{ $subcategory->id }}"
                                               class="btn btn-outline-info btn-icon">
                                                <i data-feather="edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="javascript:;"
                                               getUrl="{{ route('admin.deletesubcategory',[encrypt($subcategory->id)]) }}"
                                               class="btn btn-outline-danger btn-icon onsubcategoryDelete">
                                                <i data-feather="trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    {{--  update modal--}}
                                    <div class="modal fade" id="UpdateSubcategory{{ $subcategory->id }}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Update
                                                        Subcategory</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="btn-close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <form action="{{ route('admin.updatesubcategory') }}" method="post"
                                                              enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="id" value="{{encrypt($subcategory->id)}}">
                                                                        <label> Category Name </label>
                                                                        <select name="category_id" class="form-control MyInput form-select" required>
                                                                            <option value="" disabled selected>Select Category</option>
                                                                            @forelse($categories as $category)
                                                                                <option value="{{ $category->id }}" {{$subcategory->category_id == $category->id ? 'selected' : ''}}>{{ $category->category_name }}</option>
                                                                            @empty
                                                                                
                                                                            @endforelse
                                                                        </select>
                                                                    </div>
                                
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label> Subcategory Name </label>
                                                                        <input type="text" name="sub_category_name" value="{{$subcategory->sub_category_name}}" autocomplete="off" class="form-control MyInput"
                                                                               required placeholder="Subcategory Name . . . ">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 text-center">
                                                                    <button class="btn btn-dark" type="submit">Save</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                Nothing Found!
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
    <div class="modal fade" id="AddSubcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="{{ route('admin.savesubcategory') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Category Name </label>
                                        <select name="category_id" class="form-control MyInput form-select" required>
                                            <option value="" disabled selected>Select Category</option>
                                            @forelse($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @empty
                                                
                                            @endforelse
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Subcategory Name </label>
                                        <input type="text" name="sub_category_name" value="{{old('sub_category_name')}}" autocomplete="off" class="form-control MyInput"
                                               required placeholder="Subcategory Name . . . ">
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-dark" type="submit">Save</button>
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
         $(document).on("click", ".onsubcategoryDelete", function () {
              
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
