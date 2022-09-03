<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodePembayaran extends Model
{
    use HasFactory;
    protected $table = 'metode_pembayarans';
    protected $fillable= [
        'user_id','no_rek','bank'
    ];
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
