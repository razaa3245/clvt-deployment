<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\ShopkeeperController;
use App\Http\Controllers\Api\LensController;
use App\Http\Controllers\Api\TryOnController;
use App\Http\Controllers\Api\QrCodeController;
use App\Http\Controllers\Api\AdminController;

// ========== AUTH ROUTES ==========
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/me', [AuthController::class, 'me']);

// ========== USER ROUTES ==========
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::delete('/users/{id}', [UserController::class, 'delete']);

// ========== OTP ROUTES ==========
Route::post('/verify-otp', [UserController::class, 'verifyOtp'])->name('verify.otp');
Route::post('/resend-otp', [UserController::class, 'resendOtp'])->name('resend.otp');

// ========== SHOPKEEPER / LENSES / TRYON / QR ==========
Route::apiResource('shopkeepers', ShopkeeperController::class);
Route::apiResource('lenses', LensController::class);
Route::apiResource('tryons', TryOnController::class);
Route::apiResource('qrcodes', QrCodeController::class);

// ========== PROTECTED DASHBOARD ROUTES ==========
Route::middleware('auth:sanctum')->group(function () {
    // Admin dashboard API
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/admin/shops', [AdminController::class, 'getShops']);
    Route::post('/admin/approve/{id}', [AdminController::class, 'approveShopkeeper']);
    // Shopkeeper dashboard API  ADDED
    Route::get('/shopkeeper/dashboard', [ShopkeeperController::class, 'dashboard']);
});





// Public API routes
Route::prefix('lenses')->group(function () {
    Route::get('/', [LensController::class, 'apiIndex']); // Get all lenses
    Route::get('/{id}', [LensController::class, 'apiShow']); // Get single lens
});

// Admin API routes (add authentication middleware in production)
Route::prefix('admin/lenses')->group(function () {
    Route::post('/', [LensController::class, 'store']); // Create lens
    Route::put('/{id}', [LensController::class, 'update']); // Update lens
    Route::delete('/{id}', [LensController::class, 'destroy']); // Delete lens
});






// OR in routes/api.php (for API)
Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('admin/lenses', LensController::class);
});

Route::prefix('api/admin')->middleware('auth:sanctum')->group(function () {
    // Lens CRUD — used by admindashboard.blade.php
    Route::get('/lenses',           [LensController::class, 'apiIndex']);   // list all
    Route::post('/lenses',          [LensController::class, 'store']);       // add new
    Route::post('/lenses/{id}',     [LensController::class, 'update']);      // edit (POST + _method=PUT)
    Route::delete('/lenses/{id}',   [LensController::class, 'destroy']);     // delete

    // Admin Dashboard stats
    Route::get('/dashboard',        [AdminController::class, 'dashboard']);
});


// PUBLIC
Route::get('/lenses', [LensController::class, 'apiIndex']);

// PROTECTED
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/shopkeeper/dashboard', [\App\Http\Controllers\ShopkeeperController::class, 'getDashboard']);
    Route::post('/shopkeeper/update-shop', [\App\Http\Controllers\ShopkeeperController::class, 'updateShop']);
});