<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoiController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\CommentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes(['verify' => true]);
Route::get('/', function () {
    return view('pages.index');
});
// admin create,edit,delete,store,update
// Route::get('/admin', [UserController::class, 'index'])
//     ->name('admin.home')
//     ->middleware('auth');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.home')->middleware('auth');
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
    // Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('/', AdminController::class)
        ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
        ->names('admin');
    // Route::get('/dataTable', [AdminController::class, 'dataTable'])->name('admin.dataTable');
    Route::delete('/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
Route::get('/admin/{id}/edit', [PlaceController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{id}', [PlaceController::class, 'update'])->name('admin.update');
    Route::post('/import', [AdminController::class, 'import'])->name('admin.import');
    // Route::post('/testing', [AdminController::class, 'testing'])->name('admin.test');
});


// Route::get('/admin.users',[UserController::class, 'users'])->name('admin.users')->middleware('auth');
Route::get('/create-poi', [PoiController::class, 'store']);
Route::get('/search', [PlaceController::class, 'search'])->name('places.search');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if (!$user->hasVerifiedEmail()) {
            Auth::logout();
            return back()->with('error', 'Your email address is not verified.');
        }

        if ($user->role === 1) {
            return redirect('/admin');
        }
        return redirect()->route('blog.index');
    }

    return back()->with('error', 'Invalid credentials.');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Show register form
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Handle form submit
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/auth/redirect/{provider}', [SocialController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/callback/{provider}', [SocialController::class, 'callback'])->name('social.callback');
Route::get('/places/{id}', [PlaceController::class, 'details']);
Route::get('/about', function () {
    return view('pages.about'); // Make sure your file is at resources/views/about.blade.php
})->name('about');
Route::get('/places/{id}', [PlaceController::class, 'show'])->name('places.details');
// Guest users can see blog
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
});
Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
Route::put('/blog/{id}', [BlogController::class, 'update'])->name('blog.update');
Route::delete('/blog/{post}', [BlogController::class, 'destroy'])->name('blog.destroy')->middleware('auth');
Route::delete('/blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
// Route::get('auth/google', [GoogleController::class, 'redirect'])->name('google.redirect');
// Route::get('auth/google/callback', [GoogleController::class, 'callback']);

// Show email verification notice
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Handle the verification link click
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    // Redirect based on user role
    if (auth()->user()->isAdmin()) {
        return redirect('/admin');
    } else {
        return redirect('/blog'); // or any user dashboard
    }
})->middleware(['auth', 'signed'])->name('verification.verify');

// Resend the verification email
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
// Route::get('/blog', function () {
//     return view('blog.index');
// })->middleware(['auth', 'verified'])->name('blog.index');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['signed'])->name('verification.verify');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
     Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
      Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

Route::middleware(['auth','admin'])->group(function(){
    Route::get('/admin/blogs', [BlogController::class, 'index'])->name('admin.blogs.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/users/showprofile', [UserController::class, 'showProfile'])->name('users.showprofile');
});

Route::get('/myposts', [BlogController::class, 'postListing'])->name('myposts.postlisting');

Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy')->middleware('auth');

Route::get('/admin/comments', [CommentController::class, 'index'])->name('admin.users.viewcomment');
Route::delete('/admin/comments/{comment}', [CommentController::class, 'destroy'])->name('admin.comments.destroy')->middleware('auth');


