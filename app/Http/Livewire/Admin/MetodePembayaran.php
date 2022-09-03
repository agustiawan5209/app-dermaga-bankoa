<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\MetodePembayaran as ModelsMetodePembayaran;
use RealRashid\SweetAlert\Facades\Alert;

class MetodePembayaran extends Component
{
    // Item
    public $itemAdd=false, $itemDelete=false, $itemEdit = false;
    // field tabel
    public $user_id,$itemID, $no_rek, $bank, $nama;

    public function mount(){
        $this->user_id = Auth::user()->id;
    }
    public function render()
    {
        $metode = ModelsMetodePembayaran::where('user_id', Auth::user()->id)->get();
        return view('livewire.admin.metode-pembayaran', compact('metode'));
    }


    public function addModal(){
        $this->itemAdd = true;
    }
    public function editModal($id){
        $metode = ModelsMetodePembayaran::find($id);
        $this->itemID = $metode->id;
        $this->user_id = Auth::user()->id;
        $this->bank = $metode->bank;
        $this->no_rek = $metode->no_rek;
        $this->nama = $metode->nama;
        $this->itemEdit = true;
    }
    public function deleteModal($id){
        $metode = ModelsMetodePembayaran::find($id);
        $this->itemID = $metode->id;
        $this->itemDelete = true;
    }
    public function create(){
       $valid =  $this->validate([
            'user_id'=> 'required',
            'bank'=> 'required',
            'no_rek'=> 'required',
            'nama'=> 'required',
        ]);
        ModelsMetodePembayaran::create($valid);
        $this->itemAdd = false;
        Alert::success('Info', 'Berhasil Di Tambah');
    }
    public function edit($id){
       $valid =  $this->validate([
            'user_id'=> 'required',
            'bank'=> 'required',
            'no_rek'=> 'required',
            'nama'=> 'required',
        ]);
        ModelsMetodePembayaran::where('id', $id)->update($valid);
        $this->itemEdit = false;
        Alert::success('Info', 'Berhasil Di Edit');
    }
    public function delete($id){
        $metode = ModelsMetodePembayaran::find($id)->delete();
        $this->itemDelete = false;
        Alert::success('Info', 'Berhasil Di Hapus');
    }
}
