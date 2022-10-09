<?php

namespace App\Http\Livewire\Customer;

use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardCustomer extends Component
{
    public function render()
    {
        $tr  = Transaksi::where('user_id', Auth::user()->id)->get();
        return view('livewire.customer.dashboard-customer', compact('tr'))->layout('components.layout.app-customer');
    }
}
