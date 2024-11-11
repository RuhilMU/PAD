@extends('layout.laporan2')
@section('title laporan', 'Edit Data Barang')

<head>
    <title>Edit Data Barang</title>
</head>

@section('content')

<section class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <div class="w-full rounded-full sm:max-w-md xl:p-0">
        <div class="bg-gradient-to-b from-[#CDDAF8] drop-shadow-lg to-[#E5EEFF] px-44 rounded-2xl space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-center font-bold leading-tight tracking-tight text-white md:text-2xl">
                Edit Barang
            </h1>
            <form class="space-y-4 md:space-y-6 px-10" method="post" action="{{ route('barang.update', $expense->expense_id) }}">
                @csrf

                <input type="date" id="date" name="date"
                    value="{{ \Carbon\Carbon::parse($expense->date)->format('d-m-Y') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 drop-shadow-lg rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                    required="">

                <input type="number" id="amount" name="amount"
                    value="{{ number_format($expense->amount, 0, ',', '.') }}" step="0.01" min="0"
                    class="bg-gray-50 border border-gray-300 text-gray-900 drop-shadow-lg rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                    placeholder="Total Harga" required="">

                <textarea type="text" rows="6" id="description" name="description"
                    value="{{ $expense->description }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 drop-shadow-lg rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                    placeholder="Keterangan" required="">
                </textarea>

                <button type="submit" 
                class="bg-[#4C7DE7] ml-28 shadow-lg text-white bg-primary-600 drop-shadow-lg hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5">
                Simpan</button>
            </form>
        </div>
    </div>
</section>

@endsection