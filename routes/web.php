<?php

use App\Http\Controllers\Index;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware('auth')->group(function () {
    Route::get('/', [Index::class, 'index'])->name('registroMensual');
    Route::get('/index2', [Index::class, 'index2']);
    Route::get('/reset', [Index::class, 'reset']);
    Route::get('/players', [Index::class, 'players']);
    Route::get('/player/pending/{player_id}/{status?}', [Index::class, 'player_pending']);
    Route::put('/player/pending/edit/{pending_id}', [Index::class, 'player_pending_edit']);
    Route::delete('/player/pending/delete/{pending_id}', [Index::class, 'player_pending_delete']);
    Route::put('/player/pending/divide/{pending_id}', [Index::class, 'player_pending_divide']);
    Route::put('/player/payment/{player_id}', [Index::class, 'player_payment_save']);
    Route::put('/player/pending_payments', [Index::class, 'player_pending_save']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/public/pending', [Index::class, 'public_pending'])->name('PublicPending');
    Route::get('/tipo_pagos', [Index::class, 'tipo_pagos'])->name('TipoPagos');
});

require __DIR__.'/auth.php';
