@extends('website.includes.master')
@section('content')
<main class="flex-shrink-0 bg-body">
  <section class="custom-offers section text-white">
    <div class="container mt-5">
        <h4 class="mb-4 text-center">
            <span class="text-primary">Place Bid For </span>
          </h4>
          <h5 class="mb-4 text-center">
            {{ $jobPost->title ?? "" }}
          </h5>
      <div class="card offer-setup--card mb-5">
        <form action="{{ route('JobPlaceBidStore') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
            <div class="row g-4">
                <div class="col-lg-4">
                    <input type="hidden" name="job_post_id" value="{{ $jobPost->id }}">
                    <input
                        type="number"
                        name="biding_budget"
                        class="form-control form-price-control @error('biding_budget') is-invalid @enderror"
                        id="biding_budget"
                        placeholder="${{ $jobPost->budget }}"
                        
                    />
                    @error('biding_budget')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-lg-4">
                    <input
                        type="datetime-local"
                        name="biding_deadline"
                        class="form-control form-price-control @error('biding_deadline') is-invalid @enderror"
                        id="biding_deadline"
                        value="{{ $jobPost->deadline }}"
                        
                    />
                    @error('biding_deadline')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-lg-4">
                    <input
                        type="file"
                        name="biding_samples[]"
                        class="form-control form-price-control @error('biding_sample') is-invalid @enderror"
                        id="biding_sample"
                        multiple
                    />
                    @error('biding_sample')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
           
            <div class="row g-4 mt-1">
                <div class="col-lg-12" style="border:1px solid #9AC6B7">
                    <textarea class="summernote form-control form-date-control @error('biding_description') is-invalid @enderror" name="biding_description"></textarea>
                    @error('biding_description')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
        
                <button type="submit" class="btn btn-sm btn-primary mt-2 mb-2" style="float: right">Place Bid</button>
            </div>
        </form>
      </div>
      
    </div>
  </section>
</main>  
@endsection
