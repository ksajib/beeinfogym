<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PricingController;
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
// Auth::routes();