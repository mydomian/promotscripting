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
                    <div class="card-header d-flex justify-content-between">
                        <h2 class="card-title text-primary">Stripe Information</h2>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#chargeModal">Charges</button>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.paymentInfoUpdate') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label"><span class="text-danger">* </span> Publishable Key</label>
                                <input type="text" class="form-control" name="publishable_key"
                                    value="{{ $info->publishable_key }}" placeholder="Stripe publishable key here...">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><span class="text-danger">* </span> Secret Key</label>
                                <input type="text" class="form-control" name="secret_key" value="{{ $info->secret_key }}"
                                    placeholder="Stripe secret key here...">
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

    <!-- Modal -->
    <div class="modal fade" id="chargeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Set Charges | </h1><small> (in percentage)</small>
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    
                </div>
                <form action="{{route('apply.charge')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <label for="" class="form-label"><span class="badge text-bg-secondary">Buyer Charge</span></label>
                               
                                <input type="number" name="buyer_charge" class="form-control" placeholder="Charge for buyer" value="{{$charges->buyer_charge}}" step="any">
                                @error('buyer_charge')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="" class="form-label"><span class="badge text-bg-secondary">Seller Charge</span> </label>
                                
                                <input type="number" name="seller_charge" class="form-control" placeholder="Charge for seller" value="{{$charges->seller_charge}}" step="any">
                                @error('seller_charge')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Apply Charges</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

<script>
    $(document).ready(function(){
       @if($errors->has('buyer_charge') || $errors->has('seller_charge')){
            $('#chargeModal').modal('show')
       }
       @endif
    })
</script>
    
@endpush
