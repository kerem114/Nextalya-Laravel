<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Ana sayfa
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
})->name('home');

// Auth routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Password reset routes
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Placeholder routes - bunlar daha sonra implement edilecek
    Route::get('/discover', function () {
        return view('discover.index');
    })->name('discover');
    
    Route::get('/profile', function () {
        return view('profile.index');
    })->name('profile');
    
    Route::get('/settings', function () {
        return view('settings.index');
    })->name('settings');
    
    Route::get('/saved', function () {
        return view('saved.index');
    })->name('saved');
    
    Route::get('/collections', function () {
        return view('collections.index');
    })->name('collections.index');
    
    Route::get('/search', function () {
        return view('search.index');
    })->name('search');
    
    Route::get('/post/create', function () {
        return view('post.create');
    })->name('post.create');
    
    Route::get('/products/create', function () {
        return view('products.create');
    })->name('products.create');
    
    Route::get('/poll/create', function () {
        return view('poll.create');
    })->name('poll.create');
});