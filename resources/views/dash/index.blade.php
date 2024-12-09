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
                               <h6 class="">Total Users</h6>
                               <h2 class="mb-0 number-font">44,278</h2>
                           </div>
                           <div class="ms-auto">
                               <div class="chart-wrapper mt-1">
                                   <canvas id="saleschart" class="h-8 w-9" width="96" height="64"></canvas>
                               </div>
                           </div>
                       </div>
                       <span class="text-muted fs-12"><span class="text-secondary"><i class="fe fe-arrow-up-circle  text-secondary"></i> 5%</span>
                           Last week</span>
                   </div>
               </div>
           </div>
           <div class="col-12 col-lg-4 col-sm-4 col-md-6 col-xl-4">
               <div class="card overflow-hidden">
                   <div class="card-body">
                       <div class="d-flex">
                           <div class="mt-2">
                               <h6 class="">Total Profit</h6>
                               <h2 class="mb-0 number-font">67,987</h2>
                           </div>
                           <div class="ms-auto">
                               <div class="chart-wrapper mt-1">
                                   <canvas id="leadschart" class="h-8 w-9 " width="96" height="64"></canvas>
                               </div>
                           </div>
                       </div>
                       <span class="text-muted fs-12"><span class="text-secondary"><i class="fe fe-arrow-up-circle  text-secondary"></i> 5%</span>
                           Last week</span>
                   </div>
               </div>
           </div>
           <div class="col-12 col-lg-4 col-sm-4 col-md-6 col-xl-4">
               <div class="card overflow-hidden">
                   <div class="card-body">
                       <div class="d-flex">
                           <div class="mt-2">
                               <h6 class="">Total Expenses</h6>
                               <h2 class="mb-0 number-font">$76,965</h2>
                           </div>
                           <div class="ms-auto">
                               <div class="chart-wrapper mt-1">
                                   <canvas id="profitchart" class="h-8 w-9 " width="96" height="64"></canvas>
                               </div>
                           </div>
                       </div>
                       <span class="text-muted fs-12"><span class="text-green"><i class="fe fe-arrow-up-circle text-green"></i> 0.9%</span>
                           Last 9 days</span>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
