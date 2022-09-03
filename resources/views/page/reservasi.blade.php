<x-guest-layout>
    <div class="container mx-auto w-full flex justify-center h-64 py-6 bg-white shadow-black shadow-sm">
        {{-- Pemesanan Tiket --}}
        <div class="w-full-h-full bg-white">
            <livewire:form-pesan-tiket>
        </div>
    </div>
    <div class="px-10 py-4 mx-auto w-full">
        <h3 class="text-2xl font-bold text-center indent-3 ring-indigo-50 text-gray-800 ">Kapal Yang Tersedia</h3>
        <div class="flex flex-wrap  w-full justify-center px-10 mx-auto">
            @for ($i = 0; $i < 5 ; $i++)
            <div class="w-full h-32 bg-red-500 mb-10 grid grid-cols-3 md:grid-cols-9 grid-flow-row">
                <div class="col-span-1 md:col-span-2 bg-blue-500 px-2 text-center">
                    Image
                </div>
                <div class=" col-span-2 md:col-span-7 bg-white relative block px-7 py-3">
                    <h3 class="text-lg">Nama Kapal | <label for="" class="text-base text-gray-500">Jenis Kapal</label> </h3>
                    <h3 class="text-base">Harga Tiket</h3>
                    <h3 class="text-sm text-gray-600">Deskripsi <br> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum laudantium ut optio, praesentium voluptas minus, dolorem sunt dolorum, quod soluta nobis perspiciatis aspernatur aliquid quibusdam fugit! Omnis ipsum vel blanditiis.</h3>
                    <h3 class="">Popularitas</h3>
                </div>

            </div>

            @endfor
        </div>

    </div>
</x-guest-layout>
