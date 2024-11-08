@extends('layout.laporan2')
@section('title laporan', 'Transaksi')

<head>
    <title>Transaksi</title>
</head>

@section('content')
<section class="p-10">
    <div class="mx-auto"><canvas id="acquisitions"></canvas></div>

    <!-- tabel barang -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-auto mt-4">
        <div class="flex items-center" style="background:#EEF0F4">
            <a href="/tambah-transaksi" class="col p-3 items-center text-blue-600 hover:underline" style="font-weight:bold; font-size:13px">Tambah</a>
            <a href="/edit-transaksi" class="col p-3 items-center text-blue-600 hover:underline" style="font-weight:bold; font-size:13px">Edit</a>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-white uppercase bg-[#324150]">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Barang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Waktu Edar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Masuk
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Keluar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga Total
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Stok
                    </th>
                </tr>
            </thead>

            {{-- Ini nanti isi pakai data dummy aja --}}
            <tbody>
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4">
                        asda
                    </td>
                    <td class="px-6 py-4">
                        asda
                    </td>
                    <td class="px-6 py-4">
                        31
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>



<script>
    const data = [{
            day: 1,
            masuk: 55,
            keluar: 50,
            min: 0,
            max: 100
        },
        {
            day: 2,
            masuk: 10,
            keluar: 50
        },
        {
            day: 3,
            masuk: 32,
            keluar: 50
        },
        {
            day: 4,
            masuk: 40,
            keluar: 50
        },
        {
            day: 5,
            masuk: 30,
            keluar: 50
        },
        {
            day: 6,
            masuk: 21,
            keluar: 50
        },
        {
            day: 7,
            masuk: 55,
            keluar: 50
        }
    ];

    document.addEventListener('DOMContentLoaded', () => {
        new Chart(document.getElementById('acquisitions'), {
            type: 'line',
            data: {
                labels: data.map(row => `Hari ${row.day}`),
                datasets: [{
                        label: 'Masuk',
                        data: data.map(row => row.masuk),
                        borderColor: '#20BB14',
                        fill: false
                    },
                    {
                        label: 'Keluar',
                        data: data.map(row => row.keluar),
                        borderColor: '#E21F03',
                        fill: false
                    },
                    {
                        label: 'Min',
                        data: data.map(row => row.min),
                        borderColor: 'white',
                        fill: false
                    },
                    {
                        label: 'Max',
                        data: data.map(row => row.max),
                        borderColor: 'white',
                        fill: false
                    }
                ]
            }
        });
    });
</script>

@endsection