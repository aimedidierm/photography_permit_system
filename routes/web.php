<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegisterController;
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

Route::view('/login', 'auth.login');
Route::view('/', 'index')->name('login');
Route::view('/register', 'auth.register');
Route::post('/', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::post('/register', [UserController::class, 'store']);

Route::group(["prefix" => "register", "middleware" => ["auth", "registerMiddleware"], "as" => "register."], function () {
    Route::get('/pending', [ApplicationController::class, 'pending']);
    Route::get('/rejected', [ApplicationController::class, 'rejected']);
    Route::get('/payments', [PaymentController::class, 'index']);
    Route::get('/applications', [ApplicationController::class, 'registerList']);
    Route::get('/application/{application}', [ApplicationController::class, 'create']);
    // Route::resource('/registers', RegisterController::class)->only('index', 'store', 'destroy');
    // Route::resource('/applicants', ApplicantController::class)->only('index', 'store', 'destroy');
    Route::get('/settings', [UserController::class, 'show']);
    Route::post('/settings', [UserController::class, 'detailsUpdate']);
    Route::get('/report/payments', [ApplicationController::class, 'applicationPayments']);
    Route::post('/report', [ApplicationController::class, 'applicationReport']);
});

Route::group(["prefix" => "applicant", "middleware" => ["auth", "applicantMiddleware"], "as" => "applicant."], function () {
    Route::get('/', [ApplicationController::class, 'applicationForm']);
    Route::resource('/applications', ApplicationController::class)->only('index', 'store', 'destroy');
    Route::get('/application/{application}', [ApplicationController::class, 'show']);
    Route::get('/payments', [PaymentController::class, 'applicantList']);
    Route::post('/payments', [PaymentController::class, 'pay']);
    Route::get('/certificate/{appplication}', [ApplicationController::class, 'certificate']);
    Route::get('/settings', [UserController::class, 'show']);
    Route::post('/settings', [UserController::class, 'detailsUpdate']);
});

Route::group(["prefix" => "board", "middleware" => ["auth", "boardMiddleware"], "as" => "board."], function () {
    Route::get('/applications', [ApplicationController::class, 'pending']);
    Route::get('/rejected', [ApplicationController::class, 'rejected']);
    Route::get('/application/{application}', [ApplicationController::class, 'create']);
    Route::get('/application/approve/{application}', [ApplicationController::class, 'approve']);
    Route::get('/application/reject/{application}', [ApplicationController::class, 'rejectView']);
    Route::post('/application/reject/{application}', [ApplicationController::class, 'reject']);
    Route::get('/settings', [UserController::class, 'show']);
    Route::post('/settings', [UserController::class, 'detailsUpdate']);
    Route::get('/application/{application}', [ApplicationController::class, 'create']);
});
