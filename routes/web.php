<?php

use App\Http\Controllers\AboutServiceController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\PaginateController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
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
});

Route::get('/admin/login', [UserController::class, 'login'])->name('admin_login');
Route::post('/admin/login_submit', [UserController::class, 'login_submit'])->name('admin_login_submit');
Route::get('/admin/logout', [UserController::class, 'logout'])->name('admin_logout');