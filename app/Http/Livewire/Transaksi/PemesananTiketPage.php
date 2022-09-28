<?php

namespace App\Http\Livewire\Transaksi;

// use Alert;

use App\Models\Destinasi;
use Livewire\Component;
// use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Pemberangkatan;
use App\Models\StatusMuatan;
use App\Models\TabelKapal;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Builder;

class PemesananTiketPage extends Component
{
    public $pemberangkatan, $kode_berangkat, $destinasi_id, $harga, $tgl_berangkat, $jam, $hari, $kapal_id, $batas_muatan, $deskripsi;
    public $itemID;
    public function render()
    {
        $berangkat = Pemberangkatan::whereHas('kapal', function(Builder $query){
            return $query->where('pemilik', Auth::user()->id);
        })->get();
        $destinasi = Destinasi::all();
        $kapal = TabelKapal::where('pemilik', Auth::user()->id)->get();
        return view('livewire.transaksi.pemesanan-tiket-page', compact('berangkat', 'destinasi', 'kapal'));
    }
    public $itemTambahBerangkat = false;
    public $itemHapusBerangkat = false;
    public function buatKeberankatan()
    {
        // dd('i');
        $this->itemTambahBerangkat == true ? $this->itemTambahBerangkat = false : $this->itemTambahBerangkat = true;
    }
    public function editKeberankatan($id)
    {
        $berangkat = Pemberangkatan::find($id);
        $this->itemID = $berangkat->id;
        $this->kode_berangkat = $berangkat->kode_berangkat;
        $this->destinasi_id = $berangkat->destinasi_id;
        $this->harga = $berangkat->harga;
        $this->tgl_berangkat = $berangkat->tgl_berangkat;
        $this->jam = $berangkat->jam;
        $this->kapal_id = $berangkat->kapal_id;
        $this->deskripsi = $berangkat->deskripsi;
        $this->itemTambahBerangkat = true;
    }
    public function deleteKapal()
    {
        $this->itemHapusBerangkat = true;
    }
    public function createBerangkat()
    {
        $berangkat = new Pemberangkatan();
        $berangkat->kode_berangkat = $this->kode_berangkat;
        $berangkat->destinasi_id = $this->destinasi_id;
        $berangkat->harga = $this->harga;
        $berangkat->tgl_berangkat = $this->tgl_berangkat;
        $berangkat->jam = $this->jam;
        $berangkat->kapal_id = $this->kapal_id;
        $berangkat->deskripsi = $this->deskripsi;
        $berangkat->save();
        $kapal = TabelKapal::find($this->kapal_id);
        $statusMuatan = StatusMuatan::create([
            'kapal_id'=> $this->kapal_id,
            'batas_muatan'=> $kapal->jumlah_muatan,
            'jumlah_tiket'=> '0',
            'kode_berangkat'=> $this->kode_berangkat,
        ]);
        $this->itemTambahBerangkat = false;
        Alert::success('Info', 'Berhasil');
    }
    public function editBerangkat($id)
    {
        $berangkat = new Pemberangkatan(['id', $id]);
        $berangkat->kode_berangkat = $this->kode_berangkat;
        $berangkat->destinasi_id = $this->destinasi_id;
        $berangkat->harga = $this->harga;
        $berangkat->tgl_berangkat = $this->tgl_berangkat;
        $berangkat->jam = $this->jam;
        $berangkat->kapal_id = $this->kapal_id;
        $berangkat->deskripsi = $this->deskripsi;
        $berangkat->update();
        $this->itemTambahBerangkat = false;
        Alert::success('Info', 'Berhasil');
    }
    public function deleteBerangkat($id)
    {
        Pemberangkatan::find($id)->delete();
        $this->itemHapusBerangkat = false;
        Alert::success('Info', 'Berhasil');
    }

    /**
     * toPageKapal
     *  fungsi Redirect Ke Halaman Kapal
     * @return void
     */
    public function toPageKapal()
    {
        return redirect()->route('Admin.Data-Kapal', ['user_id' => Auth::user()->id]);
    }
}
