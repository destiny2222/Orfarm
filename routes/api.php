<?php

use App\Http\Controllers\User\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post("/webhook/paystack", [PaymentController::class, "handleWebhook"]);
