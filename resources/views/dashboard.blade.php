@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Benvenuto nella tua Dashboard!</h1>

    <div class="alert alert-info" role="alert">
        Ciao {{ auth()->user()->name }}, questa è la tua area personale dove puoi gestire tutte le tue attività.
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <a href="{{ route('tickets.index') }}" class="btn btn-primary">Vai ai tickets</a>

        </div>

       
    </div>
</div>
@endsection
