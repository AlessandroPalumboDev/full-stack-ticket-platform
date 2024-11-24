@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestione Ticket</h1>

    {{-- Filtri --}}
    <form action="{{ route('tickets.index') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <select name="status" class="form-control" onchange="this.form.submit()">
                    <option value="">Tutti gli stati</option>
                    @foreach ($statuses as $status)
                        <option value="{{ $status }}" {{ request('status') === $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <select name="category" class="form-control" onchange="this.form.submit()">
                    <option value="">Tutte le categorie</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category }}" {{ request('category') === $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    {{-- Tabella Ticket --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Ticket</th>
                <th>Stato</th>
                <th>Categoria</th>
                <th>Operatore</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->title }}</td>
                    <td>{{ $ticket->status }}</td>
                    <td>{{ $ticket->category ? $ticket->category->name : 'N/A' }}</td>
                    <td>{{ $ticket->operator ? $ticket->operator->name : 'Non assegnato' }}</td>
                    <td>
                        <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-info btn-sm">Dettagli</a>
                        @if ($ticket->status !== 'CLOSED')
                            <a href="#" 
                               class="btn btn-primary btn-sm" 
                               data-toggle="modal" 
                               data-target="#assignModal-{{ $ticket->id }}">
                                {{ $ticket->status === 'IN_PROGRESS' ? 'Cambia Operatore' : 'Assegna Operatore' }}
                            </a>
                            <form action="{{ route('tickets.status.update', $ticket) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="CLOSED">
                                <button type="submit" class="btn btn-warning btn-sm mt-1">Chiudi</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $tickets->links() }}

</div>

{{-- Modale Assegna/Cambia Operatore --}}
@foreach ($tickets as $ticket)
    @if ($ticket->status !== 'CLOSED')
        <div class="modal fade" id="assignModal-{{ $ticket->id }}" tabindex="-1" role="dialog" aria-labelledby="assignModalLabel-{{ $ticket->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('tickets.assign', $ticket) }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="assignModalLabel-{{ $ticket->id }}">
                                {{ $ticket->status === 'IN_PROGRESS' ? 'Cambia Operatore' : 'Assegna Operatore' }}
                            </h5>
                            @if(session('error'))
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        $('#noOperatorsModal').modal('show');
                                    });
                                </script>
                            @endif
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <select name="operator_id" class="form-control">
                                <option value="">Seleziona un operatore</option>
                                @foreach (\App\Models\Operator::where('is_available', true)->get() as $operator)
                                    <option value="{{ $operator->id }}">{{ $operator->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                {{ $ticket->status === 'IN_PROGRESS' ? 'Cambia' : 'Assegna' }}
                            </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endforeach

{{-- Modale per quando non ci sono operatori disponibili --}}
<div class="modal fade" id="noOperatorsModal" tabindex="-1" role="dialog" aria-labelledby="noOperatorsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="noOperatorsModalLabel">Nessun Operatore Disponibile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Al momento non ci sono operatori disponibili per l'assegnazione. Prova più tardi.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
            </div>
        </div>
    </div>
</div>

@endsection
