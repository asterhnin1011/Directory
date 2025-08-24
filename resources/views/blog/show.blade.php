<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="UTF-8">
  <title>View Blog Post</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
 <!-- Favicons -->
   <link href="/assets/img/logo/directorylogo.png" rel="icon" type="image/png" />
</head>
<body class="text-gray-800 transition-colors duration-300 bg-gray-100 dark:bg-gray-900 dark:text-gray-100">

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

  <!-- Main Content -->
  <main class="w-full max-w-[2000px] p-6 mx-auto">
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

      @if ($post->image)
    <div class="w-full px-4 py-6 sm:px-8">
        <img
            src="{{ asset('storage/' . $post->image) }}"
            alt="Post Image"
            class="w-full max-w-xl max-h-[350px] mx-auto rounded-3xl object-cover shadow-md border border-gray-300 dark:border-gray-600 brightness-95 hover:brightness-100 transition duration-300 ease-in-out"
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
        <a href="{{ route('blog.index') }}"
   class="flex items-center gap-2 px-5 py-2 text-white transition-colors duration-200 bg-indigo-600 rounded-full hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
   <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
   </svg>
   Back
</a>

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
       <!-- Comment Section -->
<div class="px-6 pb-8 mt-10 border-t border-gray-200 sm:px-8 dark:border-gray-600">
  <h2 class="mb-4 text-2xl font-semibold text-gray-800 dark:text-white">Comments</h2>

  {{-- Comment Form --}}
  @auth
    <form action="{{ route('comments.store', ['post' => $post->id]) }}" method="POST" class="mb-8 space-y-4">
  @csrf

  <input type="hidden" name="post_id" value="{{ $post->id }}">

  <div>
    <label for="content" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Write your comment</label>
    <textarea
      name="content"
      id="content"
      rows="4"
      required
      class="w-full p-3 text-sm text-gray-800 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none dark:bg-gray-800 dark:border-gray-700 dark:text-gray-100"
      placeholder="Enter your thoughts here..."></textarea>
  </div>

  <div>
    <button
      type="submit"
      class="px-6 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
      Post Comment
    </button>
  </div>
</form>

  @else
    <div class="p-4 mb-6 text-yellow-800 bg-yellow-100 border-l-4 border-yellow-400 rounded-lg dark:bg-yellow-200 dark:text-yellow-900">
      Please <a href="{{ route('login') }}" class="font-semibold text-indigo-600 underline hover:text-indigo-800">login</a> to comment.
    </div>
  @endauth

  {{-- Comment List --}}
  @if($post->comments->count())
    <div class="space-y-6">
     @foreach($post->comments->sortByDesc('created_at') as $comment)
  <div class="relative p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center justify-between mb-2">
      <div class="text-sm font-semibold text-indigo-700 dark:text-indigo-300">
        {{ $comment->user->name ?? 'Anonymous' }}
      </div>
      <div class="text-xs text-gray-500 dark:text-gray-400">
        {{ $comment->created_at->diffForHumans() }}
      </div>
    </div>

    <p class="text-sm text-gray-800 whitespace-pre-line dark:text-gray-100">
      {{ $comment->content }}
    </p>
{{-- Delete Button: show if user is owner or admin --}}

    @auth
  @if(auth()->user()->admin == 1 || auth()->id() === $comment->user_id)
    <form method="POST" action="{{ route('comments.destroy', $comment->id) }}" class="mt-2">
      @csrf
      @method('DELETE')
      <button type="submit" onclick="return confirm('Are you sure you want to delete this comment?')" class="text-red-600 hover:underline">
        Delete
      </button>
    </form>
  @endif
@endauth

  </div>
@endforeach
    </div>
  @else
    <p class="text-sm text-gray-600 dark:text-gray-400">No comments yet. Be the first to comment!</p>
  @endif
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session('success') }}',
        confirmButtonColor: '#6366f1',
      });
    });
  </script>
@endif
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

<script>
document.querySelectorAll('.delete-btn').forEach(button => {
  button.addEventListener('click', function () {
    const form = this.closest('form');
    const commentId = form.getAttribute('data-comment-id');

    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        // Send AJAX DELETE request
        fetch(form.action, {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value,
            'X-Requested-With': 'XMLHttpRequest',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            _method: 'DELETE'
          })
        })
        .then(res => {
          if (!res.ok) throw res;
          return res.json();
        })
        .then(data => {
          console.log(data); // ✅ Debug log

          Swal.fire(
            'Deleted!',
            data.message,
            'success'
          );

          // Remove the comment block
          form.closest('div.p-4').remove();
        })
        .catch(async (err) => {
          let message = 'Something went wrong.';

          try {
            const errorData = await err.json();
            message = errorData.message || message;
          } catch (_) {
            // if not JSON, fallback to default
          }

          Swal.fire('Error!', message, 'error');
          console.error('Delete failed:', err);
        });
      }
    });
  });
});
</script>


</body>
</html>
