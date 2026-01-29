<?php

use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController as AdminUserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/offers', [OfferController::class, 'index'])->name('offers.index');
    Route::get('/offers/create', [OfferController::class, 'create'])->name('offers.create');
    Route::post('/offers', [OfferController::class, 'store'])->name('offers.store');
    Route::get('/offers/{offer}/edit', [OfferController::class, 'edit'])->name('offers.edit');
    Route::put('/offers/{offer}', [OfferController::class, 'update'])->name('offers.update');
    Route::delete('/offers/{offer}', [OfferController::class, 'destroy'])->name('offers.destroy');
    Route::get('/my-dashboard', function () {
    return view('user.dashboard');
    })->name('user.dashboard');
});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/elephant', function () {
        return view('admin.dashboard');
    });

    Route::get('/elephant/users', [AdminUserController::class, 'index'])
        ->name('admin.users.index');

    Route::get('/elephant/users/{user}', [AdminUserController::class, 'show'])
        ->name('admin.users.show');

    Route::delete('/elephant/users/{user}', [AdminUserController::class, 'destroy'])
        ->name('admin.users.destroy');
});

require __DIR__.'/auth.php';
