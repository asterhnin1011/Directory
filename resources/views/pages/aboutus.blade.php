<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us | Directory</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- Header -->
    <header class="bg-blue-700 text-white shadow">
        <div class="container mx-auto px-4 py-6 flex justify-between items-center">
            <h1 class="text-2xl font-bold">Directory</h1>
            <nav class="space-x-4">
                <a href="/" class="btn btn-light mt-3 rounded-pill px-4 text-primary">← Back</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-blue-100 py-16 text-center">
        <h2 class="text-4xl font-bold mb-4">About Us</h2>
        <p class="text-lg text-gray-700 max-w-xl mx-auto">
            Discover the heart of your city with City Directory — your trusted local guide for businesses, services, and community insights.
        </p>
    </section>

    <!-- Content Section -->
    <main class="container mx-auto px-4 py-12 max-w-4xl">
        <div class="bg-white shadow rounded-lg p-8 space-y-6">
            <p>
                <strong>City Directory</strong> is dedicated to helping people find the best of what their city has to offer. From local restaurants to vital services, we connect residents and visitors with verified listings and honest reviews.
            </p>

            <p>
                We believe in strengthening communities by supporting local businesses, encouraging engagement, and making city navigation easy and enjoyable.
            </p>

            <div>
                <h3 class="text-2xl font-semibold mb-2 text-blue-700">Our Core Features:</h3>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <li>Extensive and up-to-date local business listings</li>
                    <li>Easy navigation with interactive maps</li>
                </ul>
            </div>

            <p>
                Whether you're a long-time resident or a curious visitor, City Directory is your go-to resource to explore the city's hidden gems and essentials.
            </p>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-6 mt-12">
        <p>&copy; {{ date('Y') }} City Directory. All rights reserved.</p>
    </footer>

</body>
</html>
