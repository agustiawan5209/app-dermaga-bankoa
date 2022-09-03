<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $fillable = [
        'user_id','ID_transaksi','tgl_transaksi','bukti'
    ];
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
