<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function layananPage()
    {
        return view('page.layanan');
    }
    public function logistikPage()
    {
        return view('page.jasalogistik');
    }
}
