<?php


use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\PcodeController;
use App\Http\Controllers\Api\PhotoController;
use App\Http\Controllers\Api\SaleController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\StaticController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
  
  ], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);     
    
    Route::post('password/otp', [PcodeController::class, 'sendOtp']);
    Route::post('password/verify-otp', [PcodeController::class, 'verifyOtp']);
    Route::post('password/reset', [AuthController::class, 'resetPassword']);
  });

  // About Section
    Route::get('/photos', [PhotoController::class, 'index']);
    Route::get('/about', [AboutController::class, 'index']);

  // Service Section
    Route::get('/service', [ServiceController::class, 'index']);
    Route::get('/sales', [SaleController::class, 'index']);
    Route::get('/country', [CountryController::class, 'index']);
    Route::get('/static', [StaticController::class, 'index']);
