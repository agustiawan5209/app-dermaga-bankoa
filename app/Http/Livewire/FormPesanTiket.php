<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\User;
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
    public $user_kapal;
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
        ]);
        if ($this->tujuan != null ) {
            $this->pemberangkatan = TabelKapal::whereHas('pemberangkatan', function ($query) {
                return $query->where('destinasi_id', '=', $this->tujuan);
            })->orWhere('pemilik', $this->user_kapal)->get();
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
    public $pemilik_kapal, $deskripsi, $batas_muatan, $tiket_tersisa, $jumlah_tiket, $gambar;
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
        $this->jumlah_tiket = abs(intval($statusMuatan->jumlah_tiket));

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
        $this->bayar();
        return redirect()->route('Customer.Cekout-Page', ['item' => $id]);
    }
    public function bayar()
    {
            $carbon_n = Carbon::now()
                ->add('10', 'minutes')
                ->toTimeString();
            session()->put('estimasi', $carbon_n);
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
                    return $query->where('destinasi_id', '=', $this->lokasi);
                })->orWhere('pemilik', $this->user_kapal)->get();
            }
        }
        $this->ulasanItem = Ulasan::all();
        return view('livewire.form-pesan-tiket', [
            'destinasi' => $destinasi,
            'kapal' => $kapal,
            'datapemilikapal'=> User::where('role_id', '1')->get(),
        ]);
    }
}
