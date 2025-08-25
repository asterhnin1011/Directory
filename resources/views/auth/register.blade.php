<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
@keyframes fade-in-down {
    0% {
        opacity: 0;
        transform: translateY(-10px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}
.animate-fade-in-down {
    animation: fade-in-down 0.3s ease-out forwards;
}
</style>
 <!-- Favicons -->
  <link href="assets/img/logo/directorylogo.png" rel="icon">
</head>
<body class="flex items-center justify-center min-h-screen" style="background-color:#f0f8ff">
      <!-- Header Navbar with Blur -->
<header class="backdrop-blur-md bg-white/30 fixed top-0 left-0 w-full z-50 shadow-md">
    <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">

        <!-- Logo + Title -->
        <a href="/" class="flex items-center space-x-3">
            <img src="{{ asset('assets/img/logo/directorylogo.png') }}"
                 alt="Myeik Directory Logo"
                 class="h-10 w-10 rounded-full shadow-md">
            <span class="text-xl font-semibold text-blue-700 hover:text-blue-800">
                Myeik Directory
            </span>
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

    <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-lg mt-20 sm:mt-17">
        <h2 class="text-2xl font-bold text-center mb-6 text-blue-600 flex items-center justify-center space-x-2">
    <!-- Person Icon -->
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A9 9 0 0112 3a9 9 0 016.879 14.804M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
    </svg>
    <span>Create an Account</span>
</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Username -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6">
        <!-- Left Column -->
        <div>
            <!-- Username -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-semibold text-gray-600">Username</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold text-gray-600">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Address -->
            <div class="mb-4">
                <label for="address" class="block text-sm font-semibold text-gray-600">Address</label>
                <input type="text" id="address" name="address" value="{{ old('address') }}" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('address') border-red-500 @enderror">
                @error('address')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone Number -->
            <div class="mb-4">
                <label for="phone" class="block text-sm font-semibold text-gray-600">Phone Number</label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('phone') border-red-500 @enderror"
                    placeholder="e.g., +959 123 456 7890">
                @error('phone')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Right Column -->
        <div>
            <!-- Country -->
            <div class="mb-4">
                <label for="country" class="block text-sm font-semibold text-gray-600">Country</label>
                <input type="text" id="country" name="country" value="{{ old('country') }}" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('country') border-red-500 @enderror"
                    placeholder="e.g., United States">
                @error('country')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Date of Birth -->
<div class="mb-4">
    <label for="date_of_birth" class="block text-sm font-semibold text-gray-600">Date of Birth</label>
    <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required
        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('date_of_birth') border-red-500 @enderror">
    @error('date_of_birth')
        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
    @enderror
</div>

<script>
    // Set today's date as max for date_of_birth
    const today = new Date().toISOString().split('T')[0];
    document.getElementById("date_of_birth").setAttribute("max", today);
</script>

            <!-- Password -->
            <div class="mb-4 relative">
                <label for="password" class="block text-sm font-semibold text-gray-600">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror">
                <button type="button" onclick="togglePassword('password', this)"
                    class="absolute top-9 right-3 text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7S3.732 16.057 2.458 12z" />
                    </svg>
                </button>
                @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-6 relative">
                <label for="password_confirmation" class="block text-sm font-semibold text-gray-600">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="button" onclick="togglePassword('password_confirmation', this)"
                    class="absolute top-9 right-3 text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7S3.732 16.057 2.458 12z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Submit -->
    <button type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
        Register
    </button>
</form>
    @if(session('success'))
    <div id="successAlert" class="fixed top-5 right-5 bg-green-500 text-white px-5 py-3 rounded shadow-lg z-50 transition-all">
        {{ session('success') }}
    </div>
<!-- Password Toggle Script -->
<script>
    function togglePassword(fieldId, btn) {
        const input = document.getElementById(fieldId);
        input.type = input.type === 'password' ? 'text' : 'password';
    }
</script>

    <script>
        setTimeout(() => {
            const alert = document.getElementById('successAlert');
            if (alert) alert.remove();
        }, 4000); // auto-dismiss after 4 seconds
    </script>
@endif

        <!-- Divider -->
        <div class="flex items-center my-6">
            <hr class="flex-grow border-t border-gray-300">
            <span class="mx-4 text-gray-500">or</span>
            <hr class="flex-grow border-t border-gray-300">
        </div>

        <p class="mt-4 text-sm text-center text-gray-600">
            Already have an account? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
        </p>
    </div>

    <script>
    function togglePassword(fieldId, btn) {
        const input = document.getElementById(fieldId);
        const icon = btn.querySelector('svg');
        const isVisible = input.type === 'text';

        input.type = isVisible ? 'password' : 'text';

        icon.innerHTML = isVisible
            ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                   d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                   d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7S3.732 16.057 2.458 12z" />`
            : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                   d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.07 10.07 0 012.338-4.114M15 12a3 3 0 11-6 0 3 3 0 016 0zM3 3l18 18" />`;
    }
</script>
</body>
</html>
