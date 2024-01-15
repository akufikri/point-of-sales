<?php

namespace App\Livewire;

use App\Models\Pelanggan;
use App\Models\Produk;
use Livewire\Component;

class Transaksi extends Component
{
    public $produk;
    public $selectedProduk = [];
    public $pelanggan;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount()
    {
        $this->produk = Produk::all();
        $this->pelanggan = Pelanggan::all();
    }

    public function selectProduk($productId)
    {
        // Cek apakah produk sudah ada dalam array selectedProduk
        $existingIndex = null;
        foreach ($this->selectedProduk as $index => $item) {
            if ($item['product']->id == $productId) {
                $existingIndex = $index;
                break;
            }
        }

        if ($existingIndex !== null) {
            // Produk sudah ada, mungkin bisa menampilkan pesan atau melakukan aksi lain
            // Misalnya: $this->addError('selectedProduk', 'Produk sudah ada dalam daftar.');
        } else {
            // Produk belum ada, tambahkan ke array selectedProduk
            $selectedProduct = Produk::find($productId);

            $this->selectedProduk[] = [
                'product' => $selectedProduct,
                'quantity' => 1,
            ];
        }
    }

    public function updateQuantity($index, $quantity)
    {
        $this->selectedProduk[$index]['quantity'] = $quantity;
    }

    public function getTotalQuantity()
    {
        $totalQuantity = 0;

        foreach ($this->selectedProduk as $item) {
            $totalQuantity += $item['quantity'];
        }

        return $totalQuantity;
    }

    public function getTotalPrice()
    {
        $totalPrice = 0;

        foreach ($this->selectedProduk as $item) {
            $totalPrice += $item['product']->harga * $item['quantity'];
        }

        return $totalPrice;
    }

    public function render()
    {
        return view('livewire.transaksi', [
            'totalQuantity' => $this->getTotalQuantity(),
            'totalPrice' => $this->getTotalPrice(),
        ]);
    }
}
