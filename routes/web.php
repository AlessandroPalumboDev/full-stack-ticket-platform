<?php
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\OperatorController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

// Route per autenticazione Admin (usiamo laravel/ui per login base)
Auth::routes([
    'register' => false, // Disabilitiamo la registrazione
]);

// Rotte protette dal middleware "auth" per l'Admin
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.tickets.index');
    });

    // Rotte per i Ticket
    Route::resource('tickets', TicketController::class);

    // Rotte per gli Operatori
    Route::resource('operators', OperatorController::class);

    // Rotte per le Categorie
    Route::resource('categories', CategoryController::class);
});

