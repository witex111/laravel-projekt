<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

Route::get('/', [QuizController::class, 'index'])->name('quiz.index');

// Pytanie
Route::get('/quiz/{quiz}/pytanie/{nr}', [QuizController::class, 'pytanie'])->name('quiz.pytanie');

// Odpowiedź
Route::post('/quiz/{quiz}/pytanie/{nr}', [QuizController::class, 'submit'])->name('quiz.submit');

// Wynik
Route::get('/quiz/{quiz}/wynik', [QuizController::class, 'wynik'])->name('quiz.wynik');
