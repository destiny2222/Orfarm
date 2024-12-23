@extends('layouts.main')
@section('content')
<!-- slider-area-start -->
<section class="slider-area tpslider-delay">
    <div class="swiper-container slider-active">
        <div class="swiper-wrapper">
            @foreach ($slides as $slide)
            <div class="swiper-slide ">
                <div class="tpslider pt-90 pb-0 grey-bg" data-background="assets/img/slider/shape-bg.jpg">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xxl-5 col-lg-6 col-md-6 col-12 col-sm-6">
                                <div class="tpslider__content pt-20">
                                    <span class="tpslider__sub-title mb-35">{{ $slide->sub_title }}</span>
                                    <h2 class="tpslider__title mb-30">{{ $slide->title }}</h2>
                                    <p>
                                        {!! $slide->description !!}
                                    </p>
                                    <div class="tpslider__btn">
                                        <a class="tp-btn" href="{{ route('shop') }}">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-7 col-lg-6 col-md-6 col-12 col-sm-6">
                                <div class="tpslider__thumb p-relative pt-15">
                                    <img class="tpslider__thumb-img" src="{{ asset('upload/slider/'.$slide->image) }}" alt="slider-bg">
                                    <div class="tpslider__shape d-none d-md-block">
                                        <img class="tpslider__shape-one" src="assets/img/slider/slider-shape-1.png" alt="shape">
                                        <img class="tpslider__shape-two" src="assets/img/slider/slider-shape-2.png" alt="shape">
                                        <img class="tpslider__shape-three" src="assets/img/slider/slider-shape-3.png" alt="shape">
                                        <img class="tpslider__shape-four" src="assets/img/slider/slider-shape-4.png" alt="shape">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
        <div class="tpslider__arrow d-none  d-xxl-block">
            <button class="tpsliderarrow tpslider__arrow-prv"><i class="icon-chevron-left"></i></button>
            <button class="tpsliderarrow tpslider__arrow-nxt"><i class="icon-chevron-right"></i></button>
        </div>
        <div class="slider-pagination d-xxl-none"></div>
    </div>
</section>
<!-- slider-area-end -->

