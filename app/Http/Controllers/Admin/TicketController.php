<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Operator;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        $tickets = Ticket::query();

        // Filtri per stato e categoria
        if ($request->has('status') && $request->status) {
            $tickets->where('status', $request->status);
        }

        if ($request->has('category') && $request->category) {
            $tickets->where('category', $request->category);
        }

        return view('admin.tickets.index', [
            'tickets' => $tickets->with('operator')->paginate(10),
            'statuses' => ['NEW', 'IN_PROGRESS', 'CLOSED'],
            'categories' => ['Bug', 'Feature', 'Support'],
        ]);
    }

    public function show(Ticket $ticket)
    {
        return view('admin.tickets.show', compact('ticket'));  // Assicurati che la view sia corretta
    }

    public function assignOperator(Ticket $ticket, Request $request)
{
    // Controlla se ci sono operatori disponibili
    $availableOperators = Operator::where('is_available', true)->get();

    // Se non ci sono operatori disponibili, mostra la modale
    if ($availableOperators->isEmpty()) {
        return back()->with('error', 'Non ci sono operatori disponibili al momento.'); // Mostra il messaggio d'errore
    }

    // Altrimenti, continua con l'assegnazione dell'operatore
    $request->validate([
        'operator_id' => 'required|exists:operators,id',
    ]);

    $operator = Operator::findOrFail($request->operator_id);

    if (!$operator->is_available) {
        return back()->with('error', 'L\'operatore selezionato è già occupato.');
    }

    // Assegna l'operatore e aggiorna lo stato
    $ticket->operator_id = $operator->id;
    $ticket->status = 'IN_PROGRESS';  // Modifica stato a 'IN_PROGRESS'
    $ticket->save();

    // Imposta l'operatore come occupato
    $operator->is_available = false;
    $operator->save();

    return redirect()->route('tickets.index')->with('success', 'Operatore assegnato con successo.');
}


    public function updateStatus(Ticket $ticket, Request $request)
    {
        // Validazione dello stato
        $request->validate([
            'status' => 'required|in:NEW,IN_PROGRESS,CLOSED',
        ]);

        // Aggiorna lo stato del ticket
        $ticket->status = $request->status;

        // Se il ticket è chiuso, imposta l'operatore come disponibile
        if ($request->status === 'CLOSED' && $ticket->operator) {
            $ticket->operator->is_available = true;
            $ticket->operator->save();
        }

        // Salva il ticket con il nuovo stato
        $ticket->save();

        return redirect()->route('tickets.index')->with('success', 'Stato del ticket aggiornato con successo.');
    }

    
}
