<!-- Header -->
<header class="{{ ( request()->segment(1) != 'home') ? "header-v4" : "" }}">
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    <a class="text-white" target="_blank" href="http://api.whatsapp.com/send?phone={{site('contact.whatsapp')}}"><i class="fa fa-whatsapp"></i> Whatsapp : {{ site('contact.whatsapp') }}</a>
                </div>

                <div class="right-top-bar flex-w h-full">
                    <a href="{{ site('socmed.instagram') }}" target="_blank" class="flex-c-m trans-04 p-lr-25">
                        <i class="fa fa-instagram"></i>
                    </a>
                    <a href="{{ site('socmed.facebook') }}" target="_blank" class="flex-c-m trans-04 p-lr-25">
                        <i class="fa fa-facebook"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="{{ url('') }}" class="logo">
                    <img src="{{ asset('images/'.site('site.logo')) }}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class=" {{ (request()->routeIs('home')) ? 'active-menu' : '' }} ">
                            <a href="{{ url('') }}">Beranda</a>
                        </li>

                        <li class="{{ (request()->routeIs('shop')) ? 'active-menu' : '' }} label1" data-label1="Hot">
                            <a href="{{ route('shop') }}">Shop</a>
                        </li>
                        <li class="{{ (request()->routeIs('about')) ? 'active-menu' : '' }}">
                            <a href="{{ route('about') }}">Tentang</a>
                        </li>

                        <li class="{{ (request()->routeIs('contact')) ? 'active-menu' : '' }}">
                            <a href="{{ route('contact') }}">Kontak</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart cart_desktop" data-notify="2">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="{{ url('') }}">
                <img src="{{ asset('images/'.site('site.logo')) }}" alt="IMG-LOGO">
            </a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>

            {{-- <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
                <i class="zmdi zmdi-favorite-outline"></i>
            </a> --}}
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                    <a target="_blank" class="text-white" href="http://api.whatsapp.com/send?phone={{ site('contact.whatsapp') }}"><i class="fa fa-whatsapp"></i> {{ site('contact.whatsapp') }}</a>
                    &nbsp;|&nbsp;
                    <a target="_blank" class="text-white" href="{{ site('socmed.instagram') }}"><i class="fa fa-instagram"></i> {{ explode('/',site('socmed.instagram'))[3] }}</a>
                </div>
            </li>
        </ul>

        <ul class="main-menu-m">
            <li>
                <a href="{{ route('home') }}">Beranda</a>
            </li>

            <li>
                <a href="{{ route('shop') }}">Shop</a>
            </li>

            <li>
                <a href="{{ route('about') }}">Tentang</a>
            </li>

            <li>
                <a href="{{ route('contact') }}">Kontak</a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="{{ asset('themes/store/images') }}/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
</header>
