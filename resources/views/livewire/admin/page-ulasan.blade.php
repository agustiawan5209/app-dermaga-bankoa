<div>
    @if ($cariKapal == false)
        <x-table.table>
            <x-slot name="th">
                <tr>
                    <th>No</th>
                    <th>Kode Kapal</th>
                    <th>Nama Kapal</th>
                    <th>Ulasan</th>
                </tr>
            </x-slot>

            <x-slot name="td">
                @foreach ($tbKapal as $item)
                    <tr>
                        <td class="text-center border border-gray-500">{{ $loop->iteration }}</td>
                        <td class="w-20 border border-gray-500"><img src="{{ asset('storage/kapal/' . $item->gambar) }}"
                                alt=""></td>
                        {{-- <td class="text-center border border-gray-500">{{ $item->gambar }}</td> --}}
                        <td class="text-center border border-gray-500">{{ $item->nama_kapal }}</td>
                        <td class="text-center border border-gray-500">
                            <x-jet-button type='button' wire:click='CariUlasan({{ $item->id }})'> <svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </x-jet-button>
                        </td>
                    </tr>
                @endforeach
            </x-slot>

        </x-table.table>
    @endif
    @if ($cariKapal)
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        #
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Nama
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Email
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Ulasan
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ulasan as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 border-collapse font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$loop->iteration}}
                        </th>
                        <td class="py-4 px-6 border-collapse">
                            {{$item->user_name}}
                        </td>
                        <td class="py-4 px-6 border-collapse">
                            {{$item->email}}
                        </td>
                        <td class="py-4 px-6 border-collapse">
                           {{$item->ket}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
