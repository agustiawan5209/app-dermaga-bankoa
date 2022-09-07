<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Tiket;
use Livewire\Component;
use App\Models\Destinasi;
use App\Models\Transaksi;
use App\Models\TabelKapal;
use App\Models\StatusMuatan;
use Livewire\WithFileUploads;
use App\Models\Pemberangkatan;
use App\Models\Ulasan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class FormPesanTiket extends Component
{
    use WithFileUploads;
    public $tujuan, $lokasi, $tgl_berangkat, $jumlah;
    public $pemberangkatan;
    public $Cari = false;
    public $CekoutItem = false;
    public $BayarItem = false;
    public $kode_berangkat, $destinasi_id, $harga, $jam, $hari, $kapal_id, $itemID;
    public function mount()
    {
        $this->lokasi = 'Dermaga Bangkoa';
        $this->pemberangkatan = Pemberangkatan::all();
    }


    /**
     * CariKapal
     * FUngsi Pencarian Kapal Untuk User
     * @return void
     */
    public function CariKapal()
    {
        // dd('1');
        $this->Cari = true;
        $this->pemberangkatan = Pemberangkatan::all();
        if ($this->tujuan != null && $this->tgl_berangkat != null && $this->jumlah != null && $this->Cari == true) {
            $valid = $this->validate(
                [
                    'tujuan' => 'required',
                    'lokasi' => 'required',
                    'tgl_berangkat' => 'required',
                    'jumlah' => 'required',
                ],
                [
                    'tujuan.required' => 'border-red-500 shadow',
                    'tgl_berangkat.required' => 'border-red-500 shadow',
                    'jumlah.required' => 'border-red-500 shadow',
                ],
            );
            $this->pemberangkatan = Pemberangkatan::where('destinasi_id', '=', $this->tujuan)
                ->WhereDate('tgl_berangkat', $this->tgl_berangkat)
                ->Where('status', '=', 'bersandar')
                ->get();
        }
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
        $pesan = Pemberangkatan::find($id);
        $this->itemID = $pesan->id;
        $this->kode_berangkat = $pesan->kode_berangkat;
        $this->tgl_berangkat = $pesan->tgl_berangkat;
        $this->harga = $pesan->harga;
        $this->jam = $pesan->jam;
        $this->destinasi_id = $pesan->destinasi->lokasi;
        $this->kapal_id = $pesan->kapal_id;
        $this->pemilik_kapal = $pesan->kapal->user->name;
        $this->deskripsi = $pesan->deskripsi;
        $this->batas_muatan = $pesan->kapal->jumlah_muatan;
        $this->gambar = $pesan->kapal->gambar;

        // dd($this->itemBerangkat->id);
        $statusMuatan = StatusMuatan::where('kode_berangkat', '=', $pesan->kode_berangkat)->first();
        $this->tiket_tersisa = abs($statusMuatan->jumlah_tiket - $statusMuatan->batas_muatan);
        if ($statusMuatan->batas_muatan <= intval($statusMuatan->jumlah_tiket + $this->jumlah)) {
            Alert::warning('Transaksi Gagal', 'Batas Muatan Tercapai, Transaksi Gagal');
        }else{
            $this->detailKapalItem = true;
        }
    }
    public function cekout(){
        $this->BayarItem = true;
    }

    public function clearAll()
    {
        $this->BayarItem = false;
        $this->Cari = false;
        $this->CekoutItem = false;
        $this->BayarItem = false;
        $this->kode_berangkat = '';
        $this->tgl_berangkat = '';
        $this->itemID = '';
        $this->harga = '';
        $this->jumlah = '';
        $this->jam = '';
        $this->destinasi_id = '';
    }
    public function KirimPembayaran($id)
    {
        session()->put('itemCek', $id);

        return redirect()->route('Customer.Cekout-Page', ['item'=> $id]);
    }
    public $ulasanItem;
    public function showUlasan($id){
        $this->ulasanItem = Ulasan::where('kapal_id', $id)->get();
    }

    public function render()
    {
        $destinasi = Destinasi::all();
        $kapal = TabelKapal::all();
        $this->CariKapal();
        $this->ulasanItem = Ulasan::all();
        return view('livewire.form-pesan-tiket', [
            'destinasi' => $destinasi,
            'kapal' => $kapal,
        ]);
    }
}
