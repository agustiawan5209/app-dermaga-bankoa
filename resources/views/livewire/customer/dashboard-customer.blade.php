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
                <th>Invoice</th>
            </tr>
        </x-slot>
        <x-slot name="td">
           @if ($tr->count() > 0)
             @foreach ($tr as $item)
                 <tr>
                     <td class=" border border-gray-500 text-center">{{ $loop->iteration }}</td>
                     <td class=" border border-gray-500 text-center">{{ $item->user->name }}</td>
                     <td class=" border border-gray-500 text-center">{{ $item->ID_transaksi }}</td>
                     <td class=" border border-gray-500 text-center">{{ $item->tgl_transaksi }}</td>
                     <td class=" border border-gray-500 text-center">{{ $item->tiket->count() }}</td>

                     <td class=" border border-gray-500 text-center">Rp .{{ $item->tiket->sum('harga') }}</td>
                     <td class="border border-gray-500 text-center"><a href="{{ asset('bukti/' . $item->bukti) }}">detail</a></td>
                 </tr>
                 @php
                     $total[] = $item->tiket->sum('harga');
                 @endphp
             @endforeach
             @else
             <tr>
                <td colspan="7">Pemesanan Kosong</td>
             </tr>
           @endif
            <tr>
                <td colspan="5" class=" border border-gray-500 text-right">Total</td>
                @if ($tr->count() > 0)
                    <td colspan="2">Rp. {{ number_format(array_sum($total), 0, 2) }}</td>
                @endif
            </tr>
        </x-slot>
    </x-table.table>
</div>
