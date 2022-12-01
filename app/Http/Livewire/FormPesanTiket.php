<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Tiket;
use App\Models\Ulasan;
use Livewire\Component;
use App\Models\Destinasi;
use App\Models\Transaksi;
use App\Models\TabelKapal;
use App\Models\StatusMuatan;
use Livewire\WithFileUploads;
use App\Models\Pemberangkatan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class FormPesanTiket extends Component
{
    use WithFileUploads;
    public $tujuan, $lokasi, $status, $jumlah;
    public $pemberangkatan;
    public $Cari = false;
    public $CekoutItem = false;
    public $BayarItem = false;
    public $kode_berangkat, $destinasi_id, $harga, $jam, $hari, $kapal_id, $itemID;
    public function mount()
    {
        $this->lokasi = 'Dermaga Bangkoa';
        $this->pemberangkatan = TabelKapal::all();
    }

    /**
     * CariKapal
     * FUngsi Pencarian Kapal Untuk User
     * @return void
     */
    public function CariKapal()
    {
        $valid = $this->validate([
            'tujuan' => 'required',
            'lokasi' => ['string'],
            'jumlah' => ['numeric'],
        ]);
        if ($this->tujuan != null && $this->status != null || $this->jumlah != null) {
            $this->pemberangkatan = TabelKapal::whereHas('pemberangkatan', function ($query) {
                return $query->where('status', '=', $this->status)
                    ->where('destinasi_id', '=', $this->tujuan);
            })->whereHas('statusMuatan', function($qeury){
                return $qeury->where('jumlah_tiket' , '<', $this->jumlah);
            })->get();
        }
        // dd($this->pemberangkatan);
        $this->Cari = true;
    }

    /**
     * pesanTiket
     *  Fungsi Menampilkan Halamb Cekout
     * @param  mixed $id
     * @param  mixed $jumlah
     * @return void
     */
    public $detailKapalItem = false;
    public $pemilik_kapal, $deskripsi, $batas_muatan, $tiket_tersisa, $gambar;
    public function DetailKapal($id, $jumlah = 0)
    {
        $tabelkapal = TabelKapal::find($id);
        $this->itemID = $tabelkapal->id;
        $this->kode_berangkat = $tabelkapal->pemberangkatan->kode_berangkat;
        $this->status = $tabelkapal->pemberangkatan->status;
        $this->harga = $tabelkapal->pemberangkatan->harga;
        $this->jam = $tabelkapal->pemberangkatan->jam;
        $this->destinasi_id = $tabelkapal->pemberangkatan->destinasi->lokasi;
        $this->kapal_id = $tabelkapal->id;
        $this->pemilik_kapal = $tabelkapal->user->name;
        $this->deskripsi = $tabelkapal->pemberangkatan->deskripsi;
        $this->batas_muatan = $tabelkapal->jumlah_muatan;
        $this->gambar = $tabelkapal->gambar;

        // dd($this->pesan);
        $statusMuatan = StatusMuatan::where('kode_berangkat', '=', $tabelkapal->pemberangkatan->kode_berangkat)->first();
        $this->tiket_tersisa = abs(intval($statusMuatan->jumlah_tiket) - intval($statusMuatan->batas_muatan));
        if ($statusMuatan->batas_muatan <= intval($statusMuatan->jumlah_tiket + $this->jumlah)) {
            Alert::warning('Transaksi Gagal', 'Batas Muatan Tercapai, Transaksi Gagal');
        } else {
            $this->detailKapalItem = true;
        }
    }
    public function cekout()
    {
        $this->BayarItem = true;
    }

    public function clearAll()
    {
        $this->BayarItem = false;
        $this->Cari = false;
        $this->CekoutItem = false;
        $this->BayarItem = false;
        $this->kode_berangkat = '';
        $this->status = '';
        $this->itemID = '';
        $this->harga = '';
        $this->jumlah = '';
        $this->jam = '';
        $this->destinasi_id = '';
    }
    public function KirimPembayaran($id)
    {
        session()->put('itemCek', $id);

        return redirect()->route('Customer.Cekout-Page', ['item' => $id]);
    }
    public $ulasanItem;
    public function showUlasan($id)
    {
        $this->ulasanItem = Ulasan::where('kapal_id', $id)->get();
    }

    public function render()
    {
        $destinasi = Destinasi::all();
        $kapal = TabelKapal::all();
        if ($this->Cari == false) {
            if ($this->tujuan != null && $this->status != null || $this->jumlah != null) {
                $this->pemberangkatan = TabelKapal::whereHas('pemberangkatan', function ($query) {
                    return $query->where('status', '=', $this->status)
                        ->orWhere('destinasi_id', '=', $this->lokasi);
                })->get();
            }
        }
        $this->ulasanItem = Ulasan::all();
        return view('livewire.form-pesan-tiket', [
            'destinasi' => $destinasi,
            'kapal' => $kapal,
        ]);
    }
}
