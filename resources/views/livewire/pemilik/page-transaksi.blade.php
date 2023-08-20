<div>
    @include('sweetalert::alert')
    <div class="w-full flex justify-center items-center overflow-auto p-2 bg-white">
        <table class="table w-full">
            <thead name="th">
                <tr>
                    <x-table.th>No</x-table.th>
                    <x-table.th>Pemesan</x-table.th>
                    <x-table.th>Kode Pemberangkatan</x-table.th>
                    <x-table.th>ID Transaksi</x-table.th>
                    <x-table.th>Tanggal Transaksi</x-table.th>
                    <x-table.th>Jumlah Tiket</x-table.th>
                    <x-table.th>Total</x-table.th>
                    <x-table.th>Status</x-table.th>

                    <x-table.th>Invoice</x-table.th>
                </tr>
            </thead>
            <tbody name="td">
                @if (count($transaksi) > 0)
                    @foreach ($transaksi as $item)
                        <tr>
                            <x-table.td class=" border border-gray-500 text-center">{{ $loop->iteration }}</x-table.td>
                            <x-table.td class=" border border-gray-500 text-center">{{ $item->user->name }}</x-table.td>
                            <x-table.td class=" border border-gray-500 text-center">{{ $item->kode_berangkat }}</x-table.td>
                            <x-table.td class=" border border-gray-500 text-center">{{ $item->ID_transaksi }}</x-table.td>
                            <x-table.td class=" border border-gray-500 text-center">{{ $item->tgl_transaksi }}</x-table.td>
                            <x-table.td class=" border border-gray-500 text-center">{{ $item->tiket->count() }}</x-table.td>
                            <x-table.td class=" border border-gray-500 text-center">
                                <button @class(['bg-green-500 flex items-center  text-white text-sm font-bold px-2 py-1 rounded-lg text-center', 'bg-red-500' => $item->status == 'PENDING']) wire:click='statusModal({{ $item->id }})'>
                                   {{ $item->status }}
                                  </button>
                            </x-table.td>

                            <x-table.td class=" border border-gray-500 text-center">Rp .{{ $item->tiket->sum('harga') }}
                            </x-table.td>
                            <x-table.td class="border border-gray-500 text-center"><a
                                    href="{{ asset('bukti/' . $item->bukti) }}"
                                    class="px-2 py-1 bg-blue-400 text-white rounded-md">detail</a></x-table.td>
                        </tr>
                        @php
                            $total[] = $item->tiket->sum('harga');
                        @endphp
                    @endforeach
                @else
                    <tr>
                        <x-table.td colspan="7">Pemesanan Kosong</x-table.td>
                    </tr>
                @endif
                <tr>
                    <x-table.td colspan="5" class=" border border-gray-500 text-right">Total</x-table.td>
                    @if (count($transaksi) > 0)
                        <x-table.td colspan="2">Rp. {{ number_format(array_sum($total), 0, 2) }}</x-table.td>
                    @endif
                </tr>
            </tbody>
        </table>

        <x-jet-dialog-modal wire:model="statusItem">
            <x-slot name="title"></x-slot>
            <x-slot name="content">
                <h1>Edit Status Transaksi pemesanan</h1>
                <form action="#" class="my-2">
                    <label for="">
                        <p class="font-medium text-slate-700 pb-2">Pilih Status</p>
                        <select id="status" wire:model="status" type="text"
                            class="w-full py-3 border border-slate-600 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                            placeholder=".........." />
                        <option value="">--Pilih--</option>
                        <option value="PENDING">PENDING</option>
                        <option value="SUCCESS">SUCCESS</option>
                        </select>
                    </label>
                </form>
                <x-jet-danger-button wire:click="closeModal">Tutup</x-jet-danger-button>
                <x-jet-button wire:click="updateStatus({{ $itemID }})">Update</x-jet-button>
            </x-slot>
            <x-slot name="footer">

            </x-slot>
        </x-jet-dialog-modal>
    </div>
</div>
