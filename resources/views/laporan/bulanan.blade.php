@extends('layout.laporan')
@section('title laporan', 'LAPORAN KEUANGAN BULANAN')
@section('dropdown', 'Bulanan')

<head>
    <title>Bulanan</title>
</head>

<!-- line chart bulanan -->
@section('content')
<section class="p-20 drop-shadow-lg">
    <div class="mx-auto"><canvas id="monthlyReportChart"></canvas></div>
</section>

<script>
    // logic untuk isi data pada line chart bulanan
    document.addEventListener('DOMContentLoaded', () => {
        const ctx = document.getElementById('monthlyReportChart').getContext('2d');
        fetch('/bulanan/monthly-report')
            .then(response => response.json())
            .then(data_bulanan => {
                new Chart(ctx, {
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