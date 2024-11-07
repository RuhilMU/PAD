<?php

namespace App\Http\Controllers;

use App\Models\Consignment;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ConsignmentController extends Controller
{
    public function laporanIndex()
    {
        $consignments = Consignment::with('product', 'store')
        ->get()
        ->map(function ($consignment) {
            $status = Carbon::parse($consignment->entry_date)->diffInDays(Carbon::now()) > 7 ? 'close' : 'open';

            $circulationDuration = $consignment->entry_date && $consignment->exit_date 
                ? Carbon::parse($consignment->entry_date)->diffInDays(Carbon::parse($consignment->exit_date)) 
                : null;

            $totalPrice = $consignment->quantity * $consignment->product->price;

            return [
                'product_name' => $consignment->product->product_name,
                'status' => $status,
                'circulation_duration' => $circulationDuration,
                'entry_date' => $consignment->entry_date,
                'exit_date' => $consignment->exit_date,
                'price' => $consignment->product->price,
                'total_price' => $totalPrice,
                'quantity' => $consignment->quantity,
            ];
        });

        return view('laporan.transaksi', compact('consignments'));
    }

    public function laporanStore(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'store_id' => 'required|exists:stores,id',
            'quantity' => 'required|integer',
            'entry_date' => 'required|date',
            'exit_date' => 'nullable|date',
        ]);

        Consignment::create($validated);
        return redirect()->route('laporan.index');
    }

    public function laporanUpdate(Request $request, Consignment $consignment)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'store_id' => 'required|exists:stores,id',
            'quantity' => 'required|integer',
            'entry_date' => 'required|date',
            'exit_date' => 'nullable|date',
        ]);

        $consignment->update($validated);
        return redirect()->route('laporan.index');
    }

    public function laporanDestroy($consignment_id)
    {
        $consignment = Consignment::findOrFail($consignment_id);
        $consignment->delete();

        return redirect()->route('laporan.index');
    }
    
    //

    public function mainpageIndex()
    {
        $consignments = Consignment::with('product', 'store')
        ->get()
        ->filter(function ($consignment) {
            return $consignment->status === 'open';
        })
        ->map(function ($consignment) {
            return [
                'store_name' => $consignment->store->store_name,
                'product_name' => $consignment->product->product_name,
                'quantity' => $consignment->quantity,
            ];
        });

        return view('home.home', compact('consignments'));
    }

    public function mainpageSearch(Request $request)
{
    $search = $request->input('search');

    $consignments = Consignment::with('product', 'store')
        ->when($search, function ($query, $search) {
            return $query->whereHas('product', function ($q) use ($search) {
                $q->where('product_name', 'like', '%' . $search . '%');
            })->orWhereHas('store', function ($q) use ($search) {
                $q->where('store_name', 'like', '%' . $search . '%');
            });
        })
        ->get()
        ->filter(function ($consignment) {
            return $consignment->status === 'open';
        })
        ->map(function ($consignment) {
            return [
                'store_name' => $consignment->store->store_name,
                'product_name' => $consignment->product->product_name,
                'quantity' => $consignment->quantity,
            ];
        });

    return view('home.home', compact('consignments', 'search'));
}
}