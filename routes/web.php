<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Management\UserController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

//-------PublicController---------
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

//-------language---------
Route::post('/language/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');

//-------dashboard---------
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

//-------group user---------
Route::middleware(['auth'])->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('users.index')->middleware('permission:users.read');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create')->middleware('permission:users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store')->middleware('permission:users.create');
    Route::get('users/{user}', [UserController::class, 'show'])->name('users.show')->middleware('permission:users.read');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('permission:users.update');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('permission:users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('permission:users.delete');
});
