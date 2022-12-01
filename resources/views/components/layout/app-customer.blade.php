<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('APP_NAME', 'Dermaga Bangkoa') }}</title>

    <link id="heading-font" rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700;800;900&display=swap"
        media="all" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    <script>
        new WOW().init();
    </script>
    @vite(['resources/js/app.js'])
     <link rel="stylesheet" href="{{ asset('build/assets/app.cea81095.css') }}">

    <script src="{{asset("js/jquery-3.6.1.min.js")}}"></script>

    <!-- Styles -->
    @livewireStyles
</head>

<body>
    <div class="bg-gray-900">
        <div class="px-4 py-5 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
            <div class="relative flex items-center justify-between">
                <div class="flex items-center"><a class="inline-flex items-center mr-8" href="#"><span
                            class="text-2xl text-white">
                            <div style="font-size:inherit;color:inherit;padding:2px"><svg stroke="currentColor"
                                    fill="currentColor" stroke-width="0" viewBox="0 0 640 512" height="1em"
                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M192 384h192c53 0 96-43 96-96h32c70.6 0 128-57.4 128-128S582.6 32 512 32H120c-13.3 0-24 10.7-24 24v232c0 53 43 96 96 96zM512 96c35.3 0 64 28.7 64 64s-28.7 64-64 64h-32V96h32zm47.7 384H48.3c-47.6 0-61-64-36-64h583.3c25 0 11.8 64-35.9 64z">
                                    </path>
                                </svg></div>
                        </span><span
                            class="ml-2 text-xl font-bold tracking-wide text-gray-100 uppercase">Dermaga Bangkoa.</span></a>
                    <ul class="flex items-center space-x-8">
                        <li class=""><a
                                class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400"
                                href="{{ route('home') }}">Home</a></li>
                        <li class=""><a
                                class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400"
                                href="{{ route('Customer.Customer') }}">Pesanan</a></li>
                        <li class=""><a
                                class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400"
                                > <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-lg w-full">Logout</button>
                                </form></a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="container mx-auto px-4">
            <div class="md:w-5/6 md:mx-auto md:max-w-2xl">
                <h1 class="text-black text-lg text-center font-bold dark:text-white sm:text-2xl">Data Pesanan Tiket</h1>
            </div>
            {{ $slot }}
        </div>

    </div>
    <footer class="py-5 pb-0">
        <div class="">
            <p class="pb-5 pt-5 text-xs text-gray-400 border-t max-w-7xl mx-auto px-5 sm:px-8">Copyright @ 2022,
                chaibuilder.com</p>
        </div>
    </footer>
    <script defer src="{{asset('build/assets/app.d225c007.js')}}"></script>

</body>
