<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HodController;
use App\Http\Controllers\InchargeController;
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


// Authentication routes
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup.form');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard routes
Route::middleware(['authCheck'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'admin'])->name('dashboard');
    });

    Route::prefix('hod')->name('hod.')->group(function () {
        Route::get('/dashboard', [HodController::class, 'hod'])->name('dashboard');
    });

    Route::prefix('student')->name('incharge.')->group(function () {
        Route::get('/dashboard', [InchargeController::class, 'incharge'])->name('dashboard');
    });
});



route::get('/adduser',[adminController::class,'showadduser'])->name('showadduser');    

Route::post('/add-user', [AdminController::class, 'add_user'])->name('add.user');

Route::get('/show-user', [AdminController::class, 'show_allusers'])->name('show.user');




