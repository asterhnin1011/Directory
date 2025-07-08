<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // This method is called after a user is authenticated
    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 1) {
            return redirect('/admin'); // Redirect to admin home page
        }

        return redirect('/'); // or any user dashboard
    }
    //show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }
    //Hidden request login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('/admin'); // Redirect to intended page or home
        }

        // Authentication failed
        return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }
    //logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login'); // Redirect to home after logout
    }

}