<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\AdminDashboard\DashboardController;
use App\Http\Controllers\AdminDashboard\PostJobController;
use App\Http\Controllers\AdminDashboard\SkillController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DeletionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\UserDashboard\ProfileController;
use App\Http\Controllers\UserDashboard\ResumeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Clear Cache
Route::get('/clear_cache', function () {
    Artisan::call('cache:clear');
    return '<h1>Cache cleared</h1>';
});

// Clear Config
Route::get('/clear_config', function () {
    Artisan::call('config:clear');
    return '<h1>Config cleared</h1>';
});

// Clear Route Cache
Route::get('/route_clear', function () {
    Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

// Clear View Cache
Route::get('/view_clear', function () {
    Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

Route::get('/', [HomeController::class, "index"]);
Route::get("/about", [AboutController::class, "index"]);
Route::get("/gym-access-control", [AccessController::class, "index"]);
Route::get("/contact", [ContactController::class, "index"]);
Route::get("/pricing", [PricingController::class, "index"]);
Route::get("/fitness-blog", [BlogController::class, "index"]);
Route::get("/privacy-policy", [PrivacyController::class, "index"]);
Route::get("/data-deletion-request", [DeletionController::class, "index"]);
Route::post('delete-account', [DeletionController::class, 'deleteAccount'])->name('delete-account')->middleware('throttle:3,1');
Route::get("/careers", [CareerController::class, "index"])->middleware("auth");
Route::get("/register", [RegisterController::class, "index"]);
Route::post("/register", [RegisterController::class, "store"]);
Route::get("/login", [LoginController::class, "index"])->name("login");
Route::post("/login", [LoginController::class, "store"]);
Route::get("/logout", [LoginController::class, "logout"])->middleware("auth")->name("logout");

// Admin Dashboard Routes
Route::prefix("admin")->middleware("auth")->group(function () {
    Route::get("/dashboard", [DashboardController::class, "index"]);
    Route::get("/post-jobs", [PostJobController::class, "index"]);
    Route::get("/skill", [SkillController::class, "index"]);
});

// User Dashboard Routes
Route::prefix("user")->middleware("auth")->group(function () {
    Route::get("/profile", [ProfileController::class, "index"]);
    Route::post('/profile/upload-avatar', [ProfileController::class, 'uploadAvatar'])->name('profile.avatar.upload');
    Route::post("/profile/edit", [ProfileController::class, "editProfile"])->name("profile.edit");
    Route::post("/education/storeAll", [ProfileController::class, "saveAllEducation"])->name("education.storeAll");
    Route::post("/training/storeAll", [ProfileController::class, "saveAllTraining"])->name("training.storeAll");
    Route::post('/experience/storeAll', [ProfileController::class, 'saveAllExperience'])->name('experience.storeAll');
    Route::post('/achivement/storeAll', [ProfileController::class, 'saveAllAchievement'])->name('achievement.storeAll');
    Route::get('/resume/{id}/download', [ResumeController::class, 'download']);
});
