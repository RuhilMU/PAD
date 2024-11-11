@extends('layout.laporan')
@section('title laporan', 'RIWAYAT PENGHASILAN')
@section('dropdown', 'Riwayat Penghasilan')

<head>
    <title>Riwayat</title>
</head>

@section('content')
<section class="flex flex-col p-20">
    <div class="grid grid-cols-2 gap-2 p-5 bg-[#F4F1E6] mx-auto w-full mb-10">
        <div class="grid grid-rows-2 gap-2 bg-[#F4F1E6] mr-3">
            <!-- profit -->
            <div class="bg-gradient-to-r from-[#77D670] to-[#A0EB9B] h-auto max-w-full py-3 mb-3 rounded-xl drop-shadow-lg col-span-1 text-center">
                <h1 class="text-4xl text-white font-semibold py-3">Profit</h2>
                    <p class="text-6xl text-white font-bold py-3">Rp 10.979.000</p>
            </div>
            <!-- omset -->
            <div class="bg-gradient-to-r from-[#E87676] to-[#EBAEAE] h-auto max-w-full py-3 mt-3 rounded-xl drop-shadow-lg col-span-1 text-center">
                <h1 class="text-4xl text-white font-semibold py-3">Omset</h2>
                    <p class="text-6xl text-white font-bold py-3">Rp 1.979.000.000</p>
            </div>
        </div>
        <!-- pie chart -->
        <div class="bg-[#98E493] h-auto max-w-full rounded-xl ml-3 drop-shadow-lg col-span-1 p-3">
            <h2 class="text-5xl text-white/75 drop-shadow-lg font-semibold text-center mb-4">Presentase Penjualan</h2>
            <div class="flex justify-center bg-[#98E493]">
                <div class="bg-[#98E493]"><canvas id="presentase"></canvas></div>
            </div>
        </div>
    </div>
    <!-- line chart -->
    <div class="drop-shadow-lg"><canvas id="acquisitions"></canvas></div>
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

    const data_2 = [{
            barang: 'Kue Kering',
            jual: 30
        },
        {
            barang: 'Keripik',
            jual: 40
        },
        {
            barang: 'Roti',
            jual: 20
        },
        {
            barang: 'Makaroni',
            jual: 10
        }
    ];

    document.addEventListener('DOMContentLoaded', () => {
        new Chart(document.getElementById('presentase'), {
            type: 'pie',
            data: {
                labels: data_2.map(row => `${row.barang}`),
                datasets: [{
                    data: data_2.map(row => row.jual)
                }]
            }
        });
    });

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