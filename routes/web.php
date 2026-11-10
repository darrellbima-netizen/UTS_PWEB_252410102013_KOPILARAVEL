
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Halaman Login
Route::get('/', [PageController::class, 'login'])
    ->name('login');

// Proses Login
Route::post('/login', [PageController::class, 'loginProcess'])
    ->name('login.process');

// Dashboard
Route::get('/dashboard', [PageController::class, 'dashboard'])
    ->name('dashboard');

// Pengelolaan
Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])
    ->name('pengelolaan');

// Profile
Route::get('/profile', [PageController::class, 'profile'])
    ->name('profile');
