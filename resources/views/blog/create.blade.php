<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Create Blog Post</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="flex flex-col min-h-screen bg-gray-100">

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

    <!-- Main Content: Form -->
   <main class="w-full max-w-full p-8 mt-20 bg-white rounded-lg shadow-lg">
    {{-- <main class="flex items-center justify-center flex-grow px-2 py-8"> --}}
        {{-- <div class="w-full max-w-4xl p-8 bg-white rounded-lg shadow-lg"> --}}
            <h2 class="mb-6 text-2xl font-bold text-center text-blue-600">Create New Blog Post</h2>

            @if ($errors->any())
                <div class="p-4 mb-4 text-red-700 bg-red-100 rounded">
                    <ul class="pl-5 list-disc">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="mb-4">
                    <label for="title" class="block mb-2 font-semibold text-gray-700">Title</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        value="{{ old('title') }}"
                        required
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200"
                    />
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="block mb-2 font-semibold text-gray-700">Description</label>
                    <textarea
                        name="description"
                        id="description"
                        rows="5"
                        required
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200"
                    >{{ old('description') }}</textarea>
                </div>

                <!-- Image input -->
                <div class="mb-6">
                    <label for="image" class="block mb-2 font-semibold text-gray-700">Upload Image</label>
                    <input
                        type="file"
                        name="image"
                        id="image"
                        accept=".jpg,.jpeg,.png,.gif"
                        class="w-full px-3 py-2 border rounded-md"
                        onchange="previewImage(event)"
                    />
                    @error('image')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror

                    <!-- Image preview -->
                    <img
                        id="imagePreview"
                        src="#"
                        alt="Image Preview"
                        class="hidden w-40 h-auto mt-4 rounded-md shadow"
                    />
                </div>

                <div class="flex items-center justify-between">
                    <!-- Back Button -->
                    <a
                        href="{{ route('blog.index') }}"
                        class="px-6 py-2 text-white transition bg-blue-600 rounded-md hover:bg-blue-700"
                    >
                        Back
                    </a>

                    <!-- Reset Button -->
                    <button
                        type="reset"
                        class="px-6 py-2 text-white transition bg-yellow-500 rounded-md hover:bg-yellow-600"
                    >
                        Reset
                    </button>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="px-6 py-2 text-white transition bg-blue-600 rounded-md hover:bg-blue-700"
                    >
                        Publish
                    </button>
                </div>
            </form>
        </div>
    </main>
    <!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
  document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
      icon: 'success',
      title: 'Success!',
      text: '{{ session('success') }}',
      confirmButtonColor: '#4f46e5',
      confirmButtonText: 'OK'
    });
  });
</script>
@endif

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.classList.add('hidden');
        }
    }
</script>

</body>
</html>
