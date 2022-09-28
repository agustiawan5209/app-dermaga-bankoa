<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\Transaksi;
use App\Models\StatusMuatan;
use App\Models\Pemberangkatan;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StorePemberangkatanRequest;
use App\Http\Requests\UpdatePemberangkatanRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PemberangkatanController extends Controller
{
    public function bayar(Request $request)
    {
        $transaksi = Transaksi::find(1);
        $file = $request->file->getContent();
        $name = $request->file->getClientOriginalName();
        $name_file = explode('.', $name);
        $name = $name_file[0];
        Storage::put('upload/' . $name, $file);
        $pdf = Pdf::loadView('pdf.invoice2', ['transaksi' => $transaksi, 'file' => $name]);
        // Storage::disk('bukti')->put($name, );
        Storage::put('bukti/' . $name . '.pdf', $pdf->download()->getOriginalContent());
        $this->dataPembayaran($request, $name);
        Alert::success('Info', 'Pembayaran berhasil');
        return redirect()->route('home')->with('info', 'berhasil');
    }
    public function dataPembayaran($request, $nama_file)
    {
        $data = session('data');
        $tiket = session('tiket');
        // dd($data);
        $berangkat = Pemberangkatan::find($data['id']);
        // $token = '';
        $codeAlphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $codeAlphabet .= 'abcdefghijklmnopqrstuvwxyz';
        $codeAlphabet .= '0123456789';
        $kode = str_split(str_shuffle($codeAlphabet), 10);

        // Membuat Transaksi
        $transaksi = Transaksi::create([
            'kode_berangkat' => $data['kode_berangkat'],
            'user_id' => Auth::user()->id,
            'ID_transaksi' => $data['ID_transaksi'],
            'bukti' => $nama_file,
            'tgl_transaksi' => $data['tgl_transaksi'],
        ]);
        // Cek Status Dari Muatan Kapal
        $statusMuatan = StatusMuatan::where('kode_berangkat', '=', $data['kode_berangkat'])->first();
        // Melakukan Perulangan Untuk Tiket
        for ($i = 0; $i < intval($data['jumlah']); $i++) {
            $codeAlphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $codeAlphabet .= 'abcdefghijklmnopqrstuvwxyz';
            $codeAlphabet .= '0123456789';
            $kode = str_split(str_shuffle($codeAlphabet), 7);
            // dd($kode);
            Tiket::create([
                'kode_berangkat' => $tiket['kode_berangkat'],
                'kode_tiket' => $kode[0],
                'harga' => $tiket['harga'],
                'ID_transaksi' => $tiket['ID_transaksi'],
            ]);
        }
        // Mengupdate Jumlah Tiket Pada Tabel Status Muatan
        $statusMuatan->update([
            'jumlah_tiket' => intval($data['jumlah']) + $statusMuatan->jumlah_tiket,
        ]);
        Alert::success('Info', 'Pemesanan Berhasil');
        session()->forget('itemCek');
        return redirect()->route('home');
    }
}
