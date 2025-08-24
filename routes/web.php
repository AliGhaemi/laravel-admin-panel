<?php

use App\Http\Controllers\DbExpressionTagController;
use App\Http\Controllers\DbTableController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

//Route::get('/', [DbExpressionTagController::class, 'Home']);

Route::post('/do', [DbTableController::class, 'store']);
