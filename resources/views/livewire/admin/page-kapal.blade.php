<div>
    @include('sweetalert::alert')

    <x-jet-button type='button' onclick="this.preventDefault" wire:click='addModal'>Tambah Kapal</x-jet-button>
    @if ($itemAdd)
        <form action="" class="my-2">
            <div class="flex flex-col space-y-5 max-w-md bg-white px-4 py-2">
                <label for="">
                    <p class="font-medium text-slate-700 pb-2">Foto kapal</p>
                    <x-jet-input id="gambar" wire:model="gambar" type="file"
                        class="w-full py-3 border border-slate-200 bg-white rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                        placeholder=".........." />
                    @error('gambar')
                        <span class="text-red-500 font-semibold">{{ $message }}</span>
                    @enderror
                </label>
                <label for="">
                    <p class="font-medium text-slate-700 pb-2">nama kapal</p>
                    <x-jet-input id="nama_kapal" wire:model="nama_kapal" type="text"
                        class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                        placeholder=".........." />
                    @error('nama_kapal')
                        <span class="text-red-500 font-semibold">{{ $message }}</span>
                    @enderror
                </label>
                <label for="">
                    <p class="font-medium text-slate-700 pb-2">jenis kapal</p>
                    <select id="jenis_kapal" wire:model="jenis_kapal" type="text"
                        class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                        placeholder=".........." />
                    <option value="">--Pilih--</option>
                    <option value="Penumpang">Penumpang</option>
                    <option value="Kargo">Kargo</option>
                    </select>
                    @error('jenis_kapal')
                        <span class="text-red-500 font-semibold">{{ $message }}</span>
                    @enderror
                </label>
                <x-jet-input type="hidden" wire:model="pemilik" />
                    <label for="">
                        <p class="font-medium text-slate-700 pb-2">jumlah muatan</p>
                        <x-jet-input id="jumlah_muatan" wire:model="jumlah_muatan" type="text"
                            class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                            placeholder=".........." />
                        @error('jumlah_muatan')
                            <span class="text-red-500 font-semibold">{{ $message }}</span>
                        @enderror
                    </label>

                    <button wire:click='create' type="submit"
                        class="w-full py-3 font-medium text-white bg-indigo-600 hover:bg-indigo-500 rounded-lg border-indigo-500 hover:shadow inline-flex space-x-2 items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        <span>Tambah</span>
                    </button>
                </div>
        </form>
    @endif
    <x-table.table>
        <x-slot name="th">
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Kapal</th>
                <th>Kapal</th>
                <th>Jumlah Muatan</th>
            </tr>
        </x-slot>

        <x-slot name="td">
            @foreach ($kapal as $item)
                <tr>
                    <td class="text-center border border-gray-500">{{ $loop->iteration }}</td>
                    <td class="w-20 border border-gray-500"><img src="{{ asset('storage/kapal/'. $item->gambar) }}" alt=""></td>
                    {{-- <td class="text-center border border-gray-500">{{ $item->gambar }}</td> --}}
                    <td class="text-center border border-gray-500">{{ $item->nama_kapal }}</td>
                    <td class="text-center border border-gray-500">{{ $item->jenis_kapal }}</td>
                    <td class="text-center border border-gray-500">{{ $item->jumlah_muatan }}</td>
                </tr>
            @endforeach
        </x-slot>

    </x-table.table>
</div>
