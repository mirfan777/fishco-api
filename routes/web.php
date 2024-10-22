<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard.index');
});

Route::get('/fish', function () {
    return view('pages.fish.index');
});

Route::get('/fishe', function () {
    return view('pages.fish.test');
});

require __DIR__.'/auth.php';
