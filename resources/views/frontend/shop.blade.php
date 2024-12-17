@extends('layouts.main')
@section('content')
    <!-- breadcrumb-area-start -->
    <div class="breadcrumb__area grey-bg pt-5 pb-5">
        <div class="container">
           <div class="row">
              <div class="col-lg-12">
                 <div class="tp-breadcrumb__content">
                    <div class="tp-breadcrumb__list">
                       <span class="tp-breadcrumb__active"><a href="index.html">Home</a></span>
                       <span class="dvdr">/</span>
                       <span>Shop</span>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <!-- breadcrumb-area-end -->

     <!-- shop-area-start -->
     <section class="shop-area-start grey-bg pb-200">
        <div class="container">
           <div class="row">
              {{-- <div class="col-xl-2 col-lg-12 col-md-12">
                 <div class="tpshop__leftbar">
                    <div class="tpshop__widget mb-30 pb-25">
                       <h4 class="tpshop__widget-title">Product Categories</h4>
                       <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault9">
                          <label class="form-check-label" for="flexCheckDefault9">
                             Biscuits & Snacks (08)
                          </label>
                       </div>
                       <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                          <label class="form-check-label" for="flexCheckDefault2">
                             Fresh Fruits (12)
                          </label>
                       </div>
                       <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" checked="" id="flexCheckDefault3">
                          <label class="form-check-label" for="flexCheckDefault3">
                             Exotic Fruits (09)
                          </label>
                       </div>
                       <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" checked="" id="flexCheckDefault4">
                          <label class="form-check-label" for="flexCheckDefault4">
                             Breads & Bakery (05)
                          </label>
                       </div>
                       <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" checked="" id="flexCheckDefault5">
                          <label class="form-check-label" for="flexCheckDefault5">
                             Breakfast & Dairy (09)
                          </label>
                       </div>
                       <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault6">
                          <label class="form-check-label" for="flexCheckDefault6">
                             Honey (05)
                          </label>
                       </div>
                       <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault7">
                          <label class="form-check-label" for="flexCheckDefault7">
                             Milk & Flavoured (04)
                          </label>
                       </div>
                       <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault8">
                          <label class="form-check-label" for="flexCheckDefault8">
                             Meats & Seafood (08)
                          </label>
                       </div>
                    </div>
                 </div>
                 <div class="tpshop__widget">
                    <div class="tpshop__sidbar-thumb mt-35">
                       <img src="assets/img/shape/sidebar-product-1.png" alt="">
                    </div>
                 </div>
              </div> --}}
              <div class="col-xl-12 col-lg-12 col-md-12">
                 <div class="tpshop__top ml-60">
                    <div class="tpshop__category">
                       <div class="swiper-container inner-category-active">
                          <div class="swiper-wrapper">
                             <div class="swiper-slide">
                                <div class="category__item mb-30">
                                   <div class="category__thumb fix mb-15">
                                      <a href="shop-details-3.html"><img src="assets/img/catagory/category-1.jpg" alt="category-thumb"></a>
                                   </div>
                                   <div class="category__content">
                                      <h5 class="category__title"><a href="shop-details-3.html">Vegetables</a></h5>
                                   </div>
                                </div>
                             </div>
                             <div class="swiper-slide">
                                <div class="category__item mb-30">
                                   <div class="category__thumb fix mb-15">
                                      <a href="shop-details-3.html"><img src="assets/img/catagory/category-2.jpg" alt="category-thumb"></a>
                                   </div>
                                   <div class="category__content">
                                      <h5 class="category__title"><a href="shop-details-3.html">Fresh Fruits</a></h5>
                                   </div>
                                </div>
                             </div>
                             <div class="swiper-slide">
                                <div class="category__item mb-30">
                                   <div class="category__thumb fix mb-15">
                                      <a href="shop-details-3.html"><img src="assets/img/catagory/category-3.jpg" alt="category-thumb"></a>
                                   </div>
                                   <div class="category__content">
                                      <h5 class="category__title"><a href="shop-details-3.html">Fruit Drink</a></h5>
                                   </div>
                                </div>
                             </div>
                             <div class="swiper-slide">
                                <div class="category__item mb-30">
                                   <div class="category__thumb fix mb-15">
                                      <a href="shop-details-3.html"><img src="assets/img/catagory/category-4.jpg" alt="category-thumb"></a>
                                   </div>
                                   <div class="category__content">
                                      <h5 class="category__title"><a href="shop-details-3.html">Fresh Bakery</a></h5>
                                   </div>
                                </div>
                             </div>
                             <div class="swiper-slide">
                                <div class="category__item mb-30">
                                   <div class="category__thumb fix mb-15">
                                      <a href="shop-details-3.html"><img src="assets/img/catagory/category-5.jpg" alt="category-thumb"></a>
                                   </div>
                                   <div class="category__content">
                                      <h5 class="category__title"><a href="shop-details-3.html">Biscuits Snack</a></h5>
                                   </div>
                                </div>
                             </div>
                             <div class="swiper-slide">
                                <div class="category__item mb-30">
                                   <div class="category__thumb fix mb-15">
                                      <a href="shop-details-3.html"><img src="assets/img/catagory/category-6.jpg" alt="category-thumb"></a>
                                   </div>
                                   <div class="category__content">
                                      <h5 class="category__title"><a href="shop-details.html">Fresh Meat</a></h5>
                                   </div>
                                </div>
                             </div>
                             <div class="swiper-slide">
                                <div class="category__item mb-30">
                                   <div class="category__thumb fix mb-15">
                                      <a href="shop-details-3.html"><img src="assets/img/catagory/category-7.jpg" alt="category-thumb"></a>
                                   </div>
                                   <div class="category__content">
                                      <h5 class="category__title"><a href="shop-details-3.html">Fresh Milk</a></h5>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>

                    <div class="tab-content" id="nav-tabContent">
                       <div class="tab-pane fade show active whight-product" id="nav-popular" role="tabpanel" aria-labelledby="nav-popular-tab">
                          <div class="row row-cols-xxl-3 row-cols-xl-3 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 tpproduct__shop-item">
                              @foreach ($products as $product)  
                              <div class="col">
                                 <div class="tpproduct p-relative mb-20">
                                    <div class="tpproduct__thumb p-relative text-center">
                                       <a href="{{ route('product.details', $product->slug) }}"><img src="{{ asset('storage/upload/product/'.$product->photos->first()->image_path) }}" alt=""></a>
                                       <a class="tpproduct__thumb-img" href="{{ route('product.details', $product->slug)  }}"><img src="{{ asset('storage/upload/product/'.$product->photos->first()->image_path) }}" alt=""></a>
                                       <div class="tpproduct__info bage">
                                          <span class="tpproduct__info-discount bage__discount">{{ App\Models\Product::calculateDiscount($product->price, $product->discount) }}%</span>
                                          <span class="tpproduct__info-hot bage__hot">{{ $product->badge }}</span>
                                       </div>
                                       <div class="tpproduct__shopping">
                                          <a class="tpproduct__shopping-wishlist" onclick="event.preventDefault(); document.getElementById('wish-{{ $product->id  }}').submit()" href="{{ route('wishlist.add') }}"><i class="icon-heart icons"></i></a>
                                          <form action="{{ route('wishlist.add') }}" id="wish-{{ $product->id  }}" method="post">
                                             @csrf
                                             <input type="hidden" name="product_id" value="{{ $product->id }}">
                                          </form>
                                          <a class="tpproduct__shopping-cart" href="{{ route('product.details', $product->slug)  }}"><i class="icon-eye"></i></a>
                                       </div>
                                    </div>
                                    <div class="tpproduct__content">
                                       <span class="tpproduct__content-weight">
                                          <a href="{{ route('product.details', $product->slug) }}) }}">{{ $product->category->name }}</a>
                                       </span>
                                       <h4 class="tpproduct__title">
                                          <a href="{{ route('product.details', $product->slug) }}) }}">{{ \Str::limit($product->title, 50) }}</a>
                                       </h4>
                                       <div class="tpproduct__rating mb-5">
                                          <a href="#"><i class="icon-star_outline1"></i></a>
                                          <a href="#"><i class="icon-star_outline1"></i></a>
                                          <a href="#"><i class="icon-star_outline1"></i></a>
                                          <a href="#"><i class="icon-star_outline1"></i></a>
                                          <a href="#"><i class="icon-star_outline1"></i></a>
                                       </div>
                                       <div class="tpproduct__price">
                                          <span>&#8358;{{ number_format($product->price, 2) }}</span>
                                          <del>&#8358;{{ number_format($product->discount, 2)}}</del>
                                       </div>
                                    </div>
                                    <div class="tpproduct__hover-text">
                                       <form action="{{ route('cart.add') }}" method="post">
                                          @csrf
                                          <input type="hidden" name="product_id" value="{{ $product->id }}">
                                          <input type="hidden" name="slug" value="{{ $product->slug }}">
                                          <input type="hidden" name="quantity" class="" value="1">
                                          <div class="tpproduct__hover-btn d-flex justify-content-center mb-10">
                                             <button type="submit" class="tp-btn-2">Add to cart</button>
                                          </div>
                                       </form>
                                       {{-- <div class="tpproduct__descrip">
                                          <ul>
                                             <li>Type: Organic</li>
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
                    </div>   
                    <div class="basic-pagination text-center mt-35">
                       <nav>
                          <ul>
                             <li>
                                <span class="current">1</span>
                             </li>
                             <li>
                                <a href="blog.html">2</a>
                             </li>
                             <li>
                                <a href="blog.html">3</a>
                             </li>
                             <li>
                                <a href="blog.html">
                                   <i class="icon-chevrons-right"></i>
                                </a>
                             </li>
                          </ul>
                        </nav>
                    </div>   
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- shop-area-end --> 
@endsection