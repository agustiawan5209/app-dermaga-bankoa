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
                <div class="flex flex-col px-4 py-6 md:p-6 xl:p-8 w-full bg-gray-50 dark:bg-gray-800 space-y-6">
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
                            <p class="text-base dark:text-gray-900 leading-4 text-gray-600">{{ $jumlah }}</p>
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
                                <p class="text-base font-semibold leading-4 text-center md:text-left text-gray-800">
                                    Alamat Pembeli</p>
                                <p
                                    class="w-48 lg:w-full dark:text-gray-900 xl:w-48 text-center md:text-left text-sm leading-5 text-gray-600">
                                    {{ Auth::user()->role->name_role }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-jet-button wire:click='SendPembayaran({{ $itemID }})'>Lanjutkan Pembelian</x-jet-button>
        @endif

        <x-jet-dialog-modal wire:model='BayarItem'>
            <x-slot name='title'></x-slot>
            <x-slot name='content'>
                <div
                    class="relative py-8 px-5 md:px-10 bg-white dark:bg-gray-800 dark:border-gray-700 shadow-md rounded border border-gray-400">
                    <div class="w-full flex justify-start text-gray-600 mb-3">
                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/left_aligned_form-svg1.svg"
                            alt="icon" />

                    </div>
                    <h1 class="text-gray-800 dark:text-white  font-lg font-bold tracking-normal leading-tight mb-4">
                        Masukkan Detail Pembayaran</h1>
                    <label for="name"
                        class="text-gray-800 dark:text-white  text-sm font-bold leading-tight tracking-normal">Nama
                        Pengirim</label>
                    <input id="name" type="text"
                        class="mb-5 mt-2 text-gray-600 dark:bg-gray-900 dark:text-white dark:placeholder-gray-200 dark:border-gray-700 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                        placeholder="James" />
                    <label for="email2"
                        class="text-gray-800 dark:text-white  text-sm font-bold leading-tight tracking-normal">Bukti
                        Transaksi</label>
                    <div class="relative mb-5 mt-2">
                        <div class="absolute text-gray-600 flex items-center px-4 dark:border-gray-700 border-r h-full">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/left_aligned_form-svg2.svg"
                                alt="icon" />

                        </div>
                        <input id="file" type="file"
                            class="text-gray-600 dark:bg-gray-900 dark:text-white dark:placeholder-gray-200 dark:border-gray-700 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-16 text-sm border-gray-300 rounded border"
                            placeholder="XXXX - XXXX - XXXX - XXXX" />
                    </div>
                    <label for="expiry"
                        class="text-gray-800 dark:text-white  text-sm font-bold leading-tight tracking-normal">Tanggal
                        Transaksi</label>
                    <div class="relative mb-5 mt-2">
                        <div class="absolute right-0 text-gray-600 flex items-center pr-3 h-full cursor-pointer">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/left_aligned_form-svg3.svg"
                                alt="icon" />

                        </div>
                        <input id="expiry"  type='date'
                            class="text-gray-600 dark:bg-gray-900 dark:text-white dark:placeholder-gray-200 dark:border-gray-700 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                            placeholder="MM/YY">
                    </div>
                    <label for="cvc"
                        class="text-gray-800 dark:text-white  text-sm font-bold leading-tight tracking-normal">Keterangan</label>
                    <div class="relative mb-5 mt-2">
                        <div class="absolute right-0 text-gray-600 flex items-center pr-3 h-full cursor-pointer">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/left_aligned_form-svg4.svg"
                                alt="icon" />

                        </div>
                        <textarea id="cvc"
                            class="mb-8 text-gray-600 dark:bg-gray-900 dark:text-white dark:placeholder-gray-200 dark:border-gray-700 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                            placeholder="MM/YY" ></textarea>
                    </div>
                    <div class="flex items-center justify-start w-full">
                        <button wire:click='SendPembayaran({{$itemID}})'
                            class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">Submit</button>
                        <button
                            class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm"
                            onclick="modalHandler()">Cancel</button>
                    </div>
                    <button
                        class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600"
                        onclick="modalHandler()" aria-label="close modal" role="button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20"
                            height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                    </button>
                </div>
            </x-slot>
            <x-slot name='footer'></x-slot>
        </x-jet-dialog-modal>

    </div>
</div>
