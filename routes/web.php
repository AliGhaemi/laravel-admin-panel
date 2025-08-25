<?php

use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\AuthenticatedSessionController;
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
Route::middleware('auth')->group(function () {
    Route::get('/admin_panel', [AdminPanelController::class, 'handleAdminPanel'])->name('admin.handle');
// The route that receives the unique ID in the URL.
    Route::get('/admin_panel/{c_url}', [AdminPanelController::class, 'showAdminPanel'])->name('admin.show');
});


Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');
//Route::get('/admin_panel', function () {
//    return Inertia::render('AdminPanel');
//})->name('admin.show');

//Route::get('/', [DbExpressionTagController::class, 'Home']);

Route::post('/do', [DbTableController::class, 'store']);
