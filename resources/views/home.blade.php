@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Hero Section -->
    <div class="jumbotron text-center bg-light p-5 rounded">
        <h1 class="display-4">Benvenuto su <span>{{ config('app.name') }}</span>!</h1>
        <p class="lead">La tua piattaforma per gestire ticket di supporto in modo semplice e veloce.</p>
        
        @auth
            <!-- Mostra il pulsante Vai ai Tickets se l'utente è loggato -->
            <a href="{{ route('tickets.index') }}" class="text-white btn btn-outline-primary btn-lg mt-3">Vai ai Tickets</a>
        @else
            <!-- Mostra il pulsante Vai alla Dashboard se l'utente non è loggato -->
            <a href="{{ route('dashboard') }}" class="text-white btn btn-outline-primary btn-lg mt-3">Vai alla Dashboard</a>
        @endauth
    </div>

    <!-- Features Section -->
    <div class="row mt-5">
        <div class="col-md-4 text-center">
            <div class="card shadow-sm">
                <div class="card-body">
                    <i class="bi bi-person-check display-4 text-primary mb-3"></i>
                    <h5 class="card-title">Gestione Operatori</h5>
                    <p class="card-text">Aggiungi e organizza gli operatori che lavorano con te per un supporto migliore.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="card shadow-sm">
                <div class="card-body">
                    <i class="bi bi-tags display-4 text-success mb-3"></i>
                    <h5 class="card-title">Categorie Personalizzate</h5>
                    <p class="card-text">Crea categorie per organizzare i tuoi ticket in modo ordinato e chiaro.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="card shadow-sm">
                <div class="card-body">
                    <i class="bi bi-envelope display-4 text-danger mb-3"></i>
                    <h5 class="card-title">Gestione Ticket</h5>
                    <p class="card-text">Monitora i ticket aperti, chiusi e in sospeso in un'interfaccia semplice.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="mt-5 text-center">
        <h3>Inizia ora a organizzare il tuo supporto tecnico!</h3>
        <p class="text-muted">Con {{ config('app.name') }}, migliorare il tuo workflow non è mai stato così semplice.</p>
        
        @auth
            <a href="{{ route('tickets.index') }}" class="btn btn-primary btn-lg">Vai ai Tickets</a>
        @else
            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">Accedi alla Dashboard</a>
        @endauth
    </div>
</div>
@endsection
