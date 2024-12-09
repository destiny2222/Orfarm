@extends('layouts.main')
@section('content')
     <!-- breadcrumb-area-start -->
     <div class="breadcrumb__area pt-5 pb-5">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="tp-breadcrumb__content">
                  <div class="tp-breadcrumb__list">
                     <span class="tp-breadcrumb__active"><a href="index.html">Home</a></span>
                     <span class="dvdr">/</span>
                     <span>Sign in</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- breadcrumb-area-end -->

   <!-- track-area-start -->
   <section class="track-area pb-40">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-lg-6 col-sm-12">
               <div class="tptrack__product mb-40">
                  <div class="tptrack__content grey-bg">
                     <div class="tptrack__item d-flex mb-20">
                        <div class="tptrack__item-icon">
                           <i class="fal fa-user-unlock"></i>
                        </div>
                        <div class="tptrack__item-content">
                           <h4 class="tptrack__item-title">Login Here</h4>
                        </div>
                     </div>
                     @if($errors->any())
                        @foreach ($errors->all() as $error)
                           <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                           <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <strong>{{ $error }}</strong>
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                           </div>
                        @endforeach
                     @endif
                     <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="tptrack__id mb-10">
                           <div class="input">
                              <span><i class="fal fa-user"></i></span>
                              <input type="email" name="email" placeholder="email address">
                           </div>
                        </div>
                        <div class="tptrack__email mb-10">
                           <div class="input input-group" id="Password-toggle">
                              <span><i class="fal fa-key"></i></span>
                              <input type="password" name="password" placeholder="Password">
                              <a href="javascript:void(0);" class="" id="Password-toggle-btn">
                                 <i class="fal fa-eye-slash" aria-hidden="true"></i>
                             </a>
                           </div>
                        </div>
                        <div class="tpsign__remember d-flex align-items-center justify-content-between mb-15">
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                              <label class="form-check-label" for="flexCheckDefault2">Remember me</label>
                           </div>
                           <div class="tpsign__pass">
                              <a href="#">Forget Password</a>
                           </div>
                        </div>
                        <div class="tptrack__btn mb-10">
                           <button type="submit" class="tptrack__submition active">Login Now<i class="fal fa-long-arrow-right"></i></button>
                        </div>
                     </form>
                     <p class="text-center">Don't have an account? <a href="/register" class="pt-30">Register</a></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- track-area-end -->

   

@endsection