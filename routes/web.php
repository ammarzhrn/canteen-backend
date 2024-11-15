<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::middleware(['auth'])->get('home', function(){
    return view('pages.dashboard');
});

Route::resource('user', UserController::class);

Route::resource('product', ProductController::class);