<div>
    <div class="">
        @include('sweetalert::alert')
        <div class="py-2 px-4 md:px-12 2xl:px-20 2xl:container 2xl:mx-auto">
            <div
                class="mt-10 flex flex-col xl:flex-row jusitfy-center items-stretch w-full xl:space-x-8 space-y-4 md:space-y-6 xl:space-y-0">
                <div
                    class="flex flex-wrap md:flex-nowrap gap-4 justify-start items-start w-full space-y-4 md:space-y-6 xl:space-y-8">
                    <div
                        class="flex flex-col justify-start items-start  bg-white px-4 py-4 md:py-6 md:p-6 xl:p-8 w-full shadow-sm">
                        <p class="text-lg md:text-xl  font-semibold leading-6 xl:leading-5 text-gray-800">Detail Kapal
                        </p>
                        <div
                            class="mt-4 md:mt-6 flex flex-col md:flex-row justify-start items-start md:items-center md:space-x-6 xl:space-x-8 w-full">
                            <div class="pb-4 md:pb-8 w-full md:w-40">
                                <img class="w-full hidden md:block" src="{{ asset('storage/kapal/' . $gambar) }}"
                                    alt="dress" />
                                <img class="w-full md:hidden" src="{{ asset('storage/kapal/' . $gambar) }}"
                                    alt="dress" />
                            </div>
                            <div
                                class="border-b border-gray-200 md:flex-row flex-col flex justify-between items-start w-full pb-8 space-y-4 md:space-y-0">
                                <div class="w-full flex flex-col justify-start items-start space-y-8">
                                    <h3 class="text-xl  xl:text-2xl font-semibold leading-6 text-gray-800">
                                        {{ $kode_berangkat }}</h3>
                                    <div class="flex justify-start items-start flex-col space-y-2 w-full">
                                        <table class="w-full">
                                            <tr class="text-sm  leading-none text-gray-800">
                                                <td class=" text-gray-800">Nama Pemilik: </td>
                                                <td>{{ $pemilik_kapal }}</td>
                                            </tr>
                                            <tr class="text-sm  leading-none text-gray-800">
                                                <td class=" text-gray-800">Dari: </td>
                                                <td>{{ __('Dermaga Bangkoa') }}</td>
                                            </tr>
                                            <tr class="text-sm  leading-none text-gray-800">
                                                <td class=" text-gray-800">Tujuan: </td>
                                                <td>{{ $destinasi_id }}</td>
                                            </tr>

                                            <tr>
                                                <td class="text-sm  leading-none text-gray-800">
                                                    <p class="text-gray-800">Harga Tiket</p>
                                                </td>
                                                <td class="text-red-500 ">Rp. {{ number_format($harga, 0, 2) }}</td>
                                            </tr>
                                            <tr class="text-sm  leading-none text-gray-800">
                                                <td class=" text-gray-800">Jumlah Tiket: </td>
                                                <td class="text-center flex flex-1 items-center">
                                                    <x-jet-button wire:click="minus"
                                                        class="bg-blue-600 hover:bg-indigo-700 rounded-full px-1 py-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>

                                                    </x-jet-button>
                                                    <x-jet-input type="number" readonly wire:model='count'
                                                        class="w-20 text-center" />
                                                    <x-jet-button wire:click="plus"
                                                        class="bg-blue-600 hover:bg-indigo-700 rounded-full px-1 py-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>

                                                    </x-jet-button>
                                                </td>
                                            </tr>
                                        </table>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div
                        class="flex justify-center flex-col md:flex-row  items-stretch w-full space-y-4 md:space-y-0 md:space-x-6 xl:space-x-8">
                        <div class="flex flex-col px-4 py-6 md:p-6 xl:p-8 w-full bg-white  space-y-6">
                            <h3 class="text-xl  font-semibold leading-5 text-gray-800">Total Pesanan</h3>
                            <div
                                class="flex justify-center items-center w-full space-y-4 flex-col border-gray-200 border-b pb-4">
                                <div class="flex justify-between w-full">
                                    <p class="text-base  leading-4 text-gray-800">Harga</p>
                                    <p class="text-base  leading-4 text-gray-600">Rp. {{ number_format($harga, 0, 2) }}
                                    </p>
                                </div>
                                <div class="flex justify-between items-center w-full">
                                    <p class="text-base  leading-4 text-gray-800">Jumlah</p>
                                    <p class="text-base  leading-4 text-gray-600">{{ $jumlah }}</p>
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full">
                                <p class="text-base  font-semibold leading-4 text-gray-800">Total</p>
                                <p class="text-base  font-semibold leading-4 text-gray-600">Rp
                                    {{ number_format($sub_total, 0, 2) }}</p>
                            </div>
                            <div class="w-full flex justify-center items-center">
                                <x-jet-secondary-button wire:click='bayar'
                                    class="bg-blue-500 w-full text-white text-center hover:bg-blue-400 hover:text-gray-100">
                                    Lakukan Pembayaran</x-jet-secondary-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- component -->
    <!-- This is an example component -->
    @if ($bayar)
        <div class='flex items-center justify-center min-h-screen bg-gradient-to-br'>
            <div class="flex flex-row items-center justify-center relative">

                <div id="partnerCard"
                    class="bg-[#1c1c1c] text-gray-50 overflow-hidden rounded-md max-w-md p-2 min-h-[500px] flex flex-col">
                    <div>
                        <h3 class="text-left pl-8 pb-4 pt-2 text-xl">
                            Pilih Pembayaran Anda
                        </h3>
                    </div>
                    <div x-data="{ bankID: 0 }">
                        @php
                            $idbank = 1;
                        @endphp
                        @foreach ($bank as $item)
                            <div class=" text-lg col-span-3 border-b border-b-white" >
                                <h4 class="font-bold flex justify-between">
                                    <strong>{{ $item->bank }}</strong>
                                    <span class="cursor-pointer">
                                        <svg  x-show="bankID != {{$item->id}}" x-on:click="bankID = {{ $item->id }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3.75 9h16.5m-16.5 6.75h16.5" />
                                        </svg>
                                        <svg x-show="bankID == {{ $item->id }}" x-on:click="bankID = 0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </span>
                                </h4>
                                <p>
                                <div class="py-3 sm:py-4 bg-white rounded-md" x-show="bankID == {{ $item->id }}"
                                     x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 scale-90"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-300"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-90">
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            Nama Pemilik : <strong>{{ $item->nama }}</strong>
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            Nomor Rekening : <strong>{{ $item->no_rek }}</strong>
                                        </p>
                                    </div>
                                </div>
                                </p>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-auto pl-4">
                        <p>Estimasi Pembayaran : {{$utctime}}</p>
                    </div>
                </div>

                <form enctype="multipart/form-data"
                    class="relative py-8 px-5 md:px-10 bg-white   shadow-md rounded border border-gray-400">
                    <div class="w-full flex justify-start text-gray-600 mb-3">
                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/left_aligned_form-svg1.svg"
                            alt="icon" />
                    </div>
                    <h1 class="text-gray-800   font-lg font-bold tracking-normal leading-tight mb-4">
                        Masukkan Detail Pembayaran</h1>
                    <label for="name" class="text-gray-800   text-sm font-bold leading-tight tracking-normal">Nama
                        Pengirim</label>
                    <input id="name" type="text" value="{{ Auth::user()->name }}"
                        class="mb-5 mt-2 text-gray-600     focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                        placeholder="James" />
                    <label for="email2" class="text-gray-800   text-sm font-bold leading-tight tracking-normal">Bukti
                        Transaksi</label>
                    <div class="relative mb-5 mt-2">
                        <div class="absolute text-gray-600 flex items-center px-4  border-r h-full">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/left_aligned_form-svg2.svg"
                                alt="icon" />
                        </div>
                        <input id="file" type="file" wire:model='bukti_transaksi'
                            class="text-gray-600     focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-16 text-sm border-gray-300 rounded border"
                            placeholder="XXXX - XXXX - XXXX - XXXX" />
                        @error('bukti_transaksi')
                        <span class="text-red-500 text-sm font-semibold">{{$message}}</span>
                        @enderror
                    </div>
                    <label for="expiry" class="text-gray-800   text-sm font-bold leading-tight tracking-normal">Tanggal
                        Transaksi</label>
                    <div class="relative mb-5 mt-2">
                        <input type='date' wire:model='tgl_transaksi'
                            class="text-gray-600     focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                            placeholder="MM/YY">
                            @error('tgl_transaksi')
                        <span class="text-red-500 text-sm font-semibold">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex items-center justify-start w-full">
                        <button type="button" wire:click='SendPembayaran({{ $itemID }})'
                            class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">Submit</button>
                        <button
                            class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm"
                            wire:click='clearAll'>Batalkan</button>
                    </div>
                    <button
                        class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600"
                        onclick="modalHandler()" aria-label="close modal" role="button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20"
                            height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                    </button>
                </form>
                @if ($bukti_transaksi)
                <img src="{{$bukti_transaksi->temporaryUrl()}}" class="max-w-md" alt="" srcset="">
            @endif
            </div>
        </div>
    @endif


</div>
