<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Operator;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index()
    {
        $operators = Operator::paginate(10);
        return view('admin.operators.index', compact('operators'));
    }

    public function create()
    {
        return view('admin.operators.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:operators,email',
        ]);

        Operator::create($request->all());
        return redirect()->route('admin.operators.index')->with('success', 'Operator created successfully.');
    }

    public function edit(Operator $operator)
    {
        return view('admin.operators.edit', compact('operator'));
    }

    public function update(Request $request, Operator $operator)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:operators,email,' . $operator->id,
        ]);

        $operator->update($request->all());
        return redirect()->route('admin.operators.index')->with('success', 'Operator updated successfully.');
    }

    public function destroy(Operator $operator)
    {
        $operator->delete();
        return redirect()->route('admin.operators.index')->with('success', 'Operator deleted successfully.');
    }
}
