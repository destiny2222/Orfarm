@extends('layouts.main')
@section('content')
<!-- breadcrumb-area-start -->
<div class="breadcrumb__area grey-bg pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tp-breadcrumb__content">
                    <div class="tp-breadcrumb__list">
                        <span class="tp-breadcrumb__active"><a href="/">Home</a></span>
                        <span class="dvdr">/</span>
                        <span class="tp-breadcrumb__active"><a href="javascript:void()">{{ $product->category->title }}</a></span>
                        <span class="dvdr">/</span>
                        <span>{{ $product->title }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area-end -->

<!-- shop-details-area-start -->
<section class="shopdetails-area grey-bg pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-12">
                <div class="tpdetails__area mr-60 pb-30">
                    <div class="tpdetails__product mb-30">
                        <div class="tpdetails__title-box">
                            <h3 class="tpdetails__title">{{ $product->title }}</h3>
                            <ul class="tpdetails__brand">
                                <li> Brands: <a href="#">{{ config('app.name') }}</a> </li>
                                <li>
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $product->average_rating)
                                            <i class="icon-star_outline1" style="color: #ffc107;"></i> <!-- Filled Star -->
                                        @else
                                            <i class="icon-star_outline1" style="color: #ddd;"></i> <!-- Empty Star -->
                                        @endif
                                    @endfor
                                    <b>{{ $product->reviews->count() }} Reviews</b>
                                </li>
                                {{-- <li>
                                    SKU: <span>ORFARMVE005</span>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="tpdetails__box">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="tpproduct-details__nab">
                                        <div class="tab-content" id="nav-tabContents">
                                            @foreach ($images as $image)
                                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }} w-img" id="nav-home-{{ $image->id }}" role="tabpanel" aria-labelledby="nav-home-tab-{{ $image->id }}" tabindex="0">
                                                    {{-- @if () --}}
                                                        <img src="{{ asset('storage/upload/product/' . $image->image_path) }}" alt="">
                                                    {{-- @else
                                                        <img src="/assets/img/default-product.png" alt="Default product image">
                                                    @endif --}}
                                                </div>
                                            @endforeach
                                        </div>
                                        <nav>
                                            <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                                                @foreach ($images as $image)
                                                    <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="nav-home-tab-{{ $image->id }}" data-bs-toggle="tab" data-bs-target="#nav-home-{{ $image->id }}" type="button" role="tab" aria-controls="nav-home-{{ $image->id }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                                        {{-- @if ($image->isNotEmpty()) --}}
                                                            <img src="{{ asset('storage/upload/product/' . $image->image_path) }}" alt="">
                                                        {{-- @else
                                                            <img src="/assets/img/default-product-thumbnail.png" alt="Default thumbnail">
                                                        @endif --}}
                                                    </button>
                                                @endforeach
                                            </div>
                                        </nav>                                        
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="product__details">
                                        <div class="product__details-price-box">
                                            <h5 class="product__details-price">&#8358;{{ number_format($product->price, 2) }}</h5>
                                            <!--<ul class="product__details-info-list">-->
                                            <!--    <li>Delicious non - dairy cheese sauce</li>-->
                                            <!--    <li>Vegan & Allergy friendly</li>-->
                                            <!--    <li>Smooth, velvety dairy free cheese sauce</li>-->
                                            <!--</ul>-->
                                        </div>
                                        <div class="product__details-cart">
                                            <form action="{{ route('cart.add') }}" method="post">
                                                <div class="product__details-quantity d-flex align-items-center mb-15">
                                                   @csrf
                                                   <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                   <input type="hidden" name="slug" value="{{ $product->slug }}">
                                                   <b>Qty:</b>
                                                   <div class="product__details-count mr-10 mb-10">
                                                       <span class="cart-minus"><i class="far fa-minus"></i></span>
                                                       <input class="tp-cart-input" type="text" name="quantity" class="" value="1">
                                                       <span class="cart-plus"><i class="far fa-plus"></i></span>
                                                   </div>
                                                   <div class="product__details-btn">
                                                       <button type="submit" class="tp-btn">add to cart</button>
                                                   </div>
                                                </div>
                                            </form>
                                            <ul class="product__details-check">
                                                <li>
                                                    <a href="{{ route('wishlist.add') }}"><i class="icon-heart icons" onclick="event.preventDefault(); document.getElementById('wish-{{ $product->id  }}').submit()" href="{{ route('wishlist.add') }}"></i> add to wishlist</a>         
                                                    <form action="{{ route('wishlist.add') }}" id="wish-{{ $product->id  }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__details-stock mb-25">
                                            <ul>
                                                <li>Availability: <i> {{ $product->availability }} Instock</i></li>
                                                <li>Categories: <span> {{ $product->category->title }} </span></li>
                                            </ul>
                                        </div>
                                        <div class="product__details-payment text-center">
                                            <img src="/assets/img/shape/payment-2.png" alt="">
                                            <span>Guarantee safe & Secure checkout</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tpdescription__box">
                        <div class="tpdescription__box-center d-flex align-items-center justify-content-center">
                            <nav>
                                <div class="nav nav-tabs" role="tablist">
                                    <button class="nav-link active" id="nav-description-tab" data-bs-toggle="tab" data-bs-target="#nav-description" type="button" role="tab" aria-controls="nav-description" aria-selected="true">Product Description</button>
                                    <!--<button class="nav-link" id="nav-info-tab" data-bs-toggle="tab" data-bs-target="#nav-information" type="button" role="tab" aria-controls="nav-information" aria-selected="false">ADDITIONAL INFORMATION</button>-->
                                    <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab" data-bs-target="#nav-review" type="button" role="tab" aria-controls="nav-review" aria-selected="false">Reviews ({{ count($reviews) }})</button>
                                </div>
                            </nav>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab" tabindex="0">
                                <div class="tpdescription__content">
                                     {!! $product->description !!}
                                </div>
                            </div>
                            <!--<div class="tab-pane fade" id="nav-information" role="tabpanel" aria-labelledby="nav-info-tab" tabindex="0">-->
                            <!--    <div class="tpdescription__content">-->
                            <!--        <p>Designed by Puik in 1949 as one of the first models created especially for Carl Hansen & Son, and produced since 1950. The last of a series of chairs wegner designed based on inspiration from antique chinese armchairs. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia eserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, aque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>-->
                            <!--    </div>-->
                            <!--    <div class="tpdescription__product-wrapper mt-30 mb-30 d-flex justify-content-between align-items-center">-->
                            <!--        <div class="tpdescription__product-info">-->
                            <!--            <h5 class="tpdescription__product-title">PRODUCT DETAILS</h5>-->
                            <!--            <ul class="tpdescription__product-info">-->
                            <!--                <li>Material: Plastic, Wood</li>-->
                            <!--                <li>Legs: Lacquered oak and black painted oak</li>-->
                            <!--                <li>Dimensions and Weight: Height: 80 cm, Weight: 5.3 kg</li>-->
                            <!--                <li>Length: 48cm</li>-->
                            <!--                <li>Depth: 52 cm</li>-->
                            <!--            </ul>-->
                            <!--            <p>Lemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut <br> fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem <br> sequi nesciunt.</p>-->
                            <!--        </div>-->
                            <!--        <div class="tpdescription__product-thumb">-->
                            <!--            <img src="assets/img/product/product-single-1.png" alt="">-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--    <div class="tpdescription__video">-->
                            <!--        <h5 class="tpdescription__product-title">PRODUCT DETAILS</h5>-->
                            <!--        <p>Form is an armless modern chair with a minimalistic expression. With a simple and contemporary design Form Chair has a soft and welcoming ilhouette and a distinctly residential look. The legs appear almost as if they are growing out of the shell. This gives the design flexibility and makes it possible to vary the frame. Unika is a mouth blown series of small, glass pendant lamps, originally designed for the Restaurant Gronbech. Est eum itaque maiores qui blanditiis architecto. Eligendi saepe rem ut. Cumque quia earum eligendi. </p>-->
                            <!--    </div>-->
                            <!--</div>-->




                            <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab" tabindex="0">
                                <div class="tpreview__wrapper">
                                    @foreach ($product->reviews as $review)
                                        <div class="tpreview__comment">
                                            <div class="tpreview__comment-img mr-20">
                                                <img src="/assets/img/testimonial/test-avata-1.png" alt="">
                                            </div>
                                            <div class="tpreview__comment-text">
                                                <div class="tpreview__comment-autor-info d-flex align-items-center justify-content-between">
                                                    <div class="tpreview__comment-author">
                                                        <span>{{ $review->user->name ?? 'Anonymous' }}</span>
                                                    </div>
                                                    <div class="tpreview__comment-star">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $review->rating)
                                                                <i class="icon-star_outline1" style="color: #ffc107;"></i> <!-- Filled Star -->
                                                            @else
                                                                <i class="icon-star_outline1" style="color: #ddd;"></i> <!-- Empty Star -->
                                                            @endif
                                                        @endfor
                                                    </div>
                                                </div>
                                                <span class="date mb-20">{{ $review->created_at->format('F j, Y') }}:</span>
                                                <p>{{ $review->review }}</p>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="tpreview__form">
                                        <h4 class="tpreview__form-title mb-25">Add a review </h4>
                                        <form action="{{ route('review.store') }}" method="POST"> 
                                            @csrf
                                            <div class="row">
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <div class="col-lg-12">
                                                    <div class="tpreview__star mb-20">
                                                        <h4 class="title">Your Rating</h4>
                                                        <div class="tpreview__star-icon">
                                                            <a href="#" data-value="1"><i class="icon-star_outline1"></i></a>
                                                            <a href="#" data-value="2"><i class="icon-star_outline1"></i></a>
                                                            <a href="#" data-value="3"><i class="icon-star_outline1"></i></a>
                                                            <a href="#" data-value="4"><i class="icon-star_outline1"></i></a>
                                                            <a href="#" data-value="5"><i class="icon-star_outline1"></i></a>
                                                        </div>
                                                        <input type="hidden" name="rating" id="rating" value="">
                                                    </div>                                                    
                                                    <div class="tpreview__input mb-30">
                                                        <textarea name="review" placeholder="Write your review here..."></textarea>
                                                        <div class="tpreview__submit mt-30">
                                                            <button type="submit" class="tp-btn">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-12">
                <div class="tpsidebar pb-30">
                    <div class="tpsidebar__banner mb-30">
                        <img src="assets/img/shape/sidebar-product-1.png" alt="">
                    </div>
                    <div class="tpsidebar__product">
                        <h4 class="tpsidebar__title mb-15">Recent Products</h4>
                        @foreach ($recent_products as $recent_product)
                        <div class="tpsidebar__product-item">
                            <div class="tpsidebar__product-thumb p-relative">
                                <img src="{{ asset('storage/upload/product/'.$recent_product->photos->first()->image_path) }}" alt="">
                                <div class="tpsidebar__info bage">
                                    <span class="tpproduct__info-hot bage__hot">{{ $recent_product->badge }}</span>
                                </div>
                            </div>
                            <div class="tpsidebar__product-content">
                                <span class="tpproduct__product-category">
                                    <a href="shop-details-3.html">{{ \Str::limit($recent_product->category->title, 50)  }}</a>
                                </span>
                                <h4 class="tpsidebar__product-title">
                                    <a href="shop-details-3.html">{{ \Str::limit($recent_product->title, 50)}}</a>
                                </h4>
                                <div class="tpproduct__rating mb-5">
                                    @foreach ($recent_product->reviews as $review)
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $review->rating)
                                                <i class="icon-star_outline1" style="color: #ffc107;"></i> <!-- Filled Star -->
                                            @else
                                                <i class="icon-star_outline1" style="color: #ddd;"></i> <!-- Empty Star -->
                                            @endif
                                        @endfor
                                    @endforeach
                                </div>
                                <div class="tpproduct__price">
                                    <span>&#8358;{{ number_format($recent_product->price, 2) }}</span>
                                    <del>&#8358;{{ number_format($recent_product->discount, 2)}}</del>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- shop-details-area-end -->

