@extends('admin.layout.master')

@section('title')
    Contact Messages
@endsection

<link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">

@section('content')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Messages</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Contact Messages</h6>

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    {{--                                    <th>Status</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($messages as $m=>$message)
                                    <tr>
                                        <td>{{ $m+1 }}</td>
                                        <td>{{ $message->name }}</td>
                                        <td><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></td>
                                        <td><a href="tel:{{ $message->phone }}">{{ $message->phone }}</a></td>
                                        <td>{{ $message->subject }}</td>
                                        <td>{{ $message->message }}</td>
                                        <td>{{ Carbon\Carbon::parse($message->created_at)->format('d-m-Y') }}</td>
                                        {{--                                        <td>--}}
                                        {{--                                            @if($message->status='0')--}}
                                        {{--                                                <span class="badge bg-danger">Unseen</span>--}}
                                        {{--                                            @else--}}
                                        {{--                                                <span class="badge bg-success">Seen</span>--}}
                                        {{--                                            @endif--}}
                                        {{--                                        </td>--}}
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('script')

    <script src="{{ URL::asset('admin/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/data-table.js') }}"></script>

@endsection
