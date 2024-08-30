<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Homepage Route
Route::get('/', [HomeController::class, 'show_post'])->name('home');

// Middleware group to handle authentication and verification
Route::middleware(['auth', 'verified'])->group(function () {
    // Post Routes
    Route::get('/post', [PostController::class, 'index'])->name('post_index');
    Route::put('/post/edit/{id}', [PostController::class,'update'])->name('post_update');
    Route::resource('posts', PostController::class);

    // Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'show_posts'])->name('dashboard');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
