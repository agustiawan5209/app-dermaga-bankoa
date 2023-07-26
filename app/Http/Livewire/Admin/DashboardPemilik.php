<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pemberangkatan;
use App\Models\TabelKapal;
use App\Models\Tiket;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardPemilik extends Component
{
    public function render()
    {
        $dataPelanggan = User::where('role_id', '=', '3')->get();
        $tabelk = TabelKapal::all();
        $total_pendapatan = 0;
        foreach ($tabelk as $tabelkapal) {
            $berangkat = Pemberangkatan::where('kapal_id', $tabelkapal->id)->get();
            foreach ($berangkat as $item) {
                $total_pendapatan = Tiket::where('kode_berangkat', '=', $item->kode_berangkat)->count();
            }
        }
        return view('livewire.admin.dashboard-pemilik', [
            'datapelanggan' => $dataPelanggan,
            'total_pendapatan' => $total_pendapatan,
        ]);
    }
}
