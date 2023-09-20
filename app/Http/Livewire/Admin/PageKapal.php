<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Destinasi;
use App\Models\TabelKapal;
use App\Models\StatusMuatan;
use Livewire\WithFileUploads;
use App\Models\Pemberangkatan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\Random;
use RealRashid\SweetAlert\Facades\Alert;

class PageKapal extends Component
{
    use WithFileUploads;
    // Item Modal
    public $itemAdd = false,
        $itemDelete = false, $itemEdit = false,$itemShow = false;
    public $user_id;
    // item Field Table Kapal
    public $nama_kapal, $jenis_kapal, $pemilik, $jumlah_muatan, $itemID, $gambar;
    public $pemberangkatan, $kode_berangkat, $destinasi_id, $harga, $tgl_berangkat, $jam, $hari, $kapal_id, $batas_muatan, $deskripsi, $jadwal_kembali,$jadwal_berangkat;
    public function mount($user_id)
    {
        $this->user_id = $user_id;
        $this->pemilik = $user_id;
        $this->kode_berangkat = Random::generate(10,'A-Z0-9'). '-'. Auth::user()->id;
    }
    public function closeModal()
    {
        $this->nama_kapal = null;
        $this->jenis_kapal = null;
        $this->pemilik = null;
        $this->jumlah_muatan = null;
        $this->itemID = null;
        $this->gambar = null;
        $this->itemAdd = false;
        $this->itemDelete = false;
        $this->itemEdit = false;
        $this->itemShow = false;
    }
    public function render()
    {
        $destinasi = Destinasi::all();
        $kapal = TabelKapal::orderBy('id','desc')->when(Auth::user()->role_id == 2, function($query){
            $query->where('pemilik', Auth::user()->id);
        })->get();
        return view('livewire.admin.page-kapal', [
            'kapal' => $kapal,
            'destinasi' => $destinasi
        ]);
    }

    public function addModal()
    {

        $this->itemAdd = true;
    }
    public function editModal($id)
    {
        $kapal = TabelKapal::find($id);
        $this->itemID = $kapal->id;
        $this->nama_kapal = $kapal->nama_kapal;
        $this->jenis_kapal = $kapal->jenis_kapal;
        $this->jumlah_muatan = $kapal->jumlah_muatan;
        $this->gambar = $kapal->gambar;
        $berangkat = Pemberangkatan::where('kapal_id', $id)->first();
        $this->destinasi_id = $berangkat->destinasi_id;
        $this->harga = $berangkat->harga;
        $this->deskripsi = $berangkat->deskripsi;
        $this->jadwal_berangkat = $berangkat->jadwal_berangkat;
        $this->jadwal_kembali = $berangkat->jadwal_kembali;
        $this->itemAdd = true;
        $this->itemEdit = true;
    }
    public function deleteModal($id)
    {
        $kapal = TabelKapal::find($id);
        $this->itemID = $kapal->id;
        $this->nama_kapal = $kapal->nama_kapal;
        $this->jenis_kapal = $kapal->jenis_kapal;
        $this->jumlah_muatan = $kapal->jumlah_muatan;
        $this->gambar = $kapal->gambar;
        $this->itemDelete = true;
    }
    // CRUD
    public function create()
    {
        $valid = $this->validate([
            'nama_kapal' => 'required',
            'kode_berangkat' => 'required|unique:pemberangkatans,kode_berangkat',
            'jenis_kapal' => 'required',
            'jadwal_kembali' => 'required',
            'jadwal_berangkat' => 'required',
            'pemilik' => 'required',
            'destinasi_id' => 'required',
            'harga' => ['required', 'numeric'],
            'jumlah_muatan' => ['required', 'numeric'],
            'gambar' => ['image', 'required'],

        ]);
        // dd([$file, $ext]);
        $random = '';
        if ($this->gambar != null) {
            $file = $this->gambar->getClientOriginalName();
            $ext = $this->gambar->getClientOriginalExtension();
            $random = md5($file) . '.' . $ext;
            $this->gambar->storeAs('public/kapal/', $file);
        }
        // dd($random);
        $push = array_replace($valid, ['gambar' => $file]);
        $kapal =  TabelKapal::create($push);
        $this->createBerangkat($kapal->id);
        Alert::success('Info', 'Berhasil Di Tambah');
        $this->closeModal();
    }
    public function edit($id)
    {
        $valid = $this->validate([
            'gambar' => ['image'],
            'nama_kapal' => 'required',
            'jenis_kapal' => 'required',
            'pemilik' => 'required',
            'jumlah_muatan' => 'required',
        ]);
        if ($this->gambar != null) {
            $file = $this->gambar->getClientOriginalName();
            $ext = $this->gambar->getClientOriginalExtension();
            $random = md5($file) . '.' . $ext;
            $this->gambar->storeAs('public/kapal/', $file);
        }
        $push = array_replace($valid, ['gambar' => $file]);
        $kapal = TabelKapal::find($id);
        $this->editBerangkat($kapal->id);
        $kapal->update($push);
        $this->closeModal();
        Alert::success('Info', 'Berhasil Di Edit');
    }

