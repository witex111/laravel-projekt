<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


$sesja = [
    ['name' => 'ProgZast K15 Laravel1 Basics',      'alert' => false],
    ['name' => 'ProgZast K15 Projekt Kumulatywny',  'alert' => false],
    ['name' => 'ProgZast K15 PHP2',                 'alert' => true],
    ['name' => 'ProgZast K15 PHP1',                 'alert' => false],
    ['name' => 'ProgZast K15 React2 List',          'alert' => false],
    ['name' => 'ProgZast K15 React1 Basics',        'alert' => true],
    ['name' => 'ProgZast GitLocal1 K15',            'alert' => true],
];


Route::get('/', function () use ($sesja) {
    return view('console', ['sesja' => $sesja]);
})->name('console');


Route::get('/sesja/{id}', function ($id) use ($sesja) {
    if (!isset($sesja[$id])) abort(404);

    return view('sesja', ['sesja' => $sesja[$id]]);
})->name('sesja.pokaz');
