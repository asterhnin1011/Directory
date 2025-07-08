<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <title>@yield('title', 'Directory')</title>
        @stack('meta')
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Directory </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/C.jpg">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- CSS here -->
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="assets/css/slicknav.css">
            <link rel="stylesheet" href="assets/css/flaticon.css">
            <link rel="stylesheet" href="assets/css/animate.min.css">
            <link rel="stylesheet" href="assets/css/magnific-popup.css">
            <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="assets/css/themify-icons.css">
            <link rel="stylesheet" href="assets/css/slick.css">
            <link rel="stylesheet" href="assets/css/nice-select.css">
            <link rel="stylesheet" href="assets/css/style.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
    body.dark-mode {
        background-color: #121212;
        color: #f1f1f1;
    }
    .dark-mode .header-area,
    .dark-mode .footer-area {
        background-color: #1e1e1e !important;
    }
    .dark-mode a {
        color: #ddd;
    }
    .dark-mode .single-location,
    .dark-mode .single-cat,
    .dark-mode .single-services,
    .dark-mode .single-testimonial,
    .dark-mode .single-team {
        background-color: #2c2c2c;
    }
</style>

            @stack('css')
   </head>

     <body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/C.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
       <div class="header-area header-transparent">
            <div class="main-header">
               <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2 col-md-1">
                                <div class="logo">
  <a href="pages/index.html">
    <img src="assets/img/logo/C.jpg" alt="Logo" width="100" height="auto">
  </a>
</div>
                            </div>
                            <div class="col-xl-10 col-lg-10 col-md-8">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
    <nav>
        <ul id="navigation">
            <li><a href="/">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="catagori.html">Catagories</a></li>
            <li><a href="listing.html">Listing</a></li>
            <li><a href="#">Page</a>
                <ul class="submenu">
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="blog_details.html">Blog Details</a></li>
                    <li><a href="elements.html">Element</a></li>
                    <li><a href="listing_details.html">Listing details</a></li>
                </ul>
            </li>
            <li><a href="contact.html">Contact</a></li>
            <li class="add-list"><a href="listing_details.html"><i class="ti-plus"></i> add Listing</a></li>
            <li class="login">
    <a href="{{ route('login') }}">
        <i class="ti-user"></i> Sign in or Register
    </a>
</li>
            <li>
    <button id="theme-toggle" class="border-0 bg-transparent text-white" style="font-size: 20px;">
        🌙
    </button>
</li>
        </ul>
    </nav>
</div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
       </div>
        <!-- Header End -->
    </header>
