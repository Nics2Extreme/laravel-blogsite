<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/create', [PostController::class, 'create'])->name('dashboard.create');
    Route::post('/dashboard/store', [PostController::class, 'store'])->name('dashboard.store');
    Route::get('/dashboard/edit/{post_id}', [PostController::class, 'edit'])->name('dashboard.edit');
    Route::post('/dashboard/update/{post_id}', [PostController::class, 'update'])->name('dashboard.update');
    Route::post('/dashboard/delete/{post_id}', [PostController::class, 'destroy'])->name('dashboard.destroy');
    Route::view('profile', 'profile')->name('profile');
});

require __DIR__ . '/auth.php';
