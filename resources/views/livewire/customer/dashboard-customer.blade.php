<div>
    @include('sweetalert::alert')
    <div class="w-full flex justify-center items-center overflow-auto">
        <table class="table w-full">
            <thead name="th">
                <tr>
                    <x-table.th>No</x-table.th>
                    <x-table.th>Pemesan</x-table.th>
                    <x-table.th>ID Transaksi</x-table.th>
                    <x-table.th>Tanggal Transaksi</x-table.th>
                    <x-table.th>Jumlah Tiket</x-table.th>
                    <x-table.th>Total</x-table.th>
                    <x-table.th>Invoice</x-table.th>
                </tr>
            </thead>
            <tbody name="td">
                @if ($tr->count() > 0)
                    @foreach ($tr as $item)
                        <tr>
                            <x-table.td class=" border border-gray-500 text-center">{{ $loop->iteration }}</x-table.td>
                            <x-table.td class=" border border-gray-500 text-center">{{ $item->user->name }}</x-table.td>
                            <x-table.td class=" border border-gray-500 text-center">{{ $item->ID_transaksi }}</x-table.td>
                            <x-table.td class=" border border-gray-500 text-center">{{ $item->tgl_transaksi }}</x-table.td>
                            <x-table.td class=" border border-gray-500 text-center">{{ $item->tiket->count() }}</x-table.td>

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
                    @if ($tr->count() > 0)
                        <x-table.td colspan="2">Rp. {{ number_format(array_sum($total), 0, 2) }}</x-table.td>
                    @endif
                </tr>
            </tbody>
        </table>
    </div>
</div>
