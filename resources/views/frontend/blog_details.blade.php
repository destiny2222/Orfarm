@extends('layouts.main')
@section('content')
    <!-- breadcrumb-area-start -->
    <div class="breadcrumb__area pt-5 pb-5">
        <div class="container">
           <div class="row">
              <div class="col-lg-12">
                 <div class="tp-breadcrumb__content">
                    <div class="tp-breadcrumb__list">
                       <span class="tp-breadcrumb__active"><a href="/">Home</a></span>
                       <span class="dvdr">/</span>
                       <span>{{ $post->title }}</span>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <!-- breadcrumb-area-end -->

     <!-- blog-details-area-start -->
     <section class="blog-details-area pb-50">
        <div class="container">
           <div class="row">
              <div class="col-lg-12">
                 <div class="tp-blog-details__thumb">
                    <img src="{{ asset('upload/post/'.$post->image) }}" class="w-100 img-fluid"  alt="">
                 </div>
              </div>
           </div>
           <div class="row">
              <div class="col-xl-10 col-lg-12">
                 <div class="tp-blog-details__wrapper">
                    <div class="tp-blog-details__content">
                       <div class="tpblog__entry-wap mb-5">
                          <span class="post-data"><a href="#">{{ $post->created_at->format('M d Y') }}</a></span>
                       </div>
                       <h2 class="tp-blog-details__title mb-25">{{ $post->title }}</h2>
                       <p>
                          {!! $post->description !!}
                       </p>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- blog-details-area-end -->
@endsection