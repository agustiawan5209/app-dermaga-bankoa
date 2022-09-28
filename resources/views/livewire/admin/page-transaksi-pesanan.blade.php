<div>
    <x-table.table>
        <x-slot name="th">
            <tr>
                <th>No</th>
                <th>Pemesan</th>
                <th>ID Transaksi</th>
                <th>Tanggal Transaksi</th>
                <th>Jumlah Tiket</th>
                <th>Total</th>
            </tr>
        </x-slot>
        @php
            $total = [];
        @endphp
        <x-slot name="td">
            @foreach ($tr as $item)
                <tr>
                    <td class=" border border-gray-500 text-center">{{ $loop->iteration }}</td>
                    <td class=" border border-gray-500 text-center">{{$item->user->name}}</td>
                    <td class=" border border-gray-500 text-center">{{ $item->ID_transaksi }}</td>
                    <td class=" border border-gray-500 text-center">{{ $item->tgl_transaksi }}</td>
                    <td class=" border border-gray-500 text-center">{{$item->tiket->count()}}</td>

                    <td class=" border border-gray-500 text-center">Rp .{{$item->tiket->sum('harga')}}</td>
                </tr>
                @php
                    $total[] = $item->tiket->sum('harga');
                @endphp
            @endforeach
            <tr>
                <td colspan="4" class=" border border-gray-500 text-right">Total</td>
                <td colspan="2">Rp. {{number_format(array_sum($total),0,2)}}</td>
            </tr>
        </x-slot>
    </x-table.table>
</div>
