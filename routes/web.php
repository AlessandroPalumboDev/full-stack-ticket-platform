<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\TicketController;
use App\Http\Controllers\admin\OperatorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------- 
| Web Routes 
|--------------------------------------------------------------------------- 
|
| Qui registri le route per la tua applicazione.
|
*/

// Home page
Route::get('/', function () {
    return view('home');
})->name('home');

// Dashboard (protetta da autenticazione e verifica email)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Gruppo di route protette da autenticazione
Route::middleware('auth')->group(function () {
    // Profilo utente
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Tickets
    Route::prefix('tickets')->name('tickets.')->group(function () {
        // Elenco dei ticket con filtri
        Route::get('/', [TicketController::class, 'index'])->name('index');
        // Dettaglio del ticket
        Route::get('/{ticket}', [TicketController::class, 'show'])->name('show');
        // Assegna un operatore a un ticket
        Route::post('/{ticket}/assign', [TicketController::class, 'assignOperator'])->name('assign');
        // Modifica lo stato del ticket
        Route::patch('/{ticket}/status', [TicketController::class, 'updateStatus'])->name('status.update');  // Questa riga va bene
    });

    // Operators (solo per gestione degli operatori)
    Route::get('/operators', [OperatorController::class, 'index'])->name('operators.index');
});

// Include le route di autenticazione
require __DIR__.'/auth.php';
