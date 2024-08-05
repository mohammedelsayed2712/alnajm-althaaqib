<?php

use App\Http\Controllers\CvController;
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
    
    });

Route::get('/admin/login', [UserController::class, 'login'])->name('admin_login');
Route::post('/admin/login_submit', [UserController::class, 'login_submit'])->name('admin_login_submit');
Route::get('/admin/logout', [UserController::class, 'logout'])->name('admin_logout');