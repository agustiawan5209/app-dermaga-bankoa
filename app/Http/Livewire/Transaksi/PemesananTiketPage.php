<?php

namespace App\Http\Livewire\Transaksi;

// use Alert;

use App\Models\Destinasi;
use Livewire\Component;
// use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Pemberangkatan;
use App\Models\TabelKapal;
use Illuminate\Support\Facades\Auth;
Use Alert;

class PemesananTiketPage extends Component
{
    public $pemberangkatan, $kode_berangkat, $destinasi_id, $harga, $tgl_berangkat, $jam, $hari, $kapal_id;
    public function render()
    {
        $berangkat = Pemberangkatan::all();
        $destinasi = Destinasi::all();
        $kapal = TabelKapal::where('pemilik', Auth::user()->id)->get();
        return view('livewire.transaksi.pemesanan-tiket-page', compact('berangkat', 'destinasi', 'kapal'));
    }
    public $itemTambahBerangkat = false;
    public $itemHapusBerangkat = false;
    public function buatKeberankatan()
    {
        // dd('i');
        Alert::alert('Title', 'Message', 'Type');
        alert()->success('berhasil', 'yes');
        $this->itemTambahBerangkat = true;
    }
    public function editKeberankatan($id)
    {
        $berangkat = Pemberangkatan::find($id);
        $this->kode_berangkat = $berangkat->kode_berangkat;
        $this->destinasi_id = $berangkat->destinasi_id;
        $this->harga = $berangkat->harga;
        $this->tgl_berangkat = $berangkat->tgl_berangkat;
        $this->jam = $berangkat->jam;
        $this->kapal_id = $berangkat->kapal_id;
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
        $berangkat->save();
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
