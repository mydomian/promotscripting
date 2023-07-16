@extends('admin.layout.master')

@section('title')
    About us
@endsection

@section('content')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About-Company</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">About Company</h6>
                        <form method="POST" action="{{ route('admin.aboutUs') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Heading</label>
                                    <input type="text" class="form-control mb-3" autocomplete="off"
                                           placeholder="Heading" name="heading"
                                           value="{{ $aboutus->heading ?? "" }}">
                                </div>
                                <div class="col-md-6">
                                    <label>Image</label>
                                    <input type="file" class="form-control" autocomplete="off"
                                           name="image" id="profile" onchange="validateImages(this.id)" accept="image/*">
                                    <small><a href="{{ URL::asset('/storage/about_us/'.$aboutus->image) }}"
                                              target="_blank">View Image</a></small>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Upload Promotional Video</label>
                                    <input type="file" class="form-control" autocomplete="off"
                                               name="promotional_video" accept="video/mp4,video/x-m4v,video/*">
                                        <small><a href="{{asset('/storage/about_us/'.$aboutus->promotional_video) }}"
                                                  target="_blank">Watch Video</a></small>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="">First Slider Title</label>
                                    <input type="text" name="aboutus_slider_title1" class="form-control mb-3" value="{{ $aboutus->aboutus_slider_title1 ?? "" }}" autocomplete="off" placeholder="First slider title">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Second Slider Title</label>
                                    <input type="text" name="aboutus_slider_title2" class="form-control mb-3" value="{{ $aboutus->aboutus_slider_title2 ?? "" }}"  autocomplete="off" placeholder="Second slider title">
                                </div>
                                <div class="col-md-12">
                                    <label>Short Detail</label>
                                    <textarea class="form-control mb-3" autocomplete="off" rows="3"
                                              placeholder="Short Description"
                                              name="short_des">{{ $aboutus->short_des ?? "" }}</textarea>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Full Detail</label>
                                    <textarea class="form-control mb-3" autocomplete="off" rows="3"
                                              placeholder="Details"
                                              name="details" id="details">{{ $aboutus->details ?? "" }}</textarea>
                                </div>
                                
                            </div>
                            <div class="row">

                                <div class="col-md-4 mx-auto mt-3" style="text-align:center">

                                    <button type="submit" class="btn btn-primary btn-sm"
                                            name="UpdateSystemInformation">Update
                                    </button>

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
    <script src="https://cdn.tiny.cloud/1/slqzq9p4jfyu3f1nzvbomd2qq198chen520bsjv05lggwszl/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#detail',
            height : "450"
        });
    </script>
@endsection
