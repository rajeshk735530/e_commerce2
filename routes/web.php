<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authLogin\authLoginController;
// use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('admin/dashboard');
});

Route::get('/login', function () {
    return view('auth/signIn');
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::post('/login_user', [authLoginController::class, 'loginUser']);
// Route::get('/createCustomer', [AuthController::class, 'createCustomer']);
