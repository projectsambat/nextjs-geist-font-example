<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingGreendoorsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('greendoors.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

use App\Http\Controllers\DashboardController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('greendoors')->middleware('role:owner,developer,staff')->group(function () {
        Route::get('/', [BookingGreendoorsController::class, 'index'])->name('greendoors.index');
        Route::get('/create', [BookingGreendoorsController::class, 'create'])->name('greendoors.create');
        Route::post('/', [BookingGreendoorsController::class, 'store'])->name('greendoors.store');
        Route::get('/{id}/edit', [BookingGreendoorsController::class, 'edit'])->name('greendoors.edit');
        Route::put('/{id}', [BookingGreendoorsController::class, 'update'])->name('greendoors.update');
        Route::delete('/{id}', [BookingGreendoorsController::class, 'destroy'])->name('greendoors.destroy');
    });

    Route::prefix('divakost')->middleware('role:owner,developer,staff')->group(function () {
        Route::get('/', [BookingDivakostController::class, 'index'])->name('divakost.index');
        Route::get('/create', [BookingDivakostController::class, 'create'])->name('divakost.create');
        Route::post('/', [BookingDivakostController::class, 'store'])->name('divakost.store');
        Route::get('/{id}/edit', [BookingDivakostController::class, 'edit'])->name('divakost.edit');
        Route::put('/{id}', [BookingDivakostController::class, 'update'])->name('divakost.update');
        Route::delete('/{id}', [BookingDivakostController::class, 'destroy'])->name('divakost.destroy');
    });

    Route::prefix('goldenkost')->middleware('role:owner,developer,staff')->group(function () {
        Route::get('/', [BookingGoldenkostController::class, 'index'])->name('goldenkost.index');
        Route::get('/create', [BookingGoldenkostController::class, 'create'])->name('goldenkost.create');
        Route::post('/', [BookingGoldenkostController::class, 'store'])->name('goldenkost.store');
        Route::get('/{id}/edit', [BookingGoldenkostController::class, 'edit'])->name('goldenkost.edit');
        Route::put('/{id}', [BookingGoldenkostController::class, 'update'])->name('goldenkost.update');
        Route::delete('/{id}', [BookingGoldenkostController::class, 'destroy'])->name('goldenkost.destroy');
    });
});

require __DIR__.'/auth.php';
