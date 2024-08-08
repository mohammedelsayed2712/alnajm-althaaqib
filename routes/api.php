<?php


use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ComplaintController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\CvPhotoController;
use App\Http\Controllers\Api\EmploymentController;
use App\Http\Controllers\Api\FilterController;
use App\Http\Controllers\Api\FooterController;
use App\Http\Controllers\Api\FormSubmissionController;
use App\Http\Controllers\Api\JobController;
use App\Http\Controllers\Api\MusanedController;
use App\Http\Controllers\Api\OfferController;
use App\Http\Controllers\Api\PcodeController;
use App\Http\Controllers\Api\PhotoController;
use App\Http\Controllers\Api\PolicyController;
use App\Http\Controllers\Api\RecruitmentContractController;
use App\Http\Controllers\Api\RecruitmentController;
use App\Http\Controllers\Api\RecruitmentServiceController;
use App\Http\Controllers\Api\RequirementController;
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

// Requirement Section
Route::get('/requirement', [RequirementController::class, 'index']);

// Form Section
Route::post('/submit-form', [FormSubmissionController::class, 'submitForm']);

Route::get('/settings', [FooterController::class, 'setting']);

// CV Section
Route::get('/filters', [FilterController::class, 'getFilters']);
Route::get('/items/filter', [FilterController::class, 'filterItems']);

Route::get('/cv/photos', [CvPhotoController::class, 'index']);
Route::get('/recruitment', [RecruitmentController::class, 'index']);

// Offers section
Route::post('/offers', [OfferController::class, 'index']);

// Recruitment Contract
Route::get('/contract', [RecruitmentContractController::class, 'index']);
Route::get('/begin', [RecruitmentContractController::class, 'begin']);
Route::get('/operations', [RecruitmentContractController::class, 'operation']);

// Employment Section
Route::get('/arrival', [EmploymentController::class, 'arrival']);
Route::get('/service', [EmploymentController::class, 'service']);

// Recruitment services section
Route::get('/recruitmentservice', [RecruitmentServiceController::class, 'index']);
Route::get('/recruitmentservicecard', [RecruitmentServiceController::class, 'recruitmentservicecard']);

// Policy Section
Route::get('/policies', [PolicyController::class, 'index']);

// Musaned Section
Route::get('musaned/about', [MusanedController::class, 'about']);

Route::get('musaned/service', [MusanedController::class, 'service']);
Route::get('musaned/service/cards', [MusanedController::class, 'serviceCard']);

Route::get('musaned/journey', [MusanedController::class, 'journey']);
Route::get('musaned/journey/cards', [MusanedController::class, 'journeyCard']);

Route::get('musaned/step', [MusanedController::class, 'step']);
Route::get('musaned/step/cards', [MusanedController::class, 'stepCard']);

Route::get('musaned/fee', [MusanedController::class, 'fee']);
Route::get('musaned/app', [MusanedController::class, 'app']);

// Applying for job Section
Route::post('/job/store', [JobController::class, 'store']);

// Complaints Section
Route::post('/complaints', [ComplaintController::class, 'index']);