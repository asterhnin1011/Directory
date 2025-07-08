@extends('layouts.app')

@section('title', 'Login')

@section('content')
<section class="d-flex align-items-center min-vh-100">
  <style>
    .form-group {
      position: relative;
      margin-bottom: 1.5rem;
    }
    .form-control {
      width: 100%;
      padding: 0.75rem 0.5rem 0.25rem 0.5rem;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 1rem;
      background: transparent;
      transition: border-color 0.3s ease;
    }
    .form-control:focus {
      border-color: #3b82f6;
      outline: none;
    }
    label {
      position: absolute;
      left: 0.5rem;
      top: 0.9rem;
      color: #666;
      font-size: 1rem;
      pointer-events: none;
      transition: 0.2s ease all;
      background: white;
      padding: 0 0.25rem;
    }
    .form-control:focus + label,
    .form-control:not(:placeholder-shown) + label {
      top: 0.2rem;
      left: 0.5rem;
      font-size: 0.75rem;
      color: #3b82f6;
    }
    .btn-gradient {
      background: linear-gradient(45deg, #4f46e5, #3b82f6);
      border: none;
      color: white;
      font-weight: 600;
      padding: 0.75rem 1.5rem;
      border-radius: 0.5rem;
      width: 100%;
      transition: background 0.3s ease;
    }
    .btn-gradient:hover {
      background: linear-gradient(45deg, #4338ca, #2563eb);
      color: white;
    }
  </style>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="card p-4 shadow-sm">
          <h2 class="text-center mb-4 fw-bold">Login</h2>

          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
              <input type="email" name="email" id="email" class="form-control" placeholder=" " required autofocus />
              <label for="email">Email address</label>
            </div>

            <div class="form-group">
              <input type="password" name="password" id="password" class="form-control" placeholder=" " required />
              <label for="password">Password</label>
            </div>

            @if ($errors->any())
              <div class="alert alert-danger">
                {{ $errors->first() }}
              </div>
            @endif
  <!-- email, password fields -->
  <button type="submit" class="btn-primary">Login</button>


            <p class="text-center mb-2">
              Don't have an account?
              <a href="{{ route('register') }}" class="text-primary fw-semibold">Register</a>
            </p>

            @if (Route::has('password.request'))
              <p class="text-center">
                <a href="{{ route('password.request') }}">Forgot your password?</a>
              </p>
            @endif
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
