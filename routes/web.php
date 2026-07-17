<?php

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

    Route::view('/experiences', 'public.placeholder', ['page' => 'Experiences'])->name('public.experiences.index');
    Route::view('/packages', 'public.placeholder', ['page' => 'Packages'])->name('public.packages.index');
    Route::view('/plaza-nawalli', 'public.placeholder', ['page' => 'Plaza Nawalli'])->name('public.plaza');
    Route::view('/gallery', 'public.placeholder', ['page' => 'Gallery'])->name('public.gallery');
    Route::view('/about', 'public.placeholder', ['page' => 'About'])->name('public.about');
    Route::view('/blog', 'public.placeholder', ['page' => 'Blog'])->name('public.blog.index');
    Route::view('/faq', 'public.placeholder', ['page' => 'FAQ'])->name('public.faq');
    Route::view('/contact', 'public.placeholder', ['page' => 'Contact'])->name('public.contact');
    Route::view('/privacy-policy', 'public.placeholder', ['page' => 'Privacy policy'])->name('public.privacy');
});
