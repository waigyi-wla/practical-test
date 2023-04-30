<?php

use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;
use App\Mail\NotiMail;
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


Route::get('/', [SurveyController::class, 'index']);
Route::get('/survey-form/{id}', [SurveyController::class, 'survey_form']);

Route::post('/submit_answer', [SurveyController::class, 'submit_answer']);

Route::get('/email', function (){
    return new NotiMail();
});