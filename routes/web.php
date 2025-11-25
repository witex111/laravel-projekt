<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesjaController;

Route::get('/', [SesjaController::class, 'index'])->name('console');

Route::get('/sesja/{id}', [SesjaController::class, 'showSesja'])->name('sesja.show');

Route::get('/sesja/{sesjaId}/pytanie/{pytanieId}', 
    [SesjaController::class, 'showPytanie'])->name('sesja.pytanie');

