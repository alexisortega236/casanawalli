<?php

use App\Http\Controllers\Public\BlogController;
use App\Http\Controllers\Public\ContentPageController;
use App\Http\Controllers\Public\ExperienceController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\RoomController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/en');

Route::pattern('locale', 'en|es');

Route::prefix('{locale}')->group(function () {
    Route::get('/', HomeController::class)->name('public.home');
    Route::get('/suites', [RoomController::class, 'index'])->name('public.suites.index');
    Route::get('/suites/{slug}', [RoomController::class, 'show'])->name('public.suites.show');
    Route::get('/availability', [HomeController::class, 'availability'])->name('public.availability');
    Route::post('/availability', [HomeController::class, 'storeAvailability'])->name('public.availability.store');

    Route::get('/experiences', [ExperienceController::class, 'index'])->name('public.experiences.index');
    Route::get('/experiences/{slug}', [ExperienceController::class, 'show'])->name('public.experiences.show');
    Route::get('/packages', [ExperienceController::class, 'packages'])->name('public.packages.index');
    Route::get('/plaza-nawalli', [ContentPageController::class, 'plaza'])->name('public.plaza');
    Route::get('/gallery', [ContentPageController::class, 'gallery'])->name('public.gallery');
    Route::get('/about', [ContentPageController::class, 'about'])->name('public.about');
    Route::get('/blog', [BlogController::class, 'index'])->name('public.blog.index');
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('public.blog.show');
    Route::get('/faq', [ContentPageController::class, 'faq'])->name('public.faq');
    Route::get('/contact', [ContentPageController::class, 'contact'])->name('public.contact');
    Route::get('/privacy-policy', [ContentPageController::class, 'privacy'])->name('public.privacy');
});
