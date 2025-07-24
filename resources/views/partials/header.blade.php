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
		<link rel="shortcut icon" type="image/x-icon" href="public\assets\img\icon\directorylogo.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
        <!-- Favicon -->
    <link href="public\assets\img\logo\directorylogo.png" rel="icon">
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

.slider-height {
        height: 100vh; /* Full screen height */
        min-height: 700px; /* Minimum height on small screens */
    }

    @media (max-width: 768px) {
        .slider-height {
            height: auto;
            padding: 100px 0;
        }
    }
    .hero-bottom-space {
    padding-bottom: 120px; /* or any height you want */
}
/* .header-area{
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    position: sticky;
    top: 0;
    z-index: 1000;
    transition: background 0.3s ease-in-out;
} */
.header-sticky {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 9999;
  background: rgba(255, 255, 255, 0.2);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  box-shadow: 0 10px 15px rgba(25,25,25,0.1);
  animation: fadeInDown 300ms ease-in-out;
}
@keyframes fadeInDown {
  from {
    opacity: 0;
    transform: translate3d(0, -20%, 0);
  }
  to {
    opacity: 1;
    transform: translate3d(0, 0, 0);
  }
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
                    <img src="assets\img\logo\directorylogo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader end -->
 <!-- Header Content -->
    <div style="position: relative; z-index: 2;">
        <!-- Header Start -->
        <header>
           <div class="header-area header-transparent" style="border-radius: 0 0 12px 12px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border-bottom: 1px solid rgba(255,255,255,0.2);">
             <div class="main-header">
      <div class="header-bottom header-sticky">
                        {{-- <div class="container-fluid"> --}}
                            <div class="row align-items-center">
                                <!-- Logo -->
                                <div class="col-xl-2 col-lg-2 col-md-1">
                                    <div class="logo">
                                        <a href="pages/index.html">
                                            <img src="assets\img\logo\directorylogo.png" alt="Logo" width="100" height="auto">
                                        </a>
                                    </div>
                                </div>
                                <!-- Main Menu -->
                                <div class="col-xl-10 col-lg-10 col-md-8">
                                    <div class="main-menu f-right d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">
                                                <li><a href="/">Home</a></li>
                                                <li><a href="{{ route('about') }}">About</a></li>
                                                <li><a href="catagori.html">How It Work</a></li>
                                                {{-- <li><a href="listing.html">Listing</a></li> --}}
                                                <li><a href="#">Page</a>
                                                    <ul class="submenu">
                                                        <li><a href="{{ route('blog.index') }}">Blog</a></li>
                                                        <li><a href="blog_details.html">Blog Details</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="contact.html">Contact</a></li>
                                                {{-- <li class="add-list">
                                                    <a href="listing_details.html"><i class="ti-plus"></i> add Listing</a>
                                                </li> --}}
                                                <li class="login">
                                                    <a href="{{ route('login') }}">
                                                        <i class="ti-user"></i> Sign in or Register
                                                    </a>
                                                </li>
                                                {{-- <li>
                                                    <button id="theme-toggle" class="border-0 bg-transparent text-white" style="font-size: 20px;">
                                                        🌙
                                                    </button>
                                                </li> --}}
                                            </ul>
                                        </nav>
                                    </div>
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
        </header>
        <!-- Header End -->
    </div>
</div>
