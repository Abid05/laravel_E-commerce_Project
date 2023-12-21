<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\ReviewController;
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

    //review for product
    Route::post('/store/review',[ReviewController::class,'store'])->name('store.review');
    Route::get('/add/wishlist/{id}',[ReviewController::class,'addWishlist'])->name('add.wishlist');
