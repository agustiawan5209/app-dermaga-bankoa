<div>
    <div>
        @include('sweetalert::alert')

        <x-jet-button type='button' onclick="this.preventDefault" wire:click='addModal'>Tambah Kapal</x-jet-button>

        <x-table.table>
            <x-slot name="th">
                <tr>
                    <x-table.th>No</x-table.th>
                    <x-table.th>Foto</x-table.th>
                    <x-table.th>Nama Kapal</x-table.th>
                    <x-table.th>Kapal</x-table.th>
                    <x-table.th>Tujuan</x-table.th>
                    <x-table.th>Jumlah Muatan</x-table.th>
                    <x-table.th>Status</x-table.th>
                    <x-table.th>Aksi</x-table.th>
                </tr>
            </x-slot>

            <x-slot name="td">
                @foreach ($kapal as $item)
                    <tr>
                        <x-table.td class="text-center border border-gray-500">{{ $loop->iteration }}</x-table.td>
                        <x-table.td class="w-20 border border-gray-500"><img src="{{ asset('storage/kapal/' . $item->gambar) }}"
                                alt=""></x-table.td>
                        {{-- <x-table.td class="text-center border border-gray-500">{{ $item->gambar }}</x-table.td> --}}
                        <x-table.td class="text-center border border-gray-500">{{ $item->nama_kapal }}</x-table.td>
                        <x-table.td class="text-center border border-gray-500">{{ $item->pemberangkatan->destinasi->lokasi }}</x-table.td>
                        <x-table.td class="text-center border border-gray-500">{{ $item->jenis_kapal }}</x-table.td>
                        <x-table.td class="text-center border border-gray-500">{{ $item->jumlah_muatan }}</x-table.td>
                        <x-table.td class="text-center border border-gray-500">
                            <span class="px-2 py-1 bg-red-200 rounded-lg">{{ $item->pemberangkatan->status }}</span>
                        </x-table.td>
                        <x-table.tdaction :id="$item->id" />
                    </tr>
                @endforeach
            </x-slot>

        </x-table.table>
        <x-jet-dialog-modal wire:model="itemDelete">
            <x-slot name="title">Apakah Anda Yakin?</x-slot>
            <x-slot name="content"></x-slot>
            <x-slot name="footer">
                <x-jet-danger-button wire:click="closeModal">Tutup</x-jet-danger-button>
                <x-jet-danger-button wire:click="delete({{ $itemID }})">Hapus</x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
    <div>
        <x-jet-dialog-modal wire:model='itemAdd'>
            <x-slot name="content">
                <form action="" class="my-2">

                    <div class="flex flex-col space-y-5 max-w-md bg-white px-4 py-2">
                        <x-jet-validation-errors />
                        <label for="">
                            <p class="font-medium text-slate-700 pb-2">Foto kapal</p>
                            <x-jet-input id="gambar" wire:model="gambar" type="file"
                                class="w-full py-3 border border-slate-200 bg-white rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                                placeholder=".........." />

                        </label>
                        <label for="">
                            <p class="font-medium text-slate-700 pb-2">nama kapal</p>
                            <x-jet-input id="nama_kapal" wire:model="nama_kapal" type="text"
                                class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                                placeholder=".........." />

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
                        </label>
                        <x-jet-input type="hidden" wire:model="pemilik" />
                        <label for="">
                            <p class="font-medium text-slate-700 pb-2">jumlah muatan</p>
                            <x-jet-input id="jumlah_muatan" wire:model="jumlah_muatan" type="text"
                                class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                                placeholder=".........." />

                        </label>
                        <div class="flex flex-col space-y-5">
                            <label for="email">
                                <p class="font-medium text-slate-700 pb-2">Kode Berangkat</p>
                                <input id="kode_berangkat" wire:model="kode_berangkat" type="text"
                                    class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                                    placeholder="..........">

                            </label>
                            <label for="email">
                                <p class="font-medium text-slate-700 pb-2">Tujuan</p>
                                <select id="des" wire:model="destinasi_id" type="text"
                                    class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                                    placeholder="..........">
                                    <option value="">--Pilih--</option>
                                    @foreach ($destinasi as $item)
                                        <option value="{{ $item->id }}">{{ $item->lokasi }}</option>
                                    @endforeach
                                </select>

                            </label>
                            <label for="email">
                                <p class="font-medium text-slate-700 pb-2">Harga</p>
                                <input id="harga" wire:model="harga" type="text"
                                    class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                                    placeholder="..........">

                            </label>
                            <label for="email">
                                <p class="font-medium text-slate-700 pb-2">Keterangan</p>
                                <textarea id="deskripsi" wire:model="deskripsi"
                                    class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                                    placeholder=".........."></textarea>

                            </label>

                        @if ($itemEdit == false)
                            <button wire:click='create' type="button"
                                class="w-full py-3 font-medium text-white bg-indigo-600 hover:bg-indigo-500 rounded-lg border-indigo-500 hover:shadow inline-flex space-x-2 items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                <span>Tambah</span>
                            </button>
                        @else
                            <button wire:click='edit({{ $itemID }})' type="button"
                                class="w-full py-3 font-medium text-white bg-indigo-600 hover:bg-indigo-500 rounded-lg border-indigo-500 hover:shadow inline-flex space-x-2 items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                <span>Edit</span>
                            </button>
                        @endif
                    </div>
                </form>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
</div>
