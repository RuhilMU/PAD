<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use PDF;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the expenses.
     */
// fungsi untuk menampilkan daftar pengeluaran dengan pagination
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $data_keluar = Expense::with('user')->paginate($perPage);;
        return view('barang.barang', compact('data_keluar', 'perPage'));
    }

    /**
     * Show the form for creating a new expense.
     */
// fungsi untuk menampilkan form untuk membuat pengeluaran
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created expense in storage.
     */
// fungsi untuk menyimpan data pengeluaran ke database
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'amount' => 'required|integer',
            'date' => 'required|date',
        ]);

        Expense::create([
            'description' => $request->description,
            'amount' => $request->amount,
            'date' => $request->date,
        ]);

        return redirect('/barang')->with('success', 'Expense created successfully');
    }

    /**
     * Show the form for editing the specified expense.
     */
// fungsi untuk menampilkan form untuk mengedit data pengeluaran berdasarkan id
    public function edit($expense_id)
    {
        $expense = Expense::findOrFail($expense_id);
        return view('barang.edit', compact('expense'));
    }

    /**
     * Update the specified expense in storage.
     */
// fungsi untuk memperbarui data pengeluaran berdasarkan id di database
    public function update(Request $request, $expense_id)
    {
        $request->validate([
            'description' => 'required',
            'amount' => 'required|integer',
            'date' => 'required|date',
        ]);

        $expense = Expense::findOrFail($expense_id);
        $expense->update([
            'description' => $request->description,
            'amount' => $request->amount,
            'date' => $request->date,
        ]);

        return redirect('/barang');
    }

    /**
     * Remove the specified expense from storage.
     */
// fungsi untuk menghapus data pengeluaran berdasarkan id dari database
    public function destroy($expense_id)
    {
        $expense = Expense::findOrFail($expense_id);
        $expense->delete();

        return redirect('/barang');
    }

// fungsi untuk menampilkan tampilan form untuk menetapkan rentang tanggal data pengeluaran 
    public function pageunduh()
    {
        return view('barang.unduh');
    }

// fungsi untuk mengunduh laporan pengeluaran dalam format PDF berdasarkan rentang tanggal
    public function download(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $expenses = Expense::whereBetween('date', [$request->start_date, $request->end_date])
            ->orderBy('date', 'asc')
            ->get();

        $data = [
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'expenses' => $expenses,
        ];

        $pdf = PDF::loadView('barang.pdf', $data);

        return $pdf->download('pengeluaran_periode_' . $request->start_date . '_-_' . $request->end_date . '.pdf');
    }
}
