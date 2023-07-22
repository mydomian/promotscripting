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



@endsection
@push('scripts')
<script src="{{ URL::asset('admin/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
<script src="{{ URL::asset('admin/assets/js/data-table.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
    
    });
</script>
@endpush
    

