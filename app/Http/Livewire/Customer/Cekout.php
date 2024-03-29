<?php

namespace App\Http\Livewire\Customer;

use Carbon\Carbon;
use App\Models\Tiket;
use Livewire\Component;
use App\Models\Transaksi;
use App\Models\StatusMuatan;
use Livewire\WithFileUploads;
use App\Models\Pemberangkatan;
use Illuminate\Support\Facades\Auth;
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

    // Jadwal Tiket
    public $jadwal_kembali, $jam_kembali, $jadwal_berangkat, $jam_berangkat;
    // Item Hitung
    public $count = 0;
    public function mount($item)
    {
        $this->itemID = $item;
        if (session()->has('itemCek')) {
            $this->itemID = $item;
        } else {
            abort(401);
        }
    }
    /**
     * kartu
     *  Tampilkan Pemilik Dari Kapal
     *  View Metode Pembayaran
     * @return void
     */
    public function kartu()
    {
        $pesan = Pemberangkatan::find($this->itemID);
        $pemilik = $pesan->kapal->user->bank;
        return $pemilik;
    }

    public function cekTanggal()
    {
        $carbon = Carbon::now();

        // Membuat objek Carbon dari tanggal input
        $inputDateObj = Carbon::parse($this->jadwal_berangkat);
        $inputDateObj2 = Carbon::parse($this->jadwal_kembali);

        // Memeriksa apakah tanggal saat ini lebih besar daripada tanggal input
        if ($carbon->gt($inputDateObj) || $carbon->gt($inputDateObj2)) {
            // Tanggal saat ini lebih besar daripada tanggal input
            Alert::error('Gagal', 'Tanggal Salah Input');
            return false;
        } else {
            // Tanggal saat ini tidak lebih besar daripada tanggal input
            return true;
        }
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
            // $this->detailKapalItem = false;
            $this->count = 0;
        } else {
            // Alert::warning('Transaksi Berhasil', 'Lanjutkan');
            // $this->detailKapalItem = true;
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
    public $bukti_transaksi, $tgl_transaksi, $id_transaksi, $nama_bank;
    public function SendPembayaran($id)
    {
        $this->validate([
            'bukti_transaksi' => ['required', 'image'],
            'tgl_transaksi' => ['required', 'date'],
            'nama_bank' => ['required', 'string'],
        ]);
        $berangkat = Pemberangkatan::find($this->itemID);
        // dd($berangkat);
        if ($this->jumlah > 0) {
            // $randonBukti = '';

            $kode_transaksi = $this->transaksiKode();
            // Cek Status Dari Muatan Kapal
            $statusMuatan = StatusMuatan::where('kapal_id', '=', $berangkat->kapal_id)->first();
            if ($statusMuatan->batas_muatan >= $statusMuatan->jumlah_tiket) {
                session()->put('data', [
                    'id' => $id,
                    'berangkat' => $berangkat,
                    'kode_berangkat' => $berangkat->kode_berangkat,
                    'user_id' => Auth::user()->id,
                    'ID_transaksi' => $kode_transaksi,
                    'tgl_transaksi' => $this->tgl_transaksi,
                    'jumlah' => $this->jumlah,
                    'bank' => $this->nama_bank,
                    'gambar' => $this->bukti_transaksi,
                    'nama_bank' => $this->nama_bank,
                ]);
                session()->put('tiket', [
                    'kode_berangkat' => $berangkat->kode_berangkat,
                    'harga' => $berangkat->harga,
                    'ID_transaksi' => $kode_transaksi,
                    'jadwal_berangkat' => $this->jadwal_berangkat,
                    'jam_berangkat' => $this->jam_berangkat,
                    'jadwal_kembali' => $this->jadwal_kembali,
                    'jam_kembali' => $this->jam_kembali,
                ]);
            } else {
                Alert::warning('info', 'Sisa Tiket Kosong');
            }
        } else {
            Alert::warning('info', 'Sisa Tiket Kosong');
        }
        return redirect()->route('Kirim-Bayar');
    }
    public $bayar = false;
    public function bayar()
    {
        if ($this->jumlah == 0) {
            Alert::warning('maaf', 'Jumlah Kosong');
        } else {
            $this->bayar = true;
            $carbon_n = Carbon::now()
                ->add('10', 'minutes')
                ->toTimeString();
            session()->put('estimasi', $carbon_n);
        }
    }
    public $utctime;
    public function render()
    {
        $this->cekwaktu();
        $this->jumlah = $this->count;
        $this->sub_total = intval($this->jumlah * $this->harga);
        $this->DetailKapal($this->itemID, 0);
        $bank = $this->kartu();
        // dd($bank);
        $this->utctime = session('estimasi');
        return view('livewire.customer.cekout', [
            'bank' => $bank,
        ])->layout('layouts.guest');
    }
    public function cekwaktu()
    {
        $carbon_now = Carbon::now()->toTimeString();
        if ((string) $carbon_now == (string) session('estimasi')) {
            session()->forget('itemCek');
            session()->forget('estimasi');
        }
    }
    public function batalkan()
    {
        session()->forget('itemCek');
        session()->forget('estimasi');
        return redirect()->route('home');
    }
}
