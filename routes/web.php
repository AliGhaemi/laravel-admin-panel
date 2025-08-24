<?php

use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\DbExpressionTagController;
use App\Http\Controllers\DbTableController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

//Route::get('/', [DbExpressionTagController::class, 'Home']);

Route::post('/do', [DbTableController::class, 'store']);
