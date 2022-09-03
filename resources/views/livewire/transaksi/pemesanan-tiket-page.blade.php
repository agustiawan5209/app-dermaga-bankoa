<div>


    <x-jet-button type='button' wire:click='toPageKapal'>Kapal</x-jet-button>
    <x-jet-button type='button' wire:click='buatKeberankatan'>Tambah Berangkat</x-jet-button>
    @if ($itemTambahBerangkat)
        <form action="" class="my-10">
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
                    <p class="font-medium text-slate-700 pb-2">Jam</p>
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
                <button wire:click='createBerangkat' type="button"
                    class="w-full py-3 font-medium text-white bg-indigo-600 hover:bg-indigo-500 rounded-lg border-indigo-500 hover:shadow inline-flex space-x-2 items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    <span>Tambah</span>
                </button>
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
                </tr>
            </x-slot>

            <x-slot name="td">
                @foreach ($berangkat as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $item->kode_berangkat }}</td>
                        <td class="text-center">{{ $item->kapal->nama_kapal }}</td>
                        <td class="text-center">{{ $item->tgl_berangkat }}/{{ $item->jam }}</td>
                    </tr>
                @endforeach
            </x-slot>
        </x-table.table>

    @endif
</div>
