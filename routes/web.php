<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Front\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;


Auth::routes();

Route::get('/login',function(){
    return redirect()->to('/');
})->name('login');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/customer/logout', [HomeController::class, 'logout'])->name('customer.logout');
//Frontend routes

    Route::get('/',[IndexController::class,'index']);
    Route::get('/product-details/{slug}',[IndexController::class,'productDetails'])->name('product.details');
