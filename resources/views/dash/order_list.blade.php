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
                                    <h6 class="mb-2 fw-semibold">Pending Payment</h6>
                                    <h4 class="mb-2">$5,345.43</h4>
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
                                    <h4 class="mb-2">$674,347.12</h4>
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
                                    <h6 class="mb-2 fw-semibold">Refunded</h6>
                                    <h4 class="mb-2">$8,345.23</h4>
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
                                    <h6 class="mb-2 fw-semibold">Failed</h6>
                                    <h4 class="mb-2">$14,235.12</h4>
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
                                    <th>customers</th>
                                    <th>date</th>
                                    <th>order</th>
                                    <th>payment</th>
                                    <th>status</th>
                                    <th>method</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div
                                            class="d-flex justify-content-start align-items-center order-name text-nowrap">
                                            <div class="avatar-wrapper">
                                                <div class="avatar me-2">
                                                    <img src="../assets/images/profiles/1.jpg"
                                                        alt="Avatar" class="rounded-circle">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <h6 class="m-0">
                                                    <a href="#"> John Doe</a>
                                                </h6>
                                                <small
                                                    class="text-muted">john.doe@example.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="text-nowrap">Mar 14, 2023, 10:21</span></td>
                                    <td>
                                        <a href="#"><span
                                                class="fw-semibold">#564</span></a>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 w-px-100 text-warning">
                                            <i class="bx bxs-circle fs-tiny me-2"></i>Pending
                                        </h6>
                                    </td>
                                    <td>
                                        <span class="badge px-2 bg-success"
                                            text-capitalized="">Delivered</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center text-nowrap">
                                            <img src="../assets/images/icons/mastercard.png"
                                                alt="mastercard" class="me-2" width="16">
                                            <span><i
                                                    class="bx bx-dots-horizontal-rounded"></i>2356</span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="btn btn-icon border" data-bs-toggle="tooltip"
                                            data-bs-original-title="View">
                                            <i class="fe fe-eye fs-18"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-icon border"
                                            data-bs-toggle="tooltip" data-bs-original-title="Delet">
                                            <i class="fe fe-trash fs-18"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div
                                            class="d-flex justify-content-start align-items-center order-name text-nowrap">
                                            <div class="avatar-wrapper">
                                                <div class="avatar me-2">
                                                    <img src="../assets/images/profiles/2.jpg"
                                                        alt="Avatar" class="rounded-circle">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <h6 class="m-0">
                                                    <a href="#">Jane Smith</a>
                                                </h6>
                                                <small
                                                    class="text-muted">jane.smith@example.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="text-nowrap">Mar 20, 2023, 10:21</span></td>
                                    <td>
                                        <a href="#"><span
                                                class="fw-semibold">#6989</span></a>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 w-px-100 text-secondary">
                                            <i class="bx bxs-circle fs-tiny me-2"></i>Cancelled
                                        </h6>
                                    </td>
                                    <td>
                                        <span class="badge px-2 bg-danger"
                                            text-capitalized="">Cancelled</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center text-nowrap">
                                            <img src="../assets/images/icons/mastercard.png"
                                                alt="mastercard" class="me-2" width="16">
                                            <span><i
                                                    class="bx bx-dots-horizontal-rounded"></i>2369</span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="btn btn-icon border" data-bs-toggle="tooltip"
                                            data-bs-original-title="View">
                                            <i class="fe fe-eye fs-18"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-icon border"
                                            data-bs-toggle="tooltip" data-bs-original-title="Delet">
                                            <i class="fe fe-trash fs-18"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div
                                            class="d-flex justify-content-start align-items-center order-name text-nowrap">
                                            <div class="avatar-wrapper">
                                                <div class="avatar me-2">
                                                    <img src="../assets/images/profiles/3.jpg"
                                                        alt="Avatar" class="rounded-circle">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <h6 class="m-0">
                                                    <a href="#">Emily Davis</a>
                                                </h6>
                                                <small
                                                    class="text-muted">emily.davis@example.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="text-nowrap">Mar 21, 2023, 10:21</span></td>
                                    <td>
                                        <a href="#"><span
                                                class="fw-semibold">#6989</span></a>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 w-px-100 text-success">
                                            <i class="bx bxs-circle fs-tiny me-2"></i>Paid
                                        </h6>
                                    </td>
                                    <td>
                                        <span class="badge px-2 bg-warning">Dispatched</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center text-nowrap">
                                            <img src="../assets/images/icons/paypal_logo.png"
                                                alt="paypal" class="me-2" width="16">
                                            <span><i
                                                    class="bx bx-dots-horizontal-rounded"></i>2365</span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="btn btn-icon border" data-bs-toggle="tooltip"
                                            data-bs-original-title="View">
                                            <i class="fe fe-eye fs-18"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-icon border"
                                            data-bs-toggle="tooltip" data-bs-original-title="Delet">
                                            <i class="fe fe-trash fs-18"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div
                                            class="d-flex justify-content-start align-items-center order-name text-nowrap">
                                            <div class="avatar-wrapper">
                                                <div class="avatar me-2">
                                                    <img src="../assets/images/profiles/4.jpg"
                                                        alt="Avatar" class="rounded-circle">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <h6 class="m-0">
                                                    <a href="#"> Ethan White</a>
                                                </h6>
                                                <small
                                                    class="text-muted">ethan.white@example.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="text-nowrap">Mar 21, 2023, 10:21</span></td>
                                    <td>
                                        <a href="#"><span
                                                class="fw-semibold">#9876</span></a>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 w-px-100 text-danger"><i
                                                class="bx bxs-circle fs-tiny me-2"></i>Failed</h6>
                                    </td>
                                    <td>
                                        <span class="badge px-2 bg-primary">Out for Delivery</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center text-nowrap">
                                            <img src="../assets/images/icons/paypal_logo.png"
                                                alt="paypal" class="me-2" width="16">
                                            <span><i
                                                    class="bx bx-dots-horizontal-rounded"></i>9106</span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="btn btn-icon border" data-bs-toggle="tooltip"
                                            data-bs-original-title="View">
                                            <i class="fe fe-eye fs-18"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-icon border"
                                            data-bs-toggle="tooltip"
                                            data-bs-original-title="Delete">
                                            <i class="fe fe-trash fs-18"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div
                                            class="d-flex justify-content-start align-items-center order-name text-nowrap">
                                            <div class="avatar-wrapper">
                                                <div class="avatar me-2">
                                                    <img src="../assets/images/profiles/5.jpg"
                                                        alt="Avatar" class="rounded-circle">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <h6 class="m-0">
                                                    <a href="#">James Brown</a>
                                                </h6>
                                                <small
                                                    class="text-muted">james.brown@example.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="text-nowrap">Mar 26, 2023, 10:21</span></td>
                                    <td>
                                        <a href="#"><span
                                                class="fw-semibold">#6989</span></a>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 w-px-100 text-success">
                                            <i class="bx bxs-circle fs-tiny me-2"></i>Paid
                                        </h6>
                                    </td>
                                    <td>
                                        <span class="badge px-2 bg-warning">Dispatched</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center text-nowrap">
                                            <img src="../assets/images/icons/mastercard.png"
                                                alt="mastercard" class="me-2" width="16">
                                            <span><i
                                                    class="bx bx-dots-horizontal-rounded"></i>1564</span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="btn btn-icon border" data-bs-toggle="tooltip"
                                            data-bs-original-title="View">
                                            <i class="fe fe-eye fs-18"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-icon border"
                                            data-bs-toggle="tooltip" data-bs-original-title="Delet">
                                            <i class="fe fe-trash fs-18"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div
                                            class="d-flex justify-content-start align-items-center order-name text-nowrap">
                                            <div class="avatar-wrapper">
                                                <div class="avatar me-2">
                                                    <img src="../assets/images/profiles/6.jpg"
                                                        alt="Avatar" class="rounded-circle">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <h6 class="m-0">
                                                    <a href="#">Ava Anderson</a>
                                                </h6>
                                                <small
                                                    class="text-muted">ava.anderson@example.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="text-nowrap">Mar 13, 2023, 10:21</span></td>
                                    <td>
                                        <a href="#"><span
                                                class="fw-semibold">#5642</span></a>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 w-px-100 text-warning">
                                            <i class="bx bxs-circle fs-tiny me-2"></i>Pending
                                        </h6>
                                    </td>
                                    <td>
                                        <span class="badge px-2 bg-success"
                                            text-capitalized="">Delivered</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center text-nowrap">
                                            <img src="../assets/images/icons/mastercard.png"
                                                alt="mastercard" class="me-2" width="16">
                                            <span><i
                                                    class="bx bx-dots-horizontal-rounded"></i>2356</span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="btn btn-icon border" data-bs-toggle="tooltip"
                                            data-bs-original-title="View">
                                            <i class="fe fe-eye fs-18"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-icon border"
                                            data-bs-toggle="tooltip" data-bs-original-title="Delet">
                                            <i class="fe fe-trash fs-18"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div
                                            class="d-flex justify-content-start align-items-center order-name text-nowrap">
                                            <div class="avatar-wrapper">
                                                <div class="avatar me-2">
                                                    <img src="../assets/images/profiles/7.jpg"
                                                        alt="Avatar" class="rounded-circle">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <h6 class="m-0">
                                                    <a href="#">Benjamin
                                                        Thomas</a>
                                                </h6>
                                                <small
                                                    class="text-muted">jane.smith@example.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="text-nowrap">Mar 20, 2023, 10:21</span></td>
                                    <td>
                                        <a href="#"><span
                                                class="fw-semibold">#6989</span></a>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 w-px-100 text-secondary">
                                            <i class="bx bxs-circle fs-tiny me-2"></i>Cancelled
                                        </h6>
                                    </td>
                                    <td>
                                        <span class="badge px-2 bg-danger"
                                            text-capitalized="">Cancelled</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center text-nowrap">
                                            <img src="../assets/images/icons/mastercard.png"
                                                alt="mastercard" class="me-2" width="16">
                                            <span><i
                                                    class="bx bx-dots-horizontal-rounded"></i>2369</span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="btn btn-icon border" data-bs-toggle="tooltip"
                                            data-bs-original-title="View">
                                            <i class="fe fe-eye fs-18"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-icon border"
                                            data-bs-toggle="tooltip" data-bs-original-title="Delet">
                                            <i class="fe fe-trash fs-18"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div
                                            class="d-flex justify-content-start align-items-center order-name text-nowrap">
                                            <div class="avatar-wrapper">
                                                <div class="avatar me-2">
                                                    <img src="../assets/images/profiles/8.jpg"
                                                        alt="Avatar" class="rounded-circle">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <h6 class="m-0">
                                                    <a href="#">Mia Moore</a>
                                                </h6>
                                                <small
                                                    class="text-muted">mia.moore@example.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="text-nowrap">Mar 21, 2023, 10:21</span></td>
                                    <td>
                                        <a href="#"><span
                                                class="fw-semibold">#6989</span></a>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 w-px-100 text-success">
                                            <i class="bx bxs-circle fs-tiny me-2"></i>Paid
                                        </h6>
                                    </td>
                                    <td>
                                        <span class="badge px-2 bg-warning">Dispatched</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center text-nowrap">
                                            <img src="../assets/images/icons/paypal_logo.png"
                                                alt="paypal" class="me-2" width="16">
                                            <span><i
                                                    class="bx bx-dots-horizontal-rounded"></i>2365</span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="btn btn-icon border" data-bs-toggle="tooltip"
                                            data-bs-original-title="View">
                                            <i class="fe fe-eye fs-18"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-icon border"
                                            data-bs-toggle="tooltip" data-bs-original-title="Delet">
                                            <i class="fe fe-trash fs-18"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div
                                            class="d-flex justify-content-start align-items-center order-name text-nowrap">
                                            <div class="avatar-wrapper">
                                                <div class="avatar me-2">
                                                    <img src="../assets/images/profiles/9.jpg"
                                                        alt="Avatar" class="rounded-circle">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <h6 class="m-0">
                                                    <a href="#"> Alexander
                                                        Hall</a>
                                                </h6>
                                                <small
                                                    class="text-muted">alexander.hall@example.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="text-nowrap">Mar 29, 2023, 10:21</span></td>
                                    <td>
                                        <a href="#"><span
                                                class="fw-semibold">#7845</span></a>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 w-px-100 text-danger"><i
                                                class="bx bxs-circle fs-tiny me-2"></i>Failed</h6>
                                    </td>
                                    <td>
                                        <span class="badge px-2 bg-primary">Out for Delivery</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center text-nowrap">
                                            <img src="../assets/images/icons/paypal_logo.png"
                                                alt="paypal" class="me-2" width="16">
                                            <span><i
                                                    class="bx bx-dots-horizontal-rounded"></i>9106</span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="btn btn-icon border" data-bs-toggle="tooltip"
                                            data-bs-original-title="View">
                                            <i class="fe fe-eye fs-18"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-icon border"
                                            data-bs-toggle="tooltip"
                                            data-bs-original-title="Delete">
                                            <i class="fe fe-trash fs-18"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div
                                            class="d-flex justify-content-start align-items-center order-name text-nowrap">
                                            <div class="avatar-wrapper">
                                                <div class="avatar me-2">
                                                    <img src="../assets/images/profiles/3.jpg"
                                                        alt="Avatar" class="rounded-circle">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <h6 class="m-0">
                                                    <a href="#">Sophia Taylor</a>
                                                </h6>
                                                <small
                                                    class="text-muted">sophia.taylor@example.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="text-nowrap">Mar 26, 2023, 10:21</span></td>
                                    <td>
                                        <a href="#"><span
                                                class="fw-semibold">#6989</span></a>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 w-px-100 text-success">
                                            <i class="bx bxs-circle fs-tiny me-2"></i>Paid
                                        </h6>
                                    </td>
                                    <td>
                                        <span class="badge px-2 bg-warning">Dispatched</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center text-nowrap">
                                            <img src="../assets/images/icons/mastercard.png"
                                                alt="mastercard" class="me-2" width="16">
                                            <span><i
                                                    class="bx bx-dots-horizontal-rounded"></i>7894</span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="btn btn-icon border" data-bs-toggle="tooltip"
                                            data-bs-original-title="View">
                                            <i class="fe fe-eye fs-18"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-icon border"
                                            data-bs-toggle="tooltip" data-bs-original-title="Delet">
                                            <i class="fe fe-trash fs-18"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection