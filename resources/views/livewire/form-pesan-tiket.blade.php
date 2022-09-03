<div>
    <form action="#" class=" relative grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 py-5 px-20 mx-auto">
        <div class="col-span-2">
            <h3 class=" row-start-1 col-span-2 text-base text-gray-500">Dari</h3>
            <div class=" row-start-2 col-span-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class=" relative grid grid-cols-4 text-center border border-gray-300 rounded-lg">
                    <label for="tujuan" id="icon"
                        class="col-span-1 font-mono text-sm px-3 py-1 text-center rounded-l-lg bg-white text-gray-600 h-full flex items-center">Dari</label>

                    <input
                        class="col-span-3 border-l border-t-0 border-b-0 border-r-0 border-black outline-none rounded-r-lg"
                        type="text" wire:model.debounce="lokasi" id="tujuan" placeholder="Tujuan" value="1">
                    <div class="hidden md:block bg-blue-400 rounded-2xl p-1 absolute -right-5 top-2 z-30">
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
                    <select wire:model="tujuan" id="tujuan"
                        class="border-l border-t-0 border-b-0 border-r-0 col-span-3 rounded-r-lg text-gray-500">
                        <option value="--">Lokasi</option>
                        @foreach ($destinasi as $destinasis)
                            <option value="{{ $destinasis->lokasi }}">{{ $destinasis->lokasi }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-span-1">
            <label for="tanggal_keberangkatan" class="text-gray-500 ">Tanggal Keberangkatan</label>
            <input type="date" class="w-full border border-gray-300 rounded-lg text-gray-500"
                min="27-07-2022" wire:model="tgl_keberangkatan">
        </div>
        <div class=" col-span-1 flex flex-wrap ">
            <label for="jumlah" class="w-full">Jumlah</label>
            <div class="flex border border-gray-300 rounded-lg px-2 w-full">
                <div class="px-2 py-1"><img src="{{ asset('img/icon-male.png') }}" alt=""></div>
                <select wire:model="jumlah" id="jumlah" class="border-none w-full">
                </select>
            </div>
        </div>
        <button type="button" class="bg-blue-300 w-full h-full col-span-4 px-2 md:px-5 py-1 md:py-3 rounded" wire:click='CariKapal'>Cari Kapal</button>
    </form>
</div>
