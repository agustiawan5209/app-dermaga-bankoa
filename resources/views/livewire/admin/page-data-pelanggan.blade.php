<section>
    <x-table.table>
        <x-slot name="th">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>email</th>
            </tr>
        </x-slot>

        <x-slot name="td">
            @for ($i = 0; $i < count($tiket); $i++)
                @foreach ($tiket[$i] as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->user->email }}</td>
                        {{-- <td>{{$item}}</td> --}}
                    </tr>
                @endforeach
            @endfor
        </x-slot>

    </x-table.table>
</section>
