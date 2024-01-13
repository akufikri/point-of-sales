<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Services\NotificationService;

class ProdukController extends Controller
{
    protected $notify;
    public function __construct(NotificationService $notify)
    {
        $this->notify = $notify;
    }
    public function index()
    {
        $produk = Produk::latest()->get();
        return view("page.produk", compact('produk'));
    }
    public function insert(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'foto_produk' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
                'harga' => 'required|numeric|min:0',
                'stok' => 'required|integer|min:0'
            ], [
                'name.required' => 'Nama produk harus diisi.',
                'name.string' => 'Nama produk harus berupa teks.',
                'name.max' => 'Nama produk tidak boleh lebih dari :max karakter.',
                'foto_produk.image' => 'File harus berupa gambar.',
                'foto_produk.mimes' => 'Format gambar tidak valid. Hanya mendukung JPEG, PNG, JPG, dan GIF.',
                'foto_produk.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB.',
                'harga.required' => 'Harga harus diisi.',
                'harga.numeric' => 'Harga harus berupa angka.',
                'harga.min' => 'Harga tidak boleh kurang dari :min.',
                'stok.required' => 'Stok harus diisi.',
                'stok.integer' => 'Stok harus berupa angka bulat.',
                'stok.min' => 'Stok tidak boleh kurang dari :min.'
            ]);

            $produk = new Produk();
            $produk->name = $request->name;
            $produk->harga = $request->harga;
            $produk->stok = $request->stok;

            if ($request->file('foto_produk')) {
                $request->file('foto_produk')->move('img_produk/', $request->file('foto_produk')->getClientOriginalName());
                $produk->foto_produk = $request->file('foto_produk')->getClientOriginalName();
            }

            $produk->save();

            $this->notify->success('Sukses membuat produk baru');
        } catch (\Exception $ex) {
            $this->notify->error('Terjadi kesalahan: ' . $ex->getMessage());
        }

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'foto_produk' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
                'harga' => 'required|numeric|min:0',
                'stok' => 'required|integer|min:0'
            ], [
                'name.required' => 'Nama produk harus diisi.',
                'name.string' => 'Nama produk harus berupa teks.',
                'name.max' => 'Nama produk tidak boleh lebih dari :max karakter.',
                'foto_produk.image' => 'File harus berupa gambar.',
                'foto_produk.mimes' => 'Format gambar tidak valid. Hanya mendukung JPEG, PNG, JPG, dan GIF.',
                'foto_produk.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB.',
                'harga.required' => 'Harga harus diisi.',
                'harga.numeric' => 'Harga harus berupa angka.',
                'harga.min' => 'Harga tidak boleh kurang dari :min.',
                'stok.required' => 'Stok harus diisi.',
                'stok.integer' => 'Stok harus berupa angka bulat.',
                'stok.min' => 'Stok tidak boleh kurang dari :min.'
            ]);

            $produk = Produk::find($id);

            if (!$produk) {
                $this->notify->error('Produk tidak ditemukan');
                return redirect()->back();
            }

            $produk->name = $request->name;
            $produk->harga = $request->harga;
            $produk->stok = $request->stok;

            if ($request->file('foto_produk')) {
                $request->validate([
                    'foto_produk' => 'mimes:png,jpg'
                ]);

                // Hapus foto lama jika ada
                if ($produk->foto_produk) {
                    unlink(public_path('img_produk/' . $produk->foto_produk));
                }

                // Pindahkan foto baru
                $request->file('foto_produk')->move('img_produk/', $request->file('foto_produk')->getClientOriginalName());
                $produk->foto_produk = $request->file('foto_produk')->getClientOriginalName();
            }

            $produk->save();

            $this->notify->success('Sukses memperbarui produk');
        } catch (\Exception $ex) {
            $this->notify->error('Terjadi kesalahan: ' . $ex->getMessage());
        }

        return redirect()->back();
    }

    public function delete($id)
    {
        try {
            $produk = Produk::find($id);
            $produk->delete();
            $this->notify->success('Sukses menghapus produk');
        } catch (
            \Exception $ex
        ) {
            $this->notify->error('Terjadi kesalahan: ' . $ex->getMessage());
        }
        return redirect()->back();
    }
}