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
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area-end -->



<!-- checkout-area start -->
<section class="checkout-area pb-50">
    <div class="container">
        <form action="{{ route('checkout.placeOrder') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="checkbox-form">
                       <!-- <div class="different-address">
                            <div class="ship-different-title">
                                <h3>
                                    <label>Customer Address?</label>
                                    <input id="ship-box" type="checkbox">
                                </h3>
                            </div>
                            <div id="ship-box-info">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Full Name <span class="required">*</span></label>
                                            <input type="text" name="full_name" value="" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Email Address <span class="required">*</span></label>
                                            <input type="email" name="email" value="" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Address <span class="required">*</span></label>
                                            <input type="text" name="address" value="" placeholder="Street address">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Town / City <span class="required">*</span></label>
                                            <input type="text" name="city" value="" placeholder="Town / City">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>State  <span class="required">*</span></label>
                                            <input type="text" name="state" value="" placeholder="State">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Phone <span class="required">*</span></label>
                                            <input type="text" name="phone" value="" placeholder="Phone">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <h3>Delivery Details?</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>First Name <span class="required">*</span></label>
                                    <input type="text" name="shipping_first_name" class="@error('shipping_first_name') is-invalid @enderror" required placeholder="">
                                </div>
                                @error('shipping_first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Last Name <span class="required">*</span></label>
                                    <input type="text" name="shipping_last_name" class="@error('shipping_last_name') is-invalid @enderror" required placeholder="">
                                </div>
                                @error('shipping_last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="country-select">
                                    <label>Country <span class="required">*</span></label>
                                    <select name="shipping_country" class="@error('shipping_country') is-invalid @enderror" required>
                                        <option value="nigeria">Nigeria</option>
                                    </select>
                                </div>
                                @error('shipping_country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Address <span class="required">*</span></label>
                                    <input type="text" name="shipping_address" class="@error('shipping_address') is-invalid @enderror" required placeholder="Street address">
                                </div>
                                @error('shipping_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Town / City <span class="required">*</span></label>
                                    <input type="text" name="shipping_city" class="@error('shipping_city') is-invalid @enderror" required placeholder="Town / City">
                                </div>
                                @error('shipping_city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>State / County <span class="required">*</span></label>
                                    <input type="text" name="shipping_state" class="@error('shipping_state') is-invalid @enderror" required placeholder="">
                                </div>
                                @error('shipping_state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Postcode / Zip <span class="required">*</span></label>
                                    <input type="text" name="shipping_postal_code" class="@error('shipping_postal_code') is-invalid @enderror" required placeholder="Postcode / Zip">
                                </div>
                                @error('shipping_postal_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Email Address <span class="required">*</span></label>
                                    <input type="email" name="shipping_email" class="@error('shipping_email') is-invalid @enderror" required placeholder="">
                                </div>
                                @error('shipping_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Phone <span class="required">*</span></label>
                                    <input type="text" name="shipping_phone" class="@error('shipping_phone') is-invalid @enderror" required placeholder="Postcode / Zip">
                                </div>
                                @error('shipping_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="your-order mb-30 ">
                        <h3>Your order</h3>
                        <div class="your-order-table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-name">Product</th>
                                        <th class="product-total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $cart)
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            {{ \Str::limit($cart->product->title, 30) }} <strong class="product-quantity"> × {{ $cart->quantity }}</strong>
                                        </td>
                                        <td class="product-total">
                                            <span class="amount">&#8358;{{ $cart->product->price * $cart->quantity}}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    @if($shipping)
                                    <tr class="shipping">
                                        <th>{{ $shipping->title }} Shipping </th>
                                        <td>
                                            &#8358;{{ number_format($shipping->price, 2) }}
                                        </td>
                                    </tr>
                                    @endif
                                    <tr class="order-total">
                                        <th>Order Total</th>
                                        <td><strong><span class="amount">&#8358;{{ $total  }}</span></strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <!-- <div class="accordion" id="checkoutAccordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="checkoutOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#bankOne" aria-expanded="true" aria-controls="bankOne">
                                            Direct Bank Transfer
                                        </button>
                                    </h2>
                                    <div id="bankOne" class="accordion-collapse collapse show" aria-labelledby="checkoutOne" data-bs-parent="#checkoutAccordion">
                                        <div class="accordion-body">
                                            Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="paymentTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#payment" aria-expanded="false" aria-controls="payment">
                                            Cheque Payment
                                        </button>
                                    </h2>
                                    <div id="payment" class="accordion-collapse collapse" aria-labelledby="paymentTwo" data-bs-parent="#checkoutAccordion">
                                        <div class="accordion-body">
                                            Please send your cheque to Store Name, Store Street, Store Town, Store
                                            State / County, Store
                                            Postcode.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="paypalThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#paypal" aria-expanded="false" aria-controls="paypal">
                                            PayPal
                                        </button>
                                    </h2>
                                    <div id="paypal" class="accordion-collapse collapse" aria-labelledby="paypalThree" data-bs-parent="#checkoutAccordion">
                                        <div class="accordion-body">
                                            Pay via PayPal; you can pay with your credit card if you don’t have a
                                            PayPal account.
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="order-button-payment mt-20">
                                <button type="submit" class="tp-btn tp-color-btn w-100 banner-animation">Place order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- checkout-area end -->
@endsection
