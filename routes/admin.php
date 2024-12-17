<?php

use Illuminate\Support\Facades\Route;

// Admin Auth Controllers
use App\Http\Controllers\Admin\Auth\Auth;

// Admin Dashboard Controller
use App\Http\Controllers\Admin\Dashboard;

// Admin Settings Controllers
use App\Http\Controllers\Admin\Settings\Business;
use App\Http\Controllers\Admin\Settings\Role;
use App\Http\Controllers\Admin\Settings\User;

// Admin Music Controllers
use App\Http\Controllers\Admin\Music\Singer;
use App\Http\Controllers\Admin\Music\Song;
use App\Http\Controllers\Admin\Music\Category;
use Illuminate\Support\Facades\Auth as FacadesAuth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group that
| contains the "web" middleware group. Now create something great!
|
*/


// Guest Routes (Authentication)
Route::middleware('guest')->group(function () {
    // Login Routes
    Route::get('login', [Auth::class, 'login'])->name('login');
    Route::post('login', [Auth::class, 'loginPost'])->name('login');

    Route::get('/', function () {
        return view('admin.pages.auth.login');
    });
});

// Authenticated Routes
Route::middleware('auth:web')->group(function () {

    // Dashboard Route
    Route::get('dashboard', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('logout', [Auth::class, 'logout'])->name('logout');
    Route::get('profile', [Auth::class, 'profile'])->name('profile');
    Route::Post('profile', [Auth::class, 'profileUpdate'])->name('profile');
    Route::Post('changepassword', [Auth::class, 'changePassword'])->name('changepassword');

    /*
    |--------------------------------------------------------------------------
    | Music Module Routes
    |--------------------------------------------------------------------------
    */
    Route::name('music.')->group(function () {
        // Song Routes
        Route::resource('song', Song::class);

        // Singer Routes
        Route::resource('singer', Singer::class)->except(['edit', 'show', 'create']);

        // Category Routes
        Route::resource('category', Category::class)->except('show', 'create', 'edit');
    });

    /*
    |--------------------------------------------------------------------------
    | Settings Module Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware('access')->prefix('settings')->group(function () {
        // User Management
        Route::resource('user', User::class)->except(['edit', 'show', 'create']);

        // Role Management
        Route::resource('role', Role::class)->except(['edit', 'show', 'create']);

        // Business Settings
        Route::name('settings.')->group(function () {
            Route::resource('business', Business::class)->only(['update', 'index']);
        });
    });
});