    public function delete($id)
    {
        TabelKapal::where('id', $id)->delete();
        $this->itemDelete = false;
        $this->deleteBerangkat($id);
        return redirect()->route('Admin.Data-Kapal', ['user_id'=> $this->user_id]);
    }

    public function createBerangkat($kapalID)
    {
        $berangkat = new Pemberangkatan();
        $berangkat->kode_berangkat = $this->kode_berangkat;
        $berangkat->destinasi_id = $this->destinasi_id;
        $berangkat->harga = $this->harga;
        $berangkat->kapal_id = $kapalID;
        $berangkat->deskripsi = $this->deskripsi;
        $berangkat->jadwal_berangkat = $this->jadwal_berangkat;
        $berangkat->jadwal_kembali = $this->jadwal_kembali;
        $berangkat->save();
        $kapal = TabelKapal::find($kapalID);
        $statusMuatan = StatusMuatan::create([
            'kapal_id' => $kapalID,
            'batas_muatan' => $kapal->jumlah_muatan,
            'jumlah_tiket' => '0',
            'kode_berangkat' => $this->kode_berangkat,
        ]);
        $this->itemAdd = false;
        Alert::success('Info', 'Berhasil');
    }
    public function editBerangkat($id)
    {
        $berangkat = Pemberangkatan::find($id)->update([
            'destinasi_id' => $this->destinasi_id,
            'harga' => $this->harga,
            'deskripsi' => $this->deskripsi,
            'jadwal_berangkat' => $this->jadwal_berangkat,
            'jadwal_kembali' => $this->jadwal_kembali,
        ]);
        $this->itemAdd = false;
        Alert::success('Info', 'Berhasil');
    }
    public function deleteBerangkat($id)
    {
        Pemberangkatan::where('kapal_id', $id)->delete();
        $this->itemDelete = false;
        Alert::success('Info', 'Berhasil');
    }
    public function GetHargaDestinasi()
    {
        $destinasi = Destinasi::find($this->destinasi_id);
        $this->harga = $destinasi->harga;
        // dd($destinasi);
    }

    // SHow
    public function showModal($id){
        $kapal = TabelKapal::find($id);
        $this->itemID = $kapal->id;
        $this->nama_kapal = $kapal->nama_kapal;
        $this->jenis_kapal = $kapal->jenis_kapal;
        $this->jumlah_muatan = $kapal->jumlah_muatan;
        $this->gambar = $kapal->gambar;
        $berangkat = Pemberangkatan::where('kapal_id', $id)->first();
        $this->kode_berangkat = $berangkat->kode_berangkat;
        $this->destinasi_id = $berangkat->destinasi->lokasi;
        $this->harga = $berangkat->harga;
        $this->deskripsi = $berangkat->deskripsi;
        $this->jadwal_berangkat = $berangkat->jadwal_berangkat;
        $this->jadwal_kembali = $berangkat->jadwal_kembali;
        $this->itemShow = true;
    }
}
