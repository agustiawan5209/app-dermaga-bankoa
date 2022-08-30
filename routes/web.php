<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\TiketController;
use App\Http\Livewire\Transaksi\PemesananTiketPage;
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
    Route::get('Reservasi/Tiket', [TiketController::class, 'index'])->name('Pesan-Tiket');
    Route::get('Layanan/Jasa', [PageController::class, 'layananPage'])->name('Layanan-page');
    Route::get('Jasa/Logistik', [PageController::class, 'logistikPage'])->name('logistik-page');

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
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' =>  'role:Admin', 'prefix' => 'Admin', 'as' => 'Admin.'], function(){
        Route::get('Pemesanan/Tiket', PemesananTiketPage::class)->name('Page.Pemesanan.Tiket');
    });
});
