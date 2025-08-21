<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="UTF-8">
  <title>View Blog Post</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="text-gray-800 transition-colors duration-300 bg-gray-100 dark:bg-gray-900 dark:text-gray-100">

<!-- Floating Navbar -->
<nav class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-6 py-4 bg-white shadow-md dark:bg-gray-800">
  <!-- Brand -->
  <div class="text-xl font-bold tracking-wide text-indigo-700 dark:text-indigo-300">
    My Blog
  </div>

  <!-- User Info -->
  <div class="inline-flex items-center gap-2 bg-gray-100 dark:bg-gray-700 px-3 py-1.5 rounded-full shadow-sm">
    <!-- Icon -->
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-600 dark:text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M5.121 17.804A9.978 9.978 0 0112 15c2.21 0 4.243.714 5.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
    </svg>

    <!-- Welcome Text -->
    <span class="text-sm font-medium text-gray-800 dark:text-gray-200">
      @auth
        {{ auth()->user()->name }}
      @else
        Guest
      @endauth
    </span>
  </div>
</nav>
<br><br>
<!-- Blog Page with Sidebar -->
<div x-data="{ sidebarOpen: false }" class="container px-4 py-12 mx-auto">

    <!-- Mobile Toggle Button -->
    <div class="flex items-center justify-between mb-6 lg:hidden">
        <h2 class="text-xl font-bold text-indigo-700">Dashboard</h2>
        <button @click="sidebarOpen = !sidebarOpen" class="p-2 text-indigo-600 rounded-md hover:bg-indigo-100">
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
    <div class="flex flex-col gap-8 lg:flex-row">

        <!-- Sidebar -->
<aside :class="{ 'block': sidebarOpen, 'hidden': !sidebarOpen }"
       class="w-full p-6 transition-all duration-300 border border-indigo-100 shadow-lg lg:w-1/4 bg-gradient-to-br from-indigo-50 to-white rounded-xl lg:block">

    <!-- Sidebar Header -->
    <h2 class="flex items-center gap-2 mb-6 text-2xl font-extrabold text-indigo-700">
        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0h4" />
        </svg>
        Dashboard
    </h2>

    <!-- Sidebar Navigation -->
    <ul class="space-y-4 text-sm">
         <li>
            <a href="{{ route('blog.index') }}"
            class="flex items-center gap-3 px-4 py-2 text-indigo-700 transition rounded-lg hover:text-white hover:bg-indigo-600">
            <span>📚</span>
            <span>All Posts</span>
            </a>
        </li>
        <li>
            <a href="{{ route('users.showprofile') }}"
               class="flex items-center gap-3 px-4 py-2 text-indigo-700 transition rounded-lg hover:text-white hover:bg-indigo-600">
                <span>👤</span>
                <span>Profile</span>
            </a>
        </li>
        <li>
            <a href="{{ route('profile.edit') }}"
               class="flex items-center gap-3 px-4 py-2 text-indigo-700 transition rounded-lg hover:text-white hover:bg-indigo-600">
                <span>✏️</span>
                <span>Edit Profile</span>
            </a>
        </li>
        <li>
            <a href="{{ route('blog.myPosts') }}"
               class="flex items-center gap-3 px-4 py-2 text-indigo-700 transition rounded-lg hover:text-white hover:bg-indigo-600">
                <span>📄</span>
                <span>My Blog Posts</span>
            </a>
        </li>
    </ul>
</aside>
  <!-- Main Content -->
  <main class="flex-1 max-w-4xl p-6 mx-auto">
    <div class="overflow-hidden shadow-xl bg-gradient-to-br from-white to-blue-50 dark:from-gray-800 dark:to-gray-700 rounded-3xl">

      <!-- Header -->
      <div class="relative p-6 bg-white border-b border-indigo-200 shadow-inner dark:bg-gray-800 sm:p-8 rounded-t-3xl">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-t-3xl"></div>
        <h1 class="text-3xl font-extrabold text-gray-800 sm:text-4xl dark:text-white">{{ $post->title }}</h1>
        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
          Posted by: <span class="font-semibold text-indigo-600 dark:text-indigo-300">{{ $post->user->name ?? 'Unknown' }}</span>
          • {{ $post->created_at->format('F j, Y') }}
        </p>
      </div>

      <!-- Image -->
      @if ($post->image)
      <div class="w-full px-4 py-6 sm:px-8">
          <img
              src="{{ asset('storage/' . $post->image) }}"
              alt="Post Image"
              class="w-full max-h-[500px] rounded-3xl object-cover shadow-md border border-gray-300 dark:border-gray-600 brightness-95 hover:brightness-100 transition duration-300 ease-in-out"
          >
      </div>
      @else
      <p class="text-red-500">No image found.</p>
      @endif

      <!-- Description -->
      <div class="px-6 pb-8 text-lg leading-relaxed whitespace-pre-line sm:px-8 dark:text-gray-100">
        {!! nl2br(e($post->description)) !!}
      </div>

      <!-- Buttons Container -->
      <div class="flex flex-wrap items-center gap-4 px-6 pb-8 sm:px-8">

        <!-- Back Button -->
        <button onclick="history.back()"
          class="flex items-center gap-2 px-5 py-2 text-white transition-colors duration-200 bg-indigo-600 rounded-full hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
          Back
        </button>

        @auth
          @if (Auth::id() === $post->user_id)

            <!-- Edit Button -->
            <a href="{{ route('blog.edit', $post->id) }}"
              class="flex items-center gap-2 px-5 py-2 text-white transition bg-blue-600 rounded-full hover:bg-blue-700">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5h2m2 4h-6m6 0v6m-6-6v6" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 21v-7a2 2 0 012-2h12" />
              </svg>
              Edit
            </a>

            <!-- Delete Button -->
            <form action="{{ route('blog.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
              @csrf
              @method('DELETE')
              <button type="submit"
                class="flex items-center gap-2 px-5 py-2 text-white transition bg-red-600 rounded-full hover:bg-red-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a2 2 0 00-2 2v0a2 2 0 002 2h4a2 2 0 002-2v0a2 2 0 00-2-2m-4 0v0z" />
                </svg>
                Delete
              </button>
            </form>

          @endif
        @endauth

      </div>
    </div>
  </main>
</div>

<script>
  function handleProfileClick(event) {
    event.preventDefault(); // Stop default navigation

    @guest
      alert("You are not logged in. Please log in first, or register if you don't have an account yet.");

    @else
      window.location.href = "{{ route('profile.edit') }}";
    @endguest
  }
</script>

</body>
</html>
