
<div class="">
    <div class="flex justify-start item-start space-y-2 flex-col">
        <h1 class="text-3xl lg:text-4xl font-semibold leading-7 lg:leading-9 text-gray-800">Kode Pemesanan
        </h1>
        <p class="text-base font-medium leading-6 text-gray-600">{{ date('Y M d H') }}</p>
    </div>
    <div
        class="mt-10 flex flex-col xl:flex-col jusitfy-center items-stretch w-full xl:space-x-8 space-y-4 md:space-y-6 xl:space-y-0">
        <div class="flex flex-col justify-start items-start w-full space-y-4 md:space-y-6 xl:space-y-8">
            <div
                class="flex flex-col justify-start items-start dark:bg-gray-800 bg-gray-50 px-4 py-4 md:py-6 md:p-6 xl:p-8 w-full">
                <p class="text-lg md:text-xl font-semibold leading-6 xl:leading-5 text-gray-800">Detail
                    Pesanan</p>
                <div
                    class="mt-4 md:mt-6 flex flex-col md:flex-col justify-start items-start md:items-center md:space-x-6 xl:space-x-8 w-full">
                    {{-- <div class="pb-4 md:pb-8 w-full md:w-40">
                        <img class="w-full hidden md:block"
                            src="https://i.ibb.co/84qQR4p/Rectangle-10.png" alt="dress" />
                        <img class="w-full md:hidden" src="https://i.ibb.co/L039qbN/Rectangle-10.png"
                            alt="dress" />
                    </div> --}}
                    <div
                        class="border-b border-gray-200 md:flex-col flex-col flex justify-between items-start w-full pb-8 space-y-4 md:space-y-0">
                        <div class="w-full flex flex-col justify-start items-start space-y-8">
                            <h3 class="text-xl xl:text-2xl font-semibold leading-6 text-gray-800">
                            </h3>
                            <div class="flex justify-start items-start flex-col space-y-2">
                                <p class="leading-none font-semibold text-lg text-gray-800"><span
                                        class=" text-gray-500">Dari: </span>
                                    {{ __('Dermaga Bangkoa') }}
                                </p>
                                <p class="leading-none font-semibold text-lg text-gray-800"><span
                                        class=" text-gray-500">Tujuan
                                        Destinasi: </span> {{ $destinasi_id }}</p>
                                <p class="leading-none font-semibold text-lg text-gray-800"><span
                                        class=" text-gray-500">Tanggal
                                        Keberangkatan: </span>{{ $tgl_berangkat }} / {{ $jam }}
                                </p>
                            </div>
                        </div>
                        <div class="flex justify-between space-x-8 items-start w-full">
                            <p class="text-base xl:text-lg leading-6">Rp.
                                {{ number_format($harga, 0, 2) }} /Tiket</p>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="flex justify-center flex-col md:flex-row flex-col items-stretch w-full space-y-4 md:space-y-0 md:space-x-6 xl:space-x-8">
                <div
                    class="flex flex-col px-4 py-6 md:p-6 xl:p-8 w-full bg-gray-50 dark:bg-gray-800 space-y-6">
                    <h3 class="text-xl font-semibold leading-5 text-gray-800">Total Pembayaran</h3>
                    <div
                        class="flex justify-center items-center w-full space-y-4 flex-col border-gray-200 border-b pb-4">
                        <div class="flex justify-between w-full">
                            <p class="text-base leading-4 text-gray-800">Harga</p>
                            <p class="text-base dark:text-gray-900 leading-4 text-gray-600">Rp.
                                {{ number_format($harga, 0, 2) }}</p>
                        </div>
                        <div class="flex justify-between w-full">
                            <p class="text-base leading-4 text-gray-800">Jumlah Tiket</p>
                            <p class="text-base dark:text-gray-900 leading-4 text-gray-600">{{$jumlah}}</p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <p class="text-base font-semibold leading-4 text-gray-800">Total</p>
                        <p class="text-base dark:text-gray-900 font-semibold leading-4 text-gray-600">
                            Rp. {{ number_format($harga * $jumlah, 0, 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
        @if (Auth::check())
            <div
                class="bg-gray-50 dark:bg-gray-800 w-full xl:w-96 flex justify-between items-center md:items-start px-4 py-6 md:p-6 xl:p-8 flex-col">
                <h3 class="text-xl font-semibold leading-5 text-gray-800">Pembeli</h3>
                <div
                    class="flex flex-col md:flex-row xl:flex-col justify-start items-stretch h-full w-full md:space-x-6 lg:space-x-8 xl:space-x-0">
                    <div class="flex flex-col justify-start items-start flex-shrink-0">
                        <div
                            class="flex justify-center w-full md:justify-start items-center space-x-4 py-8 border-b border-gray-200">
                            <img src="{{ Auth::user()->profile_photo_url }}" alt="avatar" />
                            <div class="flex justify-start items-start flex-col space-y-2">
                                <p class="text-base font-semibold leading-4 text-left text-gray-800">
                                    {{ Auth::user()->name }}</p>
                            </div>
                        </div>

                        <div
                            class="flex justify-center text-gray-800 md:justify-start items-center space-x-4 py-4 border-b border-gray-200 w-full">
                            <img class="dark:hidden"
                                src="https://tuk-cdn.s3.amazonaws.com/can-uploader/order-summary-3-svg1.svg"
                                alt="email">
                            <img class="hidden dark:block"
                                src="https://tuk-cdn.s3.amazonaws.com/can-uploader/order-summary-3-svg1dark.svg"
                                alt="email">
                            <p class="cursor-pointer text-sm leading-5 ">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <div class="flex justify-between xl:h-full items-stretch w-full flex-col mt-6 md:mt-0">
                        <div
                            class="flex justify-center md:justify-start xl:flex-col flex-col md:space-x-6 lg:space-x-8 xl:space-x-0 space-y-4 xl:space-y-12 md:space-y-0 md:flex-row items-center md:items-start">
                            <div
                                class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-4 xl:mt-8">
                                <p
                                    class="text-base font-semibold leading-4 text-center md:text-left text-gray-800">
                                    Alamat Pembeli</p>
                                <p
                                    class="w-48 lg:w-full dark:text-gray-900 xl:w-48 text-center md:text-left text-sm leading-5 text-gray-600">
                                    {{ Auth::user()->role->name_role }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-jet-button wire:click='SendPembayaran'>Lanjutkan Pembelian</x-jet-button>
        @endif
    </div>
</div>
