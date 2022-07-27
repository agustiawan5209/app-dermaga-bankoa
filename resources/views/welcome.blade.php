<!DOCTYPE html>
<html class="scroll-smooth" x-init="$watch('darkMode', val => localStorage.setItem('dark', val))" x-data="{ darkMode: localStorage.dark === 'true' || (!('dark' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches), dialogPanels: [] }" :class="darkMode ? '' : ''" lang='en'>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>name</title>

    <link id="heading-font" rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700;800;900&display=swap"
        media="all" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-body antialiased text-[#000] bg-[#f5f5f5] dark:text-[#fff] dark:bg-[#64748b]">
    <header style="background-image:linear-gradient(170deg,#fff 63%,#c7d7fb 0,#c7d7fb 123%)"
        class="relative py-4 px-6 leading-6 bg-cover lg:py-5 lg:px-12">
        <div class="flex relative justify-between items-center mx-auto max-w-screen-xl text-gray-700"><a href="#"
                class="cursor-pointer font-mono">DERMAGA BANGKOA</a>
            <nav class="hidden flex-row justify-center items-center w-auto font-semibold gap-x-12 md:flex"><a
                    href="#" class="cursor-pointer">Home</a>
                <a href="#" class="cursor-pointer">Reservasi Tiket</a>
                <a href="#" class="cursor-pointer">Layanan</a><a href="#" class="cursor-pointer">Jasa
                    Logistik</a>
                <a href="#" class="cursor-pointer">Login</a><a
                    href="#"class="inline-block py-3 px-5 text-sm leading-5 text-green-100 rounded-lg cursor-pointer bg-primary-500">Get
                    started</a>
            </nav><button id="cAzqws"
                class="block relative z-30 p-2 mx-0 mt-1 mb-0 w-8 text-center text-gray-300 normal-case bg-none rounded-md cursor-pointer bg-primary-500 md:hidden "><span><svg
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
                        class="block py-3 px-6 font-semibold border-t-0 border-r-0 border-l-0 border-b border-blue-100  border-solid cursor-pointer box-border">Services</a><a
                        href="#"
                        class="block py-3 px-6 font-semibold border-t-0 border-r-0 border-l-0 border-b border-blue-100  border-solid cursor-pointer box-border">Pricing</a><a
                        href="#"
                        class="block py-3 px-6 font-semibold border-t-0 border-r-0 border-l-0 border-b border-blue-100  border-solid cursor-pointer box-border">Blog</a><a
                        href="#"
                        class="block py-3 px-6 font-semibold border-t-0 border-r-0 border-l-0 border-b border-blue-100  border-solid cursor-pointer box-border">Contact</a><a
                        href="#"
                        class="block py-3 px-6 font-semibold border-t-0 border-r-0 border-l-0 border-b border-blue-100  border-solid cursor-pointer box-border">Login</a><a
                        href="#"
                        class="block py-3 text-sm font-semibold leading-5 text-center text-white bg-green-900 rounded-lg cursor-pointer">Get
                        started</a></nav>
            </div>
        </div>
    </header>

    <div style="background-image:linear-gradient(#c7d7fb00, #c7d7fba4) ,url({{ asset('img/dermaga.jpg') }});background-size:cover; background-position-y:0px;"
        class=" mx-auto mb-24 max-w-screen-xl text-center lg:my-20 xl:items-center    sm:mb-10 ">
        <div class="  text-gray-700 p-20">
            <h2
                class="m-0 w-full text-2xl leading-8 text-gray-900 font-bold sm:text-3xl sm:leading-9 md:text-4xl md:leading-10 lg:font-bold lg:text-4xl xl:text-5xl drop-shadow-md shadow-white whitespace-pre-line md:whitespace-nowrap wow fadeIn ">
                DERMAGA KAYU BANGKOA</h2>
        </div>
    </div>
    <div class="container mx-auto w-full flex justify-center h-64 py-6 bg-white">
        {{-- Pemesanan Tiket --}}
        <div class="w-full-h-full bg-white">
            <form action="#" class=" relative grid grid-cols-4 gap-4 py-5 px-8">
                <div class="col-span-2">
                    <h3 class=" row-start-1 col-span-2">tujuan</h3>
                    <div class=" row-start-2 col-span-2 grid grid-cols-2 gap-4">
                        <div class=" relative grid grid-cols-4 text-center border border-gray-300 rounded-lg">
                            <label for="tujuan" id="icon"
                                class="col-span-1 font-mono text-sm px-3 py-1 text-center rounded-l-lg bg-white text-gray-600 h-full flex items-center">Dari</label>

                            <input
                                class="col-span-3 border-l border-t-0 border-b-0 border-r-0 border-black outline-none rounded-r-lg"
                                type="text" name="tujuan" id="tujuan" placeholder="Tujuan" disabled>
                            <div class="bg-blue-400 rounded-2xl p-1 absolute -right-5 top-2 z-30">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                </svg>
                            </div>
                        </div>

                        <div class="relative grid grid-cols-4 text-center border border-gray-300 rounded-lg">
                            <label for="tujuan" id="icon"
                                class="col-span-1 font-mono text-sm px-3 py-1 text-center rounded-l-lg bg-white text-gray-600 h-full flex items-center">Ke</label>
                            <input
                                class="col-span-3 border-l border-t-0 border-b-0 border-r-0 border-black outline-none rounded-r-lg"
                                type="text" name="tujuan" id="tujuan" placeholder="Tujuan" disabled>
                        </div>
                    </div>
                </div>
                <div id="tgl_keberangkatan" class="col-span-1">
                    <label for="tanggal_keberangkatan" class="text-gray-500 ">Tanggal Keberangkatan</label>
                    <input type="date" class="w-full border border-gray-300 rounded-lg">
                </div>
                <div class=" col-span-1 flex flex-wrap ">
                    <label for="Penumpang" class="w-full">Jumlah</label>
                    <div class="flex border border-gray-300 rounded-lg px-2">
                        <div class="px-2 py-1"><img src="{{ asset('img/icon-male.png') }}" alt=""></div>
                        <select name="penumpang" id="penumpang" class="border-none ">
                        </select>
                    </div>
                </div>
                <button type="button" class="bg-blue-300">Pesan</button>
            </form>
        </div>
    </div>
    <div class="py-11 bg-white">
        <div class="grid grid-cols-2 mt-5 gap-y-5 sm:gap-y-0 lg:mx-auto lg:max-w-4xl">
            <div class="col-span-2 sm:col-span-1 md:col-span-1 wow slideInLeft"><img alt="No alt"
                    src="{{ asset('img/logistik.jpg') }}" class="w-full bg-gray-50 " /></div>
            <div
                class="col-span-2 px-3 pb-3 dark:border-slate-700 border-gray-50 sm:col-span-1 sm:flex sm:flex-col sm:justify-center sm:pl-7 sm:border-t lg:border-r wow slideInRight">
                <h1
                    class="font-semibold text-red-700 tracking-tight text-2xl dark:text-gray-200 dark:divide-undefined sm:mb-2 md:my-1 lg:my-1">
                    Melayani Jasa Logistik</h1>
                <p
                    class="text-base font-normal tracking-tight leading-relaxed dark:divide-undefined dark:text-gray-300">
                    Melayani pengangkutan paket barang, dry/reefer container, general cargo, kendaraan maupun penyewaan
                    kapal angkutan komersial.</p>
            </div>
            <div
                class="col-span-2 px-3 pb-3 order-3 dark:border-slate-700 border-gray-50 sm:col-span-1 sm:flex sm:flex-col sm:justify-center sm:pl-7 sm:order-none sm:border-b lg:border-l wow slideInLeft">
                <h1
                    class="font-semibold text-red-700 tracking-tight text-2xl dark:text-gray-200 dark:divide-undefined sm:mb-2 md:my-1 lg:my-1">
                    Layanan Kapal</h1>
                <p
                    class="text-base font-normal tracking-tight leading-relaxed dark:divide-undefined dark:text-gray-300">
                    Nikmati pengalaman berwisata bahari dengan pantai-pantai dan alam bawah laut paling indah di
                    Indonesia.</p>
            </div>
            <div class="col-span-2 order-2 sm:col-span-1 sm:order-none md:col-span-1 wow slideInRight">
                <img alt="No alt" src="{{ asset('img/layanan.jpg') }}" class="w-full bg-gray-50 " />
            </div>
        </div>
    </div>
    <!-- AlpineJS Library -->
    <script defer src="https://unpkg.com/alpinejs@3.9.0/dist/cdn.min.js"></script>
    <script>
        for (let i = 1; i < 11; i++) {
            var option = document.createElement('option');
            console.log(i)
            option.value = i;
            option.innerText = i;
            document.getElementById('penumpang').append(option)
        }
    </script>
</body>

</html>
