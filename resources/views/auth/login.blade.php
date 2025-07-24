<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="min-h-screen" style="background-color:#f0f8ff">

    <!--  Header Navbar with Blur -->
    <header class="backdrop-blur-md bg-white/30 fixed top-0 left-0 w-full z-50 shadow-md">
    <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
        <!-- Home Button -->
        <a href="/" class="text-xl font-semibold text-blue-700 hover:text-blue-800 flex items-center space-x-2">
            <!-- Home Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 9.75L12 4l9 5.75M4.5 10.5v8.25a1.5 1.5 0 001.5 1.5H9v-6h6v6h3a1.5 1.5 0 001.5-1.5V10.5" />
            </svg>
            <span>Home</span>
        </a>

        <!-- Nav Links -->
        <nav class="space-x-6 text-sm text-gray-700 font-medium flex items-center">
            <!-- Register -->
            <a href="{{ route('register') }}" class="flex items-center hover:underline space-x-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2M9 7a4 4 0 100-8 4 4 0 000 8zM20 8v6M23 11h-6" />
                </svg>
                <span>Register</span>
            </a>

            <!-- Login -->
            <a href="{{ route('login') }}" class="flex items-center hover:underline space-x-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 12H3m0 0l4-4m-4 4l4 4m13-8v8a2 2 0 01-2 2H9" />
                </svg>
                <span>Login</span>
            </a>
              <!-- Back -->
    <a href="javascript:history.back()" class="flex items-center hover:underline space-x-1 text-gray-600 hover:text-indigo-600 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M15 19l-7-7 7-7" />
        </svg>
        <span>Back</span>
    </a>
        </nav>
    </div>
</header>

    <!--  Login Form -->
    <main class="flex items-center justify-center pt-28 px-4">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-center mb-6">Login to Your Account</h2>

            @if(session('error'))
                <div class="mb-4 text-red-600">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                    @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit -->
                <div class="mb-4">
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                        Login
                    </button>
                </div>

                <!-- Register link -->
                <div class="text-center text-sm text-gray-600">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register here</a>
                </div>
            </form>
        </div>
    </main>
<script>
    feather.replace()
</script>
</body>
</html>
