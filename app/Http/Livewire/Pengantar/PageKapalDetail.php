<?php

namespace App\Http\Livewire\Pengantar;

use App\Models\Pemberangkatan;
use App\Models\StatusMuatan;
use App\Models\Tiket;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class PageKapalDetail extends Component
{

    public $kode_berangkat, $status, $itemID;

    public $itemStatus = false;
    public function mount($kode_berangkat)
    {
        $this->kode_berangkat = $kode_berangkat;
    }
    public function render()
    {
        $transaksi = Tiket::where('kode_berangkat', '=', $this->kode_berangkat)->with(['transaksi', 'berangkat'])
            ->whereHas('transaksi', function ($query) {
                $query->where('status', 'like', '%SUCCESS%');
            })->get();

        return view('livewire.pengantar.page-kapal-detail', [
            'transaksi' => $transaksi,
        ]);
    }

    public function closeModal()
    {

        Alert::info('Info', 'Berhasil Di Update');
        return redirect()->route('Pemilik.Detail-Data-Kapal', ['kode_berangkat' => $this->kode_berangkat]);
    }

    public function updateModal($id)
    {
        $this->itemStatus = true;
        $this->itemID = $id;
    }
    public function update()
    {

        $this->validate([
            'status' => 'required',
        ]);

        $tiket = Tiket::find($this->itemID)->update(['status' => $this->status]);
        if ($this->status === '2') {
            StatusMuatan::where('kode_berangkat', '=', $this->kode_berangkat)->decrement('jumlah_tiket', 1);
        }
        Alert::info('Info', 'Berhasil Di Update');
        return redirect()->route('Pemilik.Detail-Data-Kapal', ['kode_berangkat' => $this->kode_berangkat]);
    }
}
