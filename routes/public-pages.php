<?php

use App\Http\Controllers\PublicSite\PublicAuthController;
use App\Http\Controllers\PublicSite\PublicPageController;
use Illuminate\Support\Facades\Route;

// Halaman beranda dapat diakses siapa pun, tanpa login.
Route::get('/', [PublicPageController::class, 'home'])->name('public.home');

// Form login dan register hanya ditampilkan untuk pengguna yang belum login.
Route::middleware('guest')->group(function (): void {
    Route::get('/login', [PublicPageController::class, 'login'])->name('public.login');
    Route::post('/login', [PublicAuthController::class, 'login'])
        ->middleware('throttle:6,1')
        ->name('public.login.submit');

    Route::get('/register', [PublicPageController::class, 'register'])->name('public.register');
    Route::post('/register', [PublicAuthController::class, 'register'])
        ->middleware('throttle:5,1')
        ->name('public.register.submit');
});

Route::post('/logout', [PublicAuthController::class, 'logout'])
    ->middleware('auth')
    ->name('public.logout');
