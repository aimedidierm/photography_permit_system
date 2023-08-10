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
    Route::get('/payments', [PaymentController::class, 'index']);
    Route::get('/application/{application}', [ApplicationController::class, 'create']);
    Route::view('/applicants', 'register.applicants');
    Route::view('/registers', 'register.registers');
    Route::get('/settings', [UserController::class, 'show']);
    Route::post('/settings', [UserController::class, 'detailsUpdate']);
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
