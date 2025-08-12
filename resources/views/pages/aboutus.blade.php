<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us | Myeik Directory</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- Header -->
    <header class="bg-gradient-to-r from-blue-800 to-blue-500 text-white shadow-lg">
        <div class="container mx-auto px-4 py-5 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <img src="{{ asset('assets/img/logo/directorylogo.png') }}" alt="Myeik Directory Logo" class="h-12 w-auto">
                <h1 class="text-2xl font-extrabold tracking-wide">Myeik Directory</h1>
            </div>
            <nav>
                <a href="/" class="bg-white text-blue-600 px-5 py-2 rounded-full shadow hover:bg-gray-100 transition">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-blue-100 via-blue-50 to-blue-100 py-20">
        <div class="text-center">
            <h2 class="text-5xl font-extrabold text-blue-700 mb-4 animate__animated animate__fadeInDown">About Us</h2>
            <p class="text-lg text-gray-700 max-w-2xl mx-auto animate__animated animate__fadeInUp">
                Discover the heart of Myeik with our trusted local guide — connecting you to businesses, services, and the community that makes our city special.
            </p>
        </div>
    </section>

    <!-- Content Section -->
    <main class="container mx-auto px-4 py-12 max-w-5xl">
        <div class="bg-white shadow-lg rounded-xl p-10 space-y-8 border border-gray-100 hover:shadow-2xl transition">

            <p class="text-gray-700 leading-relaxed">
                <strong class="text-blue-700">Myeik Directory</strong> is dedicated to helping people find the best of what Myeik has to offer. From local restaurants to essential services, we connect residents and visitors with verified listings and trusted reviews.
            </p>

            <p class="text-gray-700 leading-relaxed">
                We believe in strengthening communities by supporting local businesses, encouraging engagement, and making city navigation both easy and enjoyable.
            </p>

            <div>
                <h3 class="text-2xl font-semibold mb-4 text-blue-700 flex items-center gap-2">
                    <i class="bi bi-star-fill text-yellow-500"></i> Our Core Features
                </h3>
                <ul class="space-y-3">
                    <li class="flex items-center gap-2">
                        <i class="bi bi-check-circle-fill text-green-500"></i>
                        <span>Extensive and up-to-date local business listings</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bi bi-check-circle-fill text-green-500"></i>
                        <span>Easy navigation with interactive maps</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bi bi-check-circle-fill text-green-500"></i>
                        <span>Trusted reviews from the community</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bi bi-check-circle-fill text-green-500"></i>
                        <span>Support for local entrepreneurs</span>
                    </li>
                </ul>
            </div>

            <p class="text-gray-700 leading-relaxed">
                Whether you're a long-time resident or a curious visitor, <span class="font-bold text-blue-600">Myeik Directory</span> is your go-to resource to explore our city’s hidden gems and essentials.
            </p>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-gray-800 to-gray-900 text-white text-center py-6 mt-16">
        <p class="text-sm">&copy; {{ date('Y') }} Myeik Directory. All rights reserved.</p>
    </footer>

    <!-- Animate.css for fade effects -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</body>
</html>
