@extends('user.website.includes.master')
@section('title')
    | Connect Bank
@endsection
@section('sell', 'active')
@section('content')
<main class="flex-shrink-o">
    <section class="hero-home bg-body">
        <div class="container page-header">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{route('create.acc')}}" method="post">
                        @csrf
                        

                        <div class="col-md-12 d-flex flex-column text-white mb-3">
                            <h4>Get Paid</h4>
                            <p>
                                Connect your Bank account with Stripe to start receiving payments from every sale of your Prompt.
                            </p>
                            
                            <label for="" class="form-label">Country Residence</label>
                            <i class="text-secondary"><small>We need to know this for sending payouts. Please read our FAQ if your country does not appear here.

                            </small></i>
                            <div class="col-md-6">
                                <select name="country_id"
                                    class="form-control mt-2 bg-transparent form-select @error('country_id')is-invalid  @enderror"
                                    id="">
                                    <option class="bg-body" value="" selected>Select country</option>
                                    @forelse ($countries  as $country)
                                        <option class="bg-body" value="{{ $country->id }}">
                                            {{ $country->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('country_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">
                                Connect Bank
                              <i class="fa-solid fa-arrow-right-long"></i>
                            </button>
                           </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
    
@endsection