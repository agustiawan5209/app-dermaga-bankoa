<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $app = [];
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function user(array $guards = null)
    {
        $user_id = Auth::user()->role->id;
        // dd($user_id);
        if($user_id == 1){
            return redirect()->route('Admin.Dashboard.Pemilik');
        }
        if($user_id == 2){
            return redirect()->route('Pemilik.Dashboard.Pemilik');
        }
        if($user_id == 3){
            return redirect()->route('Customer.Customer');
        }else{
            auth()->guard('web')->logout();
            abort(401);
        }

    }
}
