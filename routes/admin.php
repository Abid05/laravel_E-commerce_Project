<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Auth;



Route::get('/admin-login', [LoginController::class, 'adminLogin'])->name('admin.login');


Route::group(['middleware' => 'is_admin'],function(){ 

    Route::get('/admin/home',[AdminController::class,'admin'])->name('admin.home');
    Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');
    Route::get('/admin/password/change',[AdminController::class,'passwordChnage'])->name('admin.password.change');
    Route::post('/admin/password/Update',[AdminController::class,'passwordUpdate'])->name('admin.password.update');

    //category route
    Route::group(['prefix'=>'category'],function(){

        Route::get('/',[CategoryController::class,'index'])->name('category.index');
        Route::post('/store',[CategoryController::class,'store'])->name('category.store');
        Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
        Route::get('/edit/{id}',[CategoryController::class,'edit']);
        Route::post('/update',[CategoryController::class,'update'])->name('category.update');
    });

    //Subcategory route
    Route::group(['prefix'=>'subcategory'],function(){

        Route::get('/',[SubcategoryController::class,'index'])->name('subcategory.index');
        Route::post('/store',[SubcategoryController::class,'store'])->name('subcategory.store');
        Route::get('/delete/{id}',[SubcategoryController::class,'delete'])->name('subcategory.delete');
        Route::get('/edit/{id}',[SubcategoryController::class,'edit']);
        Route::post('/update',[SubcategoryController::class,'update'])->name('subcategory.update');
    });

    //Childcategory route
    Route::group(['prefix'=>'childcategory'],function(){

        Route::get('/',[ChildCategoryController::class,'index'])->name('childcategory.index');
        Route::post('/store',[ChildCategoryController::class,'store'])->name('childcategory.store');
        Route::get('/delete/{id}',[ChildcategoryController::class,'delete'])->name('childcategory.delete');
        Route::get('/edit/{id}',[ChildcategoryController::class,'edit']);
        Route::post('/update',[ChildcategoryController::class,'update'])->name('childcategory.update');
    });

    //Brand route
    Route::group(['prefix'=>'brand'],function(){

        Route::get('/',[BrandController::class,'index'])->name('brand.index');
        Route::post('/store',[BrandController::class,'store'])->name('brand.store');
        Route::get('/delete/{id}',[BrandController::class,'destroy'])->name('brand.destroy');
        Route::get('/edit/{id}',[BrandController::class,'edit']);
        Route::post('/update',[BrandController::class,'update'])->name('brand.update');
    });

    //settings route
    Route::group(['prefix'=>'setting'],function(){
        //seo setting
        Route::group(['prefix'=>'seo'],function(){

            Route::get('/',[SettingController::class,'seo'])->name('seo.setting');
            Route::post('/update/{id}',[SettingController::class,'seoUpdate'])->name('seo.setting.update');
        });
        //smtp setting
        Route::group(['prefix'=>'smtp'],function(){

            Route::get('/',[SettingController::class,'smtp'])->name('smtp.setting');
            Route::post('/update/{id}',[SettingController::class,'smtpUpdate'])->name('smtp.setting.update');
        });
    });
});