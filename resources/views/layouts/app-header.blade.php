@php
   $carts = \App\Models\Cart::where('user_id', optional(Auth::user())->id)->get();
@endphp
<div class="app-header header sticky">
    <div class="container-fluid main-container">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid status_toggle middle sidebar-toggle">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
            </a>
            <!-- sidebar-toggle-->
            <a class="logo-horizontal" href="/">
                <img src="/assets/img/logo/logo.png" style="width:100px !important;" class="header-brand-img desktop-logo" alt="logo">
                <img src="/assets/img/logo/logo.png" style="width:100px !important;" class="header-brand-img light-logo1" alt="logo">
            </a>
            <!-- LOGO -->
            <div class="main-header-center ms-3 d-none d-lg-block">
                <input type="text" class="form-control" id="typehead" placeholder="Search for results...">
                <button class="btn px-0 pt-2"><i class="fe fe-search" aria-hidden="true"></i></button>
            </div>
            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                <!-- SEARCH -->
                <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                </button>
                <div class="navbar navbar-collapse responsive-navbar p-0">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <div class="d-flex order-lg-2">
                            <div class="d-flex">
                                <a class="nav-link icon theme-layout nav-link-bg layout-setting">
                                    <span class="dark-layout"><i class="ti ti-moon-stars"></i></span>
                                    <span class="light-layout"><i class="ti ti-sun"></i></span>
                                </a>
                            </div>
                            <!-- Theme-Layout -->
                            <div class="dropdown  d-flex shopping-cart">
                                <a class="nav-link icon text-center" data-bs-toggle="dropdown">
                                    <i class="ti ti-shopping-cart"></i><span class="badge bg-secondary header-badge">{{ count($carts) }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <div class="drop-heading border-bottom">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="mt-1 mb-0 fs-16 fw-semibold text-dark">My Cart</h6>
                                            <a class="btn btn-primary w-sm btn-sm py-2" href="{{ route('cart.index') }}"><i class="ti ti-shopping-cart"></i> View Cart</a>
                                        </div>
                                    </div>
                                    <div class="header-dropdown-list message-menu">
                                        @php
                                            $total = 0;
                                        @endphp
                                        @forelse($carts as $cart)
                                            @php
                                            $subtotal = $cart->product->price * $cart->quantity;
                                            $total += $subtotal;
                                            @endphp
                                            <div class="dropdown-item d-flex p-4">
                                                <a href="{{ route('cart.index') }}" class="open-file"></a>
                                                <span class="avatar avatar-xl br-5 me-3 align-self-center cover-image">
                                                    <img src="{{  asset('storage/upload/product/'.$cart->product->photos->first()->image_path) }}" alt="">
                                                </span>
                                                <div class="wd-50p">
                                                    <h5 class="mb-1">{{ \Str::limit($cart->product->title, 50) }}</h5>
                                                    <span>Status: <span class="text-success">In Stock</span></span>
                                                </div>
                                                <div class="ms-auto text-end d-flex fs-16">
                                                    <span class="fs-16 text-dark d-none d-sm-block px-4">
                                                        &#8358;{{ number_format($cart->product->price, 2) }}
                                                    </span>
                                                </div>
                                            </div>
                                        @empty
                                        <div class="dropdown-item d-flex p-4">
                                            <h5>No shopping cart item</h5>
                                        </div>
                                        @endforelse
                                    </div>
                                    <div class="dropdown-divider m-0"></div>
                                    <div class="dropdown-footer text-end">
                                        <span class="p-2 fs-17 fw-semibold">Total:  &#8358;{{ number_format($total, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- CART -->

                            
                                <a href="javascript:void(0)" data-bs-toggle="dropdown" class="nav-link user-dropdown">
                                    <img src="{{ asset('profile/'.$user->image) }}" alt="profile-user" class="profile-user avatar  cover-image">
                                    <div class="media-body d-lg-block d-none box-col-none ps-2">
                                        <p class="mb-0">{{ Auth::user()->name }}</p>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <div class="drop-heading">
                                        <div class="text-center">
                                            <h5 class="text-dark mb-0 fs-14 fw-semibold">{{ Auth::user()->name }}</h5>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider m-0"></div>
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        <i class="dropdown-icon fe fe-user"></i> Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="dropdown-icon fe fe-alert-circle"></i> Sign out
                                    </a>
                                    <form action="{{ route('logout') }}" id="logout-form" method="post" style="display: none">
                                        @csrf
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>