<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authLogin\authLoginController;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('admin/index');
// });

Route::get('/login', function () {
    return view('auth/signIn');
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::post('/login_user', [authLoginController::class, 'loginUser']);
base_path('routes/admin.php');