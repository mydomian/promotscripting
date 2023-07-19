@extends('admin.layout.master')

@section('title')
    Profile
@endsection

@section('content')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin-Profile</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-center">Admin Profile</h6>
                        <hr>
                        <form method="POST" action="{{ route('admin.adminProfile',['user'=>$user->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Name </label>
                                        <input type="text" name="name" autocomplete="off" class="form-control" required="" placeholder="Name . . . " value="{{ $user->name }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Email </label>
                                        <input type="email" name="email" autocomplete="off" class="form-control" required="" placeholder="Email . . . " value="{{ $user->email }}">
                                    </div>
                                </div>
                                <hr class="mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Phone </label>
                                        <input type="text" name="phone" autocomplete="off" class="form-control" required="" placeholder="1234567890" value="{{ $user->phone }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Address </label>
                                        <input type="text" name="address" autocomplete="off" class="form-control" required="" placeholder="Address . . . " value="{{ $user->address }}">
                                    </div>
                                </div>
                                <hr class="mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Password </label>
                                        <input type="password" name="password" autocomplete="off" class="form-control" placeholder="New Password">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Profile Picture </label>
                                        <input type="file" name="profile" class="form-control" accept="image/*">
                                    </div>
                                </div>
                                <hr class="mt-3">
                                <div class="col-md-12">
                                    <center>
                                        <button class="btn btn-outline-info" type="submit"> Update Profile Info</button>
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