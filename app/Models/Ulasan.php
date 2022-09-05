<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;
    protected $table = 'ulasans';
    protected $fillable = ['kapal_id','user_name','email',  'ket'];

    public function kapal(){
        return $this->hasOne(TabelKapal::class, 'id','kapal_id');
    }
}
