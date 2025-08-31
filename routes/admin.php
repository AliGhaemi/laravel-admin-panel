<?php

use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\MediaController;
use Illuminate\Support\Facades\Route;

// Only auth user with is_admin = true
Route::get('/admin_panel', [AdminPanelController::class, 'handleAdminPanel'])->name('admin.handle')->middleware(['auth', 'admin']);
// Only auth user with valid admin access token
Route::middleware('auth-admin')->prefix('/admin_panel/{c_url}')->group(function () {
    // Media routes
    Route::get('/media', [MediaController::class, 'index'])->name('admin.media.index');

    // The route that receives the unique ID in the URL.
    Route::get('/', [AdminPanelController::class, 'showAdminPanel'])->name('admin.show');
    Route::get('/{table_name}', [AdminPanelController::class, 'showTable'])->name('admin.table.show');
    Route::get('/{table_name}/{row_id}', [AdminPanelController::class, 'showRow'])->name('admin.row.show');
    Route::patch('/{table_name}/{row_id}', [AdminPanelController::class, 'update'])->name('admin.row.update');
});
