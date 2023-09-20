<div>
    @include('sweetalert::alert')
    <div class="w-full flex justify-center items-center overflow-auto p-2 bg-white">
        <table class="table w-full">
            <thead name="th">
                <tr>
                    <x-table.th>No</x-table.th>
                    <x-table.th>Pemesan</x-table.th>
                    <x-table.th>Jadwal/Jam Berangkat</x-table.th>
                    <x-table.th>Jadwal/Jam Kembali</x-table.th>
                    <x-table.th>Jumlah Penumpang</x-table.th>

                </tr>
            </thead>
            <tbody name="td">
                @if (count($transaksi) > 0)
                    @foreach ($transaksi as $key => $item)
                        <tr>
                            <x-table.td class=" border border-gray-500 text-center">{{ $loop->iteration }}</x-table.td>
                            <x-table.td class=" border border-gray-500 text-center">{{ $item->user->name }}</x-table.td>
                            @foreach ($item->tiket as $kunci => $value)
                                @if ($kunci == 0)
                                    <x-table.td
                                        class=" border border-gray-500 text-center">{{ $value->jadwal_berangkat }}/{{ $value->jam_berangkat }}</x-table.td>
                                    <x-table.td
                                        class=" border border-gray-500 text-center">{{ $value->jadwal_kembali }}/{{ $value->jam_kembali }}</x-table.td>
                                @endif
                            @endforeach
                            <x-table.td
                                class=" border border-gray-500 text-center">{{ $item->tiket->count() }}</x-table.td>
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
            </tbody>
        </table>

    </div>
</div>
