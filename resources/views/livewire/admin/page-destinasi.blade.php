<div>
    @include('sweetalert::alert')

    <x-jet-button type='button' onclick="this.preventDefault" wire:click='addModal'>Tambah Destinasi</x-jet-button>
    <x-jet-validation-errors />
    @if ($itemAdd)
        <form action="#" class="my-2">

            <div class="flex flex-col space-y-5 max-w-md bg-white px-4 py-2">

                <label for="">
                    <p class="font-medium text-slate-700 pb-2">Lokasi</p>
                    <x-jet-input id="lokasi" wire:model="lokasi" type="text"
                        class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                        placeholder=".........." />
                    @error('lokasi')
                        <span class="text-red-500 font-semibold">{{ $message }}</span>
                    @enderror
                </label>
                <x-jet-input type="hidden" wire:model="pemilik" />
                <label for="">
                    <p class="font-medium text-slate-700 pb-2">Harga</p>
                    <x-jet-input id="harga" wire:model.defer="harga" type="text"
                        class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                        placeholder=".........." />
                    @error('harga')
                        <span class="text-red-500 font-semibold">{{ $message }}</span>
                    @enderror
                </label>

                @if ($itemEdit == false)
                    <button wire:click='create' type="submit"
                        class="w-full py-3 font-medium text-white bg-indigo-600 hover:bg-indigo-500 rounded-lg border-indigo-500 hover:shadow inline-flex space-x-2 items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        <span>Tambah</span>
                    </button>
                @else
                    <button wire:click='edit({{ $itemID }})' type="submit"
                        class="w-full py-3 font-medium text-white bg-green-600 hover:bg-green-500 rounded-lg border-indigo-500 hover:shadow inline-flex space-x-2 items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        <span>Edit</span>
                    </button>
                @endif
            </div>
        </form>
    @endif

    <div class="w-full">
        <x-table.table>
            <x-slot name="th">
                <tr>
                    <th>No</th>
                    <th>Lokasi</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </x-slot>

            <x-slot name="td">
                @foreach ($tujuan as $destinasi)
                    <tr>
                        <td class="text-center border border-gray-500">{{ $loop->iteration }}</td>
                        {{-- <td class="text-center border border-gray-500">{{ $destinasi->gambar }}</td> --}}
                        <td class="text-center border border-gray-500">{{ $destinasi->lokasi }}</td>
                        <td class="text-center border border-gray-500">Rp. {{ number_format($destinasi->harga, 0, 2) }}
                        </td>
                        <x-table.tdaction :id="$destinasi->id" />
                    </tr>
                @endforeach
            </x-slot>

        </x-table.table>
    </div>
    <x-jet-dialog-modal wire:model="itemDelete">
        <x-slot name="title">Apakah Anda Yakin?</x-slot>
        <x-slot name="content"></x-slot>
        <x-slot name="footer">
            <x-jet-danger-button wire:click="closeModal">Tutup</x-jet-danger-button>
            <x-jet-danger-button wire:click="delete({{ $itemID }})">Hapus</x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
