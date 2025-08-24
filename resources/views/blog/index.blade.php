<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog Posts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Alpine.js -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="min-h-screen text-gray-800 from-gray-100 to-white"  style="background-color:#f0f8ff">

   <!-- Navbar -->
<nav class="sticky top-0 z-50 bg-white shadow-md dark:bg-gray-800 bg-opacity-80 backdrop-blur-md">
  <div class="container flex items-center justify-between px-4 py-4 mx-auto">
    <!-- Logo -->
    <a href="{{ route('blog.index') }}" class="text-2xl font-bold text-indigo-600">Myeik Directory</a>

    <!-- Hamburger Button (Mobile) -->
    <button id="menu-toggle" class="text-gray-600 md:hidden focus:outline-none">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
           viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>

    <!-- Navigation Links -->
    <div id="nav-links" class="flex-col hidden mt-4 space-y-2 md:flex md:flex-row md:items-center md:space-x-4 md:space-y-0 md:mt-0">
    <a href="/" class="inline-flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-700 transition rounded-md dark:text-gray-300 hover:bg-indigo-100 dark:hover:bg-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400">
        🏠 Home
    </a>

    @auth
        <a href="{{ route('blog.create') }}" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white transition bg-indigo-600 rounded-md shadow hover:bg-indigo-700">
            ➕ Create Post
        </a>
    @endauth

    <!-- Welcome message visible to both guests and users -->
    <span class="inline-flex items-center gap-1 text-sm text-gray-600 font-medium bg-gray-100 px-3 py-1.5 rounded-full">
        👤 Welcome,
        @auth
            {{ Auth::user()->name }}
        @else
            Guest
        @endauth
    </span>

    @auth
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="inline-flex items-center gap-1 text-sm font-medium text-gray-700 bg-gray-100 px-3 py-1.5 rounded-md hover:bg-red-100 hover:text-red-600 transition">
                🔓 Logout
            </button>
        </form>

        @if(Auth::user()->isAdmin())
            <a href="{{ route('admin.index') }}" class="inline-flex items-center px-4 py-2 text-sm text-gray-800 bg-gray-200 rounded-md hover:bg-gray-300">
                ← Back to Admin
            </a>
        @endif
    @else
        <a href="{{ route('login') }}" class="inline-flex items-center gap-1 text-sm text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">
            🔑 Login
        </a>
        <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md shadow hover:bg-indigo-700">
            📝 Register
        </a>
    @endauth
</div>
  </div>
</nav>

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
    <!-- Main Blog Content -->
    {{-- <main class="w-full lg:w-3/4"> --}}
        <main class="flex-grow">
       <h1 class="mb-6 text-2xl font-bold text-center text-indigo-700">Latest Blog Posts</h1>

        <form method="GET" action="{{ route('blog.index') }}" class="max-w-md mx-auto mb-8">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search blog posts..."
                class="w-full px-4 py-2 border border-indigo-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200"
            />
        </form>

        @if($posts->count())
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3">
        @foreach ($posts as $post)
            <div class="overflow-hidden transition duration-300 transform bg-white border border-gray-200 rounded-lg shadow-md hover:scale-105">
                @if ($post->image && Storage::disk('public')->exists($post->image))
                    <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="object-cover w-full h-48">
                @endif
                <div class="p-4">
                    <h2 class="mb-2 text-lg font-semibold text-indigo-800">{{ $post->title }}</h2>
                    <p class="mb-2 text-sm text-gray-600 dark:text-gray-400">
                Published: {{ $post->created_at->format('M d, Y') }}
              </p>

                    <p class="mb-3 text-sm text-gray-600">{{ Str::limit($post->description, 80) }}</p>


                    <a href="{{ route('blog.show', $post->id) }}"
                       class="inline-flex items-center gap-1 text-sm font-semibold text-indigo-600 transition duration-200 hover:text-indigo-800 hover:underline">
                        Read More
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>

                    @auth
                        @if(Auth::user()->isAdmin())
                            <form method="POST" action="{{ route('blog.destroy', $post->id) }}"
                                  onsubmit="return confirm('Are you sure you want to delete this post?');"
                                  class="mt-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-800">
                                    Delete
                                </button>
                            </form>
                            @endif
                        @endauth
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    </script>
@endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination Links -->
        <div class="mt-8">
            {{ $posts->links('vendor.pagination.tailwind') }}
        </div>

        @else
            <p class="mt-12 text-lg text-center text-gray-500">No blog posts found.</p>
        @endif
    </main>
</div>
    </div>
</div>
</body>
</html>
