<!DOCTYPE html>
<html lang="en">

<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>Admin Dashboard | {{ config('app.name')  }} </title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="" />
     <meta name="author" content="Dexnovate" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />

     <!-- App favicon -->
     <link rel="shortcut icon" href="/admin_style/assets/images/favicon.ico">

     <!-- Vendor css (Require in all Page) -->
     <link href="/admin_style/assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

     <!-- Icons css (Require in all Page) -->
     <link href="/admin_style/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
     <!-- App css (Require in all Page) -->
     <link href="/admin_style/assets/css/app.min.css" rel="stylesheet" type="text/css" />

     <!-- Theme Config js (Require in all Page) -->
     <script src="/admin_style/assets/js/config.js"></script>
</head>

<body>

     <!-- START Wrapper -->
     <div class="wrapper">

          <!-- ========== Topbar Start ========== -->
          @include('layouts.topbar')
          <!-- ========== Topbar End ========== -->

          <!-- ========== App Menu Start ========== -->
          <div class="main-nav">
               @include('layouts.menu')
          </div>
          <!-- ========== App Menu End ========== -->

          <!-- ==================================================== -->
          <!-- Start right Content here -->
          <!-- ==================================================== -->
          <div class="page-content">

               <!-- Start Container Fluid -->
               @yield('content')
               <!-- End Container Fluid -->

               <!-- ========== Footer Start ========== -->
               <footer class="footer">
                   <div class="container-fluid">
                       <div class="row">
                           <div class="col-12 text-center">
                               <script>document.write(new Date().getFullYear())</script> &copy; Larkon. Crafted by <iconify-icon icon="iconamoon:heart-duotone" class="fs-18 align-middle text-danger"></iconify-icon> <a
                                   href="#" class="fw-bold footer-text" target="_blank">Dexnovate</a>
                           </div>
                       </div>
                   </div>
               </footer>
               <!-- ========== Footer End ========== -->

          </div>
          <!-- ==================================================== -->
          <!-- End Page Content -->
          <!-- ==================================================== -->

     </div>
     <!-- END Wrapper -->

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <!-- Vendor Javascript (Require in all Page) -->
     <script src="/admin_style/assets/js/vendor.js"></script>

     <!-- App Javascript (Require in all Page) -->
     <script src="/admin_style/assets/js/app.js"></script>

     <!-- Vector Map Js -->
     <script src="/admin_style/assets/vendor/jsvectormap/js/jsvectormap.min.js"></script>
     <script src="/admin_style/assets/vendor/jsvectormap/maps/world-merc.js"></script>
     <script src="/admin_style/assets/vendor/jsvectormap/maps/world.js"></script>

     <!-- Dashboard Js -->
     <script src="/admin_style/assets/js/pages/dashboard.js"></script>
     @include('layouts.message')
     <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
     <script>
          // Initialize CKEditor
          ClassicEditor
              .create(document.querySelector('textarea'))
              .then(editor => {
                  console.log('Editor was initialized', editor);
              })
              .catch(error => {
                  console.error('Error during initialization of the editor', error);
              });
      </script>
</body>
</html>