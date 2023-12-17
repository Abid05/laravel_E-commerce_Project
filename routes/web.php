<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Front\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Frontend routes

    Route::get('/',[IndexController::class,'index']);
    Route::get('/product-details/{slug}',[IndexController::class,'productDetails'])->name('product.details');
