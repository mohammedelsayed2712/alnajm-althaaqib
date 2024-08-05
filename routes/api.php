<?php


use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PcodeController;
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