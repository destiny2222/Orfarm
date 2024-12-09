<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;







Route::prefix('admin')->name('admin.')->group(function (){ 

    Route::middleware('admin.logged_out')->group(function () {
        Route::controller(LoginController::class)->group(function (){
            Route::get('login-form','showLoginForm')->name('login.form');
            Route::post('login','login')->name('login');
            Route::post('logout','logout')->name('logout');
        });
    });

    Route::middleware('admin.logged_in')->group(function () { 
        Route::get('', [ HomeController::class,'index' ])->name('home');

        // category
        Route::get('/category/list', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/category/{id}/update', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/category/{id}/delete', [CategoryController::class, 'destroy'])->name('category.delete');


        // product 
        Route::get('/product/list', [ProductController::class, 'index'])->name('product.index');
        Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/product/{id}/update', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/product/{id}/delete', [ProductController::class, 'destroy'])->name('product.delete');

        
        // plugin
        // Route::get('/plugin', [PluginController::class, 'index'])->name('plugin.index');
        // Route::post('/plugin/store', [PluginController::class, 'store'])->name('plugin.firebase.store');


        // update profile and change profile
        // Route::get('/profile', [HomeController::class, 'profilePage'])->name('profile.index');
        // Route::put('/profile/{id}/update', [HomeController::class, 'update'])->name('update.profile');
        // // change password
        // Route::get('/change-password', [HomeController::class, 'changePassword'])->name('change.password.index');
        // Route::post('/change-password/update', [HomeController::class, 'validatePassword'])->name('change.password.update');

    });
    
});