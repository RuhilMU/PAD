@extends('layout.admin')

@section('content')

<head>
    <title>Home</title>
</head>

<body>
    <!-- 4 diagram digeser -->

    <div class="flex items-center justify-center">
        <div style="width: 60%; margin: 3em" class="bg-white m-5 rounded-5"><canvas id="harian"></canvas></div>
    </div>

    <!-- 1 diagram -->
    {{-- <div style="width: 600px;" class="bg-white mx-auto mt-4"><canvas id="harian"></canvas></div> --}}

    <!-- tabel barang titipan -->
    <div style="width: 60%;" class="relative overflow-x-auto shadow-md sm:rounded-lg mx-auto mt-4">
        <div class="flex items-center justify-between" style="background:#EEF0F4">
            <span class="col p-6 items-center" style="color: #161D6F;font-weight:bold; font-size:16px">Daftar Barang</span>
            <div class="relative mt-1 just mr-5" >
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="table-search" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-40 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search">
            </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-white uppercase bg-[#161D6F]">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Toko
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Barang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jumlah
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
</body>
<script>
    const data_harian = [{
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
    const data_mingguan = [{
            week: 1,
            masuk: 55,
            keluar: 50,
            min: 0,
            max: 100
        },
        {
            week: 2,
            masuk: 10,
            keluar: 50
        },
        {
            week: 3,
            masuk: 32,
            keluar: 50
        },
        {
            week: 4,
            masuk: 40,
            keluar: 50
        }
    ];
    const data_bulanan = [{
            month: 1,
            masuk: 55,
            keluar: 50,
            min: 0,
            max: 100
        },
        {
            month: 2,
            masuk: 10,
            keluar: 50
        },
        {
            month: 3,
            masuk: 32,
            keluar: 50
        },
        {
            month: 4,
            masuk: 40,
            keluar: 50
        },
        {
            month: 5,
            masuk: 30,
            keluar: 50
        },
        {
            month: 6,
            masuk: 21,
            keluar: 50
        },
        {
            month: 8,
            masuk: 55,
            keluar: 50
        },
        {
            month: 9,
            masuk: 55,
            keluar: 50
        },
        {
            month: 10,
            masuk: 55,
            keluar: 50
        },
        {
            month: 7,
            masuk: 55,
            keluar: 50
        },
        {
            month: 11,
            masuk: 55,
            keluar: 50
        },
        {
            month: 12,
            masuk: 55,
            keluar: 50
        }
    ];

    document.addEventListener('DOMContentLoaded', () => {
        new Chart(document.getElementById('harian'), {
            type: 'line',
            data: {
                labels: data_harian.map(row => `${row.day}`),
                datasets: [{
                        label: 'Masuk',
                        data: data_harian.map(row => row.masuk),
                        borderColor: '#20BB14',
                        fill: false
                    },
                    {
                        label: 'Keluar',
                        data: data_harian.map(row => row.keluar),
                        borderColor: '#E21F03',
                        fill: false
                    },
                    {
                        label: 'Min',
                        data: data_harian.map(row => row.min),
                        borderColor: 'white',
                        fill: false
                    },
                    {
                        label: 'Max',
                        data: data_harian.map(row => row.max),
                        borderColor: 'white',
                        fill: false
                    }
                ]
            }
        });
        new Chart(document.getElementById('mingguan'), {
            type: 'line',
            data: {
                labels: data_mingguan.map(row => `${row.week}`),
                datasets: [{
                        label: 'Masuk',
                        data: data_mingguan.map(row => row.masuk),
                        borderColor: '#20BB14',
                        fill: false
                    },
                    {
                        label: 'Keluar',
                        data: data_mingguan.map(row => row.keluar),
                        borderColor: '#E21F03',
                        fill: false
                    },
                    {
                        label: 'Min',
                        data: data_mingguan.map(row => row.min),
                        borderColor: 'white',
                        fill: false
                    },
                    {
                        label: 'Max',
                        data: data_mingguan.map(row => row.max),
                        borderColor: 'white',
                        fill: false
                    }
                ]
            }
        });
        new Chart(document.getElementById('bulanan'), {
            type: 'line',
            data: {
                labels: data_bulanan.map(row => `${row.month}`),
                datasets: [{
                        label: 'Masuk',
                        data: data_bulanan.map(row => row.masuk),
                        borderColor: '#20BB14',
                        fill: false
                    },
                    {
                        label: 'Keluar',
                        data: data_bulanan.map(row => row.keluar),
                        borderColor: '#E21F03',
                        fill: false
                    },
                    {
                        label: 'Min',
                        data: data_bulanan.map(row => row.min),
                        borderColor: 'white',
                        fill: false
                    },
                    {
                        label: 'Max',
                        data: data_bulanan.map(row => row.max),
                        borderColor: 'white',
                        fill: false
                    }
                ]
            }
        });
    });
</script>
@endsection