<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    // Show the register form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Handle the registration form submission
   public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => [
            'required',
            'string',
            'min:8',
            'regex:/[a-z]/',      // at least one letter
            'regex:/[0-9]/',      // at least one number
            'regex:/[@$!%*#?&]/', // at least one special character
            'confirmed'],
        'address' => 'required|string|max:255',
        'phone' => 'required|string|min:11|max:14',
        'country' => 'required|string|max:100',
        'date_of_birth' => 'required|date|before:today',
    ],
    [
        'password.regex' => 'Password must contain at least one letter, one number, and one special character.'
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'address'  => $request->address,
        'phone'    => $request->phone,
        'country'  => $request->country,
        'date_of_birth' => $request->date_of_birth,
    ]);

    event(new Registered($user));

    Auth::login($user);

    // Flash success message
    Session::flash('success', 'Registration successful!');

    return redirect()->route('verification.notice');
}
}
