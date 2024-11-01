<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>


<nav class="max-w-screen-2xl flex flex-row flex-wrap items-center justify-between p-2">
    <div class="flex">
        <a href="https://flowbite.com/" class="block items-center space-x-3 rtl:space-x-reverse mr-auto">
            <img src="src/Logo.png" class="h-10" alt="Flowbite Logo" />
        </a>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto" id="navbar-sticky">
        <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>                
                <a href="/dashboard" class="flex flex-row py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                <img src="{{ asset('img/logo_1.svg') }}" alt="adasa" class="w-9 h-6"> Laporan Keuangan</a>
            </li>
            <li>
                <a href="/barang" class="flex flex-row py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                <img src="{{ asset('img/search.svg') }}" alt="adasa" class="w-9 h-6"> Daftar Barang</a>
            </li>
            <li>
                <a href="/pegawai" class="flex flex-row py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                <img src="{{ asset('img/profile.svg') }}" alt="adasa" class="w-9 h-6"> Manajemen Pegawai</a>
            </li>
        </ul>
    </div>
    <div>
    <form action="{{ route('logout') }}" method="POST">
    @csrf
        <button type="submit" class="text-gray-900 bg-[#D9D9D9] border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Log Out</button>
    </form>
    </div>
</nav>

<body class="bg-[#F4F1E6]">
    @yield('content')
</body>

</html>