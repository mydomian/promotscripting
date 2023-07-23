@extends('admin.layout.master')

@section('title')
Prompts
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
<li class="breadcrumb-item active" aria-current="page">Prompts</li>
</ol>
</nav>

<div class="row">
<div class="col-md-12">
<div class="card">
    <div class="card-body">
        <div class="row mb-5">
            <div class="col-md-9"><h6 class="card-title">Prompts</h6></div>
            {{-- <div class="col-md-3">
                <button class="btn btn-outline-primary w-100" type="button" data-bs-toggle="modal"
                        data-bs-target="#AddCategory">Add Category
                </button>
            </div> --}}
        </div>
        <div class="table-responsive">
            <table id="dataTablePrompt" class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>User</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Sub Subcategory</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($prompts as $prompt)
                        <tr>
                            <td>{{ $prompt->id }}</td>
                            <td>{{ $prompt->user->name ?? "" }}</td>
                            <td>{{ $prompt->subSubCategory->subCategory->category->category_name ?? "" }}</td>
                            <td>{{ $prompt->subSubCategory->subCategory->category_name ?? "" }}</td>
                            <td>{{ $prompt->subSubCategory->category_name ?? "" }}</td>
                            <td>{{ $prompt->title ?? "" }}</td>
                            <td>{{ $prompt->price ?? "" }}</td>
                            <td>{{ $prompt->created_at->format('Y-m-d') }}</td>
                            <td>{{ $prompt->status }}</td>
                            <td>
                                <a title="For View" data-bs-toggle="modal" data-bs-target="#viewPrompt{{ $prompt->id }}" class="btn btn-outline-info btn-icon">
                                    <i data-feather="eye"></i>
                                </a>
                            </td>
                        </tr>

{{--  View Prompt Modal--}}
<div class="modal fade" id="viewPrompt{{ $prompt->id }}" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="exampleModalLabel">{{ $prompt->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-info"> Thumbnil </label>
                                <div class="w-100">
                                    <a href="{{ asset('/storage/products/thumbnil/'.$prompt->image) }}" download><img class="img-fluid object-fit-fill w-100" src="{{ asset('/storage/products/thumbnil/'.$prompt->image) }}" alt="prompt-thumbnil"></a>
                                </div>
                                <br>
                                <label class="text-info"> Description </label>
                                <div class="w-100">
                                    <textarea name="" class="form-control" readonly>{{ $prompt->description }}</textarea>
                                </div>
                                <br>
                                <label class="text-info"> Instruction </label>
                                <div class="w-100">
                                    <textarea name="" class="form-control" readonly>{{ $prompt->instructions }}</textarea>
                                </div>
                                
                                @if (isset($prompt->prompt_testing))
                                <br>
                                    <label class="text-info"> Prompt Testing </label>
                                    <div class="w-100">
                                        <textarea name="" class="form-control" readonly>{{ $prompt->prompt_testing }}</textarea>
                                    </div>
                                @endif

                                @if (isset($prompt->preview_input))
                                <br>
                                    <label class="text-info"> Preview Input </label>
                                    <div class="w-100">
                                        <textarea name="" class="form-control" readonly>{{ $prompt->preview_input }}</textarea>
                                    </div>
                                @endif

                                @if (isset($prompt->preview_output))
                                <br>
                                    <label class="text-info"> Preview Output </label>
                                    <div class="w-100">
                                        <textarea name="" class="form-control" readonly>{{ $prompt->preview_output }}</textarea>
                                    </div>
                                @endif

                                @if (isset($prompt->midjourney_text))
                                <br>
                                    <label class="text-info"> Midjourney Text </label>
                                    <div class="w-100">
                                        <textarea name="" class="form-control" readonly>{{ $prompt->midjourney_text }}</textarea>
                                    </div>
                                @endif

                                @if (isset($prompt->midjourney_profile))
                                <br>
                                    <label class="text-info"> Midjourney Profile </label>
                                    <div class="w-100">
                                        <textarea name="" class="form-control" readonly>{{ $prompt->midjourney_profile }}</textarea>
                                    </div>
                                @endif

                                @if (isset($prompt->image_verification))
                                <br>
                                    <label class="text-info"> Image Verification </label>
                                    <div class="w-100">
                                        <textarea name="" class="form-control" readonly>{{ $prompt->image_verification }}</textarea>
                                    </div>
                                @endif

                                @if (isset($prompt->negative_prompt))
                                <br>
                                    <label class="text-info"> Negative Prompt </label>
                                    <div class="w-100">
                                        <textarea name="" class="form-control" readonly>{{ $prompt->negative_prompt }}</textarea>
                                    </div>
                                @endif

                                @if (isset($prompt->productImages) && $prompt->productImages->count() > 0)
                                <br>
                                    <label class="text-info">Images</label>
                                    <div class="w-100">
                                       @foreach ($images = $prompt->productImages as $image)
                                           <img src="{{ asset('/storage/products/'.$image->images) }}" alt="prompt-images">
                                       @endforeach
                                    </div>
                                @endif
                                
                            </div>
                        </div>

                        <div class="col-md-12 text-end mt-2">
                            <button type="button" class="btn btn-sm btn-info" data-bs-dismiss="modal"
                            aria-label="btn-close">Close</button>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>




                    @empty
                        No Data Found
                    @endforelse
                   
                </tbody>
            </table>
            <div style="float: right;">{{ $prompts->links() }}</div>
        </div>
    </div>

</div>
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
        $('#dataTablePrompt').DataTable( {
            "paging":   false,
            "ordering": false,
            "info":     false,
        } );
    });
</script>
@endpush
    

