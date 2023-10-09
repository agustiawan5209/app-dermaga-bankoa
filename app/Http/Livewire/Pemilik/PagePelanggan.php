<?php

namespace App\Http\Livewire\Pemilik;

use App\Models\Tiket;
use Livewire\Component;
use App\Models\Transaksi;
use App\Models\TabelKapal;
use App\Models\Pemberangkatan;
use Illuminate\Support\Facades\Auth;

class PagePelanggan extends Component
{
    public function render()
    {
        $transaksi = [];
        $tabelKapal = TabelKapal::where('pemilik', Auth::user()->id)->get();
        foreach ($tabelKapal as $key => $value) {
            $kapal = Pemberangkatan::where('kapal_id', $value->id)->first();
            $tr = Transaksi::with(['user'])->where('kode_berangkat', $kapal->kode_berangkat)->orderBy('id','desc')->get();
            if($tr->count() > 0){
                foreach ($tr as $k => $item) {
                    $transaksi[] = $item;
                }
            }
        }
        // dd($transaksi);
        return view('livewire.pemilik.page-pelanggan',[
            'transaksi'=> $transaksi,
        ]);
    }
}
