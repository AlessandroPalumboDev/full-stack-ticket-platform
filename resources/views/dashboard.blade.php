@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Benvenuto nella tua Dashboard!</h1>

    <div class="alert alert-info" role="alert">
        Ciao {{ auth()->user()->name }}, questa è la tua area personale dove puoi gestire tutte le tue attività.
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    I tuoi ticket aperti
                </div>
                <div class="card-body">
                    <p>Non hai ticket aperti al momento.</p>
                    <a href="#" id="view-tickets" class="btn btn-primary">Visualizza ticket</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Attività recenti
                </div>
                <div class="card-body">
                    <ul>
                        <li>Ticket #123: In attesa di risposta</li>
                        <li>Ticket #124: Risolto</li>
                    </ul>
                    <a href="#" class="btn btn-secondary">Visualizza tutte le attività</a>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    document.getElementById('view-tickets').addEventListener('click', function(event) {
        event.preventDefault(); // Evita che il link venga seguito
        alert('Visualizza ticket cliccato!');
        // Puoi aggiungere qui altre azioni come l'apertura di una modale, l'invio di una richiesta AJAX, ecc.
    });
</script>
@endpush

@endsection
