<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Poi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Optional: Restrict only admin access
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized access');
        }
        // return redirect('/admin');
        // return view('admin.home'); // Render the admin index view
         // Blade file: resources/views/admin/index.blade.php


        $users = User::latest()->paginate(10);
        $pois = Poi::all(); // Optional: only needed if your layout/view uses it

        return view('admin.users.index', compact('users', 'pois'));
}
public function destroy(User $user)
{
    $user->delete();

    return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
}
public function showProfile()
    {
        $user = Auth::user(); // Currently logged-in user
        return view('admin.users.showprofile', compact('user'));
    }
    public function edit()
{
    $user = auth()->user();
    return view('admin.users.edit', compact('user'));
}

}
