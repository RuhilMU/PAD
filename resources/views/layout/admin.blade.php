<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="src/Logo.png">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<!-- navbar -->
<nav class="bg-gradient-to-r from-[#161D6F] to-[#4854EB] max-w-screen flex flex-row flex-wrap items-center justify-between p-2">
    <div class="flex">
        <a href="/dashboard" class="flex items-center space-x-3 rtl:space-x-reverse mr-auto">
            <img src="{{ asset('src/Logo.png') }}" class="h-10"/>
            <span class="text-white self-center text-2xl font-semibold whitespace-nowrap">Web Pengelola Keuangan</span>
        </a>
    </div>
    <div class="flex items-center justify-between w-full md:flex md:w-auto" id="navbar-sticky">
        <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
            <!-- untuk pindah ke page transaksi -->
            <li>                
                <a href="/transaksi" class="flex flex-row py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">
                <img src="{{ asset('img/transaksi.svg') }}" alt="adasa" class="w-9 h-6"> Transaksi</a>
            </li>
            @if (Auth::User()->role == 'owner')
            <!-- untuk pindah ke page laporan keuangan -->
            <li>                   
                <a href="/mingguan" class="flex flex-row py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">
                <img src="{{ asset('img/logo_1.svg') }}" alt="adasa" class="w-9 h-6"> Laporan Keuangan</a>
            </li>
            <!-- untuk pindah ke page daftar pengeluaran -->
            <li>
                <a href="/barang" class="flex flex-row py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">
                    <img src="{{ asset('img/search.svg') }}" alt="adasa" class="w-9 h-6"> Daftar Barang</a>
            </li>
            <!-- untuk pindah ke page manajemen pegawai -->
            <li>
                <a href="/pegawai" class="flex flex-row py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">
                    <img src="{{ asset('img/profile.svg') }}" alt="adasa" class="w-9 h-6"> Manajemen Pegawai</a>
            </li>
            @endif
        </ul>
    </div>
    <!-- logout -->
    <div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Log Out</button>
        </form>
    </div>
</nav>

<body class="bg-[#F4F1E6]">
    @yield('content')
</body>

</html>