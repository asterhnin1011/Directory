<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog Posts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-gray-100 to-white min-h-screen text-gray-800">

    <!-- Navbar -->
   <nav class="bg-white bg-opacity-80 backdrop-blur-md shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ route('blog.index') }}" class="text-2xl font-bold text-indigo-600">My Blog</a>

        <div class="space-x-4 flex items-center">
            <a href="{{ route('blog.index') }}" class="text-gray-700 hover:text-indigo-600 transition">Home</a>

            @auth
                <a href="{{ route('blog.create') }}" class="inline-flex items-center gap-2 bg-indigo-600 text-white text-sm font-medium px-4 py-2 rounded-md shadow hover:bg-indigo-700 transition">
    <!-- Heroicon: Plus -->
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
    </svg>
    Create Post
</a>
                <span class="inline-flex items-center gap-1 text-sm text-gray-600 font-medium bg-gray-100 px-3 py-1.5 rounded-full">
    <!-- User Icon (Heroicon) -->
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9.978 9.978 0 0112 15c2.21 0 4.243.714 5.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
    </svg>
    Welcome, {{ Auth::user()->name }}
</span>
               <form method="POST" action="{{ route('logout') }}" class="inline">
    @csrf
    <button type="submit" class="inline-flex items-center gap-1 text-sm font-medium text-gray-700 bg-gray-100 px-3 py-1.5 rounded-md hover:bg-red-100 hover:text-red-600 transition">
        <!-- Heroicon: Logout -->
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 11-4 0v-1m4-8V7a2 2 0 00-4 0v1" />
        </svg>
        Logout
    </button>
</form>
            @else
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600 transition">Login</a>
                <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">Register</a>
            @endauth
        </div>
    </div>
</nav>

<!-- Blog Section -->
<div class="container mx-auto px-4 py-12">
    <h1 class="text-3xl font-extrabold mb-8 text-center text-indigo-700 tracking-tight">Latest Blog Posts</h1>

    @if($posts->count())
    <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($posts as $post)
        <div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition duration-300 border border-gray-200">
            @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-36 object-cover">
            @endif
            <div class="p-4">
                <h2 class="text-lg font-semibold mb-2 text-indigo-800">{{ $post->title }}</h2>
                <p class="text-gray-600 text-sm mb-3">{{ Str::limit($post->description, 80) }}</p>
               <a href="{{ route('blog.show', $post->id) }}"
   class="inline-flex items-center gap-1 text-sm font-semibold text-indigo-600 hover:text-indigo-800 transition duration-200 hover:underline">
   Read More
   <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
     <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
   </svg>
</a>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-10 flex justify-center">
        {{ $posts->links('pagination::tailwind') }}
    </div>
    @else
    <p class="text-center text-gray-500 text-lg mt-12">No blog posts found.</p>
    @endif
</div>

</body>
</html>
