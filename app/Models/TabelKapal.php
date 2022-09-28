<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TabelKapal extends Model
{
    use HasFactory;
    protected $table = 'tabel_kapals';
    protected $fillable = [
       'gambar', 'nama_kapal', 'jenis_kapal','pemilik','jumlah_muatan','status',
    ];
    protected $hidden = [
       'pemilik','status',
    ];
    public function user(){
        return $this->hasOne(User::class, 'id', 'pemilik');
    }
    public function ulasan(){
        return $this->belongsTo(Ulasan::class, 'kapal_id','id');
    }
    public function pemberangkatan(){
        return $this->hasMany(Pemberangkatan::class, 'kapal_id', 'id');
    }
}
