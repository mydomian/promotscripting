@extends('admin.layout.master')

@section('title')
    Setting
@endsection
@section('settings','active')
@section('content')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Website-Setting</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-center">Website Setting</h6>
                        <hr>
                        <form  action="{{ route('admin.setting') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Website Name</label>
                                    <input type="text" class="form-control" autocomplete="off"
                                           placeholder="Application Name" name="name"
                                           value="{{ $setting->name ?? "" }}">
                                </div>
                                <div class="col-md-6">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" autocomplete="off"
                                           placeholder="Phone" name="phone" value="{{ $setting->phone ?? "" }}">
                                </div>
                                <hr class="mt-3">
                                <div class="col-md-6">
                                    <label>Email</label>
                                    <input type="email" class="form-control" autocomplete="off"
                                           placeholder="Email" name="email" value="{{ $setting->email ?? "" }}">
                                </div>
                                <div class="col-md-6">
                                    <label>Location</label>
                                    <input type="text" class="form-control" id="location"
                                           autocomplete="off"
                                           placeholder="Location" name="location"
                                           value="{{ $setting->location ?? "" }}">
                                </div>
                                <hr class="mt-3">
                                <div class="col-md-6">
                                    <label>Facebook</label>
                                    <input type="text" class="form-control" autocomplete="off"
                                           placeholder="Facebook" name="facebook"
                                           value="{{ $setting->facebook ?? "" }}">
                                </div>
                                <div class="col-md-6">
                                    <label>Twitter</label>
                                    <input type="text" class="form-control" autocomplete="off"
                                           placeholder="Twitter" name="twitter" value="{{ $setting->twitter ?? "" }}">
                                </div>
                                <hr class="mt-3">

                                <div class="col-md-6">
                                    <label>Instagram</label>
                                    <input type="text" class="form-control" autocomplete="off"
                                           placeholder="Instagram" name="instagram"
                                           value="{{ $setting->instagram ?? "" }}">
                                </div>
                                <div class="col-md-6">
                                    <label>Whatsapp</label>
                                    <input type="text" class="form-control" autocomplete="off"
                                           placeholder="Whatsapp" name="whatsapp"
                                           value="{{ $setting->whatsapp ?? "" }}">
                                </div>
                                <hr class="mt-3">
                                <div class="col-md-4">
                                    <label>Logo</label>
                                    <input type="file" class="form-control" autocomplete="off"
                                           name="logo" id="profile" onchange="validateImages(this.id)" accept="image/*">
                                    <small><a href="{{ asset('/storage/images/logo/'.$setting->logo) }}"
                                              target="_blank">View Logo</a></small>
                                </div>
                                <div class="col-md-4">
                                    <label>Favicon</label>
                                    <input type="file" class="form-control" autocomplete="off"
                                           name="favicon" id="favicon" onchange="validateImages(this.id)"
                                           accept="image/*">
                                    <small><a href="{{ asset('/storage/images/favicon/'.$setting->favicon) }}"
                                              target="_blank">View Favicon</a></small>
                                </div>
                                <div class="col-md-4">
                                    <label>Login/Register Background Image</label>
                                    <input type="file" class="form-control" autocomplete="off"
                                           name="login_register_background_image" id="login_register_background_image" onchange="validateImages(this.id)"
                                           accept="image/*">
                                    <small><a href="{{ asset('/storage/images/background/'.$setting->login_register_background_image) }}"
                                              target="_blank">View Image</a></small>
                                </div>
                                <hr class="mt-3">
                                <div class="col-md-12">
                                    <label>Footer Description</label>
                                    <textarea class="form-control" autocomplete="off" rows="3"
                                              placeholder="Footer Description"
                                              name="footer_description">{{ $setting->footer_description ?? "" }}</textarea>
                                </div>
                            </div>


                            <div class="row">

                                <div class="col-md-4 mx-auto mt-3" style="text-align:center">

                                    <button type="submit" class="btn btn-outline-success"
                                            name="UpdateSystemInformation">Submit
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

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyABXn0Dg5Bkbn8UnQFbMaaqbAQBMAsivEc&libraries=places"></script>

    <script>
        google.maps.event.addDomListener(window, 'load', initialize);

        function initialize() {
            var input = document.getElementById('location');
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.addListener('place_changed', function () {
                var place = autocomplete.getPlace();
            });
        }
    </script>

@endsection
