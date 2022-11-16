<ul class="mt-3">
    <li
        class="flex w-full justify-between cursor-pointer items-center py-3 pl-4 {{ request()->routeIs('Admin.Dashboard.Pemilik') ? 'bg-white text-gray-700' : 'text-gray-400 hover:text-gray-300' }}">
        <a href="{{ route('Admin.Dashboard.Pemilik') }}"
            class="flex items-center focus:outline-none focus:ring-2 focus:ring-white w-full">
            <i class="fas fa-home fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Home</span>
        </a>
    </li>
    <li
        class="flex w-full justify-between cursor-pointer items-center py-3 pl-4 {{ request()->routeIs('Admin.Data-Pelanggan') ? 'bg-white text-gray-700' : 'text-gray-400 hover:text-gray-300' }}">
        <a href="{{ route('Admin.Data-Pelanggan') }}"
            class="flex items-center focus:outline-none focus:ring-2 focus:ring-white w-full">
            <i class="fas fa-tasks fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Data Pelanggan</span>
        </a>
    </li>
    <li
        class="flex w-full justify-between cursor-pointer items-center py-3 pl-4 {{ request()->routeIs('Admin.Data-Kapal') ? 'bg-white text-gray-700' : 'text-gray-400 hover:text-gray-300' }}">
        <a href="{{ route('Admin.Data-Kapal', ['user_id' => Auth::user()->id]) }}"
            class="blo flex items-center focus:outline-none focus:ring-2 focus:ring-white w-full">
            <i class="fa fa-envelope fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Kapal</span>
        </a>
    </li>
    <li
        class="flex w-full justify-between cursor-pointer items-center py-3 pl-4 {{ request()->routeIs('Admin.Data-Destinasi') ? 'bg-white text-gray-700' : 'text-gray-400 hover:text-gray-300' }}">
        <a href="{{ route('Admin.Data-Destinasi', ['user_id' => Auth::user()->id]) }}"
            class="blo flex items-center focus:outline-none focus:ring-2 focus:ring-white w-full">
            <i class="fa fa-envelope fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Destinasi/Lokasi</span>
        </a>
    </li>
    <li
        class="flex w-full justify-between cursor-pointer items-center py-3 pl-4 {{ request()->routeIs('Admin.Data-Ulasan') ? 'bg-white text-gray-700' : 'text-gray-400 hover:text-gray-300' }}">
        <a href="{{ route('Admin.Data-Ulasan') }}"
            class="bl flex items-center focus:outline-none focus:ring-2 focus:ring-white w-full">
            <i class="fas fa-chart-area fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Ulasan</span>
        </a>
    </li>
    <li
        class="flex w-full justify-between cursor-pointer items-center py-3 pl-4 {{ request()->routeIs('Admin.Metode-Pembayaran') ? 'bg-white text-gray-700' : 'text-gray-400 hover:text-gray-300' }}">
        <a href="{{ route('Admin.Metode-Pembayaran') }}"
            class=" flex items-center focus:outline-none focus:ring-2 focus:ring-white w-full">
            <i class="fa fa-wallet fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Metode Pembayaran</span>
        </a>
    </li>
</ul>
