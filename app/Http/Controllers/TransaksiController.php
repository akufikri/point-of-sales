<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return view("page.transaksi");
    }
    public function store(Request $request)
    {
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
    }
}
