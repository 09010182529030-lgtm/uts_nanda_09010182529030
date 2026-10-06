<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return redirect()->route('books.index');
    })->name('dashboard');

    Route::resource('books', BookController::class);

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});