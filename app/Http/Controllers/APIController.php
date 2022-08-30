<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getPelanggan(){
        $user = User::where('role_id', '=', '3')->get();
        return response()->json($user);
    }
}
