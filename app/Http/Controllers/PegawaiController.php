<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        return view("page.pengaturan-sistem.pegawai.index");
    }
    public function store(Request $request)
    {
    }
}
