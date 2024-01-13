<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Services\NotificationService;

class PelangganController extends Controller
{
    protected $notify;
    public function __construct(NotificationService $notify)
    {
        $this->notify = $notify;
    }
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view("page.pengaturan-sistem.pelanggan.index", compact("pelanggan"));
    }
    public function insert(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'alamat' => 'required|string|max:500',
                'no_telp' => 'required|numeric',
            ], [
                'nama.required' => 'Nama pelanggan harus diisi.',
                'nama.string' => 'Nama pelanggan harus berupa teks.',
                'nama.max' => 'Nama pelanggan tidak boleh lebih dari :max karakter.',
                'alamat.required' => 'Alamat pelanggan harus diisi.',
                'alamat.string' => 'Alamat pelanggan harus berupa teks.',
                'alamat.max' => 'Alamat pelanggan tidak boleh lebih dari :max karakter.',
                'no_telp.required' => 'Nomor telepon harus diisi.',
                'no_telp.numeric' => 'Nomor telepon harus berupa angka.',
            ]);
            $pelanggan = new Pelanggan();
            $pelanggan->nama = $request->nama;
            $pelanggan->alamat = $request->alamat;
            $pelanggan->no_telp = $request->no_telp;
            $pelanggan->save();

            $this->notify->success('Sukses membuat pelanggan baru');
        } catch (\Exception $ex) {
            $this->notify->error('Terjadi kesalahan: ' . $ex->getMessage());
        }
        return redirect()->back();
    }
    public function delete($id)
    {
        try {
            $pelanggan = Pelanggan::find($id);
            $pelanggan->delete();
            $this->notify->success('Sukses menghapus pelanggan');
        } catch (\Exception $ex) {
            $this->notify->error('Terjadi kesalahan: ' . $ex->getMessage());
        }
        return redirect()->back();
    }
}