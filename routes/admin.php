<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfileAdminController;

    Route::get('/dashboard', function () {
        return view('admin.index');
    });
    
    Route::get('/profileAdmin', [ProfileAdminController::class, 'index']);
    Route::post('/saveProfile', [ProfileAdminController::class, 'store']);