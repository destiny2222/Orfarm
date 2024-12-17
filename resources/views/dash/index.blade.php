@extends('layouts.dash')
@section('content')

<!--{ PAGE HEADER START }-->
<div class="page-header">
    <h1 class="page-title">Ecommerce</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ecommerce</li>
        </ol>
    </div>
</div>
<!--{ PAGE HEADER END }-->

<!--{ row-1 start}-->
<div class="row">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-12 col-lg-4 col-sm-4 col-md-6 col-xl-4">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 class="">All Order</h6>
                                <h2 class="mb-0 number-font">44,278</h2>
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
            <div class="col-12 col-lg-4 col-sm-4 col-md-6 col-xl-4">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 class="">Completed Order</h6>
                                <h2 class="mb-0 number-font">67,987</h2>
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
            <div class="col-12 col-lg-4 col-sm-4 col-md-6 col-xl-4">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 class="">Processing Order</h6>
                                <h2 class="mb-0 number-font">$76,965</h2>
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
            <div class="col-12 col-lg-4 col-sm-4 col-md-6 col-xl-4">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 class="">Pending Order</h6>
                                <h2 class="mb-0 number-font">$76,965</h2>
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
            <div class="col-12 col-lg-4 col-sm-4 col-md-6 col-xl-4">
                <div class="card ">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 class="">Failed</h6>
                                <h2 class="mb-0 number-font">$76,965</h2>
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
<div class="row">
   <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
       <div class="card">
           <div class="card-header">
               <h3 class="card-title">Sales Analytics</h3>
           </div>
           <div class="card-body">
               <div class="chartjs-wrapper-demo">
                   <canvas id="transactions" class="chart-dropshadow" height="370" width="1120"></canvas>
               </div>
           </div>
       </div>
   </div>
</div>
<!--{ row-2 end }-->


@endsection
