@extends('layouts.app')

@section('content')
<h1>Create Ticket</h1>
<form action="{{ route('admin.tickets.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" id="title" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea id="description" name="description" class="form-control" rows="5" required></textarea>
    </div>
    <div class="mb-3">
        <label for="operator_id" class="form-label">Operator</label>
        <select id="operator_id" name="operator_id" class="form-select" required>
            @foreach ($operators as $operator)
                <option value="{{ $operator->id }}">{{ $operator->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="category_id" class="form-label">Category</label>
        <select id="category_id" name="category_id" class="form-select" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select id="status" name="status" class="form-select" required>
            <option value="ASSIGNED">Assigned</option>
            <option value="IN_PROGRESS">In Progress</option>
            <option value="CLOSED">Closed</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
</form>
@endsection
