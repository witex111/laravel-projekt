<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesjaController;

Route::get('/', [SesjaController::class, 'index'])->name('console');

Route::get('/sesja/{id}', [SesjaController::class, 'show'])->name('sesja.pokaz');
