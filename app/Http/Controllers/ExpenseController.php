<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\User;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the expenses.
     */
    public function index()
    {
        $data_keluar = Expense::with('user')->get();
        return view('barang.barang', compact('data_keluar'));
    }

    /**
     * Show the form for creating a new expense.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created expense in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);

        Expense::create([
            'description' => $request->description,
            'amount' => $request->amount,
            'date' => $request->date,
            'user_id' => Auth::id(), 
        ]);

        return redirect('/barang')->with('success', 'Expense created successfully');
    }

    /**
     * Show the form for editing the specified expense.
     */
    public function edit($expense_id)
    {
        $expense = Expense::findOrFail($expense_id);
        return view('barang.edit', compact('expense'));
    }

    /**
     * Update the specified expense in storage.
     */
    public function update(Request $request, $expense_id)
    {
        $request->validate([
            'description' => 'required',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $expense = Expense::findOrFail($expense_id);
        $expense->update([
            'description' => $request->description,
            'amount' => $request->amount,
            'date' => $request->date,
            'user_id' => Auth::id(), 
        ]);

        return redirect('/barang');
    }

    /**
     * Remove the specified expense from storage.
     */
    public function destroy($expense_id)
    {
        $expense = Expense::findOrFail($expense_id);
        $expense->delete();

        return redirect('/barang');
    }
}