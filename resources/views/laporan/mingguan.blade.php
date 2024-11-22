@extends('layout.laporan')
@section('title laporan', 'LAPORAN KEUANGAN MINGGUAN')
@section('dropdown', 'Mingguan')
<head>
    <title>Mingguan</title>
</head>

@section('content')
<section class="p-20 drop-shadow-lg">
    <div class="mx-auto"><canvas id="weeklyReportChart"></canvas></div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const ctx = document.getElementById('weeklyReportChart').getContext('2d');
        fetch('/mingguan/weekly-report')
            .then(response => response.json())
            .then(data_mingguan => {
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data_mingguan.map(row => `Week ${row.week}`),
                        datasets: [
                            {
                                label: 'Masuk',
                                data: data_mingguan.map(row => row.masuk),
                                borderColor: '#20BB14',
                                fill: false,
                            },
                            {
                                label: 'Keluar',
                                data: data_mingguan.map(row => row.keluar),
                                borderColor: '#E21F03',
                                fill: false,
                            },
                        ],
                    },
                    options: {
                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Error loading data:', error));
    });
</script>

@endsection