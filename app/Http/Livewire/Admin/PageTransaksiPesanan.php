<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tiket;
use Livewire\Component;

class PageTransaksiPesanan extends Component
{
    public $Kode;
    public function mount($Kode){
        $this->Kode = $Kode;
    }
    public function render()
    {
        $tiket = Tiket::where('kode_berangkat','=', $this->Kode)->get();
        // dd($tiket);
        return view('livewire.admin.page-transaksi-pesanan', compact('tiket'));
    }
}
