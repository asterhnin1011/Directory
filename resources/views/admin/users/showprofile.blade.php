@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-10">
    <div class="bg-white shadow-lg rounded-lg p-8 border border-gray-200">
        <h2 class="text-2xl font-bold text-indigo-700 mb-6 text-center">User Profile</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Username -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Username</label>
                <div class="mt-1 px-4 py-2 bg-gray-100 rounded text-gray-800">{{ $user->name }}</div>
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <div class="mt-1 px-4 py-2 bg-gray-100 rounded text-gray-800">{{ $user->email }}</div>
            </div>

            <!-- Password (masked) -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <div class="mt-1 px-4 py-2 bg-gray-100 rounded text-gray-800">••••••••</div>
            </div>

            <!-- Phone -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Phone</label>
                <div class="mt-1 px-4 py-2 bg-gray-100 rounded text-gray-800">{{ $user->phone ?? 'Not provided' }}</div>
            </div>

            <!-- City -->
            <div>
                <label class="block text-sm font-medium text-gray-700">City</label>
                <div class="mt-1 px-4 py-2 bg-gray-100 rounded text-gray-800">{{ $user->city ?? 'Not provided' }}</div>
            </div>

            <!-- Date of Birth -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
                <div class="mt-1 px-4 py-2 bg-gray-100 rounded text-gray-800">
                    {{ $user->dob ? \Carbon\Carbon::parse($user->dob)->format('F j, Y') : 'Not provided' }}
                </div>
            </div>
        </div>

        <!-- Optional: Edit Button -->
        <div class="mt-8 text-center">
            <a href="{{ route('profile.edit') }}"
               class="inline-block px-6 py-2 text-white bg-indigo-600 hover:bg-indigo-700 rounded transition">
                ✏️ Edit Profile
            </a>
        </div>
    </div>
</div>
@endsection
