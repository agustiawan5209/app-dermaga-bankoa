<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelKapal extends Model
{
    use HasFactory;
    protected $table = 'tabel_kapals';
    protected $fillable = [
        'nama_kapal', 'jenis_kapal','pemilik','jumlah_muatan','status',
    ];
    protected $hidden = [
       'pemilik','status',
    ];
}
