@extends('layouts.app')

@section('content')
<h1>Tickets</h1>
<a href="{{ route('admin.tickets.create') }}" class="btn btn-primary mb-3">Create Ticket</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Operator</th>
            <th>Category</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tickets as $ticket)
        <tr>
            <td>{{ $ticket->id }}</td>
            <td>{{ $ticket->title }}</td>
            <td>{{ $ticket->operator->name }}</td>
            <td>{{ $ticket->category->name }}</td>
            <td>{{ $ticket->status }}</td>
            <td>
                <a href="{{ route('admin.tickets.show', $ticket) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('admin.tickets.edit', $ticket) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.tickets.destroy', $ticket) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $tickets->links() }}
@endsection
