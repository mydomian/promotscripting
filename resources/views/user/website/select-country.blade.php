@extends('user.website.includes.master')
@section('title')
    | Sell
@endsection
@section('sell', 'active')
@section('content')
<main class="flex-shrink-o">
    <section class="hero-home bg-body">
        <div class="container page-header">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{route('sell.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="category_id" value="{{$data['category_id']}}">
                        <input type="hidden" name="title" value="{{$data['title']}}">
                        <input type="hidden" name="description" value="{{$data['description']}}">
                        <input type="hidden" name="price" value="{{$data['price']}}">
                        <input type="hidden" name="sub_category_id" value="{{$data['sub_category_id']}}">
                        <input type="hidden" name="prompt_file" value="{{$data['prompt_file']}}">
                        <input type="hidden" name="prompt_testing" value="{{$data['prompt_testing']}}">
                        <input type="hidden" name="gpt_engine" value="{{$data['gpt_engine']}}">
                        <input type="hidden" name="preview_input" value="{{$data['preview_input']}}">
                        <input type="hidden" name="preview_output" value="{{$data['preview_output']}}">
                        <input type="hidden" name="instructions" value="{{$data['instructions']}}">

                        <div class="col-md-12 d-flex flex-column text-white mb-3">
                            <h4>Get Paid</h4>
                            <p>
                                Connect your Bank account with Stripe to start receiving payments from every sale of your Prompt.
                            </p>
                            
                            <label for="" class="form-label">Country Residence</label>
                            <i class="text-secondary"><small>We need to know this for sending payouts. Please read our FAQ if your country does not appear here.

                            </small></i>
                            <div class="col-md-4">
                                <select name="country_id"
                                    class="form-control mt-2 bg-transparent form-select @error('country_id')is-invalid  @enderror"
                                    id="">
                                    <option class="bg-body" value="" selected>Select country</option>
                                    @forelse ($countries  as $country)
                                        <option class="bg-body" value="{{ $country->code }}">
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