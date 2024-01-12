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
        $produk = Produk::all();
        return view("page.produk", compact('produk'));
    }
    public function insert(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'foto_produk' => 'mimes:png,jpg|nullable',
                'harga' => 'required',
                'stok' => 'required'
            ]);

            $produk = new Produk();
            $produk->name = $request->name;
            $produk->harga = $request->harga;
            $produk->stok = $request->stok;
            if ($request->file('foto_produk')) {
                $request->file('foto_produk')->move('img_produk/', $request->file('foto_produk')->getClientOriginalName());
                $produk->foto_produk = $request->file('foto_produk')->getClientOriginalName();
                $produk->save();
            }
            $produk->save();

            $this->notify->success('Sukses membuat produk baru');
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
