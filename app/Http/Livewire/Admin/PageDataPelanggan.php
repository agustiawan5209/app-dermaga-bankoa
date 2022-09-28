<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pemberangkatan;
use App\Models\TabelKapal;
use App\Models\Tiket;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class PageDataPelanggan extends Component
{
    public function render()
    {

        $user = User::where('role_id', '=', '3')->get();
        return view('livewire.admin.page-data-pelanggan', [
            'user'=> $user,
            'tiket'=> $this->getdataPelanggan(),
        ]);
    }

    public function getdataPelanggan(){
        $arr = [];
        $tiket = [];
        $tr = [];
        $rb = TabelKapal::where('pemilik',Auth::user()->id)->get();
        // dd($rb);
        // melakukan Pencarian dengan id untuk dapat kode berangkat
        foreach($rb as $tbkapal){
            $pb = Pemberangkatan::where('kapal_id', $tbkapal->id)->get();
            // dd($pb);
            foreach($pb as $item){
                $arr[] = $item->kode_berangkat;
            }
        }
        for ($i=0; $i < count($arr); $i++) {
            $tr[] = Transaksi::where('kode_berangkat', $arr[$i])->get();
        }
        return $tr;

    }
}
