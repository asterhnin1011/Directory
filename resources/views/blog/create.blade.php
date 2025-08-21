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
    <nav class="sticky top-0 z-50 bg-white shadow-md bg-opacity-80 backdrop-blur-md">
      <div class="container flex items-center justify-between px-4 py-4 mx-auto">
        <a href="{{ route('blog.index') }}" class="text-2xl font-bold text-indigo-600">My Blog</a>

        <div class="flex items-center space-x-4">


          @auth
            <a href="{{ route('blog.create') }}" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white transition bg-indigo-600 rounded-md shadow hover:bg-indigo-700">
              <!-- Plus Icon -->
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg>
              Create Post
            </a>

            <span class="inline-flex items-center gap-1 text-sm text-gray-600 font-medium bg-gray-100 px-3 py-1.5 rounded-full">
              <!-- User Icon -->
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9.978 9.978 0 0112 15c2.21 0 4.243.714 5.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              Welcome, {{ Auth::user()->name }}
            </span>

            <form method="POST" action="{{ route('logout') }}" class="inline">
              @csrf
              <button type="submit" class="inline-flex items-center gap-1 text-sm font-medium text-gray-700 bg-gray-100 px-3 py-1.5 rounded-md hover:bg-red-100 hover:text-red-600 transition">
                <!-- Logout Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 11-4 0v-1m4-8V7a2 2 0 00-4 0v1" />
                </svg>
                Logout
              </button>
            </form>
          @else
            <a href="{{ route('login') }}" class="text-gray-700 transition hover:text-indigo-600">Login</a>
            <a href="{{ route('register') }}" class="px-4 py-2 text-white transition bg-indigo-600 rounded-md hover:bg-indigo-700">Register</a>
          @endauth
        </div>
      </div>
    </nav>

    <!-- Main Content: Form -->
    <main class="flex items-center justify-center flex-grow px-4 py-8">
        <div class="w-full max-w-2xl p-8 bg-white rounded-lg shadow-lg">
            <h2 class="mb-6 text-2xl font-bold text-center">Create New Blog Post</h2>

            @if ($errors->any())
                <div class="p-4 mb-4 text-red-700 bg-red-100 rounded">
                    <ul class="pl-5 list-disc">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
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
