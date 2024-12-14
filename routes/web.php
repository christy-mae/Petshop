<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PetController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/pets', [PetController::class, 'index'])->name('view.pets');
Route::get('/pets/view/{id}', [PetController::class, 'view'])->name('view.pet');

// Updated Buy Routes
Route::get('/pets/buy/{id}', [PetController::class, 'buy'])->middleware('auth')->name('buy.pet'); // get request for buying
Route::post('/buy-pet/{id}', [PetController::class, 'buyPet'])->middleware('auth')->name('confirm.buy.pet'); // New POST route for confirmation

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
