@extends('layout.auth')

@section('content')

<head>
    <title>Login</title>
</head>

<section>
    <div class="bg-[#F4F1E6] flex flex-row items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex flex-col items-center mr-60 text-2xl font-semibold text-gray-900">
            <img class="w-40 h-40 mr-2 mb-6" src="src/Logo.png"
                alt="logo">
            <span class="font-bold">Web Pengelola Keuangan</span>
        </a>
        <div
            class="bg-[#B0C4DE] drop-shadow-lg w-full rounded-full shadow md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 rounded-3xl space-y-4 md:space-y-6 sm:p-8">
                <h1
                    class="text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                    Login
                </h1>
                <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="email" required="">
                    </div>
                    <div>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            required="">
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">

                        </div>
                        <a href="{{ route('password.request') }}"
                            class="text-sm font-medium text-primary-600 hover:underline">Lupa
                            password?</a>
                    </div>
                    <button type="submit"
                        class="bg-gradient-to-r from-[#161D6F] to-[#4854EB] w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Login</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection