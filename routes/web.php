<?php

use App\Http\Controllers\Admin\UserManagementController as AdminUserManagementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserManagementController;
use App\Models\ReadingTrack;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'is.admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/users', [AdminUserManagementController::class, 'index'])->name('admin.users');
    Route::post('/admin/users/{user}/assign-juz', [AdminUserManagementController::class, 'assignJuz'])->name('admin.assign.juz');
    // Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    // Route::get('/', function () {
    //     return view('dashboard'); // Replace 'dashboard' with the actual view name if it's different
    // })->name('dashboard');
});



require __DIR__.'/auth.php';