<!--{ row-1 end}-->
<!--{ row-3 start }-->
<div class="row">
   <div class="col-xxl-12 col-xl-12">
      <div class="card">
         <div class="card-header">
            <h3 class="card-title">Top Selling Products</h3>
         </div>
         <div class="card-body p-0">
            <div class="table-responsive text-nowrap">
                  <table class="table text-nowrap mb-0">
                     <thead>
                        <tr>
                              <th scope="col">Product</th>
                              <th scope="col">Category</th>
                              <th scope="col">Payment</th>
                              <th scope="col">Order Status</th>
                              <th scope="col">Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <img src="/assetss/images/products/41.jpg" alt="products" height="50" width="50" class="me-2">
                                    <div class="d-flex flex-column">
                                          <span class="fw-medium lh-1">Yellow polka dot</span>
                                          <small class="text-muted">Dashsage</small>
                                    </div>
                                 </div>
                              </td>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <span class="badge bg-danger-transparent rounded-pill text-danger p-2  me-3">
                                          <i class="fe fe-user"></i>
                                    </span>
                                    Fashion
                                 </div>
                              </td>
                              <td>
                                 <div class="text-muted lh-1">
                                    <span class="text-primary fw-medium">$120</span>/499
                                 </div>
                                 <small class="text-muted">Partially Paid</small>
                              </td>
                              <td>
                                 <span class="badge bg-primary-transparent rounded-pill text-primary p-2 px-3">Confirmed</span>
                              </td>
                              <td>
                                 <div class="g-1">
                                    <a class="btn text-primary btn-sm" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                          <i class="fe fe-edit fs-14"></i>
                                    </a>
                                    <a class="btn text-danger btn-sm" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                          <i class="fe fe-trash-2 fs-14"></i>
                                    </a>
                                 </div>
                              </td>
                        </tr>
                        <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <img src="/assetss/images/products/42.jpg" alt="Black dress, chic" height="50" width="50" class="me-2">
                                    <div class="d-flex flex-column">
                                          <span class="fw-medium lh-1">Black dress, chic</span>
                                          <small class="text-muted">Dashsage</small>
                                    </div>
                                 </div>
                              </td>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <span class="badge bg-warning-transparent rounded-pill text-warning p-2  me-3">
                                          <i class="fe fe-user"></i>
                                    </span>
                                    Fashion
                                 </div>
                              </td>
                              <td>
                                 <div class="text-muted lh-1">
                                    <span class="text-primary fw-medium">$149</span>
                                 </div>
                                 <small class="text-muted">Fully Paid</small>
                              </td>
                              <td>
                                 <span class="badge bg-success-transparent rounded-pill text-success p-2 px-3">Completed</span>
                              </td>
                              <td>
                                 <div class="g-1">
                                    <a class="btn text-primary btn-sm" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                          <i class="fe fe-edit fs-14"></i>
                                    </a>
                                    <a class="btn text-danger btn-sm" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                          <i class="fe fe-trash-2 fs-14"></i>
                                    </a>
                                 </div>
                              </td>
                        </tr>
                        <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <img src="/assetss/images/products/43.jpg" alt="Sunglasses, stylish, hat" height="50" width="50" class="me-2">
                                    <div class="d-flex flex-column">
                                          <span class="fw-medium lh-1">Sunglasses, stylish, hat</span>
                                          <small class="text-muted">Dashsage</small>
                                    </div>
                                 </div>
                              </td>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <span class="badge bg-info-transparent rounded-pill text-info p-2  me-3">
                                          <i class="fe fe-user"></i>
                                    </span>
                                    Fashion
                                 </div>
                              </td>
                              <td>
                                 <div class="text-muted lh-1">
                                    <span class="text-primary fw-medium">$0</span>/899
                                 </div>
                                 <small class="text-muted">Unpaid</small>
                              </td>
                              <td>
                                 <span class="badge bg-danger-transparent rounded-pill text-danger p-2 px-3">Cancelled</span>
                              </td>
                              <td>
                                 <div class="g-1">
                                    <a class="btn text-primary btn-sm" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                          <i class="fe fe-edit fs-14"></i>
                                    </a>
                                    <a class="btn text-danger btn-sm" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                          <i class="fe fe-trash-2 fs-14"></i>
                                    </a>
                                 </div>
                              </td>
                        </tr>
                        <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <img src="/assetss/images/products/44.jpg" alt="Smiling, dress, pink." height="50" width="50" class="me-2">
                                    <div class="d-flex flex-column">
                                          <span class="fw-medium lh-1">
                                             Smiling, dress, pink.</span>
                                          <small class="text-muted">Dashsage</small>
                                    </div>
                                 </div>
                              </td>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <span class="badge bg-primary-transparent rounded-pill text-primary p-2  me-3">
                                          <i class="fe fe-user"></i>
                                    </span>
                                    Fashion
                                 </div>
                              </td>
                              <td>
                                 <div class="text-muted lh-1">
                                    <span class="text-primary fw-medium">$149</span>
                                 </div>
                                 <small class="text-muted">Fully Paid</small>
                              </td>
                              <td>
                                 <span class="badge bg-success-transparent rounded-pill text-success p-2 px-3">Completed</span>
                              </td>
                              <td>
                                 <div class="g-1">
                                    <a class="btn text-primary btn-sm" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                          <i class="fe fe-edit fs-14"></i>
                                    </a>
                                    <a class="btn text-danger btn-sm" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                          <i class="fe fe-trash-2 fs-14"></i>
                                    </a>
                                 </div>
                              </td>
                        </tr>
                        <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <img src="/assetss/images/products/48.jpg" alt="Gorgeous, floral, chic" height="50" width="50" class="me-2">
                                    <div class="d-flex flex-column">
                                          <span class="fw-medium lh-1">Gorgeous, floral, chic.</span>
                                          <small class="text-muted">Dashsage</small>
                                    </div>
                                 </div>
                              </td>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <span class="badge bg-warning-transparent rounded-pill text-warning p-2  me-3">
                                          <i class="fe fe-user"></i>
                                    </span>
                                    Fashion
                                 </div>
                              </td>
                              <td>
                                 <div class="text-muted lh-1">
                                    <span class="text-primary fw-medium">$149</span>
                                 </div>
                                 <small class="text-muted">Fully Paid</small>
                              </td>
                              <td>
                                 <span class="badge bg-success-transparent rounded-pill text-success p-2 px-3">Completed</span>
                              </td>
                              <td>
                                 <div class="g-1">
                                    <a class="btn text-primary btn-sm" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                          <i class="fe fe-edit fs-14"></i>
                                    </a>
                                    <a class="btn text-danger btn-sm" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                          <i class="fe fe-trash-2 fs-14"></i>
                                    </a>
                                 </div>
                              </td>
                        </tr>
                     </tbody>
                  </table>
            </div>
         </div>
      </div>
   </div>
</div>
<!--{ row-3 end }-->
<!--{ row-2 start}-->
<!-- <div class="row">
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
</div> ---->
<!--{ row-2 end }-->

 
@endsection