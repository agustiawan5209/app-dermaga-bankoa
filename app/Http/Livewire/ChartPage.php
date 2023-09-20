<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Tiket;
use Livewire\Component;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class ChartPage extends Component
{
    public function render()
    {
        $bulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $result = [];
        for ($i = 0; $i < count($bulan); $i++) {
            $tiket = Transaksi::whereMonth('created_at', $bulan[$i])->whereHas('pemberangkatan', function ($query) {
                $query->whereHas('kapal', function ($query) {
                    $query->when(Auth::user()->role_id == 2, function ($query) {
                        $query->where('pemilik', Auth::user()->id);
                    });
                });
            })->get();
            $total = [];
            foreach ($tiket as $key => $value) {
                $total[$key] = $value->tiket->sum('harga');
            }
            $result[$i] = array_sum($total);
        }
        return view('livewire.chart-page', [
            'transaksi' => $result,
        ]);
    }
}
