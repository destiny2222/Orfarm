@extends('layouts.dash')
@section('content')

<!--{ PAGE HEADER START }-->
<div class="page-header">
    <h1 class="page-title">Dashboard</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>
</div>
<!--{ PAGE HEADER END }-->

<!--{ row-1 start}-->
<div class="row">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-12 col-lg-6 col-sm-6 col-md-6 col-xl-6">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 class="">All Order</h6>
                                <h2 class="mb-0 number-font">{{ $total_orders }}</h2>
                            </div>
                            <div class="ms-auto">
                                <div class="chart-wrapper mt-1">
                                    <span class="avatar  bg-secondary">
                                       <i class="bx bx-store-alt bx-sm"></i>
                                   </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-sm-6 col-md-6 col-xl-6">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 class="">Completed Order</h6>
                                <h2 class="mb-0 number-font">{{ $total_completed_orders }}</h2>
                            </div>
                            <div class="ms-auto">
                                <div class="chart-wrapper mt-1">
                                    <span class="avatar bg-secondary">
                                       <i class="bx bxs-badge-check bx-sm"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-sm-6 col-md-6 col-xl-6">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 class="">Processing Order</h6>
                                <h2 class="mb-0 number-font">{{ $total_processing_orders }}</h2>
                            </div>
                            <div class="ms-auto">
                                <div class="chart-wrapper mt-1">
                                    <span class="avatar bg-secondary">
                                       <i class="bx bx-wallet bx-sm"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-sm-6 col-md-6 col-xl-6">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 class="">Pending Order</h6>
                                <h2 class="mb-0 number-font">{{ $total_pending_orders }}</h2>
                            </div>
                            <div class="ms-auto">
                                <div class="chart-wrapper mt-1">
                                    <span class="avatar bg-secondary">
                                        <i class="bx bx-calendar bx-sm"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-sm-6 col-md-6 col-xl-6">
                <div class="card ">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 class="">Failed</h6>
                                <h2 class="mb-0 number-font">{{ $total_failed_orders }}</h2>
                            </div>
                            <div class="ms-auto">
                                <div class="chart-wrapper mt-1">
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
    </div>
</div>
<!--{ row-2 start}-->

<!--{ row-2 end }-->
@endsection
@push('scripts')
    <script>
        
    </script>
@endpush
