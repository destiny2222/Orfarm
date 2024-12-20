@extends('layouts.master')
@section('content')
<div class="container-fluid">
     <div class="row">
          <div class="col-md-6 col-xl-3">
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex align-items-center justify-content-between">
                              <div>
                                  <h4 class="card-title mb-2">Payment Refund</h4>
                                  <p class="text-muted fw-medium fs-22 mb-0">490</p>
                              </div>
                              <div>
                                  <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                      <iconify-icon icon="solar:chat-round-money-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                                  </div>
                              </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-6 col-xl-3">
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex align-items-center justify-content-between">
                              <div>
                                  <h4 class="card-title mb-2">Order Cancel</h4>
                                  <p class="text-muted fw-medium fs-22 mb-0">241</p>
                              </div>
                              <div>
                                  <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                      <iconify-icon icon="solar:cart-cross-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                                  </div>
                              </div>
                      </div>
                  </div>
              </div>
          </div>
  
          <div class="col-md-6 col-xl-3">
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex align-items-center justify-content-between">
                              <div>
                                  <h4 class="card-title mb-2">Order Shipped</h4>
                                  <p class="text-muted fw-medium fs-22 mb-0">630</p>
                              </div>
                              <div>
                                  <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                      <iconify-icon icon="solar:box-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                                  </div>
                              </div>
                      </div>
                  </div>
              </div>
          </div>
  
          <div class="col-md-6 col-xl-3">
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex align-items-center justify-content-between">
                              <div>
                                  <h4 class="card-title mb-2">Order Delivering</h4>
                                  <p class="text-muted fw-medium fs-22 mb-0">170</p>
                              </div>
                              <div>
                                  <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                      <iconify-icon icon="solar:tram-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                                  </div>
                              </div>
                      </div>
                  </div>
              </div>
          </div>
  
          <div class="col-md-6 col-xl-3">
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex align-items-center justify-content-between">
                              <div>
                                  <h4 class="card-title mb-2">Pending Review</h4>
                                  <p class="text-muted fw-medium fs-22 mb-0">210</p>
                              </div>
                              <div>
                                  <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                      <iconify-icon icon="solar:clipboard-remove-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                                  </div>
                              </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-6 col-xl-3">
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex align-items-center justify-content-between">
                              <div>
                                  <h4 class="card-title mb-2">Pending Payment</h4>
                                  <p class="text-muted fw-medium fs-22 mb-0">608</p>
                              </div>
                              <div>
                                  <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                      <iconify-icon icon="solar:clock-circle-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                                  </div>
                              </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-6 col-xl-3">
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex align-items-center justify-content-between">
                              <div>
                                  <h4 class="card-title mb-2">Delivered</h4>
                                  <p class="text-muted fw-medium fs-22 mb-0">200</p>
                              </div>
                              <div>
                                  <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                      <iconify-icon icon="solar:clipboard-check-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                                  </div>
                              </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-6 col-xl-3">
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex align-items-center justify-content-between">
                              <div>
                                  <h4 class="card-title mb-2">In Progress</h4>
                                  <p class="text-muted fw-medium fs-22 mb-0">656</p>
                              </div>
                              <div>
                                  <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                      <iconify-icon icon="solar:inbox-line-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                                  </div>
                              </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    <!-- Start here.... -->
    <div class="row">
         <div class="col-xxl-6">
              <div class="card">
                   <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                             <h4 class="card-title">Performance</h4>
                             <div>
                                  <button type="button" class="btn btn-sm btn-outline-light">ALL</button>
                                  <button type="button" class="btn btn-sm btn-outline-light">1M</button>
                                  <button type="button" class="btn btn-sm btn-outline-light">6M</button>
                                  <button type="button" class="btn btn-sm btn-outline-light active">1Y</button>
                             </div>
                        </div> <!-- end card-title-->

                        <div dir="ltr">
                             <div id="dash-performance-chart" class="apex-charts"></div>
                        </div>
                   </div> <!-- end card body -->
              </div> <!-- end card -->
         </div> <!-- end col -->
         <div class="col-xxl-6">
              <div class="card">
                   <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                             <h4 class="card-title">Performance</h4>
                             <div>
                                  <button type="button" class="btn btn-sm btn-outline-light">ALL</button>
                                  <button type="button" class="btn btn-sm btn-outline-light">1M</button>
                                  <button type="button" class="btn btn-sm btn-outline-light">6M</button>
                                  <button type="button" class="btn btn-sm btn-outline-light active">1Y</button>
                             </div>
                        </div> <!-- end card-title-->

                        <div dir="ltr">
                             <div id="dash-performance-chart" class="apex-charts"></div>
                        </div>
                   </div> <!-- end card body -->
              </div> <!-- end card -->
         </div> <!-- end col -->
    </div> <!-- end row -->

    <div class="row">
         <div class="col">
              <div class="card">
                   <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                             <h4 class="card-title">
                                  Recent Orders
                             </h4>

                             <a href="#!" class="btn btn-sm btn-soft-primary">
                                  <i class="bx bx-plus me-1"></i>Create Order
                             </a>
                        </div>
                   </div>
                   <!-- end card body -->
                   <div class="table-responsive table-centered">
                        <table class="table mb-0">
                             <thead class="bg-light bg-opacity-50">
                                  <tr>
                                       <th class="ps-3">
                                            Order ID.
                                       </th>
                                       <th>
                                            Date
                                       </th>
                                       <th>
                                            Product
                                       </th>
                                       <th>
                                            Customer Name
                                       </th>
                                       <th>
                                            Email ID
                                       </th>
                                       <th>
                                            Phone No.
                                       </th>
                                       <th>
                                            Address
                                       </th>
                                       <th>
                                            Payment Type
                                       </th>
                                       <th>
                                            Status
                                       </th>
                                  </tr>
                             </thead>
                             <!-- end thead-->
                             <tbody>
                                  <tr>
                                       <td class="ps-3">
                                            <a href="order-detail.html">#RB5625</a>
                                       </td>
                                       <td>29 April 2024</td>
                                       <td>
                                            <img src="/admin_style/assets/images/products/product-1(1).png" alt="product-1(1)" class="img-fluid avatar-sm">
                                       </td>
                                       <td>
                                            <a href="#!">Anna M. Hines</a>
                                       </td>
                                       <td>anna.hines@mail.com</td>
                                       <td>(+1)-555-1564-261</td>
                                       <td>Burr Ridge/Illinois</td>
                                       <td>Credit Card</td>
                                       <td>
                                            <i class="bx bxs-circle text-success me-1"></i>Completed
                                       </td>
                                  </tr>
                                  <tr>
                                       <td class="ps-3">
                                            <a href="order-detail.html">#RB9652</a>
                                       </td>
                                       <td>25 April 2024</td>
                                       <td>
                                            <img src="/admin_style/assets/images/products/product-4.png" alt="product-4" class="img-fluid avatar-sm">
                                       </td>
                                       <td>
                                            <a href="#!">Judith H. Fritsche</a>
                                       </td>
                                       <td>judith.fritsche.com</td>
                                       <td>(+57)-305-5579-759</td>
                                       <td>SULLIVAN/Kentucky</td>
                                       <td>Credit Card</td>
                                       <td>
                                            <i class="bx bxs-circle text-success me-1"></i>Completed
                                       </td>
                                  </tr>
                                  <tr>
                                       <td class="ps-3">
                                            <a href="order-detail.html">#RB5984</a>
                                       </td>
                                       <td>25 April 2024</td>
                                       <td>
                                            <img src="/admin_style/assets/images/products/product-5.png" alt="product-5" class="img-fluid avatar-sm">
                                       </td>
                                       <td>
                                            <a href="#!">Peter T. Smith</a>
                                       </td>
                                       <td>peter.smith@mail.com</td>
                                       <td>(+33)-655-5187-93</td>
                                       <td>Yreka/California</td>
                                       <td>Pay Pal</td>
                                       <td>
                                            <i class="bx bxs-circle text-success me-1"></i>Completed
                                       </td>
                                  </tr>
                                  <tr>
                                       <td class="ps-3">
                                            <a href="order-detail.html">#RB3625</a>
                                       </td>
                                       <td>21 April 2024</td>
                                       <td>
                                            <img src="/admin_style/assets/images/products/product-6.png" alt="product-6" class="img-fluid avatar-sm">
                                       </td>
                                       <td>
                                            <a href="#!">Emmanuel J. Delcid</a>
                                       </td>
                                       <td>
                                            emmanuel.delicid@mail.com
                                       </td>
                                       <td>(+30)-693-5553-637</td>
                                       <td>Atlanta/Georgia</td>
                                       <td>Pay Pal</td>
                                       <td>
                                            <i class="bx bxs-circle text-primary me-1"></i>Processing
                                       </td>
                                  </tr>
                                  <tr>
                                       <td class="ps-3">
                                            <a href="order-detail.html">#RB8652</a>
                                       </td>
                                       <td>18 April 2024</td>
                                       <td>
                                            <img src="/admin_style/assets/images/products/product-1(2).png" alt="product-1(2)" class="img-fluid avatar-sm">
                                       </td>
                                       <td>
                                            <a href="#!">William J. Cook</a>
                                       </td>
                                       <td>william.cook@mail.com</td>
                                       <td>(+91)-855-5446-150</td>
                                       <td>Rosenberg/Texas</td>
                                       <td>Credit Card</td>
                                       <td>
                                            <i class="bx bxs-circle text-primary me-1"></i>Processing
                                       </td>
                                  </tr>
                             </tbody>
                             <!-- end tbody -->
                        </table>
                        <!-- end table -->
                   </div>
                   <!-- table responsive -->

                   <div class="card-footer border-top">
                        <div class="row g-3">
                             <div class="col-sm">
                                  <div class="text-muted">
                                       Showing
                                       <span class="fw-semibold">5</span>
                                       of
                                       <span class="fw-semibold">90,521</span>
                                       orders
                                  </div>
                             </div>

                             <div class="col-sm-auto">
                                  <ul class="pagination m-0">
                                       <li class="page-item">
                                            <a href="#" class="page-link"><i class="bx bx-left-arrow-alt"></i></a>
                                       </li>
                                       <li class="page-item active">
                                            <a href="#" class="page-link">1</a>
                                       </li>
                                       <li class="page-item">
                                            <a href="#" class="page-link">2</a>
                                       </li>
                                       <li class="page-item">
                                            <a href="#" class="page-link">3</a>
                                       </li>
                                       <li class="page-item">
                                            <a href="#" class="page-link"><i class="bx bx-right-arrow-alt"></i></a>
                                       </li>
                                  </ul>
                             </div>
                        </div>
                   </div>
              </div>
              <!-- end card -->
         </div>
         <!-- end col -->
    </div> <!-- end row -->

</div>
@endsection