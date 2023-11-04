<div>

    @include('sweetalert::alert')

    <x-jet-button type='button' class="ml-3 mt-2" onclick="this.preventDefault" wire:click='addModal'>Tambah Kapal</x-jet-button>

    <x-table.table>
        <x-slot name="th">
            <tr>
                <x-table.th>No</x-table.th>
                <x-table.th>Foto</x-table.th>
                <x-table.th>Nama Kapal</x-table.th>
                <x-table.th>Tujuan</x-table.th>
                <x-table.th>Harga</x-table.th>
                <x-table.th>Jumlah Muatan</x-table.th>
                <x-table.th>Status</x-table.th>
                <x-table.th>Jumlah Penumpang</x-table.th>
            </tr>
        </x-slot>

        <x-slot name="td">
            @foreach ($kapal as $item)
                <tr>
                    <x-table.td class="text-center border border-gray-500">{{ $loop->iteration }}</x-table.td>
                    <x-table.td class="w-20 border border-gray-500"><img
                            src="{{ asset('storage/kapal/' . $item->gambar) }}" alt=""></x-table.td>
                    {{-- <x-table.td class="text-center border border-gray-500">{{ $item->gambar }}</x-table.td> --}}
                    <x-table.td class="text-center border border-gray-500">{{ $item->nama_kapal }}</x-table.td>
                    <x-table.td class="text-center border border-gray-500">
                        @if ($item->pemberangkatan == null || $item->pemberangkatan == null)
                            Lokasi/Destinasi Hilang
                        @else
                            {{ $item->pemberangkatan->destinasi->lokasi }}
                        @endif
                    </x-table.td>
                    <x-table.td class="text-center border border-gray-500">Rp.
                        {{ $item->pemberangkatan != null ? number_format( $item->pemberangkatan->harga, 0, 2) : 'Data Keberangkaran Kosog'  }}</x-table.td>
                    <x-table.td class="text-center border border-gray-500">{{ $item->jumlah_muatan }}</x-table.td>
                    <x-table.td class="text-center border border-gray-500">
                        <span class="px-2 py-1 bg-red-200 rounded-lg">{{  $item->pemberangkatan != null ?$item->pemberangkatan->status : 'Data Keberangkaran Kosog' }}</span>
                    </x-table.td>

                    <x-table.td class="text-center border border-gray-500">
                        @if ($item->pemberangkatan != null)
                            @if ($item->pemberangkatan->tiket != null)
                                <x-jet-button type='button' class="ml-3 mt-2" onclick="this.preventDefault">{{ $item->pemberangkatan->tiket->count() }}</x-jet-button>
                                <a href="{{ route('Pemilik.Detail-Data-Kapal', ['kode_berangkat'=> $item->pemberangkatan->kode_berangkat]) }}"><x-jet-button type='button' class="ml-3 mt-2 !bg-blue-500" onclick="this.preventDefault">Detail</x-jet-button></a>
                            @endif
                        @endif
                    </x-table.td>
                </tr>
            @endforeach
        </x-slot>

    </x-table.table>
</div>
