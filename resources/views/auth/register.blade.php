@extends('layouts.app')

@section('title', 'Register')

@section('content')
<section class="min-vh-100 d-flex align-items-center justify-content-center bg-light">

  <div class="container px-3">
    <div class="row justify-content-center">
      <div class="col-lg-5">
<br><br><br><br><br><br>
        <div class="card border-0 shadow rounded-4 p-4 glass-effect">

          <div class="card-body" style="height: 500px;">

            <h2 class="text-center mb-3">Create Your Account</h2>

            <form method="POST" action="{{ route('register') }}">
              @csrf

              <!-- Username -->
         <div class="mb-3">
  <label for="name" class="block text-sm font-medium text-gray-700">Username</label>
  <input type="text" id="name" name="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="{{ old('name') }}" required>
  @error('name')
    <small class="text-red-500 text-sm">{{ $message }}</small>
  @enderror
</div>
              <!-- Email -->
              <div class=" mb-3">
                <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full rounded-md boorder-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue=500 sm:text-sm" value="{{ old('email') }}" required>
                @error('email')
                  <small class="text-red-500 text-sm">{{ $message }}</small>
                @enderror
              </div>

              <!-- Password -->
              <div class="mb-3">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
           <input type="password" id="password" name="password" class="mt-1 block w-full rounded-md boorder-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue=500 sm:text-sm" value="{{ old('password') }}" required>
           <span
    class="absolute inset-y-0 right-3 flex items-center text-sm text-blue-600 cursor-pointer select-none"
    onclick="togglePassword()"
    id="togglePassword">
    Show
  </span>
                @error('password')
                  <small class="text-red-500 text-sm">{{ $message }}</small>
                @enderror

              </div>

              <!-- Confirm Password -->
             <div class="mb-3 relative">
  <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>

  <input
    type="password"
    id="password_confirmation"
    name="password_confirmation"
    class="mt-1 block w-full pr-16 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
    required
  >

  <span
    class="absolute inset-y-0 right-3 flex items-center text-sm text-blue-600 cursor-pointer select-none"
    onclick="togglePassword2()"
    id="togglePassword2"
  >
    Show
  </span>

  @error('password_confirmation')
    <small class="text-red-500 text-sm">{{ $message }}</small>
  @enderror
</div>

              <!-- Register Button -->
              <button type="submit" class="btn-primary w-100 mb-3">Register</button>

              <!-- Social Logins -->
              <div class="text-center mb-3">
  <p class="mb-2 text-muted">Or register with</p>
  <div class="d-grid gap-2">
    <a href="" class="btn btn-outline-danger d-flex align-items-center justify-content-center gap-2">
      <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" alt="Google" width="20" height="20">
      Register with Google
    </a>

    <a href="" class="btn btn-outline-primary d-flex align-items-center justify-content-center gap-2">
      <img src="https://upload.wikimedia.org/wikipedia/commons/0/05/Facebook_Logo_%282019%29.png" alt="Facebook" width="20" height="20">
      Register with Facebook
    </a>
  </div>
</div>

              <!-- Login link -->
              <p class="text-center mt-3">
                Already have an account?
                <a href="{{ route('login') }}" class="text-danger">Login here</a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Show/Hide Password -->
<script>
  function togglePassword() {
    const input = document.getElementById("password");
    const toggle = document.getElementById("togglePassword");
    const isPassword = input.type === "password";

    input.type = isPassword ? "text" : "password";
    toggle.textContent = isPassword ? "Hide" : "Show";
  }
    function togglePassword2() {
    const input = document.getElementById("password_confirmation");
    const toggle = document.getElementById("togglePassword2");
    const isHidden = input.type === "password";

    input.type = isHidden ? "text" : "password";
    toggle.textContent = isHidden ? "Hide" : "Show";
  }
</script>

<!-- CSS Styling -->
<style>
    .btn img {
    border-radius: 50%;
  }

  .btn:hover img {
    opacity: 0.9;
  }
  .form-group {
    position: relative;
  }

  .form-group input {
    padding: 1.2rem 0.75rem 0.4rem;
  }

  .form-group label {
    position: absolute;
    top: 1.1rem;
    left: 0.75rem;
    font-size: 1rem;
    color: #777;
    background: white;
    padding: 0 0.25rem;
    transition: 0.2s ease;
    pointer-events: none;
  }

  .form-group input:focus + label,
  .form-group input:not(:placeholder-shown) + label {
    top: 0.4rem;
    font-size: 0.8rem;
    color: #007bff;
  }

  .toggle-password {
    position: absolute;
    right: 1rem;
    top: 1.1rem;
    font-size: 0.9rem;
    color: #007bff;
    cursor: pointer;
    user-select: none;
  }

  .glass-effect {
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(10px);
  }

  @media (max-width: 576px) {
    .form-group input {
      padding: 1rem 0.75rem 0.4rem;
    }
     .form-control {
    padding: 1.5rem 0.75rem 0.5rem;
    font-size: 1rem;
  }
</style>
@endsection
