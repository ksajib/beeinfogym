<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\UserDashboard\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, "index"]);
Route::get("/about", [AboutController::class, "index"]);
Route::get("/gym-access-control", [AccessController::class, "index"]);
Route::get("/contact", [ContactController::class, "index"]);
Route::get("/pricing", [PricingController::class, "index"]);
Route::get("/fitness-blog", [BlogController::class, "index"]);
Route::get("/careers", [CareerController::class, "index"]);
Route::get("/register", [RegisterController::class, "index"]);
Route::post("/register", [RegisterController::class, "store"]);
Route::get("/login", [LoginController::class, "index"]);
Route::post("/login", [LoginController::class, "store"]);

// Dashboard Routes
Route::prefix("user")->middleware("auth")->group(function () {
    Route::get("/dashboard", [DashboardController::class, "index"]);
});
