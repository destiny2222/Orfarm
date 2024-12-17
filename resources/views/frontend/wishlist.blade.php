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
                        <span>Wishlist</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area-end -->

<!-- wishlist-area-start -->
<div class="cart-area pb-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-content table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Images</th>
                                <th class="cart-product-name">Courses</th>
                                <th class="product-price">Unit Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-add-to-cart">Add To Cart</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($wishlists as $wishlist)
                            @php
                            $userCart = $wishlist->product->carts->where('user_id', auth()->id())->first();
                            $subtotal = $userCart ? $wishlist->product->price * $userCart->quantity : 0;
                            @endphp
                            <tr>
                                <td class="product-thumbnail">
                                    <a href="{{ route('product.details', $wishlist->product->slug) }}">
                                        <img src="{{ asset('storage/upload/product/'.$wishlist->product->photos->first()->image_path ?? 'default-image.jpg') }}" alt="">
                                    </a>
                                </td>
                                <td class="product-name">
                                    <a href="{{ route('product.details', $wishlist->product->slug) }}">{{ \Str::limit($wishlist->product->title, 50) }}</a>
                                </td>
                                <td class="product-price">
                                    <span class="amount">&#8358;{{ number_format($wishlist->product->price, 2) }}</span>
                                </td>
                                <form action="{{ route('wishlist.add.cart') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $wishlist->product->id }}">
                                    <input type="hidden" name="slug" value="{{ $wishlist->product->slug }}">
                                    <td class="product-quantity">
                                        <span class="cart-minus">-</span>
                                        <input class="cart-input" name="quantity" type="text" value="1">
                                        <span class="cart-plus">+</span>
                                    </td>
                                    <td class="product-add-to-cart">
                                        <button type="submit" class="tp-btn tp-color-btn tp-wish-cart banner-animation">Add To Cart</button>
                                    </td>
                                </form>
                                <td class="product-remove">
                                    <a href="{{ route('wishlist.remove', $wishlist->id ) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $wishlist->id }}').submit();"><i class="fa fa-times"></i></a>
                                </td>
                                <form action="{{ route('wishlist.remove', $wishlist->id ) }}" id="delete-form-{{ $wishlist->id  }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">No items in wishlist</td>
                            </tr>
                            @endforelse


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- wishlist-area-end-->
@endsection
@push('scripts')

@endpush
