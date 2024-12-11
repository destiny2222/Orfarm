<?php
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;




Route::prefix("dashboard")->group(function () { 
    Route::get("",[HomeController::class, "index"])->name("home");
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
});
