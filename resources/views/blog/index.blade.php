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
<nav class="sticky top-0 z-50 bg-white shadow-md bg-opacity-80 backdrop-blur-md">
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
        <div id="nav-links" class="flex-col hidden w-full mt-4 space-y-2 md:flex md:flex-row md:items-center md:space-x-4 md:space-y-0 md:mt-0 md:w-auto">
            <!-- Home -->
            <a href="/"
               class="inline-flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-700 transition rounded-md dark:text-gray-300 hover:bg-indigo-100 dark:hover:bg-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400">
                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 9.75L12 3l9 6.75V21a1.5 1.5 0 01-1.5 1.5h-4.5v-6h-6v6H4.5A1.5 1.5 0 013 21V9.75z" />
                </svg>
                Home
            </a>

            @auth
            <!-- Create Post -->
            <a href="{{ route('blog.create') }}"
               class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white transition bg-indigo-600 rounded-md shadow hover:bg-indigo-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 4v16m8-8H4" />
                </svg>
                Create Post
            </a>

            <!-- Welcome User -->
            <span
                class="inline-flex items-center gap-1 text-sm text-gray-600 font-medium bg-gray-100 px-3 py-1.5 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-indigo-600" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5.121 17.804A9.978 9.978 0 0112 15c2.21 0 4.243.714 5.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Welcome, {{ Auth::user()->name }}
            </span>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit"
                        class="inline-flex items-center gap-1 text-sm font-medium text-gray-700 bg-gray-100 px-3 py-1.5 rounded-md hover:bg-red-100 hover:text-red-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 11-4 0v-1m4-8V7a2 2 0 00-4 0v1" />
                    </svg>
                    Logout
                </button>
            </form>
@auth
    @if(Auth::user()->isAdmin())
        <div class="mt-4">
            <a href="{{ route('admin.index') }}"
               class="inline-flex items-center px-4 py-2 text-gray-800 transition bg-gray-200 rounded-lg shadow hover:bg-gray-300">
                <i class="mr-2 fas fa-arrow-left"></i>
                Back
            </a>
        </div>
    @endif
@endauth
            @else
            <!-- Login -->
            <a href="{{ route('login') }}"
               class="inline-flex items-center gap-1 text-sm font-medium text-gray-700 transition dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">
                <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15 12H3m6-6l-6 6 6 6M21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v14a2 2 0 002 2h4a2 2 0 002-2V5z" />
                </svg>
                Login
            </a>

            <!-- Register -->
            <a href="{{ route('register') }}"
               class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white transition bg-indigo-600 rounded-md shadow hover:bg-indigo-700">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16 21v-2a4 4 0 00-3.6-3.98M12 7a4 4 0 100 8 4 4 0 000-8zM6 21v-2a4 4 0 013-3.87" />
                </svg>
                Register
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

<br>
    <!-- Blog Content -->
        <h1 class="mb-8 text-3xl font-extrabold tracking-tight text-center text-indigo-700">Latest Blog Posts</h1>
<!-- Blog Page with Sidebar -->
<div x-data="{ sidebarOpen: false }" class="container mx-auto px-4 py-12">

    <!-- Mobile Toggle Button -->
    <div class="mb-6 flex justify-between items-center lg:hidden">
        <h2 class="text-xl font-bold text-indigo-700">Dashboard</h2>
        <button @click="sidebarOpen = !sidebarOpen" class="p-2 text-indigo-600 hover:bg-indigo-100 rounded-md">
            <svg x-show="!sidebarOpen" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg x-show="sidebarOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Responsive Layout -->
    <div class="flex flex-col lg:flex-row gap-8">

        <!-- Sidebar -->
        <aside :class="{ 'block': sidebarOpen, 'hidden': !sidebarOpen }"
               class="w-full lg:w-1/4 bg-white rounded-lg shadow-md border border-gray-200 p-6 transition-all duration-300 lg:block">
            <h2 class="mb-4 text-xl font-bold text-indigo-700">Dashboard</h2>
            <ul class="space-y-3">
                <li>
                    <a href="{{ route('blog.create') }}" class="block px-4 py-2 text-indigo-600 hover:text-white hover:bg-indigo-600 rounded transition">
                        ➕ Add Post
                    </a>
                </li>
                <li>
                    <a href="{{ route('users.showprofile') }}" class="block px-4 py-2 text-indigo-600 hover:text-white hover:bg-indigo-600 rounded transition">
                        👤 Profile
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-indigo-600 hover:text-white hover:bg-indigo-600 rounded transition">
                        ✏️ Edit Profile
                    </a>
                </li>
                <li>
                    <a href="{{ route('blog.myPosts') }}" class="block px-4 py-2 text-indigo-600 hover:text-white hover:bg-indigo-600 rounded transition">
                        📄 My Blog Posts
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Blog Content -->
        <div class="w-full lg:w-4/4">
            {{-- <h1 class="mb-8 text-3xl font-extrabold tracking-tight text-center text-indigo-700">Latest Blog Posts</h1> --}}

            @if($posts->count())
            <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4">
                @foreach ($posts as $post)
                <div class="overflow-hidden transition duration-300 transform bg-white border border-gray-200 rounded-lg shadow-md hover:scale-105">
                    @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="object-cover w-full h-36">
                    @endif
                    <div class="p-4">
                        <h2 class="mb-2 text-lg font-semibold text-indigo-800">{{ $post->title }}</h2>
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
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <p class="mt-12 text-lg text-center text-gray-500">No blog posts found.</p>
            @endif
        </div>
    </div>
</div>
</body>
</html>
