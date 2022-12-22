<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;




Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');

    Route::post('login-user', [AuthController::class, 'loginUser'])->name('login.user');
    Route::post('register-user', [AuthController::class, 'registerUser'])->name('registration.user');
});

