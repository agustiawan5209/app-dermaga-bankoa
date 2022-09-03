<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Destinasi;
use App\Models\Pemberangkatan;
use App\Models\StatusMuatan;
use App\Models\TabelKapal;
use App\Models\Tiket;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class FormPesanTiket extends Component
{
    public $tujuan, $lokasi, $tgl_berangkat, $jumlah;
    public $pemberangkatan;
    public $Cari = false;
    public function mount()
    {
        $this->lokasi = 'Dermaga Bangkoa';
        $this->pemberangkatan = Pemberangkatan::all();
    }
    public function render()
    {
        $destinasi = Destinasi::all();
        $kapal = TabelKapal::all();
        // $this->CariKapal();
        return view('livewire.form-pesan-tiket', [
            'destinasi' => $destinasi,
            'kapal' => $kapal,
        ]);
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
            $berangkat = Pemberangkatan::where('destinasi_id', '=', $this->tujuan)
                ->WhereDate('tgl_berangkat', $this->tgl_berangkat)
                ->Where('status', '=', 'bersandar')
                ->get();

            // dd($berangkat);
            $this->pemberangkatan = $berangkat;
        }
    }
    public $CekoutItem = false;
    public $BayarItem = false;
    public $kode_berangkat, $destinasi_id, $harga, $jam, $hari, $kapal_id, $itemID;
    /**
     * pesanTiket
     *  Fungsi Menampilkan Halamb Cekout
     * @param  mixed $id
     * @param  mixed $jumlah
     * @return void
     */
    public function pesanTiket($id, $jumlah = 0)
    {
        $pesan = Pemberangkatan::find($id);
        $this->itemID = $pesan->id;
        $this->kode_berangkat = $pesan->kode_berangkat;
        $this->tgl_berangkat = $pesan->tgl_berangkat;
        $this->harga = $pesan->harga;
        $this->jam = $pesan->jam;
        $this->destinasi_id = $pesan->destinasi->lokasi;
        $this->kapal_id = $pesan->kapal_id;
        // dd($this->itemBerangkat->id);
        $this->CekoutItem = true;
    }
    /**
     * SendPembayaran
     * Fungsi Mengirim Data Pembayaran
     * @param  mixed $id
     * @return void
     */
    public function SendPembayaran($id)
    {
        $berangkat = Pemberangkatan::find($id);
        // $token = '';
        $codeAlphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $codeAlphabet .= 'abcdefghijklmnopqrstuvwxyz';
        $codeAlphabet .= '0123456789';
        $kode = str_split(str_shuffle($codeAlphabet), 10);
        // Session::put('TiketItem', [
        //     'Item' => $berangkat,
        //     'jumlah' => $this->jumlah,
        // ]);

        $statusMuatan = StatusMuatan::where('kode_berangkat', '=', $berangkat->kode_berangkat)->first();
        if ($statusMuatan->batas_muatan <= $statusMuatan->jumlah_tiket) {
            for ($i = 0; $i < $this->jumlah; $i++) {
                Tiket::create([
                    'kode_berangkat' => $berangkat->kode_berangkat,
                    'kode_tiket' => $kode[$i],
                    'harga' => $berangkat->harga,
                ]);
            }
            $statusMuatan->update([
                'jumlah_tiket' => $this->jumlah + $statusMuatan->jumlah_tiket,
            ]);
        } else {
            Alert::warning('Info', 'Maaf Jumlah Muatan Yang Tersedia Kurang');
        }
        // $this->BayarItem = true;
        $this->clearAll();
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
}
