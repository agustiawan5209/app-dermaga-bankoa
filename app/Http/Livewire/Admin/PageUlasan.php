<?php

namespace App\Http\Livewire\Admin;

use App\Models\Ulasan;
use Livewire\Component;

class PageUlasan extends Component
{
    public function render()
    {
        // Ulasan::
        return view('livewire.admin.page-ulasan');
    }
}
