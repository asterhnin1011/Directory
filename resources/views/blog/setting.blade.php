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
<div class="max-w-2xl mx-auto py-10 px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-900 shadow rounded-lg">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Account Settings</h2>

    <!-- Change Username -->
    <form method="POST" action="{{ route('settings.update.username') }}" class="mb-8 space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300">New Username</label>
            <input type="text" name="username" id="username" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">Update Username</button>
    </form>

    <!-- Change Password -->
    <form method="POST" action="{{ route('settings.update.password') }}" class="mb-8 space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="current_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Current Password</label>
            <input type="password" name="current_password" id="current_password" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        <div>
            <label for="new_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">New Password</label>
            <input type="password" name="new_password" id="new_password" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        <div>
            <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm New Password</label>
            <input type="password" name="new_password_confirmation" id="new_password_confirmation" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">Update Password</button>
    </form>

    <!-- Gmail OTP Verification -->
    <form method="POST" action="{{ route('settings.verify.otp') }}" class="space-y-4">
        @csrf
        <div>
            <label for="otp" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Enter Gmail OTP Code</label>
            <input type="text" name="otp" id="otp" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        <button type="submit"
                class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">Verify OTP</button>
    </form>

    <!-- Optional: Resend OTP -->
    <form method="POST" action="{{ route('settings.send.otp') }}" class="mt-4">
        @csrf
        <button type="submit"
                class="text-sm text-indigo-600 hover:underline">Resend OTP to Gmail</button>
    </form>
</div>

</body>
</html>
