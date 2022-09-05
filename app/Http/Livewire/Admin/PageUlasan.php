<?php

namespace App\Http\Livewire\Admin;

use App\Models\TabelKapal;
use App\Models\Ulasan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class PageUlasan extends Component
{
    public $user_id;
    public $ulasan;
    public $cariKapal = false;
    public function mount(){
        $this->user_id = Auth::user()->id;
    }
    public function render()
    {
        $tbKapal = TabelKapal::where('pemilik', $this->user_id)->get();
        return view('livewire.admin.page-ulasan', compact('tbKapal'));
    }
    public function CariUlasan($id){
       try{
        $this->ulasan = Ulasan::where('kapal_id', $id)->get();
        $this->cariKapal = true;
       }catch(\Exception $e){
        Alert::warning('info', 'Error = '. $e->getMessage());
       }
    }
}
