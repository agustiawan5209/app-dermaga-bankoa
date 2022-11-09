<x-guest-layout>
    <div style="background-image:linear-gradient(#ffffff86, #ffffff85) ,url({{ asset('img/kapal/pans.jpeg') }});background-size:cover; background-position-y:500px;"
        class=" mx-auto mb-24 max-w-screen-xl text-center lg:my-10 flex justify-center items-center   sm:mb-10 h-96">
        <div class="  text-gray-700 p-20">
            <h2
                class="m-0 w-full text-2xl leading-8 text-gray-900 font-bold sm:text-3xl sm:leading-9 md:text-4xl md:leading-10 lg:font-bold lg:text-4xl xl:text-5xl drop-shadow-md shadow-white whitespace-pre-line md:whitespace-nowrap wow fadeIn ">
                DERMAGA KAYU BANGKOA</h2>
        </div>
    </div>
    <div class="container mx-auto w-full flex justify-center py-6 bg-white shadow-black shadow-sm">
        {{-- Pemesanan Tiket --}}
        <div class="w-full h-full bg-white">
            <livewire:form-pesan-tiket>
        </div>
    </div>
    <div class="py-11 bg-white overflow-hidden shadow-md shadow-current">
        <div class="grid grid-cols-2 mt-5 gap-y-5 sm:gap-y-0 lg:mx-auto lg:max-w-4xl">

            <div
                class="col-span-2 px-3 pb-3 order-3 dark:border-slate-700 border-gray-50 sm:col-span-1 sm:flex sm:flex-col sm:justify-center sm:pl-7 sm:order-none sm:border-b lg:border-l wow slideInLeft">
                <h1
                    class="font-semibold text-red-700 tracking-tight text-2xl dark:text-gray-200 dark:divide-undefined sm:mb-2 md:my-1 lg:my-1">
                    Layanan Kapal</h1>
                <p
                    class="text-base font-normal tracking-tight leading-relaxed dark:divide-undefined dark:text-gray-300">
                    Nikmati pengalaman berwisata bahari dengan pantai-pantai dan alam bawah laut paling indah di
                    Indonesia.</p>
            </div>
            <div class="col-span-2 order-2 sm:col-span-1 sm:order-none md:col-span-1 wow slideInRight">
                <img alt="No alt" src="{{ asset('img/kapal/WhatsApp Image 2022-10-09 at 18.56.52.jpeg') }}" class="w-full bg-gray-50 " />
            </div>
        </div>
    </div>
</x-guest-layout>
