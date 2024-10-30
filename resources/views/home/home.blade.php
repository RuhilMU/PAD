@extends('layout.admin')

@section('content')

<body>
    <div style="width: 500px;"><canvas id="acquisitions"></canvas></div>
</body>
<script>
    const data = [
    { day: 1, masuk: 55, keluar: 50, min : 0, max : 100 },
    { day: 2, masuk: 10, keluar: 50 },
    { day: 3, masuk: 32, keluar: 50 },
    { day: 4, masuk: 40, keluar: 50 },
    { day: 5, masuk: 30, keluar: 50 },
    { day: 6, masuk: 21, keluar: 50 },
    { day: 7, masuk: 55, keluar: 50 }
];

document.addEventListener('DOMContentLoaded', () => {
    new Chart(document.getElementById('acquisitions'), {
        type: 'line',
        data: {
            labels: data.map(row => `Hari ${row.day}`),
            datasets: [
                {
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