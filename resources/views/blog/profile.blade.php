<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Update Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <!-- Heroicons CDN for icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-gradient-to-r from-indigo-100 via-white to-indigo-100 min-h-screen flex flex-col">

  <!-- Navbar -->
<nav class="bg-white bg-opacity-90 backdrop-blur-md shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <!-- Left: Logo -->
        <a href="{{ route('blog.index') }}" class="text-2xl font-bold text-indigo-600">
            My Blog
        </a>

        <!-- Right: Back Button -->
        <a href="{{ route('blog.index') }}" class="flex items-center text-indigo-600 hover:text-indigo-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.707 4.293a1 1 0 00-1.414 0L6.586 9l4.707 4.707a1 1 0 001.414-1.414L9.414 9l3.293-3.293a1 1 0 000-1.414z" clip-rule="evenodd" />
            </svg>
            Back
        </a>
    </div>
</nav>

    <!-- Main Content -->
    <div class="flex-grow flex items-center justify-center py-10">
        <div class="bg-white shadow-xl rounded-xl p-8 w-full max-w-2xl border border-gray-200">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Update Profile</h2>

            @if (session('success'))
                <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Username -->
                <div>
                    <label for="name" class="block text-gray-700 font-semibold mb-1">Username</label>
                    <div class="relative">
                        <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}"
                            class="w-full border border-gray-300 rounded-lg pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                            <i data-feather="user"></i>
                        </span>
                    </div>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
<div>
    <label for="password" class="block text-gray-700 font-semibold mb-1">New Password</label>
    <div class="relative">
        <input type="password" name="password" id="password"
            class="w-full border border-gray-300 rounded-lg pl-10 pr-10 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
            <i data-feather="lock"></i>
        </span>
        <button type="button" onclick="togglePassword('password', this)" class="absolute inset-y-0 right-3 flex items-center text-gray-400">
            <i data-feather="eye"></i>
        </button>
    </div>
    @error('password')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Confirm Password -->
<div>
    <label for="password_confirmation" class="block text-gray-700 font-semibold mb-1">Confirm Password</label>
    <div class="relative">
        <input type="password" name="password_confirmation" id="password_confirmation"
            class="w-full border border-gray-300 rounded-lg pl-10 pr-10 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
            <i data-feather="lock"></i>
        </span>
        <button type="button" onclick="togglePassword('password_confirmation', this)" class="absolute inset-y-0 right-3 flex items-center text-gray-400">
            <i data-feather="eye"></i>
        </button>
    </div>
</div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition duration-200">
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        feather.replace(); // activate icons
       function togglePassword(fieldId, btn) {
        const input = document.getElementById(fieldId);
        const icon = btn.querySelector("i");

        if (input.type === "password") {
            input.type = "text";
            icon.dataset.feather = "eye-off";
        } else {
            input.type = "password";
            icon.dataset.feather = "eye";
        }

        feather.replace(); // re-render feather icons
    }
    </script>
</body>
</html>
