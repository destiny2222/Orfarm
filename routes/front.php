<?php
use App\Http\Controllers\front\FrontController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/product', [FrontController::class, 'shop'])->name('shop');
Route::get('/product/details/{product}', [FrontController::class, 'shop_details'])->name('product.details');
