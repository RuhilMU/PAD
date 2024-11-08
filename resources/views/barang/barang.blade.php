@extends('layout.laporan2')
@section('title laporan', 'Daftar Barang')

<head>
    <title>Daftar Barang</title>
</head>

@section('content')

<section class="px-60 py-20">
    <!-- tabel barang -->
    <div class="flex items-center" style="background:#EEF0F4">
        <a href="{{ route('barang.create')}}" class="col p-3 items-center text-blue-600 hover:underline" style="font-weight:bold; font-size:13px">Tambah</a>
        <a href="/edit-barang" class="col p-3 items-center text-blue-600 hover:underline" style="font-weight:bold; font-size:13px">Edit</a>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-white uppercase bg-[#324150]">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Harga
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Keterangan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_keluar as $expense)
                <tr class="bg-white border-b">

                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ \Carbon\Carbon::parse($expense->date)->format('d-m-Y') }}
                    </th>
                    <td class="px-6 py-4">
                        {{ 'Rp ' . number_format($expense->amount, 2, ',', '.') }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $expense->description }}
                    </td>
                    <td class="flex items-center px-6 py-4">
                        <a href="{{ route('barang.edit', $expense->expense_id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('barang.destroy', $expense->expense_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3" style="border: none; background: none; cursor: pointer;">Remove</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection