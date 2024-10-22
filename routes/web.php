<?php

use Illuminate\Support\Facades\Route;

Route::get('/auth/login', function () { return view('pages.auth.login'); });

Route::get('/', function () { return view('pages.landing.index'); });
Route::get('/dashboard', function () { return view('pages.dashboard.index'); });

// Fish routes
Route::get('/fish/disease', function () { return view('pages.fish.disease.index'); });
Route::get('/fish/disease/detail', function ($id) { return view('pages.fish.disease.detail');});
Route::get('/fish', function () { return view('pages.fish.fish.index'); });
Route::get('/fish/detail', function ($id) { return view('pages.fish.fish.detail'); });

// Medicine routes
Route::get('/medicine', function () { return view('pages.medicine.medicine.index'); });
Route::get('/medicine/detail', function ($id) { return view('pages.medicine.medicine.detail');});

// Product routes
Route::get('/product/affiliate', function () { return view('pages.product.affiliate.index'); });
Route::get('/product', function () { return view('pages.product.product.index'); });

// Report routes
Route::get('/report', function () { return view('pages.report.index'); });

// User routes
Route::get('/user', function () { return view('pages.user.index'); });

require __DIR__.'/auth.php';
