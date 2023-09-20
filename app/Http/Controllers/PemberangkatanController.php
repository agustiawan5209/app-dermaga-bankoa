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
use Illuminate\Support\Facades\Validator;

class PemberangkatanController extends Controller
{
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

    public function bayar(Request $request)
    {
        $id = $request->itemID;
        $valid = Validator::make($request->all(),[
            'jumlah'=> 'required|numeric',
            'tgl_transaksi'=> 'required|date',
            'jadwal_berangkat'=> 'required|date',
            'jam_berangkat'=> 'required',
            'jadwal_kembali'=> 'required|date',
            'jam_kembali'=> 'required',
        ]);
        $berangkat = Pemberangkatan::find($id);
        $data = [];
        if($valid->fails()){
            $alert = '<ul>';
            foreach ($valid->messages()->all() as $key => $value) {
                $alert .= '<li>'. $value .'</li>';
            }
            $alert .= '</ul>';
            Alert::html($alert,'error');
            return back();
        }else{
            if ($request->jumlah > 0) {
                // $randonBukti = '';
                $kode_transaksi = $this->transaksiKode();
                // Cek Status Dari Muatan Kapal
                $statusMuatan = StatusMuatan::where('kapal_id', '=', $berangkat->kapal_id)->first();
                $data = [
                    'id' => $id,
                    'berangkat' => $berangkat,
                    'kode_berangkat' => $berangkat->kode_berangkat,
                    'user_id' => Auth::user()->id,
                    'ID_transaksi' => $kode_transaksi,
                    'tgl_transaksi' => $request->tgl_transaksi,
                    'jumlah' => $request->jumlah,
                    'nama_bank' => $request->nama_bank,
                ];
                $tiket =  [
                    'kode_berangkat' => $berangkat->kode_berangkat,
                    'harga' => $berangkat->harga,
                    'ID_transaksi' => $kode_transaksi,
                    'jadwal_berangkat' => $request->jadwal_berangkat,
                    'jam_berangkat' => $request->jam_berangkat,
                    'jadwal_kembali' => $request->jadwal_kembali,
                    'jam_kembali' => $request->jam_kembali,
                ];
            }else{
                Alert::error('Maaf', 'Jumlah Harus Di isi');
                return redirect()->back();
            }
            //
            $file = $request->file->getContent();
            $name = $request->file->getClientOriginalName();
            $name_file_image = '1' . $request->file->getClientOriginalName();
            Storage::put('upload/' . $name_file_image, $file);

            if ($request->jumlah > 0) {
                // $token = '';
                $codeAlphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $codeAlphabet .= 'abcdefghijklmnopqrstuvwxyz';
                $codeAlphabet .= '0123456789';
                $kode = str_split(str_shuffle($codeAlphabet), 10);

                // Membuat Transaksi
                $name = $name . '.pdf';
                $transaksi = Transaksi::create([
                    'kode_berangkat' => $data['kode_berangkat'],
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'ID_transaksi' => $data['ID_transaksi'],
                    'bukti' => $name,
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
                        'jadwal_berangkat' => $request->jadwal_berangkat,
                        'jam_berangkat' => $request->jam_berangkat,
                        'jadwal_kembali' => $request->jadwal_kembali,
                        'jam_kembali' => $request->jam_kembali,
                    ]);
                }
                // Mengupdate Jumlah Tiket Pada Tabel Status Muatan
                $statusMuatan->update([
                    'jumlah_tiket' => intval($data['jumlah']) + $statusMuatan->jumlah_tiket,
                ]);
                $pdf = Pdf::loadView('pdf.invoice2', ['transaksi' => $data, 'tiket'=> $tiket, 'file' => $name_file_image, 'user' => Auth::user(), 'bukti' => $data['nama_bank'], 'bank' => $data['nama_bank']]);
                // Storage::disk('bukti')->put($nama_file, );
                Storage::put('bukti/' . $name, $pdf->download()->getOriginalContent());
                Alert::success('Info', 'Pemesanan Berhasil');
                // session()->forget('itemCek');
                return redirect()->route('Customer.Customer');
            } else {
                Alert::error('Maaf', 'Jumlah Harus Di isi');
                return redirect()->back();
            }
        }
    }
    public function dataPembayaran($request, $nama_file, $bukti)
    {
    }
}
