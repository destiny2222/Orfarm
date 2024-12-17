<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="/">
                <img src="" class="header-brand-img desktop-logo" alt="logo">
                <img src="" class="header-brand-img toggle-logo" alt="logo">
                <img src="" class="header-brand-img light-logo" alt="logo">
                <img src="" class="header-brand-img light-logo1" alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>
                <li class="slide">
                    <a class="sidenav-menu-item {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="side-menu__icon  ti ti-layout-navbar"></i>
                        <span class="side-menu__label">My Dashboard</span>
                    </a>
                </li>
                <li class="sub-category">
                    <h3>Apps & Pages</h3>
                </li>
                <li class="slide">
                    <a class="sidenav-menu-item {{ request()->routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}">
                        <i class="side-menu__icon  ti ti-users"></i>
                        <span class="side-menu__label">Profile</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="sidenav-menu-item {{ request()->routeIs('orders.index') ? 'active' : '' }}" href="{{ route('orders.index') }}">
                        <i class="side-menu__icon  ti ti-shopping-cart"></i>
                        <span class="side-menu__label">Order History</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="sidenav-menu-item {{ request()->routeIs('shop') ? 'active' : '' }}" href="{{ route('shop') }}">
                        <i class="side-menu__icon  ti ti-shopping-cart"></i>
                        <span class="side-menu__label">Shop</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="sidenav-menu-item {{ request()->routeIs('wishlist.index') ? 'active' : '' }}" href="{{ route('wishlist.index') }}">
                        <i class="side-menu__icon  ti ti-heart"></i>
                        <span class="side-menu__label">Wishlist</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="sidenav-menu-item" href="private-chat.html">
                        <i class="side-menu__icon  ti ti-trash"></i>
                        <span class="side-menu__label">Delete Account</span>
                    </a>
                </li>
                <li class="slide">
                   <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="sidenav-menu-item" href="{{ route('logout') }}" >
                        <i class="side-menu__icon  ti ti-power" style="color: red !important;"></i>
                        <span class="side-menu__label">Logout</span>
                    </a>
                </li>
                <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">
                    @csrf
                </form>
            </ul>
            
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg>
            </div>
        </div>
    </div>
</div>