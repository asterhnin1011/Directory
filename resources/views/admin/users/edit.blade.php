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
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://unpkg.com/feather-icons"></script>
<!-- Favicons -->
   <link href="/assets/img/logo/directorylogo.png" rel="icon" type="image/png" />
</head>
<body class="flex flex-col min-h-screen bg-gradient-to-r from-indigo-100 via-white to-indigo-100">

  <!-- Navbar -->
@include('partials.navbar')

<!-- Mobile Menu Toggle Script -->
<script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
        const navLinks = document.getElementById('nav-links');
        navLinks.classList.toggle('hidden');
    });
</script>
<!-- Blog Index Layout (responsive sidebar with toggle & animation) -->

<div x-data="{ open: window.innerWidth >= 1024 }"
     class="flex flex-col gap-6 px-4 mx-auto lg:flex-row max-w-7xl sm:px-6 lg:px-8">

    <!-- Mobile Toggle Button -->
<div class="lg:hidden">
    <button @click="open = !open"
            class="px-4 py-2 mb-4 text-white bg-indigo-600 rounded-md shadow">
        <span x-text="open ? 'Hide Menu' : 'Show Menu'"></span>
    </button>
</div>
    <div x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-x-4"
         x-transition:enter-end="opacity-100 translate-x-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-x-0"
         x-transition:leave-end="opacity-0 -translate-x-4"

         class="w-full sm:w-3/4 md:w-1/2 lg:w-64">
        @include('partials.sidebar')
    </div>

    <!-- Main Content -->
<div class="flex-grow px-4 mt-6"><!-- added px-4 for some left padding -->

    <div class="flex max-w-4xl gap-10 p-8 bg-white border border-gray-200 shadow-xl rounded-xl">


        <!-- Form -->
        <div class="flex-grow">
            <!-- Header with User Icon and Title -->
<div class="mb-8 text-center">
    <!-- Small user icon -->
    <div class="flex justify-center mb-3">
        <div class="flex items-center justify-center w-12 h-12 bg-indigo-100 rounded-full">
            <i data-feather="user" class="w-6 h-6 text-indigo-600"></i>
        </div>
    </div>

    <!-- Centered heading -->
    <h2 class="text-3xl font-bold text-blue-800">Update Profile</h2>
</div>

            @if (session('success'))
                <div class="px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-300 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <!-- Column 1 -->
        <div class="space-y-6">
            <!-- Username -->
            <div>
                <label for="name" class="block mb-1 font-semibold text-gray-700">Username</label>
                <div class="relative">
                    <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}"
                        class="w-full py-2 pl-10 pr-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <span class="absolute inset-y-0 flex items-center text-gray-400 left-3">
                        <i data-feather="user"></i>
                    </span>
                </div>
                @error('name')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Address -->
            <div>
                <label for="address" class="block mb-1 font-semibold text-gray-700">Address</label>
                <input type="text" name="address" id="address" value="{{ old('address', auth()->user()->address) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @error('address')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone -->
            <div>
                <label for="phone" class="block mb-1 font-semibold text-gray-700">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', auth()->user()->phone) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @error('phone')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Country -->
            <div>
                <label for="country" class="block mb-1 font-semibold text-gray-700">Country</label>
                <input type="text" name="country" id="country" value="{{ old('country', auth()->user()->country) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @error('country')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Column 2 -->
        <div class="space-y-6">
            <!-- Date of Birth -->
            <div>
                <label for="date_of_birth" class="block mb-1 font-semibold text-gray-700">Date of Birth</label>
                <input type="date" name="date_of_birth" id="date_of_birth"
                    value="{{ old('date_of_birth', auth()->user()->date_of_birth ? \Carbon\Carbon::parse(auth()->user()->date_of_birth)->format('Y-m-d') : '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @error('date_of_birth')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block mb-1 font-semibold text-gray-700">New Password</label>
                <div class="relative">
                    <input type="password" name="password" id="password"
                        class="w-full py-2 pl-10 pr-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <span class="absolute inset-y-0 flex items-center text-gray-400 left-3">
                        <i data-feather="lock"></i>
                    </span>
                    <button type="button" onclick="togglePassword('password', this)" class="absolute inset-y-0 flex items-center text-gray-400 right-3">
                        <i data-feather="eye"></i>
                    </button>
                </div>
                @error('password')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block mb-1 font-semibold text-gray-700">Confirm Password</label>
                <div class="relative">
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="w-full py-2 pl-10 pr-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <span class="absolute inset-y-0 flex items-center text-gray-400 left-3">
                        <i data-feather="lock"></i>
                    </span>
                    <button type="button" onclick="togglePassword('password_confirmation', this)" class="absolute inset-y-0 flex items-center text-gray-400 right-3">
                        <i data-feather="eye"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="mt-8 text-center">
        <button type="submit"
            class="px-6 py-2 font-semibold text-white transition duration-200 bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700">
            Update Profile
        </button>
    </div>
</form>
        </div>

    </div>
</div>
<!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
  document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
      icon: 'success',
      title: 'Success!',
      text: '{{ session('success') }}',
      confirmButtonColor: '#4f46e5',
      confirmButtonText: 'OK'
    });
  });
</script>
@endif

@if(session('error'))
<script>
  document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
      icon: 'error',
      title: 'Error!',
      text: '{{ session('error') }}',
      confirmButtonColor: '#e11d48',
      confirmButtonText: 'OK'
    });
  });
</script>
@endif

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
