<?php

namespace App\Http\Livewire\Pengantar;

use App\Models\Tiket;
use Livewire\Component;
use App\Models\Pengantar;
use App\Models\TabelKapal;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public function render()
    {
        // Cari Tabel Kapal
        $pengantar = Pengantar::where('user_id', Auth::user()->id)->first();
        $kapal = TabelKapal::where('pemilik', $pengantar->pemilik_id)
            ->first();

        $tiket = Tiket::with(['transaksi', 'berangkat'])
            ->whereHas('transaksi', function ($query) {
                $query->where('status', 'like', '%SUCCESS%');
            })
            ->whereHas('berangkat', function ($query)use($kapal) {
                $query->where('kode_berangkat', 'like', '%'. $kapal->kode_berangkat .'%');
            })
            ->where('status', '=', '0')
            ->get();
        return view('livewire.pengantar.dashboard', [
            'tiket'=> $tiket
        ]);
    }
}
