<div>
    <!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

    <!--header-->
    <header id="header" class="header header-style-1">
        <div class="container-fluid">
            <div class="row">
                <div class="topbar-menu-area">
                    <div class="container">
                        <div class="topbar-menu left-menu">
                            <ul>
                                <li class="menu-item">
                                    <a title="Hotline: (+123) 456 789" href="#"><span
                                            class="icon label-before fa fa-mobile"></span>{{ __('header.Mobile') }}:
                                        (+123) 456 789</a>
                                </li>
                            </ul>
                        </div>
                        <div class="topbar-menu right-menu">
                            <ul>
                                {{-- UnAuthenticated user --}}
                                @if (!Auth::check())
                                    <li class="menu-item"><a title="Login"
                                            href="{{ route('login') }}">{{ __('header.Login') }}</a>
                                    </li>
                                    <li class="menu-item"><a title="Login"
                                            href="{{ route('register') }}">{{ __('header.Register') }}</a></li>
                                @else
                                    <li class="menu-item lang-menu menu-item-has-children parent">
                                        <a title="English" href="#"><span
                                                class="img label-before"></span>{{ Auth::user()->name }}
                                            @if (Auth::user()->is_admin)(Admin)@endif<i class="fa fa-angle-down"
                                                aria-hidden="true"></i></a>
                                        <ul class="submenu lang">
                                            @if (Auth::user()->is_admin)
                                                <li class="menu-item">
                                                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                                </li>
                                                <li class="menu-item">
                                                    <!-- Authentication -->
                                                    <form method="POST" action="{{ route('logout') }}"
                                                        class="img label-before">
                                                        @csrf
                                                        <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                                            {{ __('Log Out') }}
                                                        </x-jet-dropdown-link>
                                                    </form>
                                                </li>
                                            @else
                                                <li class="menu-item">
                                                    <a
                                                        href="{{ route('user.orders') }}">{{ __('header.orders') }}</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a
                                                        href="{{ route('user.profile') }}">{{ __('header.profile') }}</a>
                                                </li>

                                                <li class="menu-item">
                                                    <!-- Authentication -->
                                                    <form method="POST" action="{{ route('logout') }}"
                                                        class="img label-before">
                                                        @csrf
                                                        <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                                            {{ __('header.Log Out') }}
                                                        </x-jet-dropdown-link>
                                                    </form>
                                                </li>
                                            @endif

                                        </ul>
                                    </li>

                                @endif
                                <li class="menu-item lang-menu menu-item-has-children parent">
                                    <a title="English" href="#"><span class="img label-before"><img
                                                src="{{ asset('assets/images/lang-en.png') }}"
                                                alt="lang-en"></span>English<i class="fa fa-angle-down"
                                            aria-hidden="true"></i></a>
                                    <ul class="submenu lang">
                                        <li class="menu-item"><a title="hungary" href="#"><span
                                                    class="img label-before"><img
                                                        src="{{ asset('assets/images/lang-hun.png') }}"
                                                        alt="lang-hun"></span>Arabic</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="mid-section main-info-area">

                        <div class="wrap-logo-top left-section">
                            <a href="/" class="link-to-home">
                                <h2>Mohammed Maniak</h2>
                            </a>
                        </div>

                        <div class="wrap-search center-section">
                            <div class="wrap-search-form">
                                <form action="#" id="form-search-top" name="form-search-top">
                                    <input type="text" name="search" value="" placeholder="Search here...">
                                    <button form="form-search-top" type="button"><i class="fa fa-search"
                                            aria-hidden="true"></i></button>
                                    <div class="wrap-list-cate">
                                        <input type="hidden" name="product-cate" value="0" id="product-cate">
                                        <a href="#" class="link-control">{{ __('header.AllCategory') }}</a>
                                        <ul class="list-cate">
                                            <li class="level-0">All Category</li>
                                            <li class="level-1">-Electronics</li>
                                            <li class="level-2">Batteries & Chargens</li>
                                            <li class="level-2">Headphone & Headsets</li>
                                            <li class="level-2">Mp3 Player & Acessories</li>
                                            <li class="level-1">-Smartphone & Table</li>
                                            <li class="level-2">Batteries & Chargens</li>
                                            <li class="level-2">Mp3 Player & Headphones</li>
                                            <li class="level-2">Table & Accessories</li>
                                            <li class="level-1">-Electronics</li>
                                            <li class="level-2">Batteries & Chargens</li>
                                            <li class="level-2">Headphone & Headsets</li>
                                            <li class="level-2">Mp3 Player & Acessories</li>
                                            <li class="level-1">-Smartphone & Table</li>
                                            <li class="level-2">Batteries & Chargens</li>
                                            <li class="level-2">Mp3 Player & Headphones</li>
                                            <li class="level-2">Table & Accessories</li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="wrap-icon right-section">
                            <div class="wrap-icon-section wishlist">
                                <a href="{{ route('wishlist') }}" class="link-direction">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                    <div class="left-info">
                                        <span class="index">{{ Cart::instance('wishlist')->count() }}
                                            item</span>
                                        <span class="title">{{ __('header.Wishlist') }}</span>
                                    </div>
                                </a>
                            </div>
                            <div class="wrap-icon-section minicart">
                                <a href="/cart" class="link-direction">
                                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                    <div class="left-info">
                                        <span class="index">
                                            {{ Cart::instance('cart')->count() }}
                                        </span>
                                        <span class="title">{{ __('header.CART') }}</span>
                                    </div>
                                </a>
                            </div>
                            <div class="wrap-icon-section show-up-after-1024">
                                <a href="#" class="mobile-navigation">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="nav-section header-sticky">
                    <div class="header-nav-section">
                        <div class="container">
                            <ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info">
                                <li class="menu-item"><a href="#" class="link-term">Weekly Featured</a><span
                                        class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="#" class="link-term">Hot Sale items</a><span
                                        class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="#" class="link-term">Top new items</a><span
                                        class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="#" class="link-term">Top Selling</a><span
                                        class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="#" class="link-term">Top rated items</a><span
                                        class="nav-label hot-label">hot</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="primary-nav-section">
                        <div class="container">
                            <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu">
                                <li class="menu-item home-icon">
                                    <a href="/" class="link-term mercado-item-title"><i class="fa fa-home"
                                            aria-hidden="true"></i></a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('about') }}"
                                        class="link-term mercado-item-title">{{ __('header.About Us') }}</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('shop') }}"
                                        class="link-term mercado-item-title">{{ __('header.Shop') }}</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('cart') }}"
                                        class="link-term mercado-item-title">{{ __('header.Cart') }}</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('checkout') }}"
                                        class="link-term mercado-item-title">{{ __('header.Checkout') }}</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('contact') }}" class="link-term mercado-item-title">
                                        {{ __('header.Contact Us') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
