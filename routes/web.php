<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.welcome');
})->name('home');
Route::get('/about', function () {
    return view('pages.about');
})->name('about');
Route::get('/academic', function () {
    return view('pages.academic.overview');
})->name('academic');
Route::get('/academic/primary', function () {
    return view('pages.academic.primary');
})->name('academic.primary');
Route::get('/academic/secondary', function () {
    return view('pages.academic.secondary');
})->name('academic.secondary');
Route::get('/academic/kindergarten', function () {
    return view('pages.academic.kindergarten');
})->name('academic.kindergarten');

Route::get('/test', function () {
    return view('pages.test');
})->name('test');
