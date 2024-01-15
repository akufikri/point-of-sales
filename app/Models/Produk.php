<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'foto_produk',
        'harga',
        'stok',
        'kd_produk'
    ];

    protected $table = 'produks';
}