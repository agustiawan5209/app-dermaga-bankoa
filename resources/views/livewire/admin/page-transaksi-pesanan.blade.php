<div>
    <x-table.table>
        <x-slot name="th">
            <tr>
                <th>No</th>
                <th>Kode Berangkat</th>
                <th>Kode Tiket</th>
                <th>tgl Berangkat</th>
                <th>Pemesan</th>
            </tr>
        </x-slot>

        <x-slot name="td">
            @foreach ($tiket as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $item->kode_berangkat }}</td>
                    <td class="text-center">{{ $item->kode_tiket }}</td>
                    <td class="text-center">{{$item->berangkat->tgl_berangkat}}</td>
                    <td class="text-center">{{Auth::user()->name}}</td>
                </tr>
            @endforeach
        </x-slot>
    </x-table.table>
</div>
