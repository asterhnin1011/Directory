<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Post</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    function previewImage(event) {
      const image = document.getElementById('imagePreview');
      const file = event.target.files[0];
      if (file) {
        image.src = URL.createObjectURL(file);
        image.classList.remove('hidden');
      }
    }
  </script>
</head>
<body class="flex flex-col min-h-screen text-gray-800 bg-gray-50 dark:bg-gray-900 dark:text-gray-100">

  <!-- Floating Navbar -->
  <nav class="sticky top-0 z-50 bg-white shadow dark:bg-gray-800 bg-opacity-90 backdrop-blur-md">
    <div class="container flex items-center justify-between px-4 py-4 mx-auto">
      <a href="{{ route('blog.index') }}" class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">My Blog</a>
      <div class="flex items-center space-x-4">
        <a href="{{ route('blog.index') }}" class="text-gray-700 transition dark:text-gray-200 hover:text-indigo-600">Home</a>

        <span class="inline-flex items-center gap-1 text-sm text-gray-600 font-medium bg-gray-100 px-3 py-1.5 rounded-full">
    <!-- User Icon (Heroicon) -->
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9.978 9.978 0 0112 15c2.21 0 4.243.714 5.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
    </svg>
    Welcome, {{ Auth::user()->name }}
</span>
        <form method="POST" action="{{ route('logout') }}" class="inline">
          @csrf
          <button type="submit" class="text-sm text-red-500 hover:text-red-700">Logout</button>
        </form>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="container flex-grow px-4 py-10 mx-auto sm:px-8">
    <div class="max-w-3xl p-6 mx-auto bg-white shadow-md dark:bg-gray-800 rounded-2xl sm:p-10">
      <h1 class="mb-6 text-2xl font-bold text-indigo-600 sm:text-3xl dark:text-indigo-400">Edit Post</h1>

      <form action="{{ route('blog.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Title -->
    <div class="mb-6">
        <label for="title" class="block mb-2 font-semibold">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
               class="w-full px-4 py-2 border border-gray-300 rounded-md dark:border-gray-700 focus:outline-none focus:ring focus:ring-indigo-400 dark:bg-gray-900">
        @error('title')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Description -->
    <div class="mb-6">
        <label for="description" class="block mb-2 font-semibold">Description</label>
        <textarea name="description" id="description" rows="6"
                  class="w-full px-4 py-2 border border-gray-300 rounded-md dark:border-gray-700 focus:outline-none focus:ring focus:ring-indigo-400 dark:bg-gray-900">{{ old('description', $post->description) }}</textarea>
        @error('description')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Image Upload -->
    <div class="mb-6">
        <label for="image" class="block mb-2 font-semibold">Change Image</label>
        <input type="file" name="image" id="image" accept="image/*"
               class="w-full px-3 py-2 border border-gray-300 rounded-md dark:border-gray-700 dark:bg-gray-900"
               onchange="previewImage(event)">
        @error('image')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror

        @if ($post->image)
            <p class="mt-2 text-sm">Current Image:</p>
            <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image"
                 class="w-40 h-auto mt-2 border border-gray-300 rounded shadow dark:border-gray-600">
        @endif

        <img id="imagePreview" src="#" alt="New Image Preview"
             class="hidden w-40 h-auto mt-4 rounded-md shadow dark:border-gray-600" />
    </div>

    <!-- Submit -->
    <div class="flex items-center justify-between">
        <a href="{{ route('blog.index') }}"
           class="text-sm text-gray-600 underline hover:text-indigo-600 dark:hover:text-indigo-400">← Back to Posts</a>
        <button type="submit"
                class="px-6 py-2 text-white transition bg-indigo-600 rounded-md hover:bg-indigo-700">Update Post</button>
    </div>
</form>

    </div>
  </main>

</body>
</html>
