<div>
    @include('sweetalert::alert')

    <x-jet-button type='button' wire:click='toPageKapal'>Kapal</x-jet-button>
    <x-jet-button type='button' wire:click='buatKeberankatan'>Tambah Berangkat</x-jet-button>
    @if ($itemTambahBerangkat)
        <form action="" class="bg-white p-5 w-1/2">
            <div class="flex flex-col space-y-5">
                <label for="email">
                    <p class="font-medium text-slate-700 pb-2">Kode Berangkat</p>
                    <input id="kode_berangkat" wire:model="kode_berangkat" type="text"
                        class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                        placeholder="..........">
                    @error('kode_berangkat')
                        <span class="text-red-500 font-semibold">{{ $message }}</span>
                    @enderror
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
                    @error('destinasi_id')
                        <span class="text-red-500 font-semibold">{{ $message }}</span>
                    @enderror
                </label>
                <label for="email">
                    <p class="font-medium text-slate-700 pb-2">Harga</p>
                    <input id="harga" wire:model="harga" type="text"
                        class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                        placeholder="..........">
                    @error('harga')
                        <span class="text-red-500 font-semibold">{{ $message }}</span>
                    @enderror
                </label>
                <label for="email">
                    <p class="font-medium text-slate-700 pb-2">Tgl Berangkat</p>
                    <input id="tgl_berangkat" wire:model="tgl_berangkat" type="date"
                        class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                        placeholder="..........">
                    @error('tgl_berangkat')
                        <span class="text-red-500 font-semibold">{{ $message }}</span>
                    @enderror
                </label>
                <label for="email">
                    <p class="font-medium text-slate-700 pb-2">Jam Berangkat</p>
                    <input id="jam" wire:model="jam" type="time"
                        class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                        placeholder="..........">
                    @error('jam')
                        <span class="text-red-500 font-semibold">{{ $message }}</span>
                    @enderror
                </label>

                <label for="email">
                    <p class="font-medium text-slate-700 pb-2">Kapal</p>
                    <select id="des" wire:model="kapal_id" type="text"
                        class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                        placeholder="..........">
                        <option value="">--Pilih--</option>
                        @foreach ($kapal as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_kapal }}/{{ $item->jenis_kapal }}
                            </option>
                        @endforeach
                    </select>
                    @error('kapal_id')
                        <span class="text-red-500 font-semibold">{{ $message }}</span>
                    @enderror
                </label>
                <label for="email">
                    <p class="font-medium text-slate-700 pb-2">Keterangan</p>
                    <textarea id="deskripsi" wire:model="deskripsi"
                        class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                        placeholder=".........."></textarea>
                    @error('deskripsi')
                        <span class="text-red-500 font-semibold">{{ $message }}</span>
                    @enderror
                </label>
                @if ($itemID == null)
                    <button wire:click='createBerangkat' type="button"
                        class="w-full py-3 font-medium text-white bg-indigo-600 hover:bg-indigo-500 rounded-lg border-indigo-500 hover:shadow inline-flex space-x-2 items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        <span>Tambah</span>
                    </button>
                @else
                    <button wire:click='editBerangkat({{ $itemID }})' type="button"
                        class="w-full py-3 font-medium text-white bg-indigo-600 hover:bg-indigo-500 rounded-lg border-indigo-500 hover:shadow inline-flex space-x-2 items-center justify-center">
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
    @if ($itemTambahBerangkat == false)
        <x-table.table>
            <x-slot name="th">
                <tr>
                    <th>No</th>
                    <th>Kode Berangkat</th>
                    <th>Kapal</th>
                    <th>tgl Berangkat</th>
                    <th>Pemesanan</th>
                    <th>Aksi</th>
                </tr>
            </x-slot>

            <x-slot name="td">
                @foreach ($berangkat as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $item->kode_berangkat }}</td>
                        <td class="text-center">{{ $item->kapal->nama_kapal }}</td>
                        <td class="text-center">{{ $item->tgl_berangkat }}/{{ $item->jam }}</td>
                        <td class="text-center">
                            <a href="{{ route('Admin.Page.Pemesanan.Tiket', ['Kode' => $item->kode_berangkat]) }}">
                                <x-jet-button type="button">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </x-jet-button>
                            </a>
                        </td>
                        <td class="flex justify-center items-center gap-2">
                            <x-jet-button type='button' wire:click='editKeberankatan({{ $item->id }})'>
                                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                            </x-jet-button>
                            <x-jet-button type='button' wire:click='deleteBerangkat({{ $item->id }})'>
                                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                            </x-jet-button>
                        </td>

                    </tr>
                @endforeach
            </x-slot>
        </x-table.table>
    @endif
</div>
