<?php

use App\Models\Ulasan;
use App\Models\Destinasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\PageKapal;
use App\Http\Livewire\Customer\Cekout;
use App\Http\Livewire\Admin\PageUlasan;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\TiketController;
use Illuminate\Support\Facades\Validator;
use App\Http\Livewire\Admin\PageDestinasi;
use App\Http\Livewire\Admin\PagePengantar;
use App\Http\Livewire\Pemilik\PagePelanggan;
use App\Http\Livewire\Pemilik\PageTransaksi;
use App\Http\Livewire\Admin\DashboardPemilik;
use App\Http\Livewire\Admin\MetodePembayaran;
use App\Http\Livewire\Admin\PageDataPelanggan;
use App\Http\Livewire\Admin\PageTransaksiPesanan;
use App\Http\Livewire\Customer\DashboardCustomer;
use App\Http\Controllers\PemberangkatanController;
use App\Http\Livewire\Pengantar\Dashboard;
use App\Http\Livewire\Transaksi\PemesananTiketPage;
use App\Http\Livewire\Pengantar\PageKapal as PengantarPageKapal;
use App\Http\Livewire\Pengantar\PageKapalDetail;

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

    return view('welcome');
})->name('home');

Route::group(['DermagaBangkoa' => ['user']], function () {
    Route::get('Reservasi/Tiket', [TiketController::class, 'index'])->name('Pesan-Tiket');
    Route::get('Layanan/Jasa', [PageController::class, 'layananPage'])->name('Layanan-page');
    Route::get('Jasa/Logistik', [PageController::class, 'logistikPage'])->name('logistik-page');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [UserController::class, 'user'])->name('dashboard');
});
Route::group(['middleware' => ['auth']], function () {
    // Akses Pemilik
    Route::get('Dashboard', DashboardPemilik::class)->name('Dashboard.Pemilik');
    Route::group(['middleware' =>  'role:Admin', 'prefix' => 'pemilik', 'as' => 'Admin.'], function () {
        Route::get('Pemesanan/Tiket/{Kode}/Kode', PageTransaksiPesanan::class)->name('Page.Pemesanan.Tiket');
        Route::get('Data/Pelanggan', PageDataPelanggan::class)->name('Data-Pelanggan');
        Route::get('Data/Pesanan/Tiket', PemesananTiketPage::class)->name('Data-Tr-Pemberangkatan');
        Route::get('Data/Ulasan', PageUlasan::class)->name('Data-Ulasan');
        Route::get('Data/Kapal/{user_id}', PageKapal::class)->name('Data-Kapal');
        Route::get('/MetodePembayran', MetodePembayaran::class)->name('Metode-Pembayaran');
        Route::get('Data/Destinasi', PageDestinasi::class)->name('Data-Destinasi');
        Route::get('Pengantar', PagePengantar::class)->name('Pengantar');
        Route::get('data-transaksi-pemesanan-kapal', PageTransaksi::class)->name('Page-Transaksi');
    });
    Route::group(['middleware' =>  'role:Pemilik', 'prefix' => 'pengantar', 'as' => 'Pemilik.'], function () {
        Route::get('Dashboard', Dashboard::class)->name('Dashboard.Pengantar');
        Route::get('Pemesanan/Tiket/{Kode}/Kode', PageTransaksiPesanan::class)->name('Page.Pemesanan.Tiket');
        Route::get('Data/Pelanggan', PageDataPelanggan::class)->name('Data-Pelanggan');
        Route::get('Data/Pesanan/Tiket', PemesananTiketPage::class)->name('Data-Tr-Pemberangkatan');
        Route::get('Data/Ulasan', PageUlasan::class)->name('Data-Ulasan');
        Route::get('/MetodePembayran', MetodePembayaran::class)->name('Metode-Pembayaran');
        Route::get('Data/Destinasi', PageDestinasi::class)->name('Data-Destinasi');
        Route::get('data-transaksi-pemesanan-kapal', PageTransaksi::class)->name('Page-Transaksi');
        Route::get('data-Pelanggan', PagePelanggan::class)->name('datapelanggan-kapal');
        Route::get('Data/Kapal/{user_id}', PengantarPageKapal::class)->name('Data-Kapal');
        Route::get('Data-Detail/Kapal/{kode_berangkat}', PageKapalDetail::class)->name('Detail-Data-Kapal');
    });
    // Route::group(['middleware' =>  'role:Pemilik', 'prefix' => 'Pemilik', 'as' => 'Pemilik.'], function(){
    //     Route::get('Dashboard', DashboardPemilik::class)->name('Dashboard.Pemilik');
    //     Route::get('Pemesanan/Tiket', PemesananTiketPage::class)->name('Page.Pemesanan.Tiket');
    //     Route::get('Data/Pelanggan', PageDataPelanggan::class)->name('Data-Pelanggan');
    //     Route::get('Data/Pesanan/Tiket', PageTransaksiPesanan::class)->name('Data-Tr-Tiket');
    //     Route::get('Data/Ulasan', PageUlasan::class)->name('Data-Ulasan');
    // });

    // Akses Customer
    Route::group(['middleware' =>  'role:Customer', 'prefix' => 'Customer', 'as' => 'Customer.'], function () {
        Route::get('Dashboard', DashboardCustomer::class)->name('Customer');
        Route::get('Cekout/Kapal/{item}', Cekout::class)->name('Cekout-Page');
    });
    Route::post('Cekout-Pesanan', [PemberangkatanController::class, 'bayar'])->name('Kirim-Bayar');
});
Route::post('Kirim-Ulasan/{kapal_id}', function (Request $request, $kapal_id) {
    try {
        Validator::make($request->all(), [
            // 'kapal_id'=> 'required',
            'user_name' => 'required',
            'email' => 'required|email',
            'ket' => 'required'
        ])->validate();
        Ulasan::create([
            'kapal_id' => $kapal_id,
            'user_name' => $request->user_name,
            'email' => $request->email,
            'ket' => $request->ket,
        ]);
        Alert::info('info', 'Ulasan Berhasil Di Kirim');
        return redirect()->back();
    } catch (\Exception $e) {
        Alert::warning('info', 'Ulasan Gagal Di Kirim Error=' . $e->getMessage());
        return redirect()->back();
    }
})->name('Kirim-Ulasan');
