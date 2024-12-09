<?php
use App\Http\Controllers\front\FrontController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontController::class, 'index'])->name('front.index');
