<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="src/Logo.png">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>


<nav class="bg-gradient-to-r from-[#161D6F] to-[#4854EB]">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse mr-auto">
            <img src="src/Logo.png" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap">Web Pengelola Keuangan</span>
        </a>

    </div>
</nav>

<body>
    @yield('content')
</body>

<footer class="bg-[#161D6F]">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <span class="block text-sm sm:text-center">© 2024 - Company, Inc. All rights reserved. Address Address</span>
    </div>
</footer>


</html>