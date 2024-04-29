<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//User Login and Register
Route::get('login-register', [UserController::class, 'create'])->name('login');
Route::post('register', [UserController::class, 'store'])->name('user-register');