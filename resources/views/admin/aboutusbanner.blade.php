@extends('admin.layout.master')

@section('title')
    Aboutus Banner
@endsection

@section('content')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us Banner</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">About Us Banner</h6>
                        <form method="POST" action="{{ route('admin.updateaboutusbanner') }}" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="row">

                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label> Banner Image </label>
                                        <input type="file" required name="image" class="form-control MyFileInput"
                                               accept="image/*">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <button class="btn btn-outline-dark mt-4" style="height:50px"> Update Banner
                                    </button>
                                </div>
                                <br>
                                <div class="col-md-12 my-5 bg-dark">
                                    <img src="{{ URL::asset('admin/assets/uploads/'.$banner->image )}}" alt="Contact Banner" style="width:100%">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
