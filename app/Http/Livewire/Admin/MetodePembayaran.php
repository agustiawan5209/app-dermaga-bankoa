<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\MetodePembayaran as ModelsMetodePembayaran;
use RealRashid\SweetAlert\Facades\Alert;

class MetodePembayaran extends Component
{
    public function render()
    {
        $metode = ModelsMetodePembayaran::all();
        return view('livewire.admin.metode-pembayaran', compact('metode'));
    }

    // Item
    public $itemAdd=false, $itemDelete=false;
    // field tabel
    public $user_id,$itemID, $no_rek, $bank;
    public function addModal(){
        $this->itemAdd = true;
    }
    public function editModal($id){
        $metode = ModelsMetodePembayaran::find($id);
        $this->itemID = $metode->id;
        $this->user_id = Auth::user()->id;
        $this->bank = $metode->bank;
        $this->no_rek = $metode->no_rek;
        $this->itemAdd = true;
    }
    public function deleteModal($id){
        $metode = ModelsMetodePembayaran::find($id);
        $this->itemID = $metode->id;
    }
    public function create(){
       $valid =  $this->validate([
            'user_id'=> $this->user_id,
            'bank'=> $this->bank,
            'no_rek'=> $this->no_rek,
        ]);
        ModelsMetodePembayaran::create($valid);
        $this->itemAdd = false;
        Alert::success('Info', 'Berhasil Di Tambah');
    }
    public function edit($id){
       $valid =  $this->validate([
            'user_id'=> $this->user_id,
            'bank'=> $this->bank,
            'no_rek'=> $this->no_rek,
        ]);
        ModelsMetodePembayaran::where('id', $id)->update($valid);
        $this->itemAdd = false;
        Alert::success('Info', 'Berhasil Di Edit');
    }
    public function delete($id){
        $metode = ModelsMetodePembayaran::find($id)->delete();
        $this->itemDelete = false;
        Alert::success('Info', 'Berhasil Di Hapus');
    }
}
