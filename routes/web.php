<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\OptionController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

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
    Route::resource('question',QuestionController::class);
    Route::resource('categories',CategoriesController::class);
    Route::resource('questions',App\Http\Controllers\Dashboard\QuestionController::class);
    Route::resource('options',OptionController::class);
});
