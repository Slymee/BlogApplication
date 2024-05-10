<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//User Login and Register
Route::get('login-register', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('register', [UserController::class, 'store'])->name('user-register')->middleware('guest');

Route::post('login', [LoginController::class, 'login'])->name('user-login');

//User Application Routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('home');
    Route::get('random-route', [UserController::class,'random'])->name('random');
});