<div>
    @include('sweetalert::alert')
    <x-table.table>
        <x-slot name="th">
            <tr>
                <th>No</th>
                <th>Pemesan</th>
                {{-- <th>ID Transaksi</th> --}}
                <th>Kode Tiket</th>
                <th>Tanggal & Jam Berangkat</th>
                <th>Tanggal & Jam Kembali</th>
                <th>Status</th>
                <th>Ubah Status</th>
            </tr>
        </x-slot>
        <x-slot name="td">
            @foreach ($transaksi as $item)
                <tr>
                    <td class=" border border-gray-500 text-center">{{ $loop->iteration }}</td>
                    <td class=" border border-gray-500 text-center">{{ $item->transaksi->user_name }}</td>
                    {{-- <td class=" border border-gray-500 text-center">{{ $item->ID_transaksi }}</td> --}}
                    <td class=" border border-gray-500 text-center">{{ $item->kode_tiket }}</td>
                    <td class=" border border-gray-500 text-center">{{ $item->jadwal_berangkat }} /
                        {{ $item->jam_berangkat }}</td>
                    <td class=" border border-gray-500 text-center">{{ $item->jadwal_kembali }} /
                        {{ $item->jam_kembali }}</td>
                    <td class=" border border-gray-500 text-center">
                        <button type="button" @class([
                            'bg-green-500 text-xs flex items-center  text-white text-sm font-bold p-1 rounded-lg text-center',
                            'bg-red-500 text-xs' => $item->status == '0',
                        ]) wire:click='updateModal({{ $item->id }})'>
                            @if ($item->status === '0')
                                Belum Diantar
                            @endif
                            @if ($item->status === '1')
                            Sudah Diantar Kepulau
                            @endif
                            @if ($item->status === '2')
                            Sudah Kembali Dari Kepulau
                            @endif
                        </button>
                    </td>
                    <td class=" border border-gray-500 text-center">
                        <x-jet-button type='button' class="ml-3 mt-2"
                            wire:click='updateModal({{ $item->id }})'>Ubah</x-jet-button>

                    </td>

                </tr>
            @endforeach
        </x-slot>
    </x-table.table>

    <x-jet-dialog-modal wire:model="itemStatus">
        <x-slot name="title"></x-slot>
        <x-slot name="content">
            <h1>Apakah Anda Yakin untuk Mengubah?</h1>
            <br>

            <label for="email">
                <p class="font-medium text-slate-700 pb-2">Ubah Status</p>
                <select id="des" wire:model="status"
                    class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                    placeholder="..........">
                    <option value="">--Pilih--</option>
                    <option value="0">Belum Diantar</option>
                    <option value="1">Sudah Diantar Kepulau</option>
                    <option value="2">Sudah Kembali Dari Pulau</option>
                </select>

            </label>
            <br>
            <x-jet-danger-button wire:click="closeModal">Tutup</x-jet-danger-button>
            <x-jet-button wire:click="update">Simpan</x-jet-button>
        </x-slot>
        <x-slot name="footer">

        </x-slot>
    </x-jet-dialog-modal>
</div>
