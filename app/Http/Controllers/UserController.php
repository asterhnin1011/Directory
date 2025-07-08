<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // Optional: Restrict only admin access
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized access');
        }
        // return redirect('/admin');
        return view('admin.home'); // Render the admin index view
         // Blade file: resources/views/admin/index.blade.php
    }
}