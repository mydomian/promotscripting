@extends('admin.layout.master')

@section('title')
    Contact Messages
@endsection

<link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">

@section('content')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Messages</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Contact Messages</h6>

                        <div class="table-responsive">
                            <table id="dataTableContactUs" class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($messages as $m=>$message)
                                    <tr>
                                        <td>{{ $m+1 }}</td>
                                        <td>{{ $message->name }}</td>
                                        <td><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></td>
                                        <td><a href="tel:{{ $message->phone }}">{{ $message->phone }}</a></td>
                                        <td><textarea class="form-control" style="width:100%;height:30px;">{{ $message->subject }}</textarea></td>
                                        <td><textarea class="form-control" style="width:100%;height:30px;">{{ $message->message }}</textarea></td>
                                        <td>{{ Carbon\Carbon::parse($message->created_at)->format('d-m-Y') }}</td>
                                        <td>
                                            @if($message->status === 'seen')
                                                <a href="javascript:;" class="btn btn-sm btn-warning contactUsSeen" getUrl="{{ route('admin.contactUsSeen',['contact'=>$message->id,'type'=>'unseen']) }}">Unseen</a>
                                            @else
                                                <a href="javascript:;" class="btn btn-sm btn-success contactUsSeen" getUrl="{{ route('admin.contactUsSeen',['contact'=>$message->id,'type'=>'seen']) }}">Seen</a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                            <div style="float: right;">{{ $messages->links() }}</div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $(document).on("click", ".contactUsSeen", function () {
                var url = $(this).attr('getUrl');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to seen this message!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, seen it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href=url
                    }
                })
            });

            $('#dataTableContactUs').DataTable( {
                "paging":   false,
                "ordering": false,
                "info":     false,
            });
        });
    </script>
@endsection
