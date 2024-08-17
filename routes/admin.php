<?php

use Illuminate\Support\Facades\Route;

// Route::middleware('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    });
// });