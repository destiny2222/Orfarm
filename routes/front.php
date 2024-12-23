<?php
use App\Http\Controllers\front\FrontController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/product', [FrontController::class, 'shop'])->name('shop');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
Route::post('/contact/store', [FrontController::class, 'contactform'])->name('contact.store');
Route::get('/product/details/{product}', [FrontController::class, 'shop_details'])->name('product.details');
Route::get('/search', [FrontController::class, 'searchEngine'])->name('search');