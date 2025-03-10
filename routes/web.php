<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');

// Route to view transactions for a specific client
Route::get('/clients/{client}/transactions', [TransactionController::class, 'index'])->name('clients.transactions');

Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/clients/{client}/transactions/create', [TransactionController::class, 'create'])->name('clients.transactions.create');
Route::post('/clients/{client}/transactions', [TransactionController::class, 'store'])->name('clients.transactions.store');
Route::get('/transactions/{transaction}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
Route::put('/transactions/{transaction}', [TransactionController::class, 'update'])->name('transactions.update');
Route::delete('/transactions/{transaction}', [TransactionController::class, 'destroy'])->name('transactions.destroy');

// Route to view transactions for a specific client
Route::get('/clients/{client}/transactions', [ClientController::class, 'viewTransactions'])->name('clients.transactions');

require __DIR__.'/auth.php';
