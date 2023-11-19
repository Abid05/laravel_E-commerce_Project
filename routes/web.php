<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::get('/url',[Controller::class,'demo']);

Route::get('/myurl',[Controller::class,'function2'])->name('my.url');

Route::get('/myurl',[Controller::class,'function'])->name('my.url');