@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dettagli del Ticket: {{ $ticket->title }}</h1>
    
    {{-- Messaggi di sessione (successo, errore) --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Dettagli del Ticket --}}
    <div class="card mb-4">
        <div class="card-header">
            <strong>Dettagli del Ticket</strong>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $ticket->id }}</p>
            <p><strong>Titolo:</strong> {{ $ticket->title }}</p>
            <p><strong>Descrizione:</strong> {{ $ticket->description }}</p>
            <p><strong>Categoria:</strong> {{ $ticket->category }}</p>
            <p><strong>Stato:</strong> {{ $ticket->status }}</p>

            @if ($ticket->operator)
                <p><strong>Operatore assegnato:</strong> {{ $ticket->operator->name }}</p>
                <p><strong>Data assegnazione:</strong> {{ $ticket->updated_at->format('d/m/Y H:i') }}</p>
            @else
                <p><strong>Operatore:</strong> Non assegnato</p>
            @endif
        </div>
    </div>

    {{-- Modulo per aggiornare lo stato del ticket --}}
    @if ($ticket->status !== 'CLOSED')
        <form action="{{ route('tickets.status.update', $ticket) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="status">Aggiorna stato:</label>
                <select name="status" id="status" class="form-control">
                    <option value="NEW" {{ $ticket->status === 'NEW' ? 'selected' : '' }}>Nuovo</option>
                    <option value="IN_PROGRESS" {{ $ticket->status === 'IN_PROGRESS' ? 'selected' : '' }}>In corso</option>
                    <option value="CLOSED" {{ $ticket->status === 'CLOSED' ? 'selected' : '' }}>Chiuso</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Aggiorna stato</button>
        </form>
    @endif

    {{-- Modulo per assegnare un operatore (se non è già assegnato) --}}
    @if (!$ticket->operator)
        <form action="{{ route('tickets.assign', $ticket) }}" method="POST" class="mt-4">
            @csrf
            <div class="form-group">
                <label for="operator_id">Assegna un operatore:</label>
                <select name="operator_id" id="operator_id" class="form-control">
                    <option value="">Seleziona un operatore</option>
                    @foreach (\App\Models\Operator::where('is_available', true)->get() as $operator)
                        <option value="{{ $operator->id }}">{{ $operator->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success mt-3">Assegna operatore</button>
        </form>
    @endif
</div>
@endsection
