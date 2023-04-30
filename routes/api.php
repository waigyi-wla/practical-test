<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\FormSettingController;
use App\Http\Controllers\Api\V1\OptionController;
use App\Http\Controllers\Api\V1\QuestionController;
use App\Http\Controllers\Api\V1\SurveyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    Route::post('login', [AuthController::class, 'signin']);
    Route::post('register', [AuthController::class, 'signup']);

    Route::middleware('auth:sanctum')->group( function () {
        Route::resource('form-settings', FormSettingController::class);
        Route::resource('surveys', SurveyController::class);
        Route::resource('questions', QuestionController::class);
        Route::resource('options', OptionController::class);
    });
});


