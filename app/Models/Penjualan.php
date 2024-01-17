<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_penjualan',
        'total_harga',
        'pelanggan_id'
    ];
    protected $table = 'penjualans';

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }
    public function detail_penjualan()
    {
        return $this->hasMany(DetailPenjualan::class);
    }

    public function details()
    {
        return $this->hasMany(DetailPenjualan::class);
    }
}
