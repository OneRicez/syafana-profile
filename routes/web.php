<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AcademicController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/academic', [AcademicController::class, 'index'])->name('academic');
Route::get('/academic/kindergarten', [AcademicController::class, 'kindergaten'])->name('academic.kindergarten');
Route::get('/academic/primary', [AcademicController::class, 'primary'])->name('academic.primary');
Route::get('/academic/secondary', [AcademicController::class, 'secondary'])->name('academic.secondary');
Route::get('/academic/boarding', [AcademicController::class, 'boarding'])->name('academic.boarding');
Route::get('/facility', [FacilityController::class, 'index'])->name('facility');
Route::get('/download', [DownloadController::class, 'index'])->name('download');
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact-us');
Route::get('/gallery', function () {
    return view('pages.gallery');
})->name('gallery');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');

Route::get('/news/{slug}', [NewsController::class, 'view'])->name('news.view');
Route::post('/news/{news:slug}/comments', [CommentController::class, 'store'])->name('comments.store');
