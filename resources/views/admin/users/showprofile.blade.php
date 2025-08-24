<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js for toggle -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-100">

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
    <!-- Profile Content (smaller width, margin left + right) -->
    <div class="w-full mt-8 lg:w-2/3 lg:ml-4">
        <div class="p-8 bg-white border border-gray-200 rounded-lg shadow-md">
            <h2 class="flex items-center justify-center gap-2 mb-6 text-3xl font-bold text-center text-indigo-700">
                <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M5.121 17.804A9.978 9.978 0 0112 15c2.21 0 4.243.714 5.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                User Profile
            </h2>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Username</label>
                    <div class="px-4 py-2 mt-1 text-gray-800 bg-gray-100 rounded">{{ Auth::user()->name }}</div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="px-4 py-2 mt-1 text-gray-800 bg-gray-100 rounded">{{ Auth::user()->email }}</div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Address</label>
                    <div class="px-4 py-2 mt-1 text-gray-800 bg-gray-100 rounded">{{ Auth::user()->address ?? 'N/A' }}</div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Phone</label>
                    <div class="px-4 py-2 mt-1 text-gray-800 bg-gray-100 rounded">{{ Auth::user()->phone ?? 'N/A' }}</div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Country</label>
                    <div class="px-4 py-2 mt-1 text-gray-800 bg-gray-100 rounded">{{ Auth::user()->country ?? 'N/A' }}</div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
                    <div class="px-4 py-2 mt-1 text-gray-800 bg-gray-100 rounded">{{ Auth::user()->date_of_birth ?? 'N/A' }}</div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="px-4 py-2 mt-1 text-gray-800 bg-gray-100 rounded">••••••••</div>
                </div>
            </div>

            {{-- <div class="mt-8 space-x-4 text-center">
                <a href="{{ route('users.edit', auth()->user()->id) }}"
                   class="inline-block px-6 py-2 text-white transition bg-indigo-600 rounded hover:bg-indigo-700">
                    ✏️ Edit Profile
                </a>
            </div> --}}
        </div>
    </div>
</div>

</body>
</html>
