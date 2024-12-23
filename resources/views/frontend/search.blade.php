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
                        <span>Product Search</span>
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
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="tpshop__top ml-60">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active whight-product" id="nav-popular" role="tabpanel" aria-labelledby="nav-popular-tab">
                            <div class="row  tpproduct__shop-item">
                                @forelse ($products as $product)
                                <div class="col-12 col-lg-3 col-md-6 col-sm-6">
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
                                                <span>&#8358;{{ number_format($product->discount, 2) }}</span>
                                                <del>&#8358;{{ number_format($product->price, 2)}}</del>
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
                                @empty
                                   <div class="col-12 text-center">
                                        <h2>No products found.</h2>
                                   </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="basic-pagination text-center mt-35">
                        @if ($products->hasPages())
                        <nav >
                            <ul class="justify-content-end mb-0">
                                {{-- Previous Page Link --}}
                                @if ($products->onFirstPage())
                                <li class="page-item disabled">
                                    <span class=""><i class="fa fa-angle-left"></i></span>
                                </li>
                                @else
                                <li >
                                    <a class="" href="{{ $products->previousPageUrl() }}" rel="prev"><i class="fa fa-angle-left"></i></a>
                                </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                @if ($page == $products->currentPage())
                                <li class=" active">
                                    <span class="current">{{ $page }}</span>
                                </li>
                                @else
                                <li >
                                    <a  href="{{ $url }}">{{ $page }}</a>
                                </li>
                                @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($products->hasMorePages())
                                <li >
                                    <a class="" href="{{ $products->nextPageUrl() }}" rel="next"><i class="fa fa-angle-right"></i></a>
                                </li>
                                @else
                                <li class="page-item disabled">
                                    <span class=""><i class="fa fa-angle-right"></i></span>
                                </li>
                                @endif
                            </ul>
                        </nav>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- shop-area-end -->
@endsection
