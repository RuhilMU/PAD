<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<nav class="bg-[#161D6F] max-w-screen-2xl flex flex-row flex-wrap items-center justify-between p-2">
    <div class="flex">
        <a href="/dashboard" class="block items-center space-x-3 rtl:space-x-reverse mr-auto">
            <img src="{{ asset('img/lucide--home.svg') }}" class="h-10" alt="icon" />
        </a>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto" id="navbar-sticky">
        <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>
                <a href="#" class="flex flex-row py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                    INPUT DATA PEGAWAI</a>
            </li>
        </ul>
    </div>
    <div>
    </div>
</nav>

<body class="bg-[#F4F1E6]">

    <div class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form class="space-y-6" method="post" action="{{ route('barang.store') }}">
            @csrf

            <label for="date">Tanggal</label>
        <input type="date" class="form-control" id="date" name="date">

        <label for="amount">Total Harga</label>
        <input type="number" class="form-control" id="amount" name="amount">

        <label for="description">Keterangan</label>
        <input type="text" class="form-control" id="description" name="description">

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ url('/barang') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts</title>
</head>
 -->

</html>