<?php

use App\Http\Controllers\AuthController;
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

Route::view('/', 'index')->name('login');
Route::view('/register', 'register');
Route::post('/', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/register', [UserController::class, 'store']);

Route::group(["prefix" => "register", "middleware" => ["auth", "registerMiddleware"], "as" => "register."], function () {
    Route::view('/applications', 'register.blank');
    Route::view('/payments', 'register.blank');
    Route::view('/applicants', 'register.blank');
    Route::view('/registers', 'register.blank');
    Route::view('/settings', 'register.settings');
});

Route::group(["prefix" => "applicant", "middleware" => ["auth", "applicantMiddleware"], "as" => "applicant."], function () {
    Route::view('/', 'applicant.blank');
    Route::view('/applications', 'applicant.blank');
    Route::view('/payments', 'applicant.blank');
    Route::view('/settings', 'applicant.settings');
});
