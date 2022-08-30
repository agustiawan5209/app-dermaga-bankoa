<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class PageDataPelanggan extends Component
{
    public function render()
    {
        // $this->getdataPelanggan();
        $user = User::where('role_id', '=', '3')->get();
        return view('livewire.admin.page-data-pelanggan', [
            'user'=> $user
        ]);
    }

    public function getdataPelanggan(){
        $app_url = config('app.url');
        $url = Http::get($app_url. '/Get/Data-Pelanggan');
        dd($url);
    }
}
