@php
   $carts = \App\Models\Cart::where('user_id', optional(Auth::user())->id)->get();
   $wishlist = \App\Models\Wishlist::where('user_id', optional(Auth::user())->id)->get();
   $categories = \App\Models\Category::orderBy('id', 'DESC')->get();
@endphp

<header>
    <div class="header__top theme-bg-1 d-none d-md-block">
       <div class="container">
          <div class="row align-items-center">
             <div class="col-lg-6 col-md-12">
                <div class="header__top-left">
                     <span>Enjoy free shipping on orders over $50! Shop now and save big.</span>
                </div>
             </div>
             <div class="col-lg-6 col-md-12">
                <div class="header__top-right d-flex align-items-center">
                   <div class="header__top-link">
                      <a href="/faq">FAQ</a>
                      <a href="/contact">Contact</a>
                      <a href="/about">About</a>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="header__main-area d-none d-xl-block">
       <div class="container">
          <div class="header__for-megamenu p-relative">
             <div class="row align-items-center">
                <div class="col-xl-3">
                   <div class="header__logo">
                      <a href="/"><img src="/assets/img/logo/logo.png" width="100" alt="logo"></a>
                   </div>
                </div>
                <div class="col-xl-6">
                   <div class="header__menu main-menu text-center">
                      <nav id="mobile-menu">
                         <ul>
                            <li class="">
                              <a href="/">Home</a>
                            </li>
                            <li><a href="/about">About Us</a></li>
                            <li class="">
                              <a href="/product">Product</a>
                            </li>
                            <li class="">
                              <a href="/blog">Blog</a>
                            </li>
                            <li><a href="/contact">Contact Us</a></li>
                         </ul>
                      </nav>
                   </div>
                </div>
                <div class="col-xl-3">
                   <div class="header__info d-flex align-items-center">
                      <div class="header__info-search tpcolor__purple ml-10">
                         <button class="tp-search-toggle"><i class="icon-search"></i></button>
                      </div>
                      <div class="header__info-user tpcolor__yellow ml-10">
                        @guest
                           <a href="/login"><i class="icon-user"></i></a>
                        @else
                           <a href="{{ route('home') }}"><i class="icon-user"></i></a>
                        @endguest
                      </div>
                      <div class="header__info-cart tpcolor__greenish ml-10">
                        <a href="{{ route('wishlist.index') }}">
                           <button>
                              <i class="icon-heart icons"></i>
                              <span>{{ count($wishlist) }}</span>
                           </button>
                        </a>
                      </div>
                      <div class="header__info-cart tpcolor__oasis ml-10 tp-cart-toggle">
                         <button><i><img src="/assets/img/icon/cart-1.svg" alt=""></i>
                            <span>{{ count($carts) }}</span>
                         </button>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>

    <!-- header-search -->
    <div class="tpsearchbar tp-sidebar-area">
       <button class="tpsearchbar__close"><i class="icon-x"></i></button>
       <div class="search-wrap text-center">
           <div class="container">
               <div class="row justify-content-center">
                   <div class="col-6 pt-100 pb-100">
                       <h2 class="tpsearchbar__title">What Are You Looking For?</h2>
                       <div class="tpsearchbar__form">
                           <form action="{{ route('search') }}" method="get">
                              <input type="text" name="search" placeholder="Search Product...">
                              <button type="submit" class="tpsearchbar__search-btn"><i class="icon-search"></i></button>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
    </div>
    <div class="search-body-overlay"></div>
    <!-- header-search-end -->

    <!-- header-cart-start -->
    <div class="tpcartinfo tp-cart-info-area p-relative">
    <button class="tpcart__close"><i class="icon-x"></i></button>
       <div class="tpcart">
          <h4 class="tpcart__title">Your Cart</h4>
          <div class="tpcart__product">
             <div class="tpcart__product-list">
                <ul>
                  @php
                     $total = 0;
                  @endphp
                  @forelse ($carts as $cartItem)
                  @php
                     $subtotal = $cartItem->product->price * $cartItem->quantity;
                     $total += $subtotal;
                  @endphp
                  <li>
                     <div class="tpcart__item">
                        <div class="tpcart__img">
                           <img src="{{ asset('storage/upload/product/'.$cartItem->product->photos->first()->image_path) }}" alt="">
                           <div class="tpcart__del">
                              <a href="{{ route('cart.destroy',$cartItem->id) }}" onclick="event.preventDefault(); document.getElementById('delete-{{ $cartItem->id  }}').submit()" ><i class="icon-x-circle"></i></a>
                           </div>
                           <form action="{{ route('cart.destroy',$cartItem->id ) }}" id="delete-{{ $cartItem->id  }}" method="POST">
                              @csrf
                              @method('DELETE')
                           </form>
                        </div>
                        <div class="tpcart__content">
                           <span class="tpcart__content-title"><a href="{{ route('product.details', $cartItem->product->slug) }}">{{ \Str::limit($cartItem->product->title, 50) }}</a></span>
                           </span>
                           <div class="tpcart__cart-price">
                              <span class="quantity">{{ $cartItem->quantity }} x</span>
                              <span class="new-price">&#8358;{{ number_format($cartItem->product->price, 2) }}</span>
                           </div>
                        </div>
                     </div>
                  </li>
                  @empty
                     <li>
                        <div class="tpcart__item">
                           <div class="tpcart__content">
                              <span class="tpcart__content-title">No Items</span>
                           </div>
                        </div>
                     </li>
                  @endforelse
                </ul>
             </div>
             <div class="tpcart__checkout">
                <div class="tpcart__total-price d-flex justify-content-between align-items-center">
                   <span> Total:</span>
                   <span class="heilight-price">&#8358;{{ number_format($total, 2) }}</span>
                </div>
                <div class="tpcart__checkout-btn">
                   <a class="tpcart-btn mb-10" href="{{ route('cart.index') }}">View Cart</a>
                   <a class="tpcheck-btn" href="{{ route('checkout') }}">Checkout</a>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="cartbody-overlay"></div>
    <!-- header-cart-end -->

    <!-- mobile-menu-area -->
    <div id="header-sticky-2" class="tpmobile-menu d-xl-none">
       <div class="container-fluid">
          <div class="row align-items-center">
             <div class="col-lg-4 col-md-4 col-3 col-sm-3">
                <div class="mobile-menu-icon">
                   <button class="tp-menu-toggle"><i class="icon-menu1"></i></button>
                </div>
             </div>
             <div class="col-lg-4 col-md-4 col-6 col-sm-4">
                <div class="header__logo text-center">
                   <a href="/"><img src="/assets/img/logo/logo.png" width="100" alt="logo"></a>
                </div>
             </div>
             <div class="col-lg-4 col-md-4 col-3 col-sm-5">
                <div class="header__info d-flex align-items-center">
                   <div class="header__info-search tpcolor__purple ml-10 d-none d-sm-block">
                      <button class="tp-search-toggle"><i class="icon-search"></i></button>
                   </div>
                   <div class="header__info-user tpcolor__yellow ml-10 d-none d-sm-block">
                     @guest
                        <a href="/login"><i class="icon-user"></i></a>
                     @else
                        <a href="{{ route('home') }}"><i class="icon-user"></i></a>
                     @endguest
                   </div>
                   <div class="header__info-cart tpcolor__greenish ml-10 d-none d-sm-block">
                     <a href="{{ route('wishlist.index') }}">
                        <button>
                           <i class="icon-heart icons"></i>
                           <span>{{ count($wishlist) }}</span>
                        </button>
                     </a>
                   </div>
                   <div class="header__info-cart tpcolor__oasis ml-10 tp-cart-toggle ">
                      <button><i><img src="/assets/img/icon/cart-1.svg" alt=""></i>
                         <span>{{ count($carts) }}</span>
                      </button>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="body-overlay"></div>
    <!-- mobile-menu-area-end -->

    <!-- sidebar-menu-area -->
    <div class="tpsideinfo">
       <button class="tpsideinfo__close">Close<i class="fal fa-times ml-10"></i></button>
       <div class="tpsideinfo__search text-center pt-35">
          <span class="tpsideinfo__search-title mb-20">What Are You Looking For?</span>
          <form action="{{ route('search') }}" method="get">
             <input type="text" name="search" placeholder="Search Products...">
             <button type="submit"><i class="icon-search"></i></button>
          </form>
       </div>
       <div class="tpsideinfo__nabtab">
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
             <li class="nav-item" role="presentation">
               <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Menu</button>
             </li>
             <li class="nav-item" role="presentation">
               <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Categories</button>
             </li>
           </ul>
           <div class="tab-content" id="pills-tabContent">
             <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                <div class="mobile-menu"></div>
             </div>
             <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                <div class="tpsidebar-categories">
                  <ul>
                     @foreach ($categories as $category)
                      <li><a href="#">{{ $category->title }}</a></li>
                     @endforeach
                  </ul>
                </div>
             </div>
           </div>
       </div>
       <div class="tpsideinfo__account-link">							
         @guest
           <a href="/login"><i class="icon-user icons"></i> Login / Register</a>
         @else
           <a href="{{ route('home') }}"><i class="icon-user icons"></i> Dashboard</a>
         @endguest
       </div>
       <div class="tpsideinfo__wishlist-link">
          <a href="{{ route('wishlist.index') }}" target="_parent"><i class="icon-heart"></i> Wishlist</a>
       </div>
    </div> 
    <!-- sidebar-menu-area-end -->
 </header>