@extends('layout.auth')

@section('content')
<head>
    <title>Reset Password</title>
</head>

<body>
    <section>
        <div class="bg-[#F4F1E6] flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-20 h-20 mr-2" src="src/Logo.png"
                    alt="logo">
            </a>
            
            <div class="w-full rounded-full shadow dark:border sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 rounded-2xl space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                Password Baru
            </h1>
                    <form class="space-y-4 md:space-y-6"  method="POST">
                        @csrf
                        <input type="hidden" name="token" >
                        <div>
                            <input type="password" name="password" id="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Password Baru" required>
                        </div>
                        <div>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Konfirmasi Password Baru" required>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Ubah Password</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

@endsection
