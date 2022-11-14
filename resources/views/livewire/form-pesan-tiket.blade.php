<div class="h-max">
    @include('sweetalert::alert')
    @if ($CekoutItem == false)
        <div class="container mx-auto w-full flex justify-center h-64 py-6 bg-white shadow-black shadow-sm">
            {{-- Pemesanan Tiket --}}
            <div class="w-full-h-full bg-white">
                <x-jet-validation-errors />
                <form class=" relative grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 py-5 px-20 mx-auto">
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
                            min="27-07-2022" wire:model="tgl_berangkat" id='tgl_berangkat'>
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
                    <button type="button"
                        class="bg-blue-300 w-full h-full col-span-4 px-2 md:px-5 py-1 md:py-3 rounded"
                        wire:click='CariKapal'>Cari Kapal</button>
                </form>
            </div>
        </div>


        <div class="sm:px-6 w-full">
            <div class="px-4 md:px-10 ">
                <div class="flex items-center justify-between">
                    <p tabindex="0"
                        class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800 dark:text-white">
                        Kapal</p>

                </div>
            </div>
            <div class="bg-white dark:bg-gray-900 px-4 md:px-8 xl:px-10">
                <div class="mt-7 overflow-x-auto">
                    <table class="w-full whitespace-nowrap">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Nama kapal</th>
                                <th>Tanggal Berangkat</th>
                                <th>Jam</th>
                                <th>Tujuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemberangkatan as $pemberangkatan)
                                <tr tabindex="0"
                                    class="focus:outline-none h-16 border border-gray-100 dark:border-gray-600  rounded">
                                    <td class="border-x text-center pl-2">
                                        <div class="flex items-center justify-center">
                                            <img src="{{ asset('storage/kapal/' . $pemberangkatan->kapal->gambar) }}"
                                                alt="Gambar" class="w-20">
                                        </div>
                                    </td>
                                    <td class="border-x text-center ">
                                        {{ $pemberangkatan->kapal->nama_kapal }}
                                    </td>

                                    <td class="border-x text-center">
                                        <div class="flex items-center justify-center">
                                            <p
                                                class="py-3 px-3 text-sm focus:outline-none leading-none text-red-700 bg-red-100 rounded">
                                                {{ $pemberangkatan->tgl_berangkat }}
                                            </p>
                                        </div>
                                    </td>
                                    <td class="border-x text-center">
                                        <div class="flex items-center justify-center">

                                            <p
                                                class="py-3 px-3 text-sm focus:outline-none leading-none text-red-700 bg-red-100 rounded">
                                                {{ $pemberangkatan->jam }} WITA
                                            </p>
                                        </div>
                                    </td>
                                    <td class="border-x text-center">
                                        <div class="flex items-center justify-center">
                                            <p class="text-sm leading-none text-gray-600 dark:text-gray-200  ml-2 font-bold">
                                                {{ $pemberangkatan->destinasi->lokasi }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div tabindex="0" wire:click='DetailKapal({{$pemberangkatan->id}})'
                                            class="focus:outline-none focus:text-indigo-600 text-xs w-full hover:bg-indigo-700 py-4 px-4 cursor-pointer hover:text-white">
                                            <p>Detail</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <style>
            .checkbox:checked+.check-icon {
                display: flex;
            }
        </style>

    @endif
    @if ($detailKapalItem)
        @include('modal.detail')
    @endif
</div>
