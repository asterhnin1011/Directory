<aside :class="{ 'block': sidebarOpen, 'hidden': !sidebarOpen }"
       class="fixed top-15 left-0 h-full w-56 p-6 border border-indigo-100 shadow-lg bg-gradient-to-br from-indigo-50 to-white rounded-r-xl lg:block z-50 overflow-y-auto">

    <!-- Sidebar Header -->
    <h2 class="flex items-center gap-2 mb-4 text-xl font-bold text-indigo-700">
        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0h4" />
        </svg>
        Dashboard
    </h2>

    <!-- Sidebar Navigation -->
    <ul class="space-y-3 text-sm">
        <li>
            <a href="{{ route('blog.index') }}"
               class="flex items-center gap-2 px-3 py-2 text-indigo-700 transition rounded-lg hover:text-white hover:bg-indigo-600">
                📚 <span>All Posts</span>
            </a>
        </li>
        <li>
    <a href="{{ route('blog.create') }}"
       class="flex items-center gap-2 px-3 py-2 text-indigo-700 transition rounded-lg hover:text-white hover:bg-indigo-600">
        ➕ <span>Create Post</span>
    </a>
</li>
        <li>
            <a href="{{ route('users.showprofile') }}"
               class="flex items-center gap-2 px-3 py-2 text-indigo-700 transition rounded-lg hover:text-white hover:bg-indigo-600">
                👤 <span>Profile</span>
            </a>
        </li>
        @auth
<li>
    <a href="{{ route('users.edit', auth()->user()->id) }}"
       class="flex items-center gap-2 px-3 py-2 text-indigo-700 transition rounded-lg hover:text-white hover:bg-indigo-600">
        ✏️ <span>Update Profile</span>
    </a>
</li>
@endauth

@guest
<li>
    <a href="{{ route('login') }}"
       class="flex items-center gap-2 px-3 py-2 text-gray-600 transition rounded-lg hover:text-white hover:bg-gray-600">
        🔐 <span>Login to Update Profile</span>
    </a>
</li>
@endguest
        <li>
            <a href="{{ route('myposts.postlisting') }}"
   class="flex items-center gap-2 px-3 py-2 text-indigo-700 transition rounded-lg hover:text-white hover:bg-indigo-600">
    📄 <span>My Blog Posts</span>
</a>
        </li>
    </ul>
</aside>
