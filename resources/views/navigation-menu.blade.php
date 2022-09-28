<div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-gray-900 z-20"
    id="nav-content">
    <ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0">
        <li class="mr-6 my-2 md:my-0">
            <a href="{{ route('Admin.Dashboard.Pemilik') }}"
                class="block py-2 pl-1 align-middle text-white no-underline  border-b-2 border-blue-400 hover:border-blue-400 hover:bg-white hover:text-black px-3 font-semibold  rounded-lg">
                <i class="fas fa-home fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Home</span>
            </a>
        </li>
        <li class="mr-6 my-2 md:my-0">
            <a href="{{ route('Admin.Data-Pelanggan') }}"
                class="block py-2 pl-1 align-middle text-white no-underline  border-b-2 border-blue-400 hover:border-blue-400 hover:bg-white hover:text-black px-3 font-semibold  rounded-lg">
                <i class="fas fa-tasks fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Data Pelanggan</span>
            </a>
        </li>
        <li class="mr-6 my-2 md:my-0">
            <a href="{{ route('Admin.Data-Tr-Pemberangkatan') }}"
                class="blo block py-2 pl-1 align-middle text-white no-underline  border-b-2 border-blue-400 hover:border-blue-400 hover:bg-white hover:text-black px-3 font-semibold  rounded-lg">
                <i class="fa fa-envelope fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Transaksi</span>
            </a>
        </li>
        <li class="mr-6 my-2 md:my-0">
            <a href="{{ route('Admin.Data-Ulasan') }}"
                class="bl block py-2 pl-1 align-middle text-white no-underline  border-b-2 border-blue-400 hover:border-blue-400 hover:bg-white hover:text-black px-3 font-semibold  rounded-lg">
                <i class="fas fa-chart-area fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Ulasan</span>
            </a>
        </li>
        <li class="mr-6 my-2 md:my-0">
            <a href="{{ route('Admin.Metode-Pembayaran') }}"
                class=" block py-2 pl-1 align-middle text-white no-underline  border-b-2 border-blue-400 hover:border-blue-400 hover:bg-white hover:text-black px-3 font-semibold  rounded-lg">
                <i class="fa fa-wallet fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Metode Pembayaran</span>
            </a>
        </li>
    </ul>

    <div class="relative pull-right pl-4 pr-4 md:pr-0">
        <input type="search" placeholder="Search"
            class="w-full bg-white text-sm text-gray-400 transition border border-gray-800 focus:outline-none focus:border-gray-600 rounded py-1 px-2 pl-10 appearance-none leading-normal">
        <div class="absolute search-icon" style="top: 0.375rem;left: 1.75rem;">
            <svg class="fill-current pointer-events-none text-gray-800 font-semibold w-4 h-4"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z">
                </path>
            </svg>
        </div>
    </div>

</div>
