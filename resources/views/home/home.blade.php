@extends('layout.admin')

@section('content')
<head>
    <title>Home</title>
</head>

<body>
    <div class="grid grid-cols-3 mt-4">
        <div style="width: 500px;" class="bg-white"><canvas id="acquisitions"></canvas></div>
        <div style="width: 500px;" class="bg-white"><canvas id="acquisitions"></canvas></div>
        <div style="width: 500px;" class="bg-white"><canvas id="acquisitions"></canvas></div>
    </div>
    <div style="width: 600px;" class="bg-white mx-auto mt-4"><canvas id="acquisitions"></canvas></div>
</body>
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