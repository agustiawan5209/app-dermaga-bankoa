<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function user()
    {
        $user_id = Auth::user()->role->id;
        dd($user_id);
        // if()
    }
}
