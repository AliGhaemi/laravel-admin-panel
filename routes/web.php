<?php

use App\Http\Controllers\DatabaseOperatorsController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SendRequestController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('lang/{lang}', LocalizationController::class)->name('lang');

Route::get('/dashboard', function () {
    return Inertia::render('Home');
})->name('home');

Route::post('/do', [DatabaseOperatorsController::class, 'store']);

Route::get('/search', [PostController::class, 'search'])->name('posts.search');

Route::get('/send-request', [SendRequestController::class, 'create'])->name('send.request.create');
Route::post('/send-request', [SendRequestController::class, 'store'])->name('send.request.store');

