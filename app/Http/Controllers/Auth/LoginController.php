<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
    $credentials = $request->only('email', 'password');

    $user = \App\Models\User::where('email', $credentials['email'])->first();

    if (!$user) {
        return redirect()->back()
            ->withErrors(['email' => 'Invalid credentials'])
            ->withInput();
    }

    if (!Hash::check($credentials['password'], $user->password)) {
        return redirect()->back()
            ->withErrors(['email' => 'Invalid credentials'])
            ->withInput();
    }

    if (!$user->hasVerifiedEmail()) {
        return redirect()->back()
            ->with('error', 'Your email address is not verified. Please check your inbox.')
            ->withInput();
    }


    Auth::login($user);

    return redirect()->intended('/admin');
}
    //logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login'); // Redirect to home after logout
    }

}
