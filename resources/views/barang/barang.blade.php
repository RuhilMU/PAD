<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="src/Logo.png">
    <title>Daftar Barang</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>


<nav class="bg-gradient-to-r from-[#161D6F] to-[#4854EB] max-w-screen flex flex-row flex-wrap items-center justify-between p-2">
    <div class="flex">
        <a href="/dashboard" class="block items-center space-x-3 rtl:space-x-reverse mr-auto">
            <img src="img/lucide--home.svg" class="h-10" alt="Flowbite Logo" />
        </a>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto" id="navbar-sticky">
        <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
            <li>
                <a href="#" class="flex flex-row py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">
                    DAFTAR BARANG</a>
            </li>
        </ul>
    </div>
    <div>
    </div>
</nav>

<body class="bg-[#F4F1E6]">
    <section class="p-9">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <a href="{{ route('barang.create')}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" style=" display:inline; margin-top: 10px; margin-bottom:10px ; float: left;margin-left:10px;">Tambah</a>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-white uppercase bg-[#324150]">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Tanggal
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total Harga
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Keterangan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($data_keluar as $expense)
                    <tr class="bg-white border-b">
                        
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ \Carbon\Carbon::parse($expense->date)->format('d-m-Y') }}
                        </th>
                        <td class="px-6 py-4">
                        {{ 'Rp ' . number_format($expense->amount, 2, ',', '.') }}
                        </td>
                        <td class="px-6 py-4">
                        {{ $expense->description }}
                        </td>
                        <td class="flex items-center px-6 py-4">
                            <a href="{{ route('barang.edit', $expense->expense_id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('barang.destroy', $expense->expense_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE') 
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3" style="border: none; background: none; cursor: pointer;">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </section>
</body>

</html>