<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusMuatan extends Model
{
    use HasFactory;
    protected $table = 'status_muatans';
    protected $fillable = ['kapal_id', 'batas_muatan', 'jumlah_tiket','kode_berangkat',];

    public function kapal(){
        return $this->hasOne(TabelKapal::class, 'id','kapal_id');
    }
    public function pemberangkatans(){
        return $this->hasOne(Pemberangkatan::class,'kode_berangkat', 'kode_berangkat');
    }
}
