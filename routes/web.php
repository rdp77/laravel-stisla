<?php

use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/login')->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'pages.user.profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('settings', 'pages.user.settings')
    ->middleware(['auth'])
    ->name('settings');

Route::view('credits', 'pages.extras.credits')
    ->middleware(['auth'])
    ->name('credits');

require __DIR__.'/auth.php';
