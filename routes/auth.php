<?php
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;



Route::prefix("dashboard")->group(function () { 
    Route::get("",[HomeController::class, "index"])->name("home");
});
