@extends('layout.laporan2')
@section('title laporan', 'Daftar Barang')

<head>
    <title>Daftar Barang</title>
</head>

@section('content')
<section class="px-60 py-20">
    <!-- tabel barang -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-auto mt-4">
        <div class="flex items-center" style="background:#EEF0F4">
            <a href="/tambah-barang" class="col p-3 items-center text-blue-600 hover:underline" style="font-weight:bold; font-size:13px">Tambah</a>
            <a href="/edit-barang" class="col p-3 items-center text-blue-600 hover:underline" style="font-weight:bold; font-size:13px">Edit</a>
        </div>
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
                <tr class="bg-white border-b">
                    <th class="px-6 py-4">
                        Apple MacBook Pro 17"
                    </th>
                    <td class="px-6 py-4">
                        Silver
                    </td>
                    <td class="px-6 py-4">
                        Laptop
                    </td>
                    <td class="flex items-center px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                        <a href="#" class="font-medium text-red-600 hover:underline ms-3">Remove</a>
                    </td>
                </tr>

                </tr>
            </tbody>
        </table>
    </div>
</section>
@endsection