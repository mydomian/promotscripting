@extends('admin.layout.master')

@section('title')
    Profile
@endsection

@section('content')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Profile</h6>
                        <form method="POST" action="{{ route('admin.updateprofile') }}" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Name </label>
                                        <input type="text" name="name" autocomplete="off" class="form-control MyInput" required="" placeholder="Name . . . " value="{{ $admin->name }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Email </label>
                                        <input type="email" name="email" autocomplete="off" class="form-control MyInput" required="" placeholder="Email . . . " value="{{ $admin->email }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Phone </label>
                                        <input type="text" name="phone" autocomplete="off" class="form-control MyInput" required="" placeholder="1234567890" value="{{ $admin->phone }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Address </label>
                                        <input type="text" name="address" autocomplete="off" class="form-control MyInput" required="" placeholder="Address . . . " value="{{ $admin->address }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Password </label>
                                        <input type="password" name="password" autocomplete="off" class="form-control MyInput" placeholder="New Password">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Profile Picture </label>
                                        <input type="file" name="profile" class="form-control MyFileInput" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <center>
                                        <button class="btn btn-outline-success" type="submit"> Update </button>
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