@extends('layouts.dash')
@section('content')
     <!--{ PAGE HEADER START }-->
     <div class="page-header">
        <h1 class="page-title">Order List</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Order List</li>
            </ol>
        </div>
    </div>
    <!--{ PAGE HEADER END }-->
    <div class="row">
        <div class="col-12">
            <!-- { Product List Widget } -->
            <div class="row gy-4 gy-sm-1">
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div
                                class="d-flex justify-content-between align-items-start card-widget-1 pb-3 pb-sm-0">
                                <div>
                                    <h6 class="mb-2 fw-semibold">All Order</h6>
                                    <h4 class="mb-0 number-font">{{ $total_orders }}</h4>
                                </div>
                                <div class="avatar me-sm-4">
                                    <span class="avatar  bg-primary">
                                        <i class='bx bx-calendar bx-sm'></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div
                                class="d-flex justify-content-between align-items-start card-widget-2  pb-3 pb-sm-0">
                                <div>
                                    <h6 class="mb-2 fw-semibold">Completed</h6>
                                    <h4 class="mb-2">{{ $total_completed_orders }}</h4>
                                </div>
                                <div class="avatar me-lg-4">
                                    <span class="avatar bg-success">
                                        <i class='bx bxs-badge-check bx-sm'></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div
                                class="d-flex justify-content-between align-items-start pb-3 pb-sm-0 card-widget-3">
                                <div>
                                    <h6 class="mb-2 fw-semibold">Processing Order</h6>
                                    <h4 class="mb-2">{{ $total_processing_orders }}</h4>
                                </div>
                                <div class="avatar  me-sm-4">
                                    <span class="avatar bg-info">
                                        <i class='bx bx-wallet bx-sm'></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start ">
                                <div>
                                    <h6 class="mb-2 fw-semibold">Pending Order</h6>
                                    <h4 class="mb-2">{{ $total_pending_orders }}</h4>
                                </div>
                                <div class="avatar">
                                    <span class="avatar bg-danger">
                                        <i class='bx bxs-info-circle bx-sm'></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="orderListTable">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Order ID</th>
                                    <th>Total</th>
                                    <th>Date Purchased</th>
                                    <th>Payment Status</th>
                                    <th>Order Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orderHistory as $orderItem)
                                <tr>
                                    <td>
                                        <div
                                            class="d-flex justify-content-start align-items-center order-name text-nowrap">
                                            <div class="avatar-wrapper">
                                                <div class="avatar me-2">
                                                    <img src="{{ asset('storage/upload/product/'.$orderItem->product->photos->first()->image_path) }}" alt="Avatar" class="rounded-circle">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <h6 class="m-0">
                                                    <a href="#">{{ \Str::limit($orderItem->product->title, 30) }}</a>
                                                </h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td>
                                        <span class="fw-semibold">&#8358;{{ number_format($orderItem->product->price) }}</span>
                                    </td>
                                    <td><span class="text-nowrap">{{ $orderItem->created_at->format('d/m/Y h:i') }}</span></td>
                                    <td>
                                        @if ($orderItem->order->payment_status == 'pending')
                                        <h6 class="mb-0 w-px-100 text-warning">
                                            <i class="bx bxs-circle fs-tiny me-2"></i> Pending
                                        </h6>
                                        @elseif ($orderItem->order->payment_status == 'processing')
                                        <h6 class="mb-0 w-px-100 text-info">
                                            <i class="bx bxs-circle fs-tiny me-2"></i> Processing
                                        </h6>
                                        @elseif ($orderItem->order->payment_status == 'completed')
                                        <h6 class="mb-0 w-px-100 text-success">
                                            <i class="bx bxs-circle fs-tiny me-2"></i> Paid
                                        </h6>
                                        @elseif ($orderItem->order->payment_status == 'failed')
                                        <h6 class="mb-0 w-px-100 text-danger">
                                            <i class="bx bxs-circle fs-tiny me-2"></i> Failed
                                        </h6>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($orderItem->order->order_status == 'delivered')
                                         <span class="badge px-2 bg-success" text-capitalized="">Delivered</span>
                                        @elseif ($orderItem->order->order_status == 'processing')
                                         <span class="badge px-2 bg-info" text-capitalized="">Out for Delivery</span>
                                        @elseif ($orderItem->order->order_status == 'cancelled')
                                         <span class="badge px-2 bg-danger" text-capitalized="">Cancelled</span>
                                        @elseif ($orderItem->order->order_status == 'pending')
                                         <span class="badge px-2 bg-danger" text-capitalized="">Pending</span> 
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('invoice.index',$orderItem->id ) }}" class="btn btn-icon border" data-bs-toggle="tooltip" data-bs-original-title="View">
                                            <i class="ti ti-eye fs-18"></i>
                                        </a>
                                       
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No order items</td>
                                    </tr>
                                @endforelse
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection