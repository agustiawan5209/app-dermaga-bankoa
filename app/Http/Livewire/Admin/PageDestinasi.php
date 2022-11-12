<?php

namespace App\Http\Livewire\Admin;

use App\Models\Destinasi;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class PageDestinasi extends Component
{
    public $itemAdd = false, $itemEdit = false, $itemDelete = false, $itemID;
    public $lokasi, $harga;
    public function render()
    {
        $destinasi = Destinasi::all();
        return view('livewire.admin.page-destinasi', [
            'tujuan' => $destinasi,
        ]);
    }

    public function addModal()
    {
        $this->itemAdd = true;
    }
    public function editModal($id)
    {
        $destinasi = Destinasi::find($id);
        $this->lokasi = $destinasi->lokasi;
        $this->harga = $destinasi->harga;
        $this->itemID = $destinasi->id;
        $this->itemEdit = true;
        $this->itemAdd = true;
    }
    public function deleteModal($id)
    {
        $this->itemDelete = true;
        $this->itemID = Destinasi::find($id)->id;
    }
    public function create()
    {
        $valid = $this->validate([
            'lokasi' => 'required',
            'harga' => ['required', 'numeric'],
        ]);
        Destinasi::create($valid);
        $this->itemAdd = false;
        Alert::success("Info", 'Berhasil Di tambah');
    }
    public function edit($id)
    {
        $valid = $this->validate([
            'lokasi' => 'required',
            'harga' => ['required', 'numeric'],
        ]);
        try {
            Destinasi::find($id)->update($valid);
            $this->itemEdit = false;
            $this->itemAdd = false;
            Alert::success("info", 'Berhasil Di Edit');
        } catch (\Exception $msg) {
            Alert::error('Error', $msg->getMessage());
        }
    }
    public function delete($id)
    {
        Destinasi::find($id)->delete();
        Alert::success('Info', 'Berhasil Di Hapus');
        $this->itemDelete = false;
    }
}
