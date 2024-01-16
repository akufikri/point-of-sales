<?php

namespace App\Livewire;

use App\Models\DetailPenjualan;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Produk;
use Livewire\Component;

class Transaksi extends Component
{
    public $produk;
    public $selectedProduk = [];
    public $pelanggan;
    public $feeAdmin = 10;
    public $qty = 1;
    public $selectedPelangganId;
    protected $rules = [
        'selectedPelangganId' => 'required',
        'selectedProduk.*.quantity' => 'required|integer|min:1',
        'feeAdmin' => 'required|numeric|min:10',
    ];
    public function mount()
    {
        $this->selectedProduk = [];
        $this->produk = Produk::all();
        $this->pelanggan = Pelanggan::all();
        $this->selectedPelangganId = null;
    }

    public function selectProduk($productId)
    {
        $existingIndex = collect($this->selectedProduk)->search(function ($item) use ($productId) {
            return $item['product']->id == $productId;
        });

        if ($existingIndex !== false) {
            $this->addError('selectedProduk', 'Produk sudah ada dalam daftar.');
        } else {
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
        return collect($this->selectedProduk)->sum('quantity');
    }

    public function getTotalPrice()
    {
        return collect($this->selectedProduk)->sum(function ($item) {
            return $item['product']->harga * $item['quantity'];
        });
    }

    public function calculateTotal()
    {
        $subtotal = collect($this->selectedProduk)->sum(function ($item) {
            return $item['product']->harga * $item['quantity'];
        });
        $total = $subtotal + $this->feeAdmin * $this->qty;

        return $total;
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        $this->validate();

        try {
            $total = $this->calculateTotal();
            $this->saveToDatabase($total);
            $this->resetForm();
            session()->flash('success', 'Sukses menghitung produk');
        } catch (\Exception $ex) {
            $this->addError('error', 'Terjadi kesalahan: ' . $ex->getMessage());
            session()->flash('error', 'Gagal menghitung produk');
        }
    }

    private function saveToDatabase($total)
    {
        $pelangganId = $this->selectedPelangganId;

        if ($pelangganId !== null) {
            $penjualan = Penjualan::create([
                'tanggal_penjualan' => now(),
                'total_harga' => $total,
                'pelanggan_id' => $pelangganId,
            ]);

            foreach ($this->selectedProduk as $item) {
                DetailPenjualan::create([
                    'penjualan_id' => $penjualan->id,
                    'produk_id' => $item['product']->id,
                    'total_produk' => $item['quantity'],
                    'subtotal' => $item['product']->harga * $item['quantity'],
                    'fee_admin' => $this->feeAdmin,
                ]);
            }
            $this->dispatch('updateTotal', $total, $penjualan->id);
        } else {
            $this->addError('selectedPelangganId', 'Harap pilih pelanggan.');
        }
    }

    private function resetForm()
    {
        $this->selectedProduk = [];
        $this->feeAdmin = 0;
        $this->selectedPelangganId = null;
    }

    public function render()
    {
        return view('livewire.transaksi', [
            'totalQuantity' => $this->getTotalQuantity(),
            'totalPrice' => $this->getTotalPrice(),
        ]);
    }
}
