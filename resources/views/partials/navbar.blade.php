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
