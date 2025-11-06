<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ShopkeeperController;
use App\Http\Controllers\Api\LensController;
use App\Http\Controllers\Api\TryOnController;
use App\Http\Controllers\Api\QrCodeController;
// Login route
Route::post('login', [LoginController::class, 'login']);

// Public user creation
Route::post('/users', [UserController::class, 'store']);

// Protected routes (require Sanctum token)
// Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/users', [UserController::class, 'index']); // should be GET, not POST
    Route::delete('/users/{id}', [UserController::class, 'delete']); // should be DELETE
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::apiResource('shopkeepers', ShopkeeperController::class);
    Route::apiResource('lenses', LensController::class);
    Route::apiResource('tryons', TryOnController::class);
    Route::apiResource('qrcodes', QrCodeController::class);// should be GET
// });

// OTP routes
Route::post('verify-otp', [UserController::class, 'verifyOtp'])->name('verify.otp');
Route::post('resend-otp', [UserController::class, 'resendOtp'])->name('resend.otp');
