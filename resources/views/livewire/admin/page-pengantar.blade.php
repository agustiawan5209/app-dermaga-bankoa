<div>
    @include('sweetalert::alert')
    <div class="w-full flex justify-center items-center overflow-auto p-2 bg-white">
        <table class="table w-full">
            <thead name="th">
                <tr>
                    <x-table.th>No</x-table.th>
                    <x-table.th>Nama</x-table.th>
                    <x-table.th>No. Telpon</x-table.th>
                    <x-table.th>Alamat</x-table.th>
                    <x-table.th>Aksi</x-table.th>

                </tr>
            </thead>
            <tbody name="td">
                @if (count($pengantar) > 0)
                    @foreach ($pengantar as $key => $item)
                        <tr>
                            <x-table.td class=" border border-gray-500 text-center">{{ $loop->iteration }}</x-table.td>
                            <x-table.td class=" border border-gray-500 text-center">{{ $item->user->name }}</x-table.td>
                            <x-table.td class=" border border-gray-500 text-center">{{ $value->no_telpon }}</x-table.td>
                            <x-table.td class=" border border-gray-500 text-center">{{ $value->alamat }}</x-table.td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <x-table.td colspan="7">Pengantar Kosong</x-table.td>
                    </tr>
                @endif
            </tbody>
        </table>

    </div>
</div>
