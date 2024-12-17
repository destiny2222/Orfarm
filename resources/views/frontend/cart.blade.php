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
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area-end -->

<!-- cart area -->
<section class="cart-area pb-80">
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
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @forelse($carts as $cart)
                                @php
                                $subtotal = $cart->product->price * $cart->quantity;
                                $total += $subtotal;
                                @endphp
                                <tr data-id="{{$cart->id}}">
                                    <td class="product-thumbnail">
                                        {{-- @foreach ($cart->product->photos as $image) --}}
                                        <a href="javascript:void()">
                                            <img src="{{ asset('storage/upload/product/'.$cart->product->photos->first()->image_path) }}" alt="">
                                        </a>
                                        {{-- @endforeach --}}
                                    </td>
                                    <td class="product-name">
                                        <a href="javascript:void()">{{ $cart->product->title  }}</a>
                                    </td>
                                    <td class="product-price">
                                        <span class="amount">&#8358;{{ number_format($cart->product->price, 2) }}</span>
                                    </td>
                                    <td class="product-quantity">
                                        <span class="cart-minus remove-from-cart">-</span>
                                        <input class="cart-input" class=" quantity" type="text" value="{{ $cart->quantity }}">
                                        <span class="cart-plus update-cart">+</span>
                                    </td>
                                    <td class="product-subtotal">
                                        <span class="amount">&#8358;{{ number_format($subtotal, 2)}}</span>
                                    </td>
                                    <td class="product-remove">
                                        <a href="{{ route('cart.destroy', $cart->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $cart->id }}').submit();"><i class="fa fa-times"></i></a>
                                        <form action="{{ route('cart.destroy', $cart->id) }}"  method="post" id="delete-form-{{ $cart->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="6"><h2>Empty Cart</h2></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="coupon-all">
                            <div class="coupon2">
                                <a href="/product" class="tp-btn tp-color-btn banner-animation">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-md-5 ">
                        <div class="cart-page-total">
                            <h2>Cart totals</h2>
                            <ul class="mb-20">
                                <li>Total <span>${{ number_format($total) }}</span></li>
                            </ul>
                            <a href="{{ route('checkout') }}" class="tp-btn tp-color-btn banner-animation">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- cart area end-->
@endsection
@push('scripts')
<script type="text/javascript">
 $(document).ready(function() {
    // Function to show loading state
    function showLoading($input) {
        $input.addClass('loading');
        $input.prop('disabled', true);
    }

    // Function to hide loading state
    function hideLoading($input) {
        $input.removeClass('loading');
        $input.prop('disabled', false);
    }

    // Cart Minus Event Handler
    $('.cart-minus').on('click', function() {
        var $button = $(this);
        var $quantityContainer = $button.parent();
        var $input = $quantityContainer.find('input');
        var cartId = $button.closest('tr').data('id');
        var currentVal = parseInt($input.val());

        // Prevent decrease if quantity is already 1
        if (currentVal <= 1) {
            toastr.warning('Minimum quantity is 1', 'Warning');
            return;
        }

        // Show loading state
        showLoading($input);

        $.ajax({
            url: '{{ route('cart.update') }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: cartId,
                action: 'decrease'
            },
            success: function(response) {
                // Hide loading state
                hideLoading($input);

                if (response.success) {
                    // Update input value
                    $input.val(response.quantity);
                    
                    // Show success toast
                    toastr.success(response.message, 'Success');

                    // Reload page or update totals
                    location.reload();
                } else {
                    // Show error toast
                    toastr.error(response.message, 'Error');
                }
            },
            error: function(xhr) {
                // Hide loading state
                hideLoading($input);

                // Parse error message
                var errorMessage = 'An unexpected error occurred';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }

                // Show error toast
                toastr.error(errorMessage, 'Error');

                // Log error for debugging
                console.error('Cart Decrease Error:', xhr.responseText);
            }
        });
    });

    // Cart Plus Event Handler
    $('.cart-plus').on('click', function() {
        var $button = $(this);
        var $quantityContainer = $button.parent();
        var $input = $quantityContainer.find('input');
        var cartId = $button.closest('tr').data('id');

        // Show loading state
        showLoading($input);

        $.ajax({
            url: '{{ route('cart.update') }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: cartId,
                action: 'increase'
            },
            success: function(response) {
                // Hide loading state
                hideLoading($input);

                if (response.success) {
                    // Update input value
                    $input.val(response.quantity);
                    
                    // Show success toast
                    toastr.success(response.message, 'Success');

                    // Reload page or update totals
                    location.reload();
                } else {
                    // Show error toast
                    toastr.error(response.message, 'Error');
                }
            },
            error: function(xhr) {
                // Hide loading state
                hideLoading($input);

                // Parse error message
                var errorMessage = 'An unexpected error occurred';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }

                // Show error toast
                toastr.error(errorMessage, 'Error');

                // Log error for debugging
                console.error('Cart Increase Error:', xhr.responseText);
            }
        });
    });
});
</script>
@endpush