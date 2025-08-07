<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="UTF-8">
  <title>View Blog Post</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100 transition-colors duration-300">

<!-- Floating Navbar -->
<nav class="fixed top-0 left-0 right-0 z-50 bg-white dark:bg-gray-800 shadow-md px-6 py-4 flex justify-between items-center">
  <!-- Brand -->
  <div class="text-xl font-bold text-indigo-700 dark:text-indigo-300 tracking-wide">
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
    <span class="text-sm text-gray-800 dark:text-gray-200 font-medium">
      @auth
        {{ auth()->user()->name }}
      @else
        Guest
      @endauth
    </span>
  </div>

</nav>

<!-- Mobile Backdrop -->
  <div id="sidebarBackdrop" class="fixed inset-0 bg-black bg-opacity-40 z-40 hidden sm:hidden"></div>

<!-- Sidebar + Content -->
<div class="flex pt-20">
  <!-- Sidebar -->
  <aside class="w-64 hidden sm:block h-screen sticky top-20 p-4 bg-white dark:bg-gray-800 shadow-md">
    <nav class="space-y-4">
      <a href="{{ route('blog.index') }}" class="block px-4 py-2 rounded hover:bg-indigo-100 dark:hover:bg-gray-700">All Posts</a>
      <a href="{{ route('blog.create') }}" class="block px-4 py-2 rounded hover:bg-indigo-100 dark:hover:bg-gray-700">Add Post</a>
      <a href="{{ route('profile.edit') }}" class="block px-4 py-2 rounded hover:bg-indigo-100 dark:hover:bg-gray-700">Profile</a>
    </nav>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 max-w-4xl mx-auto p-6">
    <div class="bg-gradient-to-br from-white to-blue-50 dark:from-gray-800 dark:to-gray-700 shadow-xl rounded-3xl overflow-hidden">

      <!-- Header -->
      <div class="relative bg-white dark:bg-gray-800 border-b border-indigo-200 p-6 sm:p-8 rounded-t-3xl shadow-inner">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-t-3xl"></div>
        <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-800 dark:text-white">{{ $post->title }}</h1>
        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
          Posted by: <span class="font-semibold text-indigo-600 dark:text-indigo-300">{{ $post->user->name ?? 'Unknown' }}</span>
          • {{ $post->created_at->format('F j, Y') }}
        </p>
      </div>

      <!-- Image -->
    @if ($post->image)
    <div class="w-full px-4 sm:px-8 py-6">
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
      <div class="px-6 sm:px-8 pb-8 text-lg leading-relaxed whitespace-pre-line dark:text-gray-100">
        {!! nl2br(e($post->description)) !!}
      </div>

      <!-- Buttons Container -->
<div class="px-6 sm:px-8 pb-8 flex flex-wrap gap-4 items-center">

  <!-- Back Button -->
  <button onclick="history.back()"
    class="flex items-center gap-2 bg-indigo-600 text-white px-5 py-2 rounded-full hover:bg-indigo-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
    </svg>
    Back
  </button>

  @auth
    @if (Auth::id() === $post->user_id)

      <!-- Edit Button -->
      <a href="{{ route('blog.edit', $post->id) }}"
        class="flex items-center gap-2 bg-blue-600 text-white px-5 py-2 rounded-full hover:bg-blue-700 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
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
          class="flex items-center gap-2 bg-red-600 text-white px-5 py-2 rounded-full hover:bg-red-700 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a2 2 0 00-2 2v0a2 2 0 002 2h4a2 2 0 002-2v0a2 2 0 00-2-2m-4 0v0z" />
          </svg>
          Delete
        </button>
      </form>

    @endif
  @endauth

</div>

</body>
</html>
