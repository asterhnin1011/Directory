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
<body class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 min-h-screen flex flex-col">

  <!-- Floating Navbar -->
  <nav class="bg-white dark:bg-gray-800 bg-opacity-90 backdrop-blur-md sticky top-0 shadow z-50">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <a href="{{ route('blog.index') }}" class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">My Blog</a>
      <div class="space-x-4 flex items-center">
        <a href="{{ route('blog.index') }}" class="text-gray-700 dark:text-gray-200 hover:text-indigo-600 transition">Home</a>

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
  <main class="container mx-auto px-4 sm:px-8 py-10 flex-grow">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md p-6 sm:p-10 max-w-3xl mx-auto">
      <h1 class="text-2xl sm:text-3xl font-bold text-indigo-600 dark:text-indigo-400 mb-6">Edit Post</h1>

      <form action="{{ route('blog.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="mb-6">
          <label for="title" class="block font-semibold mb-2">Title</label>
          <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
                 class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:outline-none focus:ring focus:ring-indigo-400 dark:bg-gray-900">
          @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Body -->
        <div class="mb-6">
          <label for="description" class="block font-semibold mb-2">description</label>
          <textarea name="description" id="description" rows="6"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:outline-none focus:ring focus:ring-indigo-400 dark:bg-gray-900">{{ old('description', $post->description) }}</textarea>
          @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Image Upload -->
        <div class="mb-6">
          <label for="image" class="block font-semibold mb-2">Change Image</label>
          <input type="file" name="image" id="image" accept="image/*"
                 class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900"
                 onchange="previewImage(event)">
          @error('image')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror

          @if ($post->image)
            <p class="text-sm mt-2">Current Image:</p>
            <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image"
                 class="mt-2 w-40 h-auto rounded shadow border border-gray-300 dark:border-gray-600">
          @endif

          <img id="imagePreview" src="#" alt="New Image Preview"
               class="mt-4 w-40 h-auto hidden rounded-md shadow dark:border-gray-600" />
        </div>

        <!-- Submit -->
        <div class="flex justify-between items-center">
          <a href="{{ route('blog.index') }}"
             class="text-sm text-gray-600 hover:text-indigo-600 dark:hover:text-indigo-400 underline">← Back to Posts</a>
          <button type="submit"
                  class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700 transition">Update Post</button>
        </div>
      </form>
    </div>
  </main>

</body>
</html>
