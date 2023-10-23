<?php

namespace App\Http\Livewire\Pemilik;

use App\Models\Pemberangkatan;
use App\Models\TabelKapal;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;


class PageTransaksi extends Component
{
    public function render()
    {
        $transaksi = [];
        $tabelKapal = TabelKapal::where('pemilik', Auth::user()->id)->get();
        foreach ($tabelKapal as $key => $value) {
            $kapal = Pemberangkatan::where('kapal_id', $value->id)->first();
            $tr = Transaksi::with(['user','tiket'])->where('kode_berangkat', $kapal->kode_berangkat)->get();
            if($tr->count() > 0){
                foreach ($tr as $k => $item) {
                    $transaksi[] = $item;
                }
            }
        }
        // dd($transaksi);
        return view('livewire.pemilik.page-transaksi',[
            'transaksi'=> $transaksi,
        ]);
    }

    public $statusItem = false, $itemData = null, $itemID = null, $status = null;
    public function statusModal($item){
       $tr =  Transaksi::find($item);
        $this->itemData = $item;
        $this->itemID = $tr->id;
        $this->status = $tr->status;
        $this->statusItem = true;
    }

    public function closeModal(){
        $this->itemData = null;
        $this->itemID = null;
        $this->status = null;
        $this->statusItem = false;
    }

    public function updateStatus(){
       $tr =  Transaksi::find($this->itemID);
       $tr->update(['status'=> $this->status]);
       Alert::success('info', 'Update Pemesanan Berhasil');
        $this->statusItem = false;
    }
}