<!-- product-area-start -->
<section class="product-area whight-product pt-75 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="tpdescription__product-title mb-20">Related Products</h5>
            </div>
        </div>
        <div class="tpproduct__arrow double-product p-relative">
            <div class="swiper-container tpproduct-active tpslider-bottom p-relative">
                <div class="swiper-wrapper">
                    @forelse ($related_products as $related_product)
                    <div class="swiper-slide">
                        <div class="tpproduct p-relative mb-20">
                            <div class="tpproduct__thumb p-relative text-center">
                               <a href="{{ route('product.details', $related_product->slug) }}"><img src="{{ asset('storage/upload/product/'.$related_product->photos->first()->image_path) }}" alt=""></a>
                               <a class="tpproduct__thumb-img" href="{{ route('product.details', $related_product->slug)  }}"><img src="{{ asset('storage/upload/product/'.$related_product->photos->first()->image_path) }}" alt=""></a>
                               <div class="tpproduct__info bage">
                                  <span class="tpproduct__info-discount bage__discount">{{ App\Models\Product::calculateDiscount($related_product->price, $related_product->discount) }}%</span>
                                  <span class="tpproduct__info-hot bage__hot">{{ $related_product->badge }}</span>
                               </div>
                               <div class="tpproduct__shopping">
                                  <a class="tpproduct__shopping-wishlist" onclick="event.preventDefault(); document.getElementById('wish-{{ $related_product->id  }}').submit()" href="{{ route('wishlist.add') }}"><i class="icon-heart icons"></i></a>
                                  <form action="{{ route('wishlist.add') }}" id="wish-{{ $related_product->id  }}" method="post">
                                     @csrf
                                     <input type="hidden" name="product_id" value="{{ $related_product->id }}">
                                  </form>
                                  <a class="tpproduct__shopping-cart" href="{{ route('product.details', $related_product->slug)  }}"><i class="icon-eye"></i></a>
                               </div>
                            </div>
                            <div class="tpproduct__content">
                               <span class="tpproduct__content-weight">
                                  <a href="{{ route('product.details', $related_product->slug) }}) }}">{{ $related_product->category->name }}</a>
                               </span>
                               <h4 class="tpproduct__title">
                                  <a href="{{ route('product.details', $related_product->slug) }}) }}">{{ \Str::limit($related_product->title, 50) }}</a>
                               </h4>
                               <div class="tpproduct__rating mb-5">
                                @foreach ($related_product->reviews as $review)
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $review->rating)
                                            <i class="icon-star_outline1" style="color: #ffc107;"></i> <!-- Filled Star -->
                                        @else
                                            <i class="icon-star_outline1" style="color: #ddd;"></i> <!-- Empty Star -->
                                        @endif
                                    @endfor
                                @endforeach
                               </div>
                               <div class="tpproduct__price">
                                  <span>&#8358;{{ number_format($related_product->price, 2) }}</span>
                                  <del>&#8358;{{ number_format($related_product->discount, 2)}}</del>
                               </div>
                            </div>
                            <div class="tpproduct__hover-text">
                               <form action="{{ route('cart.add') }}" method="post">
                                  @csrf
                                  <input type="hidden" name="product_id" value="{{ $related_product->id }}">
                                  <input type="hidden" name="slug" value="{{ $related_product->slug }}">
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
                    @empty
                        
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product-area-end -->
@endsection
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const starIcons = document.querySelectorAll('.tpreview__star-icon a');
        const ratingInput = document.getElementById('rating');

        starIcons.forEach(star => {
            star.addEventListener('click', (e) => {
                e.preventDefault();

                const selectedValue = star.getAttribute('data-value');
                ratingInput.value = selectedValue;

                // Remove active class from all stars
                starIcons.forEach(s => s.querySelector('i').classList.remove('active'));

                // Add active class to all stars up to the clicked one
                starIcons.forEach((s, index) => {
                    if (index < selectedValue) {
                        s.querySelector('i').classList.add('active');
                    }
                });
            });
        });
    });
</script>
@endpush
