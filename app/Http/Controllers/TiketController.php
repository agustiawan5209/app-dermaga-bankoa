<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    public function index()
    {
        $destinasi = Destinasi::all();

        return view('page.reservasi',[
            'destinasi'=> $destinasi,
        ]);
    }
}
