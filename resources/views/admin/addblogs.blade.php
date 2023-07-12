@extends('admin.layout.master')

@section('title')
    Add Blogs
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/flatpickr/flatpickr.min.css') }}">
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Blogs</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Add Blogs</h6>
                        <form method="POST" action="{{ route('admin.saveblogs') }}"
                              enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label> Title </label>
                                        <input type="text" name="title" class="form-control MyInput @error('title') is-invalid
                                            
                                        @enderror" value="{{old('title')}}"
                                               placeholder="Blog title...">
                                               @error('title')
                                        <small class="text-danger">{{$message}}</small>
                                        
                                    @enderror
                                    </div>
                                    
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label> Category </label>
                                        <select name="category_id" class="form-control MyInput @error('category_id') is-invalid
                                            
                                        @enderror">
                                            <option value="" disabled selected>Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
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
                                        <select name="status" class="form-control MyInput"
                                                >
                                            <option value="">Select Status</option>
                                            <option value="Active">Active</option>
                                            <option value="Unactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row" id="schedule">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> Type </label>
                                        <select name="type" class="form-control MyInput" onchange="SetType(this.value)"
                                                required>
                                            <option value="">Select Type</option>
                                            <option value="active">active</option>
                                            <option value="schedule">schedule</option>
                                        </select>
                                    </div>
                                </div>
                            </div> --}}

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

                                {{-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Blog Tag <a onclick="AddMoreTags()" style="cursor:pointer"
                                                            class="badge bg-success"> Add More </a> </label>
                                        <input type="text" class="form-control mb-3 MyFileInput mt-2" autocomplete="off"
                                               name="tags[]" placeholder="Tag Name" required>
                                    </div>
                                </div> --}}

                                {{-- <div class="row" id="MoreTags"></div>

                                <div class="col-md-10">
                                    <div class="form-group">
                                        <input type="text" id="chatgpt_filter" class="form-control MyInput"
                                               placeholder="What you want to search on CHATGPT . . . "
                                               style="letter-spacing:3px">
                                    </div>
                                </div> --}}

                                {{-- <div class="col-md-2">
                                    <button id="gpt_1" type="button" onclick="ChatGPTFilter()"
                                            class="btn btn-info w-100 text-white" style="height:60px">
                                        ASK CHATGPT
                                    </button>
                                    <button id="gpt_2" style="display:none;height:60px" type="button" disabled
                                            class="btn btn-info w-100 text-white" style="height:60px">
                                        <span class="spinner-border spinner-border-sm" role="status"
                                              aria-hidden="true"></span>
                                        Loading...
                                    </button>
                                </div> --}}
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label> Description </label>
                                        <textarea name="description" class="form-control Description_1"
                                                  placeholder="Blogs Description"
                                                  id="tinymceExample1" rows="10">{{old('description')}}</textarea>
                                                  @error('description')
                                                      <small class="text-danger">{{$message}}</small>
                                                  @enderror
                                    </div>
                                </div>

                                {{-- <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label> Blog Multiple Images </label>
                                        <input type="file" class="form-control mb-3 MyFileInput" autocomplete="off"
                                               name="MoreImages[]" multiple="multiple" id="moreimages"
                                               onchange="validateImages(this.id)"
                                               accept="image/*">
                                    </div>
                                </div> --}}

                                {{-- <div class="col-md-10">
                                    <div class="form-group">
                                        <input type="text" id="chatgpt_filter2" class="form-control MyInput"
                                               placeholder="What you want to search on CHATGPT . . . "
                                               style="letter-spacing:3px">
                                    </div>
                                </div> --}}

                                {{-- <div class="col-md-2">
                                    <button id="gpt_11" type="button" onclick="ChatGPTFilter2()"
                                            class="btn btn-info w-100 text-white" style="height:60px">
                                        ASK CHATGPT
                                    </button>
                                    <button id="gpt_22" style="display:none;height:60px" type="button" disabled
                                            class="btn btn-info w-100 text-white" style="height:60px">
                                        <span class="spinner-border spinner-border-sm" role="status"
                                              aria-hidden="true"></span>
                                        Loading...
                                    </button>
                                </div> --}}
                                {{-- <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label> More Description </label>
                                        <textarea name="more_description" class="form-control"
                                                  placeholder="Blogs More Description"
                                                  id="tinymceExample2" rows="10"></textarea>
                                    </div>
                                </div> --}}

                                <div class="col-md-12">
                                    <center>
                                        <button class="btn btn-outline-dark mt-4" style="height:50px"> Add Blog
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

    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/sweetalert2/sweetalert2.min.css') }}">
    <script src="{{ URL::asset('admin/assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/sweet-alert.js') }}"></script>


    <script src="https://cdn.tiny.cloud/1/slqzq9p4jfyu3f1nzvbomd2qq198chen520bsjv05lggwszl/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script>

        var from_to = `<div class="col-md-4" id="div_1">
                                    <div class="form-group">
                                        <label> Active Date </label>
                                        <div class="input-group flatpickr" onchange="SetExpiryDate()" id="flatpickr-date1">
                                            <input type="text" class="form-control MyInput" required name="date_from" id="date1" placeholder="Select Active date"
                                                   data-input>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" id="div_2">
                                    <label> Expiry Date </label>
                                    <div class="input-group flatpickr" id="flatpickr-date2">
                                        <input type="text" class="form-control MyInput" id="date2" name="date_to" placeholder="Select Expiry date"
                                               data-input>
                                    </div>
                                </div>`;


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

        var count = 1;

        function AddMoreTags() {
            var more = `<div class="col-md-12" id="div_` + count + `">
                                    <div class="form-group">
                                        <label> Blog Tag <a onclick="RemoveTags(` + count + `)" style="cursor:pointer" class="badge bg-danger"> Remove - </a> </label>
                                        <input type="text" class="form-control mb-3 MyFileInput mt-2" autocomplete="off"
                                               name="tags[]" placeholder="Tag Name" required>
                                    </div>
                                </div>`;
            $("#MoreTags").append(more);
            count++;
        }

        function RemoveTags(id) {
            $("#div_" + id).remove();
        }

        function SetType(val) {
            if (val == "schedule") {
                $("#schedule").append(from_to);
            } else {
                $("#div_1").remove();
                $("#div_2").remove();
            }

            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            today = yyyy + '-' + mm + '-' + dd;

            $("#flatpickr-date1").flatpickr({
                wrap: true,
                minDate: 0,
                dateFormat: "Y-m-d",
                minDate: today,
            });
        }

        function SetExpiryDate() {
            $("#date2").val(""),
                $("#flatpickr-date2").flatpickr({
                    wrap: true,
                    minDate: 0,
                    dateFormat: "Y-m-d",
                    minDate: $("#date1").val(),
                });
        }

        function ChatGPTFilter() {
            $("#gpt_1").hide();
            $("#gpt_2").show();
            var search = $("#chatgpt_filter").val();
            if (search == "") {
                EmptySearchMessage("Please Enter Something !");
                $("#gpt_1").show();
                $("#gpt_2").hide();
                return false;
            }

            var baseUrl = {!! json_encode(url('/')) !!};
            var url = baseUrl + '/admin/SearchOnChatGPT/' + search;

            $.ajax({

                url: url,

                type: "GET",

                success: function (result) {

                    $("#gpt_1").show();
                    $("#gpt_2").hide();

                    try {
                        if (result == 0) {
                            EmptySearchMessage("Not any Active or Added API Key.");
                        } else {
                            // $("#tinymceExample1").val(result);
                            tinymce.remove('#tinymceExample1');
                            tinymce.init({
                                selector: '#tinymceExample1',
                                setup: function (editor) {
                                    editor.on('init', function () {
                                        // Get the TinyMCE instance
                                        var tinymceInstance = tinymce.get('tinymceExample1');

                                        // Set the content of the editor
                                        tinymceInstance.setContent(result);
                                    });
                                }
                            });
                        }

                    } catch (exp) {

                        EmptySearchMessage(exp.message);
                        return exp.message;

                    }

                }

            });


        }

        function ChatGPTFilter2() {
            $("#gpt_11").hide();
            $("#gpt_22").show();
            var search = $("#chatgpt_filter2").val();
            if (search == "") {
                EmptySearchMessage("Please Enter Something !");
                $("#gpt_11").show();
                $("#gpt_22").hide();
                return false;
            }

            var baseUrl = {!! json_encode(url('/')) !!};
            var url = baseUrl + '/admin/SearchOnChatGPT/' + search;

            $.ajax({

                url: url,

                type: "GET",

                success: function (result) {

                    $("#gpt_11").show();
                    $("#gpt_22").hide();

                    try {
                        if (result == 0) {
                            EmptySearchMessage("Not any Active or Added API Key.");
                        } else {
                            // $("#tinymceExample1").val(result);
                            tinymce.remove('#tinymceExample2');
                            tinymce.init({
                                selector: '#tinymceExample2',
                                setup: function (editor) {
                                    editor.on('init', function () {
                                        // Get the TinyMCE instance
                                        var tinymceInstance = tinymce.get('tinymceExample2');

                                        // Set the content of the editor
                                        tinymceInstance.setContent(result);
                                    });
                                }
                            });
                        }

                    } catch (exp) {

                        EmptySearchMessage(exp.message);
                        return exp.message;

                    }

                }

            });


        }

        function EmptySearchMessage(message) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });

            Toast.fire({
                icon: 'error',
                title: message
            })
        }


    </script>
@endsection
