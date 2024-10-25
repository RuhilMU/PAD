<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css">
    @vite('resources/css/app.css')
</head>


<nav>
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="src/Logo.png" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Web Pengelola Keuangan</span>
        </a>

    </div>
</nav>

<body>
    @yield('content')
</body>

<footer>
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <span class="block text-sm sm:text-center">© 2023 <a
                href="https://flowbite.com/" class="hover:underline">Flowbite™</a>. All Rights Reserved.</span>
    </div>
</footer>


</html>