<!-- Sidebar Logo -->
<div class="logo-box">
     <a href="index.html" class="logo-dark">
          <img src="/admin_style/assets/images/logo-sm.png" class="logo-sm" alt="logo sm">
          <img src="/admin_style/assets/images/logo-dark.png" class="logo-lg" alt="logo dark">
     </a>

     <a href="index.html" class="logo-light">
          <img src="/admin_style/assets/images/logo-sm.png" class="logo-sm" alt="logo sm">
          <img src="/admin_style/assets/images/logo-light.png" class="logo-lg" alt="logo light">
     </a>
</div>

<!-- Menu Toggle Button (sm-hover) -->
<button type="button" class="button-sm-hover" aria-label="Show Full Sidebar">
     <iconify-icon icon="solar:double-alt-arrow-right-bold-duotone" class="button-sm-hover-icon"></iconify-icon>
</button>

<div class="scrollbar" data-simplebar>
     <ul class="navbar-nav" id="navbar-nav">

          <li class="nav-item">
               <a class="nav-link" href="{{ route('admin.home') }}">
                    <span class="nav-icon">
                         <iconify-icon icon="solar:widget-5-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Dashboard </span>
               </a>
          </li>
          <li class="menu-title mt-2">Users</li>

          <li class="nav-item">
               <a class="nav-link" href="pages-profile.html">
                    <span class="nav-icon">
                         <iconify-icon icon="solar:chat-square-like-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Profile </span>
               </a>
          </li>

          <li class="nav-item">
               <a class="nav-link menu-arrow" href="#sidebarCustomers" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarCustomers">
                    <span class="nav-icon">
                         <iconify-icon icon="solar:users-group-two-rounded-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Customers Lists</span>
               </a>
               <div class="collapse" id="sidebarCustomers">
                    <ul class="nav sub-navbar-nav">

                         <li class="sub-nav-item">
                              <a class="sub-nav-link" href="customer-list.html">List</a>
                         </li>
                         <li class="sub-nav-item">
                              <a class="sub-nav-link" href="customer-detail.html">Details</a>
                         </li>
                    </ul>
               </div>
          </li>

          <li class="menu-title">General</li>

          <li class="nav-item">
               <a class="nav-link menu-arrow" href="#sidebarCategory" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarCategory">
                    <span class="nav-icon">
                         <iconify-icon icon="solar:clipboard-list-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Category </span>
               </a>
               <div class="collapse" id="sidebarCategory">
                    <ul class="nav sub-navbar-nav">
                         <li class="sub-nav-item">
                              <a class="sub-nav-link" href="{{ route('admin.category.index') }}">List</a>
                         </li>
                         <li class="sub-nav-item">
                              <a class="sub-nav-link" href="{{ route('admin.category.create') }}">Create</a>
                         </li>
                    </ul>
               </div>
          </li>

          <li class="nav-item">
               <a class="nav-link menu-arrow" href="#sidebarProducts" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarProducts">
                    <span class="nav-icon">
                         <iconify-icon icon="solar:t-shirt-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Products </span>
               </a>
               <div class="collapse" id="sidebarProducts">
                    <ul class="nav sub-navbar-nav">
                         <li class="sub-nav-item">
                              <a class="sub-nav-link" href="{{ route('admin.product.index') }}">List</a>
                         </li>
                         <li class="sub-nav-item">
                              <a class="sub-nav-link" href="{{ route('admin.product.create') }}">Create</a>
                         </li>
                    </ul>
               </div>
          </li>

          <li class="nav-item">
               <a class="nav-link menu-arrow" href="#sidebarOrders" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarOrders">
                    <span class="nav-icon">
                         <iconify-icon icon="solar:bag-smile-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Orders </span>
               </a>
               <div class="collapse" id="sidebarOrders">
                    <ul class="nav sub-navbar-nav">

                         <li class="sub-nav-item">
                              <a class="sub-nav-link" href="{{ route('admin.order.list') }}">All Orders</a>
                         </li>
                         <li class="sub-nav-item">
                              <a class="sub-nav-link" href="{{ route('admin.order.pending') }}">Pending Orders</a>
                         </li>
                         <li class="sub-nav-item">
                              <a class="sub-nav-link" href="{{ route('admin.order.progress') }}">Progress Orders</a>
                         </li>
                         <li class="sub-nav-item">
                              <a class="sub-nav-link" href="{{ route('admin.order.delivered') }}">Delivered Orders</a>
                         </li>
                         <li class="sub-nav-item">
                              <a class="sub-nav-link" href="{{ route('admin.order.cancel') }}"> Canceled Orders</a>
                         </li>
                    </ul>
                   
               </div>
          </li>

          <li class="nav-item">
               <a class="nav-link menu-arrow" href="#sidebarPurchases" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarPurchases">
                    <span class="nav-icon">
                         <iconify-icon icon="solar:card-send-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Manage site </span>
               </a>
               <div class="collapse" id="sidebarPurchases">
                    <ul class="nav sub-navbar-nav">
                         <li class="sub-nav-item">
                              <a class="sub-nav-link" href="{{ route('admin.home.page') }}">Home Page</a>
                         </li>
                         <li class="sub-nav-item">
                              <a class="sub-nav-link" href="#">Slider</a>
                         </li>
                         <li class="sub-nav-item">
                              <a class="sub-nav-link" href="purchase-returns.html">Return</a>
                         </li>
                    </ul>
               </div>
          </li>

          <li class="nav-item">
               <a class="nav-link menu-arrow" href="#sidebarAttributes" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarAttributes">
                    <span class="nav-icon">
                         <iconify-icon icon="solar:confetti-minimalistic-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Attributes </span>
               </a>
               <div class="collapse" id="sidebarAttributes">
                    <ul class="nav sub-navbar-nav">
                         <li class="sub-nav-item">
                              <a class="sub-nav-link" href="attributes-list.html">List</a>
                         </li>
                         <li class="sub-nav-item">
                              <a class="sub-nav-link" href="attributes-edit.html">Edit</a>
                         </li>
                         <li class="sub-nav-item">
                              <a class="sub-nav-link" href="attributes-add.html">Create</a>
                         </li>
                    </ul>
               </div>
          </li>

          <li class="nav-item">
               <a class="nav-link menu-arrow" href="#sidebarInvoice" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarInvoice">
                    <span class="nav-icon">
                         <iconify-icon icon="solar:bill-list-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Invoices </span>
               </a>
               <div class="collapse" id="sidebarInvoice">
                    <ul class="nav sub-navbar-nav">
                         <li class="sub-nav-item">
                              <a class="sub-nav-link" href="invoice-list.html">List</a>
                         </li>
                         <li class="sub-nav-item">
                              <a class="sub-nav-link" href="invoice-details.html">Details</a>
                         </li>
                         <li class="sub-nav-item">
                              <a class="sub-nav-link" href="invoice-add.html">Create</a>
                         </li>
                    </ul>
               </div>
          </li>

          <li class="nav-item">
               <a class="nav-link" href="settings.html">
                    <span class="nav-icon">
                         <iconify-icon icon="solar:settings-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Settings </span>
               </a>
          </li>




          <li class="nav-item">
               <a class="nav-link disabled" href="javascript:void(0);">
                    <span class="nav-icon">
                         <iconify-icon icon="solar:user-block-rounded-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Disable Item </span>
               </a>
          </li>
     </ul>
</div>