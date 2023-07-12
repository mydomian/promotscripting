@extends('admin.layout.master')

@section('title')
    Edit Blogs
@endsection

@section('content')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Blogs</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Add Blogs</h6>
                        <form method="POST" action="{{ route('admin.updateblogs') }}"
                              enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="row">
                                <input type="hidden" name="id" value="{{encrypt($blog->id)}}">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label> Title </label>
                                        <input type="text" name="title" class="form-control MyInput @error('title') is-invalid
                                            
                                        @enderror" value="{{$blog->title}}"
                                               placeholder="Blog title...">
                                               @error('title')
                                        <small class="text-danger">{{$message}}</small>
                                        
                                    @enderror
                                    </div>
                                    
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label> Category </label>
                                        <select name="category_id" class="form-control MyInput form-select @error('category_id') is-invalid
                                            
                                        @enderror">
                                            <option value="" disabled selected>Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{$blog->category_id == $category->id ? 'selected' : ''}}>{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label> Status </label>
                                        <select name="status" class="form-control MyInput form-select"
                                                >
                                            <option value="">Select Status</option>
                                            <option value="Active">Active</option>
                                            <option value="Unactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                           

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label> Blog Image </label>
                                        <input type="file" class="form-control mb-3 MyFileInput @error('image') is-invalid
                                            
                                        @enderror" autocomplete="off"
                                               name="image" id="image"  onchange="validateImages(this.id)"
                                               accept="image/*">
                                               @error('image')
                                                <small class="text-danger">{{$message}}</small>
                                               @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <p>Existing Image: </p>
                                    <img src="{{asset('storage/blog')}}/{{$blog->image}}" class="img-fluid" alt="" height="200px" width="200px">
                                </div>

                               
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label> Description </label>
                                        <textarea name="description" class="form-control Description_1"
                                                  placeholder="Blogs Description"
                                                  id="tinymceExample1" rows="10">{{$blog->description}}</textarea>
                                                  @error('description')
                                                      <small class="text-danger">{{$message}}</small>
                                                  @enderror
                                    </div>
                                </div>

                                

                                <div class="col-md-12">
                                    <center>
                                        <button class="btn btn-outline-dark mt-4" style="height:50px"> Update Blog
                                        </button>
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
            referrerpolicy="origin">
    </script>
    <script>
         tinymce.init({
            selector: 'textarea',
            plugins: 'media',
            // menubar: 'insert',
            // toolbar: 'media',

            /* without images_upload_url set, Upload tab won't show up*/
            images_upload_url: 'postAcceptor.php',

            /* we override default upload handler to simulate successful upload*/
            images_upload_handler: function (blobInfo, success, failure) {
                setTimeout(function () {
                    /* no matter what you upload, we will turn it into TinyMCE logo :)*/
                    success('http://moxiecode.cachefly.net/tinymce/v9/images/logo.png');
                }, 2000);
            },
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
    </script>
@endsection
