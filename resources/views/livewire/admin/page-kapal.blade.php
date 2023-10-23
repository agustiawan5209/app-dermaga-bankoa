<div class="bg-white">
    @include('sweetalert::alert')

    <x-jet-button type='button' class="ml-3 mt-2" onclick="this.preventDefault" wire:click='addModal'>Tambah Kapal</x-jet-button>

    <x-table.table>
        <x-slot name="th">
            <tr>
                <x-table.th>No</x-table.th>
                <x-table.th>Foto</x-table.th>
                <x-table.th>Nama Kapal</x-table.th>
                <x-table.th>Tujuan</x-table.th>
                <x-table.th>Harga</x-table.th>
                <x-table.th>Jumlah Muatan</x-table.th>
                <x-table.th>Status</x-table.th>
                <x-table.th>Aksi</x-table.th>
            </tr>
        </x-slot>

        <x-slot name="td">
            @foreach ($kapal as $item)
                <tr>
                    <x-table.td class="text-center border border-gray-500">{{ $loop->iteration }}</x-table.td>
                    <x-table.td class="w-20 border border-gray-500"><img
                            src="{{ asset('storage/kapal/' . $item->gambar) }}" alt=""></x-table.td>
                    {{-- <x-table.td class="text-center border border-gray-500">{{ $item->gambar }}</x-table.td> --}}
                    <x-table.td class="text-center border border-gray-500">{{ $item->nama_kapal }}</x-table.td>
                    <x-table.td class="text-center border border-gray-500">
                        @if ($item->pemberangkatan == null || $item->pemberangkatan == null)
                            Lokasi/Destinasi Hilang
                        @else
                            {{ $item->pemberangkatan->destinasi->lokasi }}
                        @endif
                    </x-table.td>
                    <x-table.td class="text-center border border-gray-500">Rp.
                        {{ $item->pemberangkatan != null ? number_format( $item->pemberangkatan->harga, 0, 2) : 'Data Keberangkaran Kosog'  }}</x-table.td>
                    <x-table.td class="text-center border border-gray-500">{{ $item->jumlah_muatan }}</x-table.td>
                    <x-table.td class="text-center border border-gray-500">
                        <span class="px-2 py-1 bg-red-200 rounded-lg">{{  $item->pemberangkatan != null ?$item->pemberangkatan->status : 'Data Keberangkaran Kosog' }}</span>
                    </x-table.td>

                    <x-table.td class="text-center border border-gray-500">
                        <x-jet-button type="button" class="!p-1 text-sm bg-green-500 hover:bg-green-600 " wire:click='editModal({{$item->id}})'>
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                        </x-jet-button>
                        <x-jet-button type="button" class="!p-1 text-sm bg-red-500 hover:!bg-red-600  " wire:click='deleteModal({{$item->id}})'>
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                        </x-jet-button>
                        <x-jet-button type="button" class="!p-1 text-sm bg-blue-500 hover:!bg-blue-600  " wire:click='showModal({{$item->id}})'>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 text-blue-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                              </svg>

                        </x-jet-button>
                    </x-table.td>
                </tr>
            @endforeach
        </x-slot>

    </x-table.table>
    <main>
        <x-jet-dialog-modal wire:model="itemDelete">
            <x-slot name="title"></x-slot>
            <x-slot name="content">
                <h1>Apakah Anda Yakin?</h1>
                <x-jet-danger-button wire:click="closeModal">Tutup</x-jet-danger-button>
                <x-jet-danger-button wire:click="delete({{ $itemID }})">Hapus</x-jet-danger-button>
            </x-slot>
            <x-slot name="footer">

            </x-slot>
        </x-jet-dialog-modal>
        <x-jet-dialog-modal wire:model="itemShow">
            <x-slot name="title"></x-slot>
            <x-slot name="content">
                <h1>Detail Keberangkatan Kapal {{ $kode_berangkat }}</h1>
                <table class="table">
                    <tr>
                        <td class="capitalize p-1 border border-gray-500 ">Foto</td>
                        <td class="capitalize p-1 border border-gray-500 "><img width='300'
                            src="{{ asset('storage/kapal/' . $gambar) }}" alt=""></td>
                    </tr>
                    <tr>
                        <td class="capitalize p-1 border border-gray-500 ">Nama Kapal</td>
                        <td class="capitalize p-1 border border-gray-500 ">{{ $nama_kapal }}</td>
                    </tr>
                    <tr>
                        <td class="capitalize p-1 border border-gray-500 ">jenis Kapal</td>
                        <td class="capitalize p-1 border border-gray-500 ">{{ $jenis_kapal }}</td>
                    </tr>
                    <tr>
                        <td class="capitalize p-1 border border-gray-500 ">jumlah muatan Kapal</td>
                        <td class="capitalize p-1 border border-gray-500 ">{{ $jumlah_muatan }}</td>
                    </tr>
                    <tr>
                        <td class="capitalize p-1 border border-gray-500 ">Destinasi Kapal</td>
                        <td class="capitalize p-1 border border-gray-500 ">{{ $destinasi_id }}</td>
                    </tr>
                    <tr>
                        <td class="capitalize p-1 border border-gray-500 ">Harga Kapal</td>
                        <td class="capitalize p-1 border border-gray-500 ">{{ $harga }}</td>
                    </tr>
                    <tr>
                        <td class="capitalize p-1 border border-gray-500 ">Deskripsi</td>
                        <td class="capitalize p-1 border border-gray-500 ">{{ $deskripsi }}</td>
                    </tr>
                    {{-- <tr>
                        <td class="capitalize p-1 border border-gray-500 ">jadwal berangkat</td>
                        <td class="capitalize p-1 border border-gray-500 ">{{ $jadwal_berangkat }}</td>
                    </tr>
                    <tr>
                        <td class="capitalize p-1 border border-gray-500 ">jadwalkembali</td>
                        <td class="capitalize p-1 border border-gray-500 ">{{ $jadwal_kembali }}</td>
                    </tr> --}}
                </table>
                <x-jet-danger-button wire:click="closeModal">Tutup</x-jet-danger-button>
            </x-slot>
            <x-slot name="footer">

            </x-slot>
        </x-jet-dialog-modal>
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
                        <x-jet-input type="hidden" wire:model="pemilik" />
                        <label for="">
                            <p class="font-medium text-slate-700 pb-2">jumlah muatan</p>
                            <x-jet-input id="jumlah_muatan" wire:model="jumlah_muatan" type="text"
                                class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                                placeholder=".........." />

                        </label>
                        <div class="flex flex-col space-y-5">

                            <label for="email">
                                <p class="font-medium text-slate-700 pb-2">Tujuan</p>
                                <select id="des" wire:model="destinasi_id" wire:change='GetHargaDestinasi()'
                                    type="text"
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
                                <input id="harga" wire:model="harga" type="number"
                                    class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                                    placeholder="..........">
                            </label>
                            <label for="email">
                                <p class="font-medium text-slate-700 pb-2">Keterangan</p>
                                <textarea id="deskripsi" wire:model="deskripsi"
                                    class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                                    placeholder=".........."></textarea>
                            </label>
                            {{-- <label for="email">
                                <p class="font-medium text-slate-700 pb-2">jadwal berangkat</p>
                                <input id="jadwal_berangkat" wire:model="jadwal_berangkat" type="text"
                                    class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                                    placeholder="..........">
                            </label>
                            <label for="email">
                                <p class="font-medium text-slate-700 pb-2">jadwal kembali</p>
                                <input id="jadwal_kembali" wire:model="jadwal_kembali" type="text"
                                    class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                                    placeholder="..........">
                            </label> --}}
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
    </main>
</div>
