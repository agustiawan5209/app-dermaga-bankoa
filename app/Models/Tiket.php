<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;
    protected $table = 'tikets';
    protected $fillable = ['kode_berangkat', 'kode_tiket', 'harga', 'ID_transaksi', 'jadwal_berangkat','jam_berangkat','jadwal_kembali','jam_kembali'];

    public function berangkat(){
        return $this->hasOne(Pemberangkatan::class, 'kode_berangkat', 'kode_berangkat');
    }

    public function transaksi(){
        return $this->hasOne(Transaksi::class, 'ID_transaksi','ID_transaksi');
    }
}
