<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//User Login and Register
Route::get('login-register', [UserController::class, 'create'])->name('login')->middleware('guest');
Route::post('register', [UserController::class, 'store'])->name('user-register')->middleware('guest');

Route::post('login', [LoginController::class, 'login'])->name('user-login');

//User Application Routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/', [LoginController::class, ''])->name('home');
});