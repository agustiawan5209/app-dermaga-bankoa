<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    protected $table = 'destinasis';
    protected $fillable = ['lokasi', 'harga'];
    protected $hidden = 'harga';
    use HasFactory;
}
