<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hello', [\App\Http\Controllers\CustomController::class,'index']);


Route::get('/quiz', [\App\Http\Controllers\MainController::class,'show_quiz']);

Route::get('/quiz/create', [\App\Http\Controllers\MainController::class,'create_quiz']);
Route::post('/quiz/create', [\App\Http\Controllers\MainController::class,'store_quiz']);
Route::post('/quiz/checkAnswer', [\App\Http\Controllers\MainController::class,'checkAnswer']);
Route::post('/quiz/question-learned', [\App\Http\Controllers\MainController::class,'questionLearned']);
