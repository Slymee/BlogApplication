<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin-dashboard', function () {
    return view('superadmin.admin-dashboard');
});