<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{asset('css/animate.css')}}" />
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>
    <!-- Styles -->
</head>

<body class="">
    <header class="w-full bg-transparent text-white h-20 px-3 py-4 z-0 shadow-lg">
        <nav class="w-full flex justify-between items-center">
            <div id="brand" class="col-span-1"><svg class="w-10 h-10 text-white" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                    <path
                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222">
                    </path>
                </svg></div>
            <ul class="flex justify-around">
                <li class="ml-3"><a href="#">Home</a></li>
                <li class="ml-3"><a href="#">Pemesanan</a></li>
                <li class="ml-3"><a href="#">Informasi</a></li>
                <li class="ml-3"><a href="#">Tentang Kami</a></li>
            </ul>
            <ul class="flex justify-between col-span-1">
                <li class="bg-white px-3 py-2 rounded-lg flex items-center text-gray-800"><a
                        href="{{ route('login') }}">Login</a>
                </li>
                <li class="flex items-center text-white ml-3"><a href="{{ route('register') }}">Register</a></li>
            </ul>

        </nav>
    </header>
    <div id="hero" class="w-full h-screen fixed bg-blue-600  top-0 -z-10"
        style="background-image: url({{ asset('img/bg-1.jpg') }}); background-size: cover;">
        <div class="w-full h-full bg-black opacity-60">
        </div>
    </div>
    <main class="w-full h-full overflow-hidden">
        {{-- <div class="w-full h-screen"></div> --}}
        <div class="w-full h-screen bg-transparent flex items-center justify-center px-10">
            <div class="grid grid-cols-6 gap-4 w-full h-screen grid-rows-4 py-7">
                <div
                    class="col-span-2 col-start-2 row-start-1 bg-white opacity-90 shadow-white rounded-lg shadow-lg wow slideInLeft" data-wow-duration="2s" data-wow-delay="0.2s">
                </div>
                <div class="col-span-2 col-start-4 row-start-2 bg-white opacity-90 shadow-white rounded-lg shadow-lg wow slideInRight" data-wow-duration="2s" data-wow-delay="0.4s" >
                </div>
                <div class="col-span-2 col-start-2 row-start-3 bg-white opacity-90 shadow-white rounded-lg shadow-lg wow slideInLeft" data-wow-duration="2s" data-wow-delay="0.6s">
                </div>
                <div class="col-span-2 col-start-4 row-start-4 bg-white opacity-90 shadow-white rounded-lg shadow-lg wow slideInRight" data-wow-duration="2s" data-wow-delay="0.8s">
                </div>
                {{-- <div class="w-1/3 h-1/3 bg-white rounded-lg shadow-lg"></div> --}}
            </div>
        </div>
        <div class="w-full h-full px-3 py-2">
            <h3 class="w-full py-3 text-center text-white font-bold text-2xl">Produk</h3>
            <div class="container">
                <div class="w-full h-full px-2 py-3 grid grid-cols-10 gap-2">

                </div>
            </div>
        </div>
    </main>
</body>

</html>
