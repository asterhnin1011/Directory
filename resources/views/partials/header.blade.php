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
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        header {
            position: sticky;
            top: 0;
            z-index: 999;
            background: rgba(251, 246, 213, 0.9);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        }

        .navbar-brand img {
            height: 50px;
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            color: #333;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link:focus {
            color: #007bff;
        }

        .dropdown-menu {
            border-radius: 0.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .nav-login {
            border-left: 1px solid #ccc;
            margin-left: 1rem;
            padding-left: 1rem;
        }

        /* Mobile adjustments */
        @media (max-width: 991px) {
            .nav-login {
                border-left: none;
                margin-left: 0;
                padding-left: 0;
                margin-top: 0.5rem;
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
 <!-- Navbar Start -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('assets/img/logo/directorylogo.png') }}" alt="Directory Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                    aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mainNavbar">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#work">How It Works</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Pages
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="pagesDropdown">
                                <li><a class="dropdown-item" href="{{ route('blog.index') }}">Blog</a></li>
                                <li><a class="dropdown-item" href="#places">Popular Places</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>

                        <li class="nav-item nav-login">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="bi bi-person-circle"></i> Sign in or Register
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Navbar End -->
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</div>
