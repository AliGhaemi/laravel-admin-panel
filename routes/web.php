<?php

use App\Http\Controllers\DatabaseOperatorsController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [PostController::class, 'index']);
//Route::get('/', [PostController::class, 'posts.create']);
//Route::get('/', function () {
//    return Inertia::render('Home');
//})->name('home');

Route::post('/do', [DatabaseOperatorsController::class, 'store']);
