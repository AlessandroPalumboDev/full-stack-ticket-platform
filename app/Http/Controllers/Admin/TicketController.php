<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Operator;
use App\Models\Category;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with(['operator', 'category'])->paginate(10);
        return view('admin.tickets.index', compact('tickets'));
    }

    public function create()
    {
        $operators = Operator::all();
        $categories = Category::all();
        return view('admin.tickets.create', compact('operators', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'operator_id' => 'required|exists:operators,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        Ticket::create($request->all());
        return redirect()->route('admin.tickets.index')->with('success', 'Ticket created successfully.');
    }

    public function show(Ticket $ticket)
    {
        return view('admin.tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        $operators = Operator::all();
        $categories = Category::all();
        return view('admin.tickets.edit', compact('ticket', 'operators', 'categories'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'status' => 'required|in:ASSIGNED,IN_PROGRESS,CLOSED',
        ]);

        $ticket->update($request->only('status'));
        return redirect()->route('admin.tickets.index')->with('success', 'Ticket updated successfully.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('admin.tickets.index')->with('success', 'Ticket deleted successfully.');
    }
}
