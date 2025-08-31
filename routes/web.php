<?php

use App\Http\Controllers\DatabaseOperatorsController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::post('/do', [DatabaseOperatorsController::class, 'store']);
