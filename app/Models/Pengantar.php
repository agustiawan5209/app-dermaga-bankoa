<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengantar extends Model
{
    use HasFactory;

    protected $table = 'pengantars';
    protected $fillable = ['pemilik_id', 'user_id', 'nama','no_telpon', 'alamat'];
}
