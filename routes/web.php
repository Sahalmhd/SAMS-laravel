<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and assigned to the
| "web" middleware group. Now create something great!
|
*/

// Default welcome page route
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup.form');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard routes
Route::middleware(['authCheck'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');
    });

    Route::prefix('hod')->name('hod.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'hod'])->name('dashboard');
    });

    Route::prefix('student')->name('incharge.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'incharge'])->name('dashboard');
    });
});


