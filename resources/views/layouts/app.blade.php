<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

    <link rel="stylesheet" href="{{asset('build/assets/app.c2b10521.css')}}">
    @livewireStyles
    @vite(['resources/js/app.js','resources/css/app.css'])
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    <script src="{{asset("js/jquery-3.6.1.min.js")}}"></script>


</head>


<body class="bg-gray-100 font-sans leading-normal tracking-normal">


    <div class="flex flex-no-wrap">
        <!-- Sidebar starts -->
        <!-- Remove class [ hidden ] and replace [ sm:flex ] with [ flex ] -->
        @can ('managed-Admin')
            <div
                class="md:w-1/4 lg:w-1/5 overflow-y-auto sm:relative bg-gray-800 shadow h-screen flex-col justify-between hidden md:flex">
                <div class="px-8 ">
                    <div class="h-16 w-full flex items-center">
                        {{-- <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom-svg1.svg"
                            alt="Logo"> --}}
                    </div>
                    @include('navigation-menu')
                    <div class="flex mt-48 mb-4 w-full">
                        <div class="relative w-full bg-gray-300 py-3 px-1 rounded-md ">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="text-lg w-full">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-64 z-40 absolute bg-gray-800 shadow md:h-full flex-col justify-between block md:hidden transition duration-150 ease-in-out"
                id="mobile-nav">
                <button aria-label="toggle sidebar" id="openSideBar"
                    class="h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 rounded focus:ring-gray-800"
                    onclick="sidebarHandler(true)">
                    <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom-svg7.svg"
                        alt="toggler">
                </button>
                <button aria-label="Close sidebar" id="closeSideBar"
                    class="hidden h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer text-white"
                    onclick="sidebarHandler(false)">
                    <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom-svg8.svg"
                        alt="cross">
                </button>
                <div class="px-8">
                    <div class="h-16 w-full flex items-center">
                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom-svg1.svg"
                            alt="Logo">
                    </div>
                    @include('navigation-menu')
                    <div class="flex justify-center mt-48 mb-4 w-full">
                        <div class="relative">
                            <div class="text-gray-300 absolute ml-4 inset-0 m-auto w-4 h-4">
                                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom-svg2.svg"
                                    alt="Search">
                            </div>
                            <input
                                class="bg-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-100  rounded w-full text-sm text-gray-300 placeholder-gray-400 bg-gray-100 pl-10 py-2"
                                type="text" placeholder="Search" />
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        <!-- Sidebar ends -->
        <!-- Remove class [ h-64 ] when adding a card block -->
        <div class="container mx-auto py-10  md:w-4/5 w-11/12 px-6 h-screen overflow-y-auto">
            <!-- Remove class [ border-dashed border-2 border-gray-300 ] to remove dotted border -->
            <div class="w-full h-full rounded border-dashed border-2 border-gray-300">
                {{ $slot }}
            </div>
        </div>
    </div>


    @stack('modals')

    @livewireScripts



    <script>
        $(document).ready(function() {
            $('.datatable').dataTable();

        });
        var sideBar = document.getElementById("mobile-nav");
        var openSidebar = document.getElementById("openSideBar");
        var closeSidebar = document.getElementById("closeSideBar");
        sideBar.style.transform = "translateX(-260px)";

        function sidebarHandler(flag) {
            if (flag) {
                sideBar.style.transform = "translateX(0px)";
                openSidebar.classList.add("hidden");
                closeSidebar.classList.remove("hidden");
            } else {
                sideBar.style.transform = "translateX(-260px)";
                closeSidebar.classList.add("hidden");
                openSidebar.classList.remove("hidden");
            }
        }
        /*Toggle dropdown list*/
        /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/
    </script>
</body>

</html>
