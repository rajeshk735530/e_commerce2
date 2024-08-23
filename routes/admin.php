<?php

use App\Http\Controllers\Admin\ProfileAdminController;
use App\Http\Controllers\Admin\HomeBannerController;
use Illuminate\Support\Facades\Route;

    Route::get('/dashboard', function () {
        return view('admin.index');
    });
    
    //Profile Section
    Route::get('/profileAdmin', [ProfileAdminController::class, 'index']);
    Route::post('/saveProfile', [ProfileAdminController::class, 'store']);
    
    //Home Banner
    Route::get('/home_banner', [HomeBannerController::class, 'index']);