<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Destinasi;

class FormPesanTiket extends Component
{
    public $tujuan , $lokasi, $tgl_berangkat, $jumlah;
    public function render()
    {
        $destinasi = Destinasi::all();
        return view('livewire.form-pesan-tiket', [
            'destinasi'=> $destinasi,
        ]);
    }
}
