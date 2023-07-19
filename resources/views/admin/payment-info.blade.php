@extends('admin.layout.master')

@section('title')
    Profile
@endsection

@section('content')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Stripe Setting</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Stripe Information</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.paymentInfoUpdate')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label  class="form-label">Publishable Key</label>
                                <input type="text" class="form-control" name="publishable_key" value="{{$info->publishable_key}}" placeholder="Stripe publishable key here...">
                              </div>
                              <div class="mb-3">
                                <label  class="form-label">Secret Key</label>
                                <input type="text" class="form-control" name="secret_key" value="{{$info->secret_key}}"  placeholder="Stripe secret key here...">
                              </div>
                              <div class="mb-3">
                                <button type="submit" class="btn btn-primary form-control">Update</button>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection