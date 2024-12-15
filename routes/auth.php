<?php
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;




Route::prefix('dashboard')->group(function (){
    Route::middleware(['auth','verified','check.user'])->group(function (){
        Route::get("",[HomeController::class, "index"])->name("home");

        // cart routes
        Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
        Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
        Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
        Route::delete('/cart/{id}/destroy', [CartController::class, 'destroy'])->name('cart.destroy');
    
        // checkout routes
        Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    });
});
