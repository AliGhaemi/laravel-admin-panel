<?php

use App\Http\Controllers\DatabaseOperatorsController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/dashboard', function () {
    return Inertia::render('Home');
})->name('home');

Route::post('/do', [DatabaseOperatorsController::class, 'store']);
