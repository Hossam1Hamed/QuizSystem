<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
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

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/quiz', [QuizController::class, 'index'])->name('quiz');
    Route::post('/send-result', [QuizController::class, 'sendResult'])->name('send.result');
    Route::get('create-quiz',[QuizController::class,'create'])->name('quiz.create');
    Route::post('store-quiz',[QuizController::class,'store'])->name('quiz.store');
});
