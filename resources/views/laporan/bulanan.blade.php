@extends('layout.laporan')
@section('title laporan', 'LAPORAN KEUANGAN BULANAN')
@section('dropdown', 'Bulanan')
<head>
    <title>Bulanan</title>
</head>

@section('content')
    <section class="p-20 drop-shadow-lg">
        <div class="mx-auto"><canvas id="bulanan"></canvas></div>
    </section>


<script>
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