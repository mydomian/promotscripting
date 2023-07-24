@extends('admin.layout.master')

@section('title')
    | Transactions
@endsection

@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Transactions</li>
            </ol>
        </nav>
    </div>
@endsection
