<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.welcome');
})->name('home');
Route::get('/about', function () {
    return view('pages.about');
})->name('about');
Route::get('/news', function () {
    return view('news');
})->name('news');
Route::get('/tes', function () {
    return view('tes');
})->name('tes');
