<?php

use App\Http\Controllers\AboutServiceController;
use App\Http\Controllers\AboutUsController;

use App\Http\Controllers\CvController;
use App\Http\Controllers\PaginateController;
use App\Http\Controllers\RecruitmentCountryController;
use App\Http\Controllers\RepresentativeController;
use App\Http\Controllers\ServiceRecruitmentController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.login');
});

Route::middleware('auth')->prefix('admin')->group(function() {
    Route::get('/dashboard', [UserController::class, 'index'])->name('admin_dashboard');

    Route::get('/cvs', [CvController::class, 'index'])->name('cvs.index');
    Route::get('/cvs/create', [CvController::class, 'create'])->name('cvs.create');
    Route::post('/cvs', [CvController::class, 'store'])->name('cvs.store');
    Route::get('/cvs/{cv}', [CvController::class, 'show'])->name('cvs.show');
    Route::get('/cvs/{cv}/edit', [CvController::class, 'edit'])->name('cvs.edit');
    Route::post('/cvs/{cv}', [CvController::class, 'update'])->name('cvs.update');
    Route::delete('/cvs/{cv}', [CvController::class, 'destroy'])->name('cvs.destroy');
    
    Route::get('/about_us', [AboutUsController::class, 'index'])->name('about_us.index');
    Route::get('/about_us/create', [AboutUsController::class, 'create'])->name('about_us.create');
    Route::post('/about_us', [AboutUsController::class, 'store'])->name('about_us.store');
    Route::get('/about_us/{aboutUs}/edit', [AboutUsController::class, 'edit'])->name('about_us.edit');
    Route::post('/about_us/{aboutUs}', [AboutUsController::class, 'update'])->name('about_us.update');
    Route::delete('/about_us/{aboutUs}', [AboutUsController::class, 'destroy'])->name('about_us.destroy');
    
    Route::get('/about_service', [AboutServiceController::class, 'index'])->name('about_service.index');
    Route::get('/about_service/create', [AboutServiceController::class, 'create'])->name('about_service.create');
    Route::post('/about_service', [AboutServiceController::class, 'store'])->name('about_service.store');
    Route::get('/about_service/{about_service}/edit', [AboutServiceController::class, 'edit'])->name('about_service.edit');
    Route::post('/about_service/{about_service}', [AboutServiceController::class, 'update'])->name('about_service.update');
    Route::delete('/about_service/{about_service}', [AboutServiceController::class, 'destroy'])->name('about_service.destroy');

    Route::get('/paginates', [PaginateController::class, 'index'])->name('paginates.index');
    Route::get('/paginates/create', [PaginateController::class, 'create'])->name('paginates.create');
    Route::post('/paginates', [PaginateController::class, 'store'])->name('paginates.store');
    Route::get('/paginates/{paginate}', [PaginateController::class, 'show'])->name('paginates.show');
    Route::get('/paginates/{paginate}/edit', [PaginateController::class, 'edit'])->name('paginates.edit');
    Route::post('/paginates/{paginate}', [PaginateController::class, 'update'])->name('paginates.update');
    Route::delete('/paginates/{paginate}', [PaginateController::class, 'destroy'])->name('paginates.destroy');

    Route::get('/recruitment', [ServiceRecruitmentController::class, 'index'])->name('recruitment.index');
    Route::get('/recruitment/create', [ServiceRecruitmentController::class, 'create'])->name('recruitment.create');
    Route::post('/recruitment', [ServiceRecruitmentController::class, 'store'])->name('recruitment.store');
    Route::get('/recruitment/{recruitment}/edit', [ServiceRecruitmentController::class, 'edit'])->name('recruitment.edit');
    Route::post('/recruitment/{recruitment}', [ServiceRecruitmentController::class, 'update'])->name('recruitment.update');
    Route::delete('/recruitment/{recruitment}', [ServiceRecruitmentController::class, 'destroy'])->name('recruitment.destroy');

    Route::get('/representatives', [RepresentativeController::class, 'index'])->name('representatives.index');
    Route::get('/representatives/create', [RepresentativeController::class, 'create'])->name('representatives.create');
    Route::post('/representatives', [RepresentativeController::class, 'store'])->name('representatives.store');
    Route::get('/representatives/{representative}', [RepresentativeController::class, 'show'])->name('representatives.show');
    Route::get('/representatives/{representative}/edit', [RepresentativeController::class, 'edit'])->name('representatives.edit');
    Route::post('/representatives/{representative}', [RepresentativeController::class, 'update'])->name('representatives.update');
    Route::delete('/representatives/{representative}', [RepresentativeController::class, 'destroy'])->name('representatives.destroy');

    Route::get('/recruitmentCountries', [RecruitmentCountryController::class, 'index'])->name('recruitmentCountries.index');
    Route::get('/recruitmentCountries/create', [RecruitmentCountryController::class, 'create'])->name('recruitmentCountries.create');
    Route::post('/recruitmentCountries', [RecruitmentCountryController::class, 'store'])->name('recruitmentCountries.store');
    Route::get('/recruitmentCountries/{recruitmentCountry}', [RecruitmentCountryController::class, 'show'])->name('recruitmentCountries.show');
    Route::get('/recruitmentCountries/{recruitmentCountry}/edit', [RecruitmentCountryController::class, 'edit'])->name('recruitmentCountries.edit');
    Route::post('/recruitmentCountries/{recruitmentCountry}', [RecruitmentCountryController::class, 'update'])->name('recruitmentCountries.update');
    Route::delete('/recruitmentCountries/{recruitmentCountry}', [RecruitmentCountryController::class, 'destroy'])->name('recruitmentCountries.destroy');

    Route::get('/statistics', [StatisticController::class, 'index'])->name('statistics.index');
    Route::get('/statistics/create', [StatisticController::class, 'create'])->name('statistics.create');
    Route::post('/statistics', [StatisticController::class, 'store'])->name('statistics.store');
    Route::get('/statistics/{statistic}/edit', [StatisticController::class, 'edit'])->name('statistics.edit');
    Route::post('/statistics/{statistic}', [StatisticController::class, 'update'])->name('statistics.update');
    Route::delete('/statistics/{statistic}', [StatisticController::class, 'destroy'])->name('statistics.destroy');
});

Route::get('/admin/login', [UserController::class, 'login'])->name('admin_login');
Route::post('/admin/login_submit', [UserController::class, 'login_submit'])->name('admin_login_submit');
Route::get('/admin/logout', [UserController::class, 'logout'])->name('admin_logout');