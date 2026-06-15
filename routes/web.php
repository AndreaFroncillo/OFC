<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

//-------PublicController---------
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

//-------language---------
Route::post('/language/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');

//-------dashboard---------
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
