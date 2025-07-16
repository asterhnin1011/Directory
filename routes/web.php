<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoiController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SocialController;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
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
    Route::post('/import', [AdminController::class, 'import'])->name('admin.import');
    // Route::post('/testing', [AdminController::class, 'testing'])->name('admin.test');
});


// Route::get('/admin.users',[UserController::class, 'users'])->name('admin.users')->middleware('auth');
Route::get('/create-poi', [PoiController::class, 'store']);
Route::get('/search', [PlaceController::class, 'search'])->name('places.search');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/auth/redirect/{provider}', [SocialController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/callback/{provider}', [SocialController::class, 'callback'])->name('social.callback');
Route::get('/places/{id}', [PlaceController::class, 'details']);
