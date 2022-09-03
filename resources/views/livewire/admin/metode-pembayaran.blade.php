<div>
    <x-jet-button type='button' wire:click='addModal'>Tambah</x-jet-button>
    <x-table.table>
        <x-slot name="th">
            <tr>
                <th>NO</th>
                <th>Bank</th>
                <th>NO. REK</th>
                <th>Aksi</th>
            </tr>
        </x-slot>

        <x-slot name="td">
            @foreach ($metode as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->bank }}</td>
                    <td>{{ $item->no_rek }}</td>
                    <td class="flex justify-center items-center gap-2">
                        <x-jet-button type='button' wire:click='editModal({{ $item->id }})'>
                            <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                        </x-jet-button>
                        <x-jet-button type='button' wire:click='deleteModal({{ $item->id }})'>
                            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                        </x-jet-button>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-table.table>
    <x-jet-dialog-modal wire:model='itemAdd' maxWidth='sm'>
        <x-slot name="title">
            Tambah Metode Pembayaran
        </x-slot>
        <x-slot name="content">
          <form action="#" wire:submit.prevent='create'>
            @csrf
            <input type="hidden" wire:model="user_id">
                <div class="mb-2  w-full">
                    <x-jet-label for='Bank'>Nama Pemilik</x-jet-label>
                    <x-jet-input class="w-full" type='text' wire:model='nama' placeholder='Dayanti'/>
                </div>
                <div class="mb-2  w-full">
                    <x-jet-label for='Bank'>Nama Bank</x-jet-label>
                    <x-jet-input class="w-full" type='text' wire:model='bank' placeholder='BRI/BNI/BCA/.......' />
                </div>
                <div class="mb-2">
                    <x-jet-label for='Bank'>No. REK</x-jet-label>
                    <x-jet-input class="w-full" type='text' wire:model='no_rek' placeholder='95648156241788564'/>
                </div>
                <x-jet-button>Tambah</x-jet-button>
          </form>
        </x-slot>
        <x-slot name="footer">
            <x-jet-danger-button wire:click="$toggle('itemAdd')" wire:loading.attr='disabled'>Batalkan</x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>
    <x-jet-dialog-modal wire:model='itemEdit'>
        <x-slot name="title">
            Tambah Metode Pembayaran
        </x-slot>
        <x-slot name="content">
          <form action="#" wire:submit.prevent='edit({{$itemID}})'>
            @csrf
            <div class="mb-2  w-full">
                <x-jet-label for='Bank'>Nama Pemilik</x-jet-label>
                <x-jet-input class="w-full" type='text' wire:model='nama' placeholder='Dayanti'/>
            </div>
            <div class="mb-2  w-full">
                <x-jet-label for='Bank'>Nama Bank</x-jet-label>
                <x-jet-input class="w-full" type='text' wire:model='bank' placeholder='BRI/BNI/BCA/.......' />
            </div>
            <div class="mb-2">
                <x-jet-label for='Bank'>No. REK</x-jet-label>
                <x-jet-input class="w-full" type='text' wire:model='no_rek' placeholder='95648156241788564'/>
            </div>
                <x-jet-button>Edit</x-jet-button>
          </form>
        </x-slot>
        <x-slot name="footer">
            <x-jet-danger-button wire:click="$toggle('itemEdit')" wire:loading.attr='disabled'>Batalkan</x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
    <x-jet-confirmation-modal wire:model='itemDelete'>
        <x-slot name='title'>
            Hapus
        </x-slot>
        <x-slot name='content'>
            Apakah Anda Yakin?
        </x-slot>
        <x-slot name='footer'>
            <x-jet-danger-button wire:click="delete({{$itemID}})" >Batalkan</x-jet-danger-button>
            <x-jet-danger-button wire:click="$toggle('itemDelete')" wire:loading.attr='disabled'>Batalkan</x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
