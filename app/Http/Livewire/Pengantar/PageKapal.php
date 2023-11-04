<?php

namespace App\Http\Livewire\Pengantar;

use Livewire\Component;
use App\Models\Destinasi;
use App\Models\Pengantar;
use App\Models\TabelKapal;
use Illuminate\Support\Facades\Auth;

class PageKapal extends Component
{
    public function render()
    {
        $destinasi = Destinasi::all();
        $user = Pengantar::where('user_id','=', Auth::user()->id)->first();
        $kapal = TabelKapal::with(['pemberangkatan', 'pemberangkatan.tiket'])->orderBy('id','desc')->when(Auth::user()->role_id == 2, function($query) use($user){
            $query->where('pemilik', $user->pemilik_id);
        })->get();
        return view('livewire.pengantar.page-kapal', [
            'kapal' => $kapal,
            'destinasi' => $destinasi,
        ]);
    }
}
