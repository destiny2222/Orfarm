<!doctype html>
<html class="no-js" lang="zxx">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Orfarm - Multipurpose eCommerce HTML5 Template </title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- Place favicon.ico in the root directory -->
      <link rel="shortcut icon" type="image/x-icon" href="/assets/img/logo/favicon.png">

      <!-- CSS here -->
      <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="/assets/css/animate.css">
      <link rel="stylesheet" href="/assets/css/swiper-bundle.css">
      <link rel="stylesheet" href="/assets/css/slick.css">
      <link rel="stylesheet" href="/assets/css/magnific-popup.css">
      <link rel="stylesheet" href="/assets/css/spacing.css">
      <link rel="stylesheet" href="/assets/css/meanmenu.css">
      <link rel="stylesheet" href="/assets/css/nice-select.css">
      <link rel="stylesheet" href="/assets/css/fontawesome.min.css">
      <link rel="stylesheet" href="/assets/css/icon-dukamarket.css">
      <link rel="stylesheet" href="/assets/css/jquery-ui.css">
      <link rel="stylesheet" href="/assets/css/main.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">

        <style>
            .iti {
                position: relative;
                display: inherit !important;
            }
        </style>
   </head>
   <body>


      <!-- Scroll-top -->
      <button class="scroll-top scroll-to-target" data-target="html">
         <i class="icon-chevrons-up"></i>
      </button>
      <!-- Scroll-top-end-->


      <!-- header-area-start -->
      @include('layouts.header')
      <!-- header-area-end -->

      
      <main>

        @yield('content')

         <!-- feature-area-start -->
         <section class="feature-area mainfeature__bg pt-50 pb-40" data-background="/assets/img/shape/footer-shape-1.svg">
            <div class="container">
               <div class="mainfeature__border pb-15">
                  <div class="row row-cols-lg-5 row-cols-md-3 row-cols-2">
                     <div class="col">
                        <div class="mainfeature__item text-center mb-30">
                           <div class="mainfeature__icon">
                              <img src="/assets/img/icon/feature-icon-1.svg" alt="">
                           </div>
                           <div class="mainfeature__content">
                              <h4 class="mainfeature__title">Fast Delivery</h4>
                              <p>Across West & East India</p>
                           </div>
                        </div>
                     </div>
                     <div class="col">
                        <div class="mainfeature__item text-center mb-30">
                           <div class="mainfeature__icon">
                              <img src="/assets/img/icon/feature-icon-2.svg" alt="">
                           </div>
                           <div class="mainfeature__content">
                              <h4 class="mainfeature__title">safe payment</h4>
                              <p>100% Secure Payment</p>
                           </div>
                        </div>
                     </div>
                     <div class="col">
                        <div class="mainfeature__item text-center mb-30">
                           <div class="mainfeature__icon">
                              <img src="/assets/img/icon/feature-icon-3.svg" alt="">
                           </div>
                           <div class="mainfeature__content">
                              <h4 class="mainfeature__title">Online Discount</h4>
                              <p>Add Multi-buy Discount </p>
                           </div>
                        </div>
                     </div>
                     <div class="col">
                        <div class="mainfeature__item text-center mb-30">
                           <div class="mainfeature__icon">
                              <img src="/assets/img/icon/feature-icon-4.svg" alt="">
                           </div>
                           <div class="mainfeature__content">
                              <h4 class="mainfeature__title">Help Center</h4>
                              <p>Dedicated 24/7 Support </p>
                           </div>
                        </div>
                     </div>
                     <div class="col">
                        <div class="mainfeature__item text-center mb-30">
                           <div class="mainfeature__icon">
                              <img src="/assets/img/icon/feature-icon-5.svg" alt="">
                           </div>
                           <div class="mainfeature__content">
                              <h4 class="mainfeature__title">Curated items</h4>
                              <p>From Handpicked Sellers</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- feature-area-end -->

      </main>

      <!-- footer-area-start -->
      @include('layouts.footer')
      <!-- footer-area-end -->
      

      <!-- JS here -->
      <script src="/assets/js/jquery.js"></script>
      <script src="/assets/js/waypoints.js"></script>
      <script src="/assets/js/bootstrap.bundle.min.js"></script>
      <script src="/assets/js/swiper-bundle.js"></script>
      <script src="/assets/js/nice-select.js"></script>
      <script src="/assets/js/slick.js"></script>
      <script src="/assets/js/magnific-popup.js"></script>
      <script src="/assets/js/counterup.js"></script>
      <script src="/assets/js/wow.js"></script>
      <script src="/assets/js/isotope-pkgd.js"></script>
      <script src="/assets/js/imagesloaded-pkgd.js"></script>
      <script src="/assets/js/countdown.js"></script>
      <script src="/assets/js/ajax-form.js"></script>
      <script src="/assets/js/jquery-ui.js"></script>
      <script src="/assets/js/meanmenu.js"></script>
      <script src="/assets/js/main.js"></script>
      <script src="{{ asset('show-password.min.js') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>
      @stack('scripts')
   </body>
</html>
