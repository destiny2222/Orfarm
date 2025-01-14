@extends('layouts.main')
@section('content')
     <!-- error-area-start -->
     <section class="error-area pt-80 pb-80">
        <div class="container">
           <div class="row justify-content-center">
              <div class="col-xxl-6 col-lg-8 col-md-11">
                 <div class="tperror__wrapper text-center">
                    <div class="tperror__thumb p-relative mb-55">
                       <img src="/assets/img/shape/erorr-bg.png" alt="">
                       <div class="tperror__shape">
                          <img src="/assets/img/shape/erorr-shape.png" alt="">
                       </div>
                    </div>
                    <div class="tperror__content">
                       <h4 class="tperror__title mb-25">Oops...That link is broken.</h4>
                       <p>Sorry for the inconvenience. Go to our homepage or check out our latest collections.</p>
                       <div class="tperror__btn">
                          <a href="/">Back to homepage</a>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- error-area-end -->
@endsection