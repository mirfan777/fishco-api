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

Route::get('/landing', function () {
    return view('pages.landing.index');
});

require __DIR__.'/auth.php';
