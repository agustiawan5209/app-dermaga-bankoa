<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class DashboardPemilik extends Component
{
    public function render()
    {
        $dataPelanggan = User::where('role_id', '=', '3')->get();
        return view('livewire.admin.dashboard-pemilik',[
            'datapelanggan'=> $dataPelanggan,
        ]);
    }
}
