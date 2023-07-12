@extends('admin.layout.master')

@section('title')
    Privacy
@endsection

@section('content')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Privacy Policy</h6>
                        <form method="POST" action="{{ route('admin.updateprivacycontent') }}"
                              enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Privacy Policy </label>
                                        <textarea name="privacy" class="form-control" placeholder="Privacy Policy"
                                                  id="tinymceExample" rows="10">{{ $privacy->privacy }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <center>
                                        <button class="btn btn-outline-dark mt-4" style="height:50px"> Update</button>
                                    </center>
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
            selector: 'textarea',
            height : "650"
        });
    </script>
@endsection
