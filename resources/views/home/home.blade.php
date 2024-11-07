@extends('layout.admin')

@section('content')

<head>
    <title>Home</title>
</head>

<body>
    <!-- 3 diagram -->
    <div class="grid grid-cols-3 mt-4">
        <div style="width: 500px;" class="bg-white"><canvas id="harian"></canvas></div>
        <div style="width: 500px;" class="bg-white"><canvas id="mingguan"></canvas></div>
        <div style="width: 500px;" class="bg-white"><canvas id="bulanan"></canvas></div>
    </div>
    <!-- 1 diagram -->
    <div style="width: 600px;" class="bg-white mx-auto mt-4"><canvas id="riwayat"></canvas></div>
    <!-- tabel barang titipan -->
    <div style="width: 600px;" class="relative overflow-x-auto shadow-md sm:rounded-lg mx-auto mt-4">
        <div class="relative flex flex-row pb-4 bg-[#EEF0F4] dark:bg-gray-900">
            <span class="static">Daftar Barang</span>
            <a href="{{ route('create')}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" style=" display:inline; margin-top: 10px; margin-bottom:10px ; float: left;margin-left:10px;">Tambah</a>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mt-1" style=" display:inline; margin-top: 10px; margin-bottom:10px ; float: right;margin-right:10px;">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="table-search" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-40 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search">
            </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-white uppercase bg-[#161D6F] dark:bg-gray-700 dark:text-gray-400">
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
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
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