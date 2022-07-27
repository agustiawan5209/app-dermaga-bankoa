<?php

use App\Models\Destinasi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $destinasi = Destinasi::all();
    return view('welcome', [
        'destinasi'=> $destinasi,
    ]);
})->name('home');

Route::group(['DermagaBangkoa'=> ['user']], function(){
    Route::get('Reservasi/Tiket', function(){
        $destinasi = Destinasi::all();
    return view('page.reservasi', [
        'destinasi'=> $destinasi,
    ]);
    })->name('Pesan-Tiket');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
