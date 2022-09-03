<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Destinasi;
use App\Models\Pemberangkatan;
use App\Models\TabelKapal;
use App\Models\Tiket;
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
    public function pesanTiket($id, $jumlah = 0)
    {
        $berangkat = Pemberangkatan::find($id);
        $token = '';
        $codeAlphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $codeAlphabet .= 'abcdefghijklmnopqrstuvwxyz';
        $codeAlphabet .= '0123456789';
        $kode = str_split(str_shuffle($codeAlphabet), 10);
        //    dd($kode[0]);
        for ($i = 0; $i < $jumlah; $i++) {
            Tiket::create([
                'kode_berangkat' => $berangkat->id,
                'kode_tiket' => $kode[$i],
                'harga'=> $berangkat->harga,
            ]);
        }

    }
}
