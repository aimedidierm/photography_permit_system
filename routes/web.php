<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
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

Route::view('/sp', 'special');
Route::view('/', 'index')->name('login');
Route::view('/register', 'register');
Route::post('/', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/register', [UserController::class, 'store']);

Route::group(["prefix" => "register", "middleware" => ["auth", "registerMiddleware"], "as" => "register."], function () {
    Route::get('/applications', [ApplicationController::class, 'registerList']);
    Route::view('/payments', 'register.blank');
    Route::view('/applicants', 'register.blank');
    Route::view('/registers', 'register.blank');
    Route::view('/settings', 'register.settings');
});

Route::group(["prefix" => "applicant", "middleware" => ["auth", "applicantMiddleware"], "as" => "applicant."], function () {
    Route::get('/', [ApplicationController::class, 'applicationForm']);
    Route::resource('/applications', ApplicationController::class)->only('index', 'store', 'destroy');
    Route::get('/application/{application}', [ApplicationController::class, 'show']);
    Route::get('/payments', [PaymentController::class, 'applicantList']);
    Route::post('/payments', [PaymentController::class, 'pay']);
    Route::get('/settings', [UserController::class, 'show']);
    Route::post('/settings', [UserController::class, 'detailsUpdate']);
});
