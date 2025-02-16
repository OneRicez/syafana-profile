<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
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
Route::get('/gallery', function () {
    return view('pages.gallery');
})->name('gallery');
// Route::get('/news', function () {
//     return view('pages.news');
// })->name('test');


Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'view'])->name('news.view');
// Route::get('/news/{$slug}', [NewsController::class, 'view'])->name('news.views');

Route::post('/news/{news:slug}/comments', [CommentController::class, 'store'])->name('comments.store');


Route::get('/test', function () {
    return view('pages.test');
})->name('test');
