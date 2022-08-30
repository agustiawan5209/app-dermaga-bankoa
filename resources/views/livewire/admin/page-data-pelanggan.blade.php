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
           @foreach ($user as $item)
             <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
             </tr>
           @endforeach
        </x-slot>

    </x-table.table>
</section>
