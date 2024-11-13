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
            $status = $consignment->exit_date ? 'Close' : 'Open';

            $circulationDuration = $consignment->entry_date && $consignment->exit_date 
                ? Carbon::parse($consignment->entry_date)->diffInDays(Carbon::parse($consignment->exit_date)) 
                : null;

            $totalPrice = $consignment->quantity * $consignment->product->price;

            return [
                'consignment_id' => $consignment->consignment_id,
                'product_name' => $consignment->product->product_name,
                'store_name' => $consignment->store->store_name,
                'status' => $status,
                'circulation_duration' => $circulationDuration,
                'entry_date' => $consignment->entry_date,
                'exit_date' => $consignment->exit_date,
                'price' => $consignment->product->price,
                'total_price' => $totalPrice,
                'quantity' => $consignment->quantity,
            ];
        });

        return view('transaksi.transaksi', compact('consignments'));
    }

    public function laporanEdit($consignment_id)
    {
        $consignment = Consignment::find($consignment_id);
        return view('transaksi.edit', compact('consignment'));
    }

    public function laporanCreate()
    {
        return view('transaksi.tambah');
    }

        public function laporanStore(Request $request)
        {
            $request->validate([
                'product_name' => 'required|string',
                'store_name' => 'required|string',
                'price' => 'required|integer',
                'quantity' => 'required|integer',
                'entry_date' => 'required|date',
                'exit_date' => 'nullable|date',
            ]);

            $consignment = new Consignment();
            
            $product = Product::create(['product_name'=>$request->product_name, 'price'=>$request->price]);
            $store = Store::create(['store_name'=>$request->store_name]);

            $consignment->product_id = $product->product_id;
            $consignment->store_id = $store->store_id;
            $consignment->quantity = $request->quantity;
            $consignment->entry_date = $request->entry_date;

            if ($request->has('exit_date')) {
                $consignment->exit_date = $request->exit_date;
            }
            $consignment->save();
            return redirect('/transaksi');
        }

    

    public function laporanUpdate(Request $request, $consignment_id)
    {
        $request->validate([
            'store_name' => 'required|string',
            'product_name' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|integer',
            'entry_date' => 'required|date',
            'exit_date' => 'nullable|date',
        ]);

        $consignment = Consignment::with(['store','product'])->find($consignment_id);

        // $consignment->store->store_name = $request->store_name;
        // $consignment->store->save();
        $consignment->store->update(['store_name'=>$request->store_name]);

        // $consignment->product->product_name = $request->product_name;
        // $consignment->product->save();
        $consignment->product->update(['product_name'=>$request->product_name]);
        $consignment->product->update(['price'=>$request->price]);

        $consignment->quantity = $request->quantity;
        $consignment->entry_date = $request->entry_date;

        if ($request->has('exit_date')) {
            $consignment->exit_date = $request->exit_date;
        }
        $consignment->save();
        return redirect('/transaksi');
    }


    public function laporanDestroy($consignment_id)
    {
        $consignment = Consignment::findOrFail($consignment_id);
        $consignment->delete();

        return redirect()->route('laporan.index');
    }
    

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