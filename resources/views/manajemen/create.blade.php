@extends('layout.laporan2')
@section('title laporan', 'Input Data Pegawai')

<head>
    <title>Input Data Pegawai</title>
</head>

@section('content')

<section class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <div class="w-full rounded-full sm:max-w-md xl:p-0">
        <div class="bg-gradient-to-b from-[#CDDAF8] drop-shadow-lg to-[#E5EEFF] px-44 rounded-2xl space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-center font-bold leading-tight tracking-tight text-white md:text-2xl">
                Input Pegawai
            </h1>
            <form class="space-y-4 md:space-y-6 px-10" method="post" action="{{ route('pegawai.store') }}">
                @csrf

                <input type="text" id="name" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 drop-shadow-lg rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                    placeholder="Nama Pegawai" required="">

                <input type="email" id="email" name="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 drop-shadow-lg rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                    placeholder="Email" required="">

                <input type="password" id="password" name="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 drop-shadow-lg rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                    placeholder="Password" required="">

                <input type="password" id="password" name="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 drop-shadow-lg rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                    placeholder="Confirm Password" required="">

                <button type="submit"
                    class="bg-[#4C7DE7] ml-28 shadow-lg text-white bg-primary-600 drop-shadow-lg hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5">
                    Simpan</button>
            </form>
        </div>
    </div>
</section>
@endsection