<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tiket;
use App\Models\Transaksi;
use Livewire\Component;

class PageTransaksiPesanan extends Component
{
    public $Kode;
    public function mount($Kode)
    {
        $this->Kode = $Kode;
    }
    public function render()
    {
        $tr = [];
       $tr = Transaksi::where('kode_berangkat', '=', $this->Kode)->get();
        return view('livewire.admin.page-transaksi-pesanan', compact('tr'));
    }
}
