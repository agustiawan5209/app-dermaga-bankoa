<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $fillable = [
        'user_id','ID_transaksi','tgl_transaksi','bukti' ,'kode_berangkat', 'status',
    ];
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function tiket(){
        return $this->hasMany(Tiket::class, 'ID_transaksi', 'ID_transaksi');
    }
    public function pemberangkatan()
    {
        return $this->hasOne(Pemberangkatan::class, 'kode_berangkat', 'kode_berangkat');
    }

}
