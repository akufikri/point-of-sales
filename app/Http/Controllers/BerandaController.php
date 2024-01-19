<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $produk = Produk::count();
        $pegawai = User::where('role_id', 2)->count();
        $penjualan = Penjualan::count();
        return view("page.beranda", compact("produk", "pegawai", "penjualan"));
    }
}