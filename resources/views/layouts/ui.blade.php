<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="horizontal" data-nav-style="menu-click" data-menu-position="fixed" data-theme-mode="light">
    <head>
        <!-- Meta Data -->
		<meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="Description" content="Laravel Bootstrap Responsive Admin Web Dashboard Template">
        <meta name="Author" content="Gaston delimond Dev?">
        <meta name="keywords" content="Formulaire des personnes">

        <!-- TITLE -->
		<title> Formulaire des recensement des personnes</title>

        <!-- FAVICON -->
        <link rel="icon" href="{{ asset('assets2/images/flag.png') }}" type="image/x-icon">

        <!-- BOOTSTRAP CSS -->
        <link id="style" href="{{ asset('assets2/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- ICONS CSS -->
        <link href="{{ asset('assets2/icon-fonts/icons.css') }}" rel="stylesheet">

        <!-- APP SCSS -->
        <link rel="preload" as="style" href="{{ asset('assets2/app.css') }}" /><link rel="stylesheet" href="{{ asset('assets2/app.css') }}" />

        <!-- NODE WAVES CSS -->
        <link href="{{ asset('assets2/libs/node-waves/waves.min.css') }}" rel="stylesheet">

        <!-- COLOR PICKER CSS -->
        <link rel="stylesheet" href="{{ asset('assets2/libs/flatpickr/flatpickr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets2/libs/@simonwep/pickr/themes/nano.min.css') }}">

        <!-- CHOICES CSS -->
        <link rel="stylesheet" href="{{ asset('assets2/libs/choices.js/public/assets/styles/choices.min.css') }}">

        <!-- SWIPERJS CSS -->
        <link rel="stylesheet" href="{{ asset('assets2/libs/swiper/swiper-bundle.min.css') }}">
        @yield('styles')
	</head>
    <body class="landing-body jobs-landing ">
        <!-- PAGE -->
		<div class="landing-page-wrapper section-bg">
            <!-- HEADER -->
            <header class="app-header">
                <!-- Start::main-header-container -->
                <div class="main-header-container container-fluid">

                    <!-- Start::header-content-left -->
                    <div class="header-content-left">

                        <!-- Start::header-element -->
                        <div class="header-element">
                            <div class="horizontal-logo">
                                <a href="index-2.html" class="header-logo">
                                    <img src="assets2/images/brand-logos/toggle-logo.png" alt="logo" class="toggle-logo">
                                    <img src="assets2/images/brand-logos/toggle-dark.png" alt="logo" class="toggle-dark">
                                </a>
                            </div>
                        </div>
                        <!-- End::header-element -->

                        <!-- Start::header-element -->
                        <div class="header-element">
                            <!-- Start::header-link -->
                            <a href="javascript:void(0);" class="sidemenu-toggle header-link" data-bs-toggle="sidebar">
                                <span class="open-toggle">
                                    <i class="ri-menu-3-line fs-20"></i>
                                </span>
                            </a>
                            <!-- End::header-link -->
                        </div>
                        <!-- End::header-element -->

                    </div>
                    <!-- End::header-content-left -->

                    <!-- Start::header-content-right -->
                    <div class="header-content-right">

                        <!-- Start::header-element -->
                        <div class="header-element align-items-center">
                            <!-- Start::header-link|switcher-icon -->
                            <div class="btn-list d-lg-none d-block">
                                <a href="signup-basic.html" class="btn btn-primary-light">
                                    Sign Up
                                </a>
                                <button class="btn btn-icon btn-success switcher-icon" data-bs-toggle="offcanvas" data-bs-target="#switcher-canvas">
                                    <i class="ri-settings-3-line"></i>
                                </button>
                            </div>
                            <!-- End::header-link|switcher-icon -->
                        </div>
                        <!-- End::header-element -->

                    </div>
                    <!-- End::header-content-right -->

                </div>
                <!-- End::main-header-container -->
            </header>
            <!-- END HEADER -->

            <!-- SIDEBAR -->
            <aside class="app-sidebar sticky sticky-pin" id="sidebar">
                <div class="container-xl">
                    <!-- Start::main-sidebar -->
                    <div class="main-sidebar">
                        <!-- Start::nav -->
                        <nav class="main-menu-container nav nav-pills sub-open">
                            <div class="landing-logo-container">
                                <div class="horizontal-logo">
                                    <a href="index-2.html" class="header-logo">
                                        <img src="assets2/images/flag.png" alt="logo" class="desktop-logo rounded">
                                        <img src="assets2/images/flag.png" alt="logo" class="desktop-white rounded">
                                    </a>
                                </div>
                            </div>
                            <div class="slide-left" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg></div>
                            <ul class="main-menu">
                                <!-- Start::slide -->
                                <li class="slide active">
                                    <a class="side-menu__item" href="#home">
                                        <span class="side-menu__label"></span>
                                    </a>
                                </li>
                                <!-- End::slide -->
                                <!-- Start::slide -->
                                <li class="slide">
                                    <a href="#jobs" class="side-menu__item">
                                        <span class="side-menu__label">Motos</span>
                                    </a>
                                </li>
                                <!-- End::slide -->
                                <!-- Start::slide -->
                                <li class="slide">
                                    <a href="#candidate" class="side-menu__item">
                                        <span class="side-menu__label">Vehicules</span>
                                    </a>
                                </li>
                                <!-- End::slide -->
                                <li class="slide">
                                    <a href="#candidate" class="side-menu__item">
                                        <span class="side-menu__label">Marchés</span>
                                    </a>
                                </li>
                                <!-- End::slide -->
                                <!-- End::slide -->
                                <li class="slide">
                                    <a href="#candidate" class="side-menu__item">
                                        <span class="side-menu__label">Parcelles</span>
                                    </a>
                                </li>
                                <!-- End::slide -->
                            </ul>
                            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
                            <div class="d-lg-flex d-none">
                                <div class="btn-list d-lg-flex d-none mt-lg-2 mt-xl-0 mt-0">
                                    <a href="#" class="btn btn-wave btn-primary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </nav>
                        <!-- End::nav -->

                    </div>
                    <!-- End::main-sidebar -->
                </div>

            </aside>
            <!-- END SIDEBAR -->

            <!-- MAIN-CONTENT -->
            <div class="main-content landing-main section-bg">
                <div class="container-fluid mt-5 section">
                    @yield('content')
                </div>
            </div>
            <!-- END MAIN-CONTENT -->
		</div>
        <!-- END PAGE-->

        <!-- SCROLL-TO-TOP -->
        <div class="scrollToTop">
                <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
        </div>
        <div id="responsive-overlay"></div>
        <!-- POPPER JS -->
        <script src="{{ asset('assets2/libs/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('assets2/libs/@popperjs/core/umd/popper.min.js') }}"></script>


        <!-- BOOTSTRAP JS -->
        <script src="{{ asset('assets2/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- COLOR PICKER JS -->
        <script src="{{ asset('assets2/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>

        <!-- CHOICES JS -->
        <script src="{{ asset('assets2/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

        <!-- NODE WAVES JS -->
        <script src="{{ asset('assets2/libs/node-waves/waves.min.js') }}"></script>

        <!-- DEFAULTMENU JS -->
        <link href="{{ asset('assets2/defaultmenu.js') }}" /><script type="module" src="{{ asset('assets2/defaultmenu.js') }}"></script>

        <!-- SWIPER JS -->
        <script src="{{ asset('assets2/libs/swiper/swiper-bundle.min.js') }}"></script>

        @yield('scripts')
	</body>
</html>
