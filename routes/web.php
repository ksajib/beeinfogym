<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, "index"]);
// Route::get("/testimonial", [TestimonialController::class, "index"]);