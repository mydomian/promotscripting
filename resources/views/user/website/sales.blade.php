@php
    // $purchases = purchases();
    $sales = sales();
    // $favourites = favourites();
    // $prompts = prompts();
@endphp
@extends('user.website.includes.master')

@section('title', '| Sales')
@section('profile', 'active')
@section('content')


    <!-- Hero Marketplace -->
    <section class="hero-marketplace page-header bg-body">
        <div class="bg-holder bg-opacity-25"></div>
        <!--// bg-holder  -->
        <div class="container">
            <div class="d-flex justify-content-between">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                 
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active badge rounded-pill text-secondary text-decoration-none p-2" id="pills-sells-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-sells" type="button" role="tab"
                            aria-controls="pills-sells" aria-selected="false">Sales</a>
                    </li>
                 
                </ul>
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    @if (Auth::user()->is_onboarding_completed == 0)
                        <li class="nav-item" role="presentation">
                            <a href="{{ route('sell.country') }}"
                                class="nav-link  badge text-bg-light rounded-pill text-secondary text-decoration-none p-2">Connect
                                Bank Account</a>
                        </li>
                    @endif
                    <li class="nav-item" role="presentation">
                        <a href="{{ route('user.profile',['user'=>Auth::user()->id]) }}"
                            class="nav-link  badge text-bg-light rounded-pill text-secondary text-decoration-none mx-1 p-2">Public
                            Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="hero-marketplace bg-body">
        <div class="container" style="margin-bottom: 100px">
            <div class="col-12 text-white">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade   show active" id="pills-sells" role="tabpanel" aria-labelledby="pills-sells-tab"
                        tabindex="0">

                        <div class="row g-3 mb-5">

                            <table class="table text-white">
                                <thead>
                                    <tr>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Prompt</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($sales as $sale)
                                        <tr>
                                            <td>{{ $sale->price }}</td>
                                            <td>{{ $sale->order->is_paid ?? 'unknown' }}</td>
                                            <td><a href="{{ route('marketplaceDetails', ['slug' => Str::slug($sale->product->title, '-'), 'product' => $sale->product->id]) }}">{{ $sale->product->title }}</a></td>
                                            <td>{{ $sale->user->name }}</td>
                                            <td>{{ $sale->created_at->format("D, M 'y") }}</td>
                                        </tr>
                                    @empty
                                        
                                    @endforelse
                                      
                                </tbody>
                            </table>
                            @if (sales()->count() < 1)
                            <p class="text-white">No sales yet !</p>
                        @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Hero Marketplace -->
    @endsection

    @push('scripts')
    @endpush
