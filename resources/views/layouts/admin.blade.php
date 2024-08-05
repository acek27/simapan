<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="SIMAPAN -  Sistem Informasi Manajemen Penanggulangan Kemiskinan Kabupaten Situbondo">
    <meta name="author" content="Dinas KOMINFO Kabupaten Situbondo">
    <meta name="keywords" content="simapan, penanggulangan kemiskinan, akp, sibesti, stunting">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" href="{{asset('assets/img/brand/favicon.ico')}}" type="image/x-icon"/>

    <!-- Title -->
    @yield('title')

    <!-- Bootstrap css-->
    <link  id="style" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"/>

    <!-- Icons css-->
    <link href="{{asset('assets/plugins/web-fonts/icons.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/plugins/web-fonts/font-awesome/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/web-fonts/plugin.css')}}" rel="stylesheet"/>

    <!-- Style css-->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <!-- Select2 css -->
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@stack('css')
</head>

<body class="ltr main-body leftmenu">

<!-- Loader -->
<div id="global-loader">
    <img src="{{asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
</div>
<!-- End Loader -->

<!-- Page -->
<div class="page">

    <!-- Main Header-->
    <div class="main-header side-header sticky">
        <div class="main-container container-fluid">
            <div class="main-header-left">
                <a class="main-header-menu-icon" href="javascript:void(0)" id="mainSidebarToggle"><span></span></a>
                <div class="hor-logo">
                    <a class="main-logo" href="index.html">
                        <img src="{{asset('assets/img/brand/logo.png')}}" class="header-brand-img desktop-logo" alt="logo">
                        <img src="{{asset('assets/img/brand/logo-light.png')}}" class="header-brand-img desktop-logo-dark"
                             alt="logo">
                    </a>
                </div>
            </div>
            <div class="main-header-center">
                <div class="responsive-logo">
                    <a href="index.html"><img src="{{asset('assets/img/brand/logo.png')}}" class="mobile-logo" alt="logo"></a>
                    <a href="index.html"><img src="{{asset('assets/img/brand/logo-light.png')}}" class="mobile-logo-dark"
                                              alt="logo"></a>
                </div>

            </div>
            <div class="main-header-right">
                <button class="navbar-toggler navresponsive-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
                </button><!-- Navresponsive closed -->
                <div
                    class="navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark  ">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <div class="d-flex order-lg-2 ms-auto">
                            <!-- Theme-Layout -->
                            <div class="dropdown d-flex main-header-theme">
                                <a class="nav-link icon layout-setting">
										<span class="dark-layout">
											<i class="fe fe-sun header-icons"></i>
										</span>
                                    <span class="light-layout">
											<i class="fe fe-moon header-icons"></i>
										</span>
                                </a>
                            </div>
                            <!-- Theme-Layout -->

                            <!-- Full screen -->
                            <div class="dropdown ">
                                <a class="nav-link icon full-screen-link">
                                    <i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
                                    <i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
                                </a>
                            </div>
                            <!-- Full screen -->

                            <!-- Profile -->
                            <div class="dropdown main-profile-menu">
                                <a class="d-flex" href="javascript:void(0)">
										<span class="main-img-user"><img alt="avatar"
                                                                         src="{{asset('assets/img/svgs/user.svg')}}"></span>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="header-navheading">
                                        <h6 class="main-notification-title">{{ Auth::user()->name }}</h6>
                                        <p class="main-notification-text">{{ Auth::user()->all_roles }}</p>
                                    </div>
                                    <a class="dropdown-item border-top" href="{{route('profile.edit')}}">
                                        <i class="fe fe-user"></i> Profil
                                    </a>
                                    <a class="dropdown-item" href="{{route('logout')}}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fe fe-power"></i> Sign Out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                            <!-- Profile -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Header-->

    <!-- Sidemenu -->
    <div class="sticky">
        <div class="main-menu main-sidebar main-sidebar-sticky side-menu">
            <div class="main-sidebar-header main-container-1 active">
                <div class="sidemenu-logo">
                    <a class="main-logo" href="index.html">
                        <img src="{{asset('assets/img/brand/logo-light.png')}}" class="header-brand-img desktop-logo" alt="logo">
                        <img src="{{asset('assets/img/brand/icon-light.png')}}" class="header-brand-img icon-logo" alt="logo">
                        <img src="{{asset('assets/img/brand/logo.png')}}" class="header-brand-img desktop-logo theme-logo" alt="logo">
                        <img src="{{asset('assets/img/brand/icon.png')}}" class="header-brand-img icon-logo theme-logo" alt="logo">
                    </a>
                </div>
                <div class="main-sidebar-body main-body-1">
                    <div class="slide-left disabled" id="slide-left"><i class="fe fe-chevron-left"></i></div>
                    <ul class="menu-nav nav">
                        <li class="nav-header"><span class="nav-label">Dashboard</span></li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard')}}">
                                <span class="shape1"></span>
                                <span class="shape2"></span>
                                <i class="ti-home sidemenu-icon menu-icon "></i>
                                <span class="sidemenu-label">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('peta.index')}}">
                                <span class="shape1"></span>
                                <span class="shape2"></span>
                                <i class="fas fa-map-marked sidemenu-icon menu-icon "></i>
                                <span class="sidemenu-label">Peta</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('berita.index')}}">
                                <span class="shape1"></span>
                                <span class="shape2"></span>
                                <i class="fas fa-newspaper sidemenu-icon menu-icon "></i>
                                <span class="sidemenu-label">Berita</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('peraturan.index')}}">
                                <span class="shape1"></span>
                                <span class="shape2"></span>
                                <i class="fas fa-file-signature sidemenu-icon menu-icon "></i>
                                <span class="sidemenu-label">Legalitas</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('kemiskinan.index')}}">
                                <span class="shape1"></span>
                                <span class="shape2"></span>
                                <i class="fas fa-pie-chart sidemenu-icon menu-icon "></i>
                                <span class="sidemenu-label">Data Kemiskinan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('intervensi.index')}}">
                                <span class="shape1"></span>
                                <span class="shape2"></span>
                                <i class="fas fa-image sidemenu-icon menu-icon "></i>
                                <span class="sidemenu-label">Program Intervensi</span>
                            </a>
                        </li>
                    </ul>
                    <div class="slide-right" id="slide-right"><i class="fe fe-chevron-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sidemenu -->

    <!-- Main Content-->
    <div class="main-content side-content pt-0">

        <div class="main-container container-fluid">
            <div class="inner-body">
            @yield('content')
            </div>
        </div>
    </div>
    <!-- End Main Content-->

    <!-- Main Footer-->
    <div class="main-footer text-center">
        <div class="container">
            <div class="row row-sm">
                <div class="col-md-12">
                    <span>Copyright © 2022 <a href="#">Spruha</a>. Designed by <a href="https://www.spruko.com/">Spruko</a> All rights reserved.</span>
                </div>
            </div>
        </div>
    </div>
    <!--End Footer-->


</div>
<!-- End Page -->

<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

<!-- Jquery js-->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- Perfect-scrollbar js -->
<script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

<!-- Sidemenu js -->
<script src="{{asset('assets/plugins/sidemenu/sidemenu.js')}}" id="leftmenu"></script>

<!-- Sidebar js -->
<script src="{{asset('assets/plugins/sidebar/sidebar.js')}}"></script>

<!-- Select2 js-->
<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/select2.js')}}"></script>

<!-- Color Theme js -->
<script src="{{asset('assets/js/themeColors.js')}}"></script>

<!-- Sticky js -->
<script src="{{asset('assets/js/sticky.js')}}"></script>

<!-- Custom js -->
<script src="{{asset('assets/js/custom.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@stack('js')
</body>
</html>
