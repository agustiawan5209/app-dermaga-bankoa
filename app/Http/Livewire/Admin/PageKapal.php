<?php

namespace App\Http\Livewire\Admin;

use App\Models\TabelKapal;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class PageKapal extends Component
{
    public $user_id;
    // item Field Table Kapal
    public $nama_kapal, $jenis_kapal, $pemilik, $jumlah_muatan, $itemID;
    public function mount($user_id)
    {
        $this->user_id = $user_id;
        $this->pemilik = $user_id;
    }
    public function render()
    {
        $kapal = TabelKapal::where('pemilik', $this->user_id)->get();
        return view('livewire.admin.page-kapal', [
            'kapal' => $kapal,
        ]);
    }
    // Item Modal
    public $itemAdd = false,
        $itemDelete = false;
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
        $this->itemAdd = true;
    }
    public function deleteModal($id)
    {
        $kapal = TabelKapal::find($id);
        $this->itemID = $kapal->id;
        $this->nama_kapal = $kapal->nama_kapal;
        $this->jenis_kapal = $kapal->jenis_kapal;
        $this->jumlah_muatan = $kapal->jumlah_muatan;
        $this->itemDelete = true;
    }
    // CRUD
    public function create()
    {
        $valid = $this->validate([
            'nama_kapal' => 'required',
            'jenis_kapal' => 'required',
            'pemilik' => 'required',
            'jumlah_muatan' => 'required',
        ]);
        TabelKapal::create($valid);
        $this->itemAdd = false;
        Alert::success('Info', 'Berhasil Di Tambah');
    }
    public function edit($id){
        $valid = $this->validate([
            'nama_kapal' => 'required',
            'jenis_kapal' => 'required',
            'pemilik' => 'required',
            'jumlah_muatan' => 'required',
        ]);
        TabelKapal::where('id',$id)->update($valid);
        $this->itemAdd = false;
        Alert::success('Info', 'Berhasil Di Edit');
    }
    public function delete($id){
        TabelKapal::where('id',$id)->delete();
        $this->itemDelete = false;
        Alert::info('Info', 'Berhasil Di Hapus');
    }
}
