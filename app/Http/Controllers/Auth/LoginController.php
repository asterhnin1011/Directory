<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    // use AuthenticatesUsers;

    // /**
    //  * Where to redirect users after login.
    //  *
    //  * @var string
    //  */
    // protected $redirectTo = '/blog/index';

    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    // This method is called after a user is authenticated
    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 1) {

            return redirect('/admin'); // Redirect to admin home page
        }

         return redirect()->route('blog.index');  // or any user dashboard
    }
    //show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }
    //Hidden request login
    public function login(Request $request)
    {
        // dd('sd');
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
