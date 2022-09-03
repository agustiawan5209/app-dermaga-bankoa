<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Destinasi;
use RealRashid\SweetAlert\Facades\Alert;

class FormPesanTiket extends Component
{
    public $tujuan, $lokasi, $tgl_berangkat, $jumlah;
    public function mount()
    {
        $this->lokasi = 'Dermaga Bangkoa';
    }
    public function render()
    {
        $destinasi = Destinasi::all();
        return view('livewire.form-pesan-tiket', [
            'destinasi' => $destinasi,
        ]);
    }
    public function CariKapal()
    {
        // dd('1');
        Alert::info('Hai', "User");
    }
}
