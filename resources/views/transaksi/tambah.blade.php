@extends('layout.laporan2')
@section('title laporan', 'Input Data')

<head>
    <title>Input Data</title>
</head>

@section('content')

<section class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <div class="w-full rounded-full sm:max-w-md xl:p-0">
        <div class="bg-gradient-to-b from-[#CDDAF8] to-[#E5EEFF] px-44 rounded-2xl space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-center font-bold leading-tight tracking-tight text-white md:text-2xl">
                Input Transaksi
            </h1>
            <form class="space-y-4 md:space-y-6 px-10" method="POST">
                @csrf
                <input type="text" name="nama_barang" id="nama_barang"
                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                    placeholder="Nama Barang" required="">
                <input type="text" name="tanggal_masuk" id="tanggal_masuk"
                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                    placeholder="Tanggal Masuk" required="">
                <input type="text" name="tanggal_keluar" id="tanggal_keluar"
                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                    placeholder="Tanggal Keluar" required="">
                <input type="text" name="harga" id="harga"
                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                    placeholder="Harga" required="">
                <input type="text" name="Stok" id="Stok"
                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                    placeholder="Stok" required="">
                <button type="submit"
                    class="bg-[#4C7DE7] w-full place-items-center text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Simpan</button>
            </form>
        </div>
    </div>
</section>

@endsection