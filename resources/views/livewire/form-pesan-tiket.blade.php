<div class="h-screen">
    <div class="container mx-auto w-full flex justify-center h-64 py-6 bg-white shadow-black shadow-sm">
        {{-- Pemesanan Tiket --}}
        <div class="w-full-h-full bg-white">
            <form action="#"
                class=" relative grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 py-5 px-20 mx-auto">
                <div class="col-span-2">
                    <h3 class=" row-start-1 col-span-2 text-base text-gray-500">Dari</h3>
                    <div class=" row-start-2 col-span-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class=" relative grid grid-cols-4 text-center border border-gray-300 rounded-lg">
                            <label for="tujuan" id="icon"
                                class="col-span-1 font-mono text-sm px-3 py-1 text-center rounded-l-lg bg-white text-gray-600 h-full flex items-center">Dari</label>

                            <input
                                class="col-span-3 border-l border-t-0 border-b-0 border-r-0 border-black outline-none rounded-r-lg"
                                type="text" wire:model.debounce="lokasi" id="tujuan" placeholder="Tujuan"
                                value="1">
                            <div class="hidden md:block bg-blue-400 rounded-2xl p-1 absolute -right-5 top-2 z-30">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                </svg>
                            </div>
                        </div>

                        <div
                            class="relative @error('tujuan'){{ $message }} @enderror  shadow-red-500  grid grid-cols-4 text-center border border-gray-300 rounded-lg  ">
                            <label for="tujuan" id="icon"
                                class="col-span-1 font-mono text-sm px-3 py-1 text-center rounded-l-lg bg-white text-gray-600 h-full flex items-center">Ke</label>
                            <select wire:model="tujuan" id="tujuan"
                                class="border-l border-t-0 border-b-0 border-r-0 col-span-3 rounded-r-lg text-gray-500">
                                <option value="--">Lokasi</option>
                                @foreach ($destinasi as $destinasis)
                                    <option value="{{ $destinasis->id }}">{{ $destinasis->lokasi }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>
                <div class="col-span-1 ">
                    <label for="tanggal_keberangkatan" class="text-gray-500 ">Tanggal Keberangkatan</label>
                    <input type="date"
                        class="w-full @error('tgl_berangkat'){{ $message }} @enderror border border-gray-300 rounded-lg text-gray-500"
                        min="27-07-2022" wire:model="tgl_berangkat">
                </div>
                <div class=" col-span-1 flex flex-wrap ">
                    <label for="jumlah" class="w-full">Jumlah</label>
                    <div
                        class="flex border @error('jumlah'){{ $message }} @enderror border-gray-300 rounded-lg px-2 w-full">
                        <div class="px-2 py-1"><img src="{{ asset('img/icon-male.png') }}" alt=""></div>
                        <select wire:model="jumlah" class="border-none w-full">
                            <option value="">0</option>
                            @for ($i = 1; $i < 11; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <button type="button" class="bg-blue-300 w-full h-full col-span-4 px-2 md:px-5 py-1 md:py-3 rounded"
                    wire:click='CariKapal'>Cari Kapal</button>
            </form>
        </div>
    </div>

    <div aria-label="group of cards" tabindex="0" class="focus:outline-none py-8 w-full">
        <div class="lg:flex items-center justify-center w-full" wire:loading.class='opacity-50' wire:target='CariKapal'>
            @if ($pemberangkatan->count() > 0)
               @foreach ($pemberangkatan as $item)
                 <div tabindex="0" aria-label="card 1"
                     class="focus:outline-none lg:w-4/12 lg:mr-7 lg:mb-0 mb-7 bg-white dark:bg-gray-800  p-6 shadow rounded">
                     <div class="flex items-center border-b border-gray-200 dark:border-gray-700  pb-6">
                         {{-- <img src="https://cdn.tuk.dev/assets/components/misc/doge-coin.png" alt="coin avatar"
                             class="w-12 h-12 rounded-full" /> --}}
                         <div class="flex items-start justify-between w-full">
                             <div class="pl-3 w-full">
                                 <p tabindex="0"
                                     class="focus:outline-none text-xl font-medium leading-5 text-gray-800 dark:text-white ">
                                     {{$item->destinasi->lokasi}}</p>
                                 <p tabindex="0"
                                     class="focus:outline-none text-sm leading-normal pt-2 text-gray-500 dark:text-gray-200 ">
                                     {{$item->kode_berangkat}}</p>
                             </div>
                             <div role="img" aria-label="bookmark">
                                 <svg class="focus:outline-none dark:text-white text-gray-800" width="28" height="28"
                                     viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <path
                                         d="M10.5001 4.66667H17.5001C18.1189 4.66667 18.7124 4.9125 19.15 5.35009C19.5876 5.78767 19.8334 6.38117 19.8334 7V23.3333L14.0001 19.8333L8.16675 23.3333V7C8.16675 6.38117 8.41258 5.78767 8.85017 5.35009C9.28775 4.9125 9.88124 4.66667 10.5001 4.66667Z"
                                         stroke="currentColor" stroke-width="1.25" stroke-linecap="round"
                                         stroke-linejoin="round" />
                                 </svg>
                             </div>
                         </div>
                     </div>
                     <div class="px-2">
                         <p tabindex="0"
                             class="focus:outline-none text-sm leading-5 py-4 text-gray-600 dark:text-gray-200 ">
                                Tujuan : {{$item->destinasi->lokasi}} <br>
                                Tanggal :  {{$item->tgl_berangkat}} <br>
                                Jam     : {{$item->jam}}
                                Harga   : {{$item->harga}}
                            </p>
                         <div tabindex="0" class="focus:outline-none flex">
                            @if ($Cari)
                                 <x-jet-secondary-button type='button' wire:click='pesanTiket({{$item->id}}, {{$jumlah}})'>Pesan Tiket</x-jet-secondary-button>
                            @endif
                         </div>
                     </div>
                 </div>
               @endforeach
            @endif
        </div>
    </div>

</div>
