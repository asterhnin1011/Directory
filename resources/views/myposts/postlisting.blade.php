<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="UTF-8">
  <title>My Blog Posts</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/alpinejs" defer></script> <!-- Required for x-data -->
  <!-- Favicons -->
   <link href="/assets/img/logo/directorylogo.png" rel="icon" type="image/png" />
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100 min-h-screen">

<!-- Navbar -->
<nav class="sticky top-0 z-50 bg-white dark:bg-gray-800 shadow-md bg-opacity-80 backdrop-blur-md">
  <div class="container mx-auto flex items-center justify-between px-4 py-4">
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
    <div id="nav-links" class="hidden md:flex flex-col md:flex-row md:items-center md:space-x-4 space-y-2 md:space-y-0 mt-4 md:mt-0">
      <a href="/" class="inline-flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 transition rounded-md hover:bg-indigo-100 dark:hover:bg-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400">
        🏠 Home
      </a>

      @auth
        <a href="{{ route('blog.create') }}" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white transition bg-indigo-600 rounded-md shadow hover:bg-indigo-700">
          ➕ Create Post
        </a>

        <span class="inline-flex items-center gap-1 text-sm text-gray-600 font-medium bg-gray-100 px-3 py-1.5 rounded-full">
          👤 Welcome, {{ Auth::user()->name }}
        </span>

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

<!-- Mobile Toggle Script -->
<script>
  document.getElementById('menu-toggle').addEventListener('click', function () {
    const navLinks = document.getElementById('nav-links');
    navLinks.classList.toggle('hidden');
  });
</script>

<!-- Main Layout -->
<div x-data="{ open: false }" class="flex flex-col lg:flex-row min-h-screen">

  <!-- Sidebar -->
  <div class="w-full lg:w-64 dark:bg-gray-800  lg:sticky lg:top-0"
       x-show="open || window.innerWidth >= 1024"
       @click.outside="if (window.innerWidth < 1024) open = false">
    @include('partials.sidebar')
  </div>

  <!-- Main Content -->
  <main class="flex-1 px-6 py-8">
    <h1 class="text-3xl font-extrabold text-indigo-600 dark:text-indigo-400 mb-8 text-center">My Blog Posts</h1>

    @if($posts->count())
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($posts as $post)
          <div class="bg-white dark:bg-gray-800 rounded-xl shadow hover:shadow-lg transition overflow-hidden">
            @if($post->image)
              <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="w-full h-48 object-cover">
            @else
              <div class="w-full h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-gray-500">
                No Image
              </div>
            @endif

            <div class="p-4">
              <h2 class="text-xl font-semibold mb-2 text-indigo-700 dark:text-indigo-300">
                <a href="{{ route('blog.show', $post->id) }}" class="hover:underline">
                  {{ $post->title }}
                </a>
              </h2>

              <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                Published: {{ $post->created_at->format('M d, Y') }}
              </p>

              <p class="text-sm text-gray-700 dark:text-gray-300 line-clamp-3 mb-3">
                {{ Str::limit(strip_tags($post->description), 100) }}
              </p>

              <a href="{{ route('blog.show', $post->id) }}"
                 class="inline-block text-sm text-indigo-600 dark:text-indigo-400 hover:underline font-medium">
                Read More →
              </a>
            </div>
          </div>
        @endforeach
      </div>

      <div class="mt-8">
        {{ $posts->links() }}
      </div>
    @else
      <p class="text-center text-lg text-gray-500 dark:text-gray-400">You have no blog posts yet.</p>
    @endif
  </main>
</div>

</body>
</html>
