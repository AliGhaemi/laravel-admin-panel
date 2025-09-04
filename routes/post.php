<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/{post:slug}', [PostController::class, 'show'])->name('posts.show');

Route::middleware('guest')->group(function () {
});

Route::middleware('auth')->group(function () {
    Route::get('/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/create', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/{post:slug}', [PostController::class, 'destroy'])->name('posts.destroy');
});
