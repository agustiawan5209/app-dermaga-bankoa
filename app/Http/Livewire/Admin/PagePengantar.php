<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Pengantar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PagePengantar extends Component
{
    public $nama, $no_telpon, $alamat, $pemilik_id, $itemID;

    // Item Modal
    public $itemAdd = false, $itemDelete = false, $itemEdit = false;

    public function closeModal()
    {
        return redirect()->route('Admin.Pengantar');
    }
    public function render()
    {
        $pengantar = Pengantar::where('pemilik_id', Auth::user()->id)->get();
        return view('livewire.admin.page-pengantar', compact('pengantar'));
    }

    public function addModal()
    {
        $this->itemAdd = true;
    }

    public function create()
    {
        $this->validate([
            'nama' => 'required|unique:users,name',
            'no_telpon' => 'required',
            'alamat' => 'required',
        ]);

        $user = User::create([
            'name' => $this->nama,
            'email' => $this->nama . '@pengantar.com',
            'password' => bcrypt('12345678'),
            'role_id'=> '2',
        ]);
        $pengantar = Pengantar::create([
            'user_id' => $user->id,
            'pemilik_id' => Auth::user()->id,
            'nama' => $this->nama,
            'no_telpon' => $this->no_telpon,
            'alamat' => $this->alamat,
        ]);

        Alert::success('Info', 'Berhasil Ditambah');
        return redirect()->route('Admin.Pengantar');
    }

    public function editModal($id)
    {
        $this->itemID = $id;
        $pengantar = Pengantar::find($id);
        $this->nama = $pengantar->nama;
        $this->no_telpon = $pengantar->no_telpon;
        $this->alamat = $pengantar->alamat;
        $this->itemAdd = true;
        $this->itemEdit = true;
    }

    public function Edit()
    {
        $this->validate([
            'nama' => 'required',
            'no_telpon' => 'required',
            'alamat' => 'required',
        ]);

        $pengantar = Pengantar::find($this->itemID)->update([
            'pemilik_id' => Auth::user()->id,
            'nama' => $this->nama,
            'no_telpon' => $this->no_telpon,
            'alamat' => $this->alamat,
        ]);

        Alert::success('Info', 'Berhasil Di Edit');
        return redirect()->route('Admin.Pengantar');
    }

    public function deleteModal($id)
    {
        $this->itemID = $id;
        $this->itemDelete = true;
    }

    public function delete()
    {
        $pengantar = Pengantar::find($this->itemID);
        $user = User::find($pengantar->user_id)->delete();
        Alert::success('Info', 'Berhasil Di Hapus');
        return redirect()->route('Admin.Pengantar');
    }
}
