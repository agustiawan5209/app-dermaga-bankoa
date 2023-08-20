<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemberangkatan extends Model
{
    use HasFactory;
    protected $table = 'pemberangkatans';
    protected $fillable = [
       'user_id', 'kode_berangkat','tgl_berangkat','harga','destinasi_id','jam','kapal_id','status','deskripsi', 'jadwal_berangkat','jadwal_kembali'
    ];
    protected $hidden = [
        'kapal_id','destinasi_id'
    ];
    public function kapal(){
        return $this->hasOne(TabelKapal::class, 'id', 'kapal_id');
    }
    public function destinasi(){
        return $this->hasOne(Destinasi::class,'id','destinasi_id');
    }
    public function statusmuatan(){
        return $this->hasOne(StatusMuatan::class , 'kode_berangkat', 'kode_berangkat');
    }
}
