<div>
    @include('sweetalert::alert')
  <div class="container">
    <x-jet-button type='button' class="ml-3 mt-2" onclick="this.preventDefault" wire:click='addModal'>Tambah Pengantar</x-jet-button>
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
                @if ($pengantar->count() > 0)
                    @foreach ($pengantar as $key => $item)
                        <tr>
                            <x-table.td class=" border border-gray-500 text-center">{{ $loop->iteration }}</x-table.td>
                            <x-table.td class=" border border-gray-500 text-center">{{ $item->nama }}</x-table.td>
                            <x-table.td class=" border border-gray-500 text-center">{{ $item->no_telpon }}</x-table.td>
                            <x-table.td class=" border border-gray-500 text-center">{{ $item->alamat }}</x-table.td>
                            <x-table.td class="text-center border border-gray-500">
                                <x-jet-button type="button" class="!p-1 text-sm bg-green-500 hover:bg-green-600 " wire:click='editModal({{$item->id}})'>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </x-jet-button>
                                <x-jet-button type="button" class="!p-1 text-sm bg-red-500 hover:!bg-red-600  " wire:click='deleteModal({{$item->id}})'>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </x-jet-button>
                            </x-table.td>
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
    <x-jet-confirmation-modal wire:model="itemDelete">
        <x-slot name="title"></x-slot>
        <x-slot name="content">
            <h1>Apakah Anda Yakin?</h1>
            <x-jet-danger-button wire:click="closeModal">Tutup</x-jet-danger-button>
            <x-jet-danger-button wire:click="delete">Hapus</x-jet-danger-button>
        </x-slot>
        <x-slot name="footer">

        </x-slot>
    </x-jet-confirmation-modal>

    <x-jet-dialog-modal wire:model='itemAdd'>
        <x-slot name="content">
            <form action="" class="my-2">

                <div class="flex flex-col space-y-5 max-w-md bg-white px-4 py-2">
                    <x-jet-validation-errors />
                    <label for="">
                        <p class="font-medium text-slate-700 pb-2">nama</p>
                        <x-jet-input id="nama" wire:model="nama" type="text"
                            class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                            placeholder=".........." />

                    </label>
                    <div class="flex flex-col space-y-5">
                        <label for="email">
                            <p class="font-medium text-slate-700 pb-2">No. Telpon</p>
                            <input id="no_telpon" wire:model="no_telpon" type="number"
                                class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                                placeholder="..........">
                        </label>
                        <label for="email">
                            <p class="font-medium text-slate-700 pb-2">Alamat</p>
                            <textarea id="alamat" wire:model="alamat"
                                class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                                placeholder=".........."></textarea>
                        </label>
                       @if ($itemEdit == false)
                         <button wire:click='create' type="button"
                             class="w-full py-3 font-medium text-white bg-indigo-600 hover:bg-indigo-500 rounded-lg border-indigo-500 hover:shadow inline-flex space-x-2 items-center justify-center">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                 <path stroke-linecap="round" stroke-linejoin="round"
                                     d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                             </svg>
                             <span>Tambah</span>
                         </button>
                       @endif
                       @if ($itemEdit == true)
                         <button wire:click='Edit' type="button"
                             class="w-full py-3 font-medium text-white bg-indigo-600 hover:bg-indigo-500 rounded-lg border-indigo-500 hover:shadow inline-flex space-x-2 items-center justify-center">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                 <path stroke-linecap="round" stroke-linejoin="round"
                                     d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                             </svg>
                             <span>Edit</span>
                         </button>
                       @endif
                    </div>
            </form>
        </x-slot>
    </x-jet-dialog-modal>


  </div>

</div>
