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
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    <script>
        new WOW().init();
    </script>
      @vite(['resources/js/app.js'])
      <!-- Styles -->
      @livewireStyles
      <link rel="stylesheet" href="{{asset('build/assets/app.25240557.css')}}">
</head>

<body class="font-body antialiased text-[#000] bg-[#f5f5f5] dark:text-[#fff] dark:bg-[#64748b]">
    <header style="background-image:linear-gradient(170deg,#fff 63%,#c7d7fb 0,#c7d7fb 123%)"
        class="relative py-4 px-6 leading-6 bg-cover lg:py-5 lg:px-12">
        <div class="flex relative justify-between items-center mx-auto max-w-screen-xl text-gray-700"><a href="#"
                class="cursor-pointer font-mono">DERMAGA BANGKOA</a>
            <nav class="hidden flex-row justify-center items-center w-auto font-semibold gap-x-12 md:flex"><a
                    href="{{ route('home') }}" class="cursor-pointer">Home</a>
                <a href="{{ route('Pesan-Tiket') }}" class="cursor-pointer">Reservasi Tiket</a>
                <a href="{{ route('Layanan-page') }}" class="cursor-pointer">Layanan</a>
                <a href="{{ route('logistik-page') }}" class="cursor-pointer">Jasa
                    Logistik</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('dashboard') }}"class="cursor-pointer ">
                        @else
                            <a href="{{ route('login') }}" class="cursor-pointer">Login</a>
                            <a href="{{ route('register') }}"class="cursor-pointer ">
                                Register</a>
                        @endauth
                @endif
            </nav><button id="cAzqws"
                class="block relative z-30 p-2 mx-0 mt-1 mb-0 w-8 text-center text-gray-300 normal-case bg-none rounded-md cursor-pointer bg-blue-500-500 md:hidden "><span><svg
                        class="block align-middle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" class="block align-middle">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 0 1 1-1h12a1 1 0 1 1 0 2H4a1 1 0 0 1-1-1zm0 5a1 1 0 0 1 1-1h12a1 1 0 1 1 0 2H4a1 1 0 0 1-1-1zm0 5a1 1 0 0 1 1-1h12a1 1 0 1 1 0 2H4a1 1 0 0 1-1-1z"
                            clip-rule="evenodd" class=""></path>
                    </svg></span></button>
            <div class="hidden absolute inset-x-0 z-50 py-2 w-full transform md:hidden">
                <nav class="p-3 bg-white rounded-lg transform shadow-xs"><a href="#"
                        class="block py-3 px-6 font-semibold border-t-0 border-r-0 border-l-0 border-b border-blue-100  border-solid cursor-pointer box-border">Home</a><a
                        href="#"
                        class="block py-3 px-6 font-semibold border-t-0 border-r-0 border-l-0 border-b border-blue-100  border-solid cursor-pointer box-border">Reservasi
                        Tiket</a><a href="#"
                        class="block py-3 px-6 font-semibold border-t-0 border-r-0 border-l-0 border-b border-blue-100  border-solid cursor-pointer box-border">Layanan</a><a
                        href="#"
                        class="block py-3 px-6 font-semibold border-t-0 border-r-0 border-l-0 border-b border-blue-100  border-solid cursor-pointer box-border">Jasa
                        Logistik</a>
                    <a href="#"
                        class="block py-3 px-6 font-semibold border-t-0 border-r-0 border-l-0 border-b border-blue-100  border-solid cursor-pointer box-border">Login</a>
                    <a href="#"
                        class="block py-3 text-sm font-semibold leading-5 text-center text-white bg-blue-300 rounded-lg cursor-pointer">Register</a>
                </nav>
            </div>
        </div>
    </header>

    <main class="w-full-h-full py-3 my-2">
        {{ $slot }}
    </main>
    @stack('modals')

    @livewireScripts
    {{-- <footer class="py-12 leading-6 px-4 lg:px-8 fixed bottom-0">
        <div class="flex justify-between mx-auto mb-6 max-w-screen-xl lg:mb-8"><a href="#"
                class="px-2 space-x-2 flex items-center gap-x-1 text-2xl font-bold text-primary">DERMAGA KAYU
                BANGKOA<span class="order-first">
                    <div style="font-size:inherit;color:inherit;padding:2px"><svg stroke="currentColor"
                            fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M502.285 159.704l-234-156c-7.987-4.915-16.511-4.96-24.571 0l-234 156C3.714 163.703 0 170.847 0 177.989v155.999c0 7.143 3.714 14.286 9.715 18.286l234 156.022c7.987 4.915 16.511 4.96 24.571 0l234-156.022c6-3.999 9.715-11.143 9.715-18.286V177.989c-.001-7.142-3.715-14.286-9.716-18.285zM278 63.131l172.286 114.858-76.857 51.429L278 165.703V63.131zm-44 0v102.572l-95.429 63.715-76.857-51.429L234 63.131zM44 219.132l55.143 36.857L44 292.846v-73.714zm190 229.715L61.714 333.989l76.857-51.429L234 346.275v102.572zm22-140.858l-77.715-52 77.715-52 77.715 52-77.715 52zm22 140.858V346.275l95.429-63.715 76.857 51.429L278 448.847zm190-156.001l-55.143-36.857L468 219.132v73.714z">
                            </path>
                        </svg></div>
                </span></a>
            <a href="#" class="flex items-center cursor-pointer hover:text-gray-200">
                <span class="">
                    to top
                </span>
                <span class="block w-4 h-4 align-middle ml-2">
                    <div style="font-size:inherit;color:inherit;padding:2px"><svg stroke="currentColor"
                            fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z">
                            </path>
                        </svg>
                    </div>
                </span>
            </a>
        </div>

    </footer> --}}
    <script>
        // Use Javascript
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0 so need to add 1 to make it 1!
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }

        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("tgl_berangkat").setAttribute("min", today);
    </script>
</body>

</html>