<!-- category-area-start -->
<section class="category-area grey-bg pb-40">
    <div class="container">
        <div class="swiper-container category-active">
            <div class="swiper-wrapper">
                @foreach ($categories as $category)
                <div class="swiper-slide">
                    <div class="category__item mb-30">
                        <div class="category__thumb fix mb-15">
                            <a href="javascript:void()"><img src="{{ asset('upload/category/'.$category->image) }}" alt="category-thumb"></a>
                        </div>
                        <div class="category__content">
                            <h5 class="category__title"><a href="javascript:void()">{{ $category->title   }}</a></h5>
                            {{-- <span class="category__count">{{ $count }} items</span> --}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- category-area-end -->

<!-- product-area-start -->
<section class="product-area grey-bg pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="tpsection mb-35">
                    <h4 class="tpsection__sub-title">~ Special Products ~</h4>
                    <h4 class="tpsection__title">Top Offers</h4>
                </div>
            </div>
        </div>
        <div class="tpproduct__arrow p-relative">
            <div class="swiper-container tpproduct-active tpslider-bottom p-relative">
                <div class="swiper-wrapper">
                    @foreach ($products as $product)
                    <div class="swiper-slide">
                        <div class="tpproduct p-relative">
                            <div class="tpproduct__thumb p-relative text-center">
                                @foreach ($product->photos as $image)
                                <a href="{{ route('product.details',$product->slug) }}">
                                    <img src="{{ asset('storage/upload/product/' . $image->image_path) }}" alt="">
                                </a>
                                <a class="tpproduct__thumb-img" href="{{ route('product.details', $product->slug) }}">
                                    <img src="{{ asset('storage/upload/product/' . $image->image_path) }}" alt="">
                                </a>
                                @break
                                @endforeach
                                <div class="tpproduct__info bage">
                                    <span class="tpproduct__info-discount bage__discount">{{ App\Models\Product::calculateDiscount($product->price, $product->discount) }}%</span>
                                    <span class="tpproduct__info-hot bage__hot">{{ $product->badge }}</span>
                                </div>
                                <div class="tpproduct__shopping">
                                    <a class="tpproduct__shopping-wishlist" onclick="event.preventDefault(); document.getElementById('wish-{{ $product->id  }}').submit()" href="{{ route('wishlist.add') }}"><i class="icon-heart icons"></i></a>
                                    {{-- <a class="tpproduct__shopping-wishlist" href="#"><i class="icon-layers"></i></a> --}}
                                    <a class="tpproduct__shopping-cart" href="{{ route('product.details', $product->slug) }}"><i class="icon-eye"></i></a>
                                    <form action="{{ route('wishlist.add') }}" id="wish-{{ $product->id  }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    </form>
                                </div>
                            </div>
                            <div class="tpproduct__content">
                                <span class="tpproduct__content-weight">
                                    <a href="{{ route('product.details', $product->slug) }}) }}">{{  $product->category->title  }}</a>
                                </span>
                                <h4 class="tpproduct__title">
                                    <a href="{{ route('product.details', $product->slug) }}) }}">{{ \Str::limit($product->title, 20) }}</a>
                                </h4>
                                <div class="tpproduct__rating mb-5">
                                    <a href="#"><i class="icon-star_outline1"></i></a>
                                    <a href="#"><i class="icon-star_outline1"></i></a>
                                    <a href="#"><i class="icon-star_outline1"></i></a>
                                    <a href="#"><i class="icon-star_outline1"></i></a>
                                    <a href="#"><i class="icon-star_outline1"></i></a>
                                </div>
                                <div class="tpproduct__price">
                                    <span>&#8358;{{ number_format($product->discount, 2) }}</span>
                                    <del>&#8358;{{ number_format($product->price, 2) }}</del>
                                </div>
                            </div>
                            <div class="tpproduct__hover-text">
                                <div class="tpproduct__hover-btn d-flex justify-content-center ">
                                    <form action="{{ route('cart.add') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="slug" value="{{ $product->slug }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button class="tp-btn-2" type="submit">Add to cart</button>
                                    </form>
                                </div>
                                {{-- <div class="tpproduct__descrip">
                                    <ul>
                                        <li>Stock: {{ $product->stock }}</li>
                                        <li>MFG: August 4.2021</li>
                                        <li>LIFE: 60 days</li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="tpproduct-btn">
                <div class="tpprduct-arrow tpproduct-btn__prv"><a href="#"><i class="icon-chevron-left"></i></a></div>
                <div class="tpprduct-arrow tpproduct-btn__nxt"><a href="#"><i class="icon-chevron-right"></i></a></div>
            </div>
        </div>
    </div>
</section>
<!-- product-area-end -->

<!-- product-feature-area-start -->
<section class="product-feature-area product-feature grey-bg pt-80 pb-40">
    <div class="container">
        <div class="row">
            @if($twoColumnBanner)
            <div class="col-lg-6 col-md-12">
                <div class="tpfeature__thumb p-relative pb-40">
                    <img src="{{ asset('upload/promotion/'.$twoColumnBanner->image ) }}" alt="">
                    <div class="tpfeature__shape d-none d-md-block">
                        <img class="tpfeature__shape-one" src="assets/img/product/feature-shape-1.png" alt="">
                        <img class="tpfeature__shape-two" src="assets/img/product/feature-shape-2.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="tpproduct-feature p-relative pt-45 pb-40">
                    <div class="tpsection tpfeature__content mb-35">
                        <h4 class="tpsection__sub-title mb-0">~ {{ $twoColumnBanner->subtitle }} ~</h4>
                        <h4 class="tpsection__title tpfeature__title mb-25">{{ $twoColumnBanner->title }}</h4>
                        <p>
                            {!! $twoColumnBanner->description !!}
                        </p>
                    </div>
                    <div class="tpfeature__shape d-none d-md-block">
                        <img class="tpfeature__shape-three" src="assets/img/product/feature-shape-3.png" alt="">
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
<!-- product-feature-area-end -->

<!-- banner-area-start -->
<section class="banner-area pb-60 grey-bg">
    <div class="container">
        <div class="row">
            @foreach ($banners as $banner)
            <div class="col-lg-4 col-md-6">
                <div class="tpbanner__item mb-30">
                    <a href="shop-3.html">
                        <div class="tpbanner__content" data-background="assets/img/banner/banner-1.jpg">
                            <span class="tpbanner__sub-title mb-10">{{ $banner->sub_title }}</span>
                            <h4 class="tpbanner__title mb-30">{{ $banner->title }}</h4>
                            <p>{!! $banner->description !!}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- banner-area-end -->

<!-- product-area-start -->
<section class="weekly-product-area grey-bg pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="tpsection mb-20">
                    <h4 class="tpsection__sub-title">~ Special Products ~</h4>
                    <h4 class="tpsection__title">Weekly Food Offers</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="tpnavtab__area pb-40">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all" aria-selected="true">All Products</button>
                            <button class="nav-link" id="nav-meat-tab" data-bs-toggle="tab" data-bs-target="#nav-meat" type="button" role="tab" aria-controls="nav-meat" aria-selected="false">Fresh Meat</button>
                            <button class="nav-link" id="nav-vegetables-tab" data-bs-toggle="tab" data-bs-target="#nav-vegetables" type="button" role="tab" aria-controls="nav-vegetables" aria-selected="false">Fresh Vegetables</button>
                            <button class="nav-link" id="nav-snacks-tab" data-bs-toggle="tab" data-bs-target="#nav-snacks" type="button" role="tab" aria-controls="nav-snacks" aria-selected="false">Fresh Fruits</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        @foreach (['all' => $allProducts, 'meat' => $meatProducts, 'vegetables' => $vegetableProducts, 'Fresh Fruits' => $snackProducts] as $tab => $products)
                        <div class="tab-pane fade {{ $tab == 'all' ? 'show active' : '' }}" id="nav-{{ $tab }}" role="tabpanel" aria-labelledby="nav-{{ $tab }}-tab" tabindex="0">
                            <div class="tpproduct__arrow p-relative">
                                <div class="swiper-container tpproduct-active tpslider-bottom p-relative">
                                    <div class="swiper-wrapper">
                                        @foreach ($pro as $product)
                                        <div class="swiper-slide">
                                            <div class="tpproduct p-relative">
                                                <div class="tpproduct__thumb p-relative text-center">
                                                    @foreach ($product->photos as $image)
                                                        <a href="{{ route('product.details',$product->slug) }}">
                                                            <img src="{{ asset('storage/upload/product/' . $image->image_path) }}" alt="">
                                                        </a>
                                                        <a class="tpproduct__thumb-img" href="{{ route('product.details', $product->slug) }}">
                                                            <img src="{{ asset('storage/upload/product/' . $image->image_path) }}" alt="">
                                                        </a>
                                                        @break
                                                    @endforeach
                                                    <div class="tpproduct__info bage">
                                                        <span class="tpproduct__info-discount bage__discount">{{ App\Models\Product::calculateDiscount($product->price, $product->discount) }}%</span>
                                                        <span class="tpproduct__info-hot bage__hot">{{ $product->badge }}</span>
                                                    </div>
                                                    <div class="tpproduct__shopping">
                                                        <a class="tpproduct__shopping-wishlist" onclick="event.preventDefault(); document.getElementById('wish-{{ $product->id }}').submit()" href="{{ route('wishlist.add') }}"><i class="icon-heart icons"></i></a>
                                                        <a class="tpproduct__shopping-wishlist" href="{{ route('product.details', $product->slug) }}) }}#"><i class="icon-layers"></i></a>
                                                        <a class="tpproduct__shopping-cart" href="{{ route('product.details', $product->slug) }}) }}"><i class="icon-eye"></i></a>
                                                    </div>
                                                </div>
                                                <div class="tpproduct__content">
                                                    <span class="tpproduct__content-weight">
                                                        <a href="{{ route('product.details', $product->slug) }}) }}">{{ $product->category->title }}</a>
                                                    </span>
                                                    <h4 class="tpproduct__title">
                                                        <a href="{{ route('product.details', $product->slug) }}) }}">{{ $product->title }}</a>
                                                    </h4>
                                                    <div class="tpproduct__rating mb-5">
                                                        @for ($i = 0; $i < 5; $i++)
                                                            <a href="#"><i class="icon-star_outline1"></i></a>
                                                        @endfor
                                                    </div>
                                                    <div class="tpproduct__price">
                                                        <span>&#8358;{{ number_format($product->discount, 2) }}</span>
                                                        <del>&#8358;{{ number_format($product->price, 2) }}</del>
                                                    </div>
                                                </div>
                                                <div class="tpproduct__hover-text">
                                                    <div class="tpproduct__hover-btn d-flex justify-content-center mb-10">
                                                        <form action="{{ route('cart.add') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                            <input type="hidden" name="slug" value="{{ $product->slug }}">
                                                            <input type="hidden" name="quantity" value="1">
                                                            <button class="tp-btn-2" type="submit">Add to cart</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tpproduct-btn">
                                    <div class="tpprduct-arrow tpproduct-btn__prv"><a href="#"><i class="icon-chevron-left"></i></a></div>
                                    <div class="tpprduct-arrow tpproduct-btn__nxt"><a href="#"><i class="icon-chevron-right"></i></a></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="tpproduct__all-item text-center">
                    <span>Discover thousands of other quality products.
                        <a href="{{ route('shop') }}">Shop All Products <i class="icon-chevrons-right"></i></a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product-area-end -->

<!-- product-coundown-area-start -->
@if($deal)
<section class="product-countdown-area tpcountdown__bg grey-bg pb-25" data-background="{{ asset('upload/deal/'.$deal->image) }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tpcoundown p-relative ml-175">
                    <div class="section__content mb-35">
                        <span class="section__sub-title mb-10">~ {{ $deal->subtitle }} ~</span>
                        <h2 class="section__title mb-25">{{ $deal->title }}</h2>
                        <p>
                            {!! $deal->description !!}
                        </p>
                    </div>
                    <div class="tpcoundown__count">
                        <h4 class="tpcoundown__count-title">hurry up! Offer End In:</h4>
                        <div class="tpcoundown__countdown" data-countdown="{{ $deal->offer_end_time->format('Y/m/d') }}"></div>
                        <div class="tpcoundown__btn mt-50">
                            <a class="whight-btn" href="{{ route('shop') }}">Shop Now</a>
                        </div>
                    </div>
                    <div class="tpcoundown__shape d-none d-lg-block">
                        <img class="tpcoundown__shape-one" src="assets/img/shape/tree-leaf-1.svg" alt="">
                        <img class="tpcoundown__shape-two" src="assets/img/shape/tree-leaf-2.svg" alt="">
                        <img class="tpcoundown__shape-three" src="assets/img/shape/tree-leaf-3.svg" alt="">
                        <img class="tpcoundown__shape-four" src="assets/img/shape/fresh-shape-1.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- product-coundown-area-end -->

<!-- blog-area-start -->
<section class="blog-area pt-100 pb-100 grey-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="tpsection mb-35">
                    <h4 class="tpsection__sub-title">~ Read Our Blog ~</h4>
                    <h4 class="tpsection__title">Our Latest Post</h4>
                    <p>The liber tempor cum soluta nobis eleifend option congue doming quod mazim.</p>
                </div>
            </div>
        </div>
        <div class="swiper-container tpblog-active">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="tpblog__item">
                        <div class="tpblog__thumb fix">
                            <a href="blog-details.html"><img src="assets/img/blog/blog-bg-1.jpg" alt=""></a>
                        </div>
                        <div class="tpblog__wrapper">
                            <div class="tpblog__entry-wap">
                                <span class="cat-links"><a href="shop-details.html">Lifestyle</a></span>
                                <span class="author-by"><a href="#">Admin</a></span>
                                <span class="post-data"><a href="#">SEP 15. 2022</a></span>
                            </div>
                            <h4 class="tpblog__title"><a href="blog-details.html">Avocado Grilled Salmon, Rich In Nutrients For The Body</a></h4>
                            <p>These are the people who make your life easier. Egestas is tristique vestibulum...</p>
                            <div class="tpblog__details">
                                <a href="blog-details.html">Continue reading <i class="icon-chevrons-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="tpblog__item">
                        <div class="tpblog__thumb fix">
                            <a href="blog-details.html"><img src="assets/img/blog/blog-bg-2.jpg" alt=""></a>
                        </div>
                        <div class="tpblog__wrapper">
                            <div class="tpblog__entry-wap">
                                <span class="cat-links"><a href="shop-details.html">Organics</a></span>
                                <span class="author-by"><a href="#">Admin</a></span>
                                <span class="post-data"><a href="#">SEP 15. 2022</a></span>
                            </div>
                            <h4 class="tpblog__title"><a href="blog-details.html">The Best Great Benefits Of
                                    Fresh Beef For Women's Health</a></h4>
                            <p>These are the people who make your life easier. Egestas is tristique vestibulum...</p>
                            <div class="tpblog__details">
                                <a href="blog-details.html">Continue reading <i class="icon-chevrons-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="tpblog__item">
                        <div class="tpblog__thumb fix">
                            <a href="blog-details.html"><img src="assets/img/blog/blog-bg-3.jpg" alt=""></a>
                        </div>
                        <div class="tpblog__wrapper">
                            <div class="tpblog__entry-wap">
                                <span class="cat-links"><a href="shop-details.html">Organics</a></span>
                                <span class="author-by"><a href="#">Admin</a></span>
                                <span class="post-data"><a href="#">SEP 15. 2022</a></span>
                            </div>
                            <h4 class="tpblog__title"><a href="blog-details.html">Ways To Choose Fruits &
                                    Seafoods Good For Pregnancy</a></h4>
                            <p>These are the people who make your life easier. Egestas is tristique vestibulum...</p>
                            <div class="tpblog__details">
                                <a href="blog-details.html">Continue reading <i class="icon-chevrons-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="tpblog__item">
                        <div class="tpblog__thumb fix">
                            <a href="blog-details.html"><img src="assets/img/blog/blog-bg-4.jpg" alt=""></a>
                        </div>
                        <div class="tpblog__wrapper">
                            <div class="tpblog__entry-wap">
                                <span class="cat-links"><a href="shop-details.html">Shopping</a></span>
                                <span class="author-by"><a href="#">Admin</a></span>
                                <span class="post-data"><a href="#">SEP 15. 2022</a></span>
                            </div>
                            <h4 class="tpblog__title"><a href="blog-details.html">Summer Breakfast For The Healthy Morning With Tomatoes</a></h4>
                            <p>These are the people who make your life easier. Egestas is tristique vestibulum...</p>
                            <div class="tpblog__details">
                                <a href="blog-details.html">Continue reading <i class="icon-chevrons-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="tpblog__item">
                        <div class="tpblog__thumb fix">
                            <a href="blog-details.html"><img src="assets/img/blog/blog-bg-5.jpg" alt=""></a>
                        </div>
                        <div class="tpblog__wrapper">
                            <div class="tpblog__entry-wap">
                                <span class="cat-links"><a href="#">Foods</a></span>
                                <span class="author-by"><a href="#">Admin</a></span>
                                <span class="post-data"><a href="#">SEP 15. 2022</a></span>
                            </div>
                            <h4 class="tpblog__title"><a href="blog-details.html">Popular Reasons You Must Drinks Juice Everyday</a></h4>
                            <p>These are the people who make your life easier. Egestas is tristique vestibulum...</p>
                            <div class="tpblog__details">
                                <a href="blog-details.html">Continue reading <i class="icon-chevrons-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="tpblog__item">
                        <div class="tpblog__thumb fix">
                            <a href="blog-details.html"><img src="assets/img/blog/blog-bg-6.jpg" alt=""></a>
                        </div>
                        <div class="tpblog__wrapper">
                            <div class="tpblog__entry-wap">
                                <span class="cat-links"><a href="shop-details.html">Lifestyle</a></span>
                                <span class="author-by"><a href="#">Admin</a></span>
                                <span class="post-data"><a href="#">SEP 15. 2022</a></span>
                            </div>
                            <h4 class="tpblog__title"><a href="blog-details.html">Perfect Quality Reasonable Price For Your Family</a></h4>
                            <p>These are the people who make your life easier. Egestas is tristique vestibulum...</p>
                            <div class="tpblog__details">
                                <a href="blog-details.html">Continue reading <i class="icon-chevrons-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="tpblog__item">
                        <div class="tpblog__thumb fix">
                            <a href="blog-details.html"><img src="assets/img/blog/blog-bg-7.jpg" alt=""></a>
                        </div>
                        <div class="tpblog__wrapper">
                            <div class="tpblog__entry-wap">
                                <span class="cat-links"><a href="shop-details.html">Dairy Farm</a></span>
                                <span class="author-by"><a href="#">Admin</a></span>
                                <span class="post-data"><a href="#">SEP 15. 2022</a></span>
                            </div>
                            <h4 class="tpblog__title"><a href="blog-details.html">Ways To Choose Fruits Seafoods Good For Pregnancy</a></h4>
                            <p>These are the people who make your life easier. Egestas is tristique vestibulum...</p>
                            <div class="tpblog__details">
                                <a href="blog-details.html">Continue reading <i class="icon-chevrons-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="tpblog__item">
                        <div class="tpblog__thumb fix">
                            <a href="blog-details.html"><img src="assets/img/blog/blog-bg-8.jpg" alt=""></a>
                        </div>
                        <div class="tpblog__wrapper">
                            <div class="tpblog__entry-wap">
                                <span class="cat-links"><a href="#">organis</a></span>
                                <span class="author-by"><a href="#">Admin</a></span>
                                <span class="post-data"><a href="#">SEP 15. 2022</a></span>
                            </div>
                            <h4 class="tpblog__title"><a href="blog-details.html">The Best Great Benefits Of Fresh Beef For Women’s Health</a></h4>
                            <p>These are the people who make your life easier. Egestas is tristique vestibulum...</p>
                            <div class="tpblog__details">
                                <a href="blog-details.html">Continue reading <i class="icon-chevrons-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog-area-end -->


@endsection
