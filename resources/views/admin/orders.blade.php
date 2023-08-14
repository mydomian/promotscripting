@extends('admin.layout.master')

@section('title')
Orders
@endsection
@section('categories','active')
@push('styles')
<link rel="stylesheet" href="{{ asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
@endpush
@section('content')

<div class="page-content">

<nav class="page-breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Orders</li>
</ol>
</nav>

<div class="row">
<div class="col-md-12">
<div class="card">
    <div class="card-body">
        <div class="row mb-5">
            <div class="col-md-9"><h6 class="card-title">Orders</h6></div>
        </div>
        
        <div class="table-responsive">
            
            <table id="dataTableOrder" class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Buyer</th>
                    <th>Seller</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Price</th>
                    <th>Charge</th>
                    <th>Charge Amount</th>
                    <th>Collect</th>
                    <th>Transaction</th>
                    <th>Is_Paid</th>
                    <th>Created</th>
                    <th>Prompt</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name ?? "" }}</td>
                            <td>{{ $order->product->user->name ?? "" }}</td>
                            <td>{{ $order->product->subCategory->category->category_name ?? "" }}</td>
                            <td>{{ $order->product->subCategory->category_name ?? "" }}</td>
                            <td>{{ $order->price ?? "" }}</td>
                            <td>{{ $order->charge_percentage ?? "" }}</td>
                            <td>{{ $order->charge_amount ?? "" }}</td>
                            <td>{{ $order->collect_price ?? "" }}</td>
                            <td>{{ $order->transaction_id ?? "" }}</td>
                            <td>{{ $order->is_paid ?? "" }}</td>
                            <td>{{ $order->created_at->format('Y-m-d') ?? "" }}</td>
                            <td><a href="javascript:;" class="" title="For View" data-bs-toggle="modal" data-bs-target="#viewOrderProduct{{ $order->id }}">Prompt Details</a></td>
                            <td style="width:50px">

                               @php
                                   $status = ['pending','approve','cancel'];
                               @endphp
                                <select name="order_status" class="order-status" orderId="{{ $order->id }}">
                                    <option value="">Status</option>
                                    @forelse ($status as $item)
                                        <option value="{{ $item }}" @if($order->status == $item) selected @endif>{{ $item }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </td>
                            
                        </tr>

{{--  View Prompt Modal--}}
<div class="modal fade" id="viewOrderProduct{{ $order->id }}" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="exampleModalLabel">{{ $order->product->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-info"> Thumbnil </label>
                                <div class="w-100">
                                    <a href="{{ asset('/storage/products/thumbnil/'.$order->product->image) }}" download><img class="img-fluid object-fit-fill w-100" src="{{ asset('/storage/products/thumbnil/'.$order->product->image) }}" alt="prompt-thumbnil"></a>
                                </div>
                                <br>
                                <label class="text-info"> Category </label>
                                <div class="w-100">
                                    <input type="text" readonly class="form-control" value="{{ $order->product->subCategory->category->category_name ?? "" }}">
                                </div>
                                <br>
                                <label class="text-info"> Subcategory </label>
                                <div class="w-100">
                                    <input type="text" readonly class="form-control" value="{{ $order->product->subCategory->category_name ?? "" }}">
                                </div>
                                <br>
                                
                                <br>
                                <label class="text-info"> Title </label>
                                <div class="w-100">
                                    <input type="text" readonly class="form-control" value="{{ $order->product->title ?? "" }}">
                                </div>
                                <br>
                                <label class="text-info"> Description </label>
                                <div class="w-100">
                                    <textarea name="" class="form-control" readonly>{{ $order->product->description ?? "" }}</textarea>
                                </div>
                                <br>
                                <label class="text-info"> Instruction </label>
                                <div class="w-100">
                                    <textarea name="" class="form-control" readonly>{{ $order->product->instructions }}</textarea>
                                </div>
                                
                                @if (isset($order->product->prompt_testing))
                                <br>
                                    <label class="text-info"> Prompt Testing </label>
                                    <div class="w-100">
                                        <textarea name="" class="form-control" readonly>{{ $order->product->prompt_testing }}</textarea>
                                    </div>
                                @endif

                                @if (isset($order->product->preview_input))
                                <br>
                                    <label class="text-info"> Preview Input </label>
                                    <div class="w-100">
                                        <textarea name="" class="form-control" readonly>{{ $order->product->preview_input }}</textarea>
                                    </div>
                                @endif

                                @if (isset($order->product->preview_output))
                                <br>
                                    <label class="text-info"> Preview Output </label>
                                    <div class="w-100">
                                        <textarea name="" class="form-control" readonly>{{ $order->product->preview_output }}</textarea>
                                    </div>
                                @endif

                                @if (isset($order->product->midjourney_text))
                                <br>
                                    <label class="text-info"> Midjourney Text </label>
                                    <div class="w-100">
                                        <textarea name="" class="form-control" readonly>{{ $order->product->midjourney_text }}</textarea>
                                    </div>
                                @endif

                                @if (isset($order->product->midjourney_profile))
                                <br>
                                    <label class="text-info"> Midjourney Profile </label>
                                    <div class="w-100">
                                        <textarea name="" class="form-control" readonly>{{ $order->product->midjourney_profile }}</textarea>
                                    </div>
                                @endif

                                @if (isset($order->product->image_verification))
                                <br>
                                    <label class="text-info"> Image Verification </label>
                                    <div class="w-100">
                                        <textarea name="" class="form-control" readonly>{{ $order->product->image_verification }}</textarea>
                                    </div>
                                @endif

                                @if (isset($order->product->negative_prompt))
                                <br>
                                    <label class="text-info"> Negative Prompt </label>
                                    <div class="w-100">
                                        <textarea name="" class="form-control" readonly>{{ $order->product->negative_prompt }}</textarea>
                                    </div>
                                @endif

                                @if (isset($order->product->productImages) && $order->product->productImages->count() > 0)
                                <br>
                                    <label class="text-info">Images</label>
                                    <div class="w-100">
                                       @foreach ($images = $order->product->productImages as $image)
                                           <img src="{{ asset('/storage/products/'.$image->images) }}" alt="prompt-images">
                                       @endforeach
                                    </div>
                                @endif
                                
                            </div>
                        </div>

                        <div class="col-md-12 text-end mt-2">
                            <button type="button" class="btn btn-sm btn-info" data-bs-dismiss="modal"
                            aria-label="btn-close">Close</button>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>




                    @empty
                        No Data Found
                    @endforelse
                   
                </tbody>
            </table>
            <div style="float: right;">{{ $orders->links() }}</div>
        </div>
    </div>

</div>
</div>
</div>
</div>
</div>
</div>



@endsection
@push('scripts')
<script src="{{ URL::asset('admin/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
<script src="{{ URL::asset('admin/assets/js/data-table.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {

        $('.order-status').on('change', function() {
            var orderId = $(this).attr('orderId');
            var value = $(this).val();
            var url = "{{ route('admin.promptStatusUpdate','') }}"+"/"+orderId+"/"+value;
            Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to status "+value+"!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, '+value+'it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href=url
                }
            });
        });


        $('#dataTableOrder').DataTable( {
            "paging":   false,
            "ordering": false,
            "info":     false,
        } );
    });
</script>
@endpush
    

