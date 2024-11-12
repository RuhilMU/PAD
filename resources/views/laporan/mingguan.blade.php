@extends('layout.laporan')
@section('title laporan', 'LAPORAN KEUANGAN MINGGUAN')
@section('dropdown', 'Mingguan')
<head>
    <title>Mingguan</title>
</head>

@section('content')
    <section class="p-20 drop-shadow-lg">
        <div class="mx-auto"><canvas id="mingguan"></canvas></div>
    </section>


<script>
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

    document.addEventListener('DOMContentLoaded', () => {
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
    });
</script>

@endsection