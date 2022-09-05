<?php

namespace App\Http\Livewire\Customer;

use App\Models\Tiket;
use Livewire\Component;
use App\Models\Transaksi;
use App\Models\StatusMuatan;
use App\Models\Pemberangkatan;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;

class Cekout extends Component
{
    use WithFileUploads;
    public $tujuan,
        $lokasi,
        $tgl_berangkat,
        $jumlah = 0,
        $sub_total;
    // item Bank Kartu
    public $nama_kartu, $no_kartu, $bank_kartu;
    // Item Pemberangkata
    public $kode_berangkat, $destinasi_id, $harga, $jam, $hari, $kapal_id, $itemID;
    // Item Cek Status Kapal
    public $detailKapalItem = false;
    // Item Kapal
    public $pemilik_kapal, $deskripsi, $batas_muatan, $tiket_tersisa, $gambar;
    // Item Hitung
    public $count = 0;
    public function mount($item)
    {
        $this->itemID = $item;
        if(session()->has('itemCek')){
            $this->itemID = $item;
        }else{
            abort(401);
        }
    }
    public function kartu(){
        $pesan = Pemberangkatan::find($this->itemID);
        $pemilik = $pesan->kapal->user->bank;
        return $pemilik;
    }
    /**
     * cekStatus
     * Cek status Muatan Kapal
     * @return void
     */
    public function cekStatus()
    {
        $pesan = Pemberangkatan::find($this->itemID);
        $this->itemID = $pesan->id;
        $this->kode_berangkat = $pesan->kode_berangkat;
        $statusMuatan = StatusMuatan::where('kode_berangkat', '=', $pesan->kode_berangkat)->first();
        // dd(intval($statusMuatan->jumlah_tiket + $this->jumlah));
        if ($statusMuatan->batas_muatan <= intval($statusMuatan->jumlah_tiket + $this->jumlah)) {
            Alert::warning('Transaksi Gagal', 'Batas Muatan Tercapai, Transaksi Gagal');
            $this->detailKapalItem = false;
            $this->count = 0;
        } else {
            // Alert::warning('Transaksi Berhasil', 'Lanjutkan');
            $this->detailKapalItem = true;
        }
    }
    public function plus()
    {
        $this->cekStatus();
        if ($this->detailKapalItem = true) {
            $this->count++;
        }
    }
    public function minus()
    {
        $this->cekStatus();
        if ($this->detailKapalItem = true) {
            $this->count--;
        }
    }

    /**
     * DetailKapal
     *
     * @param  mixed $id
     * @param  mixed $jumlah
     * @return void
     */
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
        } else {
            $this->detailKapalItem = true;
        }
    }
    /**
     * transaksiKode
     *
     * @return void
     */
    public function transaksiKode()
    {
        $transaksi = Transaksi::select('ID_transaksi')->get();
        $codeAlphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $codeAlphabet .= 'abcdefghijklmnopqrstuvwxyz';
        $codeAlphabet .= '0123456789';
        $kode = substr(str_shuffle($codeAlphabet), 0, 10);
        foreach ($transaksi as $key => $value) {
            if ($kode == $value->ID_transaksi) {
                $kode = substr(str_shuffle($codeAlphabet), 0, 10);
            }
        }
        return $kode;
    }
    /**
     * SendPembayaran
     * Fungsi Mengirim Data Pembayaran
     * @param  mixed $id
     * @return void
     */
    public $bukti_transaksi, $tgl_transaksi, $id_transaksi;
    public function SendPembayaran($id)
    {
        $this->validate([
            'bukti_transaksi' => 'required',
            'tgl_transaksi' => 'required',
        ]);
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
      if($this->jumlah > 0){
        $randonBukti = '';
        $namaFile = $this->bukti_transaksi->getClientOriginalName();
        $extFile = $this->bukti_transaksi->getClientOriginalExtension();
        $randonBukti = md5($namaFile) . '.' . $extFile;


        // Membuat Transaksi
        $transaksi = Transaksi::create([
            'user_id' => Auth::user()->id,
            'ID_transaksi' => $this->transaksiKode(),
            'bukti' => $randonBukti,
            'tgl_transaksi' => $this->tgl_transaksi,
        ]);
        $this->bukti_transaksi->storeAs('upload', $randonBukti);
        // Cek Status Dari Muatan Kapal
        $statusMuatan = StatusMuatan::where('kode_berangkat', '=', $berangkat->kode_berangkat)->first();
        if ($statusMuatan->batas_muatan >= $statusMuatan->jumlah_tiket) {
            // Melakukan Perulangan Untuk Tiket
            for ($i = 0; $i < $this->jumlah; $i++) {
                Tiket::create([
                    'kode_berangkat' => $berangkat->kode_berangkat,
                    'kode_tiket' => $kode[$i],
                    'harga' => $berangkat->harga,
                ]);
            }
            // Mengupdate Jumlah Tiket Pada Tabel Status Muatan
            $statusMuatan->update([
                'jumlah_tiket' => $this->jumlah + $statusMuatan->jumlah_tiket,
            ]);
            Alert::success('Info', 'Pemesanan Berhasil');
            session()->forget('itemCek');
            return redirect()->route('home');
        } else {
            Alert::warning('Info', 'Maaf Jumlah Muatan Yang Tersedia Kurang');
        }
      }else{
        Alert::warning('info', 'Jumlah Tiket Kosong');
      }
    }
    public function render()
    {
        $this->jumlah = $this->count;
        $this->sub_total = $this->jumlah * $this->harga;
        $this->DetailKapal($this->itemID, 0);
        return view('livewire.customer.cekout',[
            'bank'=> $this->kartu(),
        ])->layout('layouts.guest');
    }
}
