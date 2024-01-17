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
        if (!$this->isProductSelected($productId)) {
            $selectedProduct = Produk::find($productId);

            $this->selectedProduk[] = [
                'product' => $selectedProduct,
                'quantity' => 1,
            ];
        } else {
            $this->addError('selectedProduk', 'Produk sudah ada dalam daftar.');
        }
    }

    private function isProductSelected($productId)
    {
        return collect($this->selectedProduk)->contains('product.id', $productId);
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

        return $subtotal + $this->feeAdmin * $this->qty;
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
            $penjualan = $this->saveToDatabase($total);

            return redirect()->route('generate.pdf', ['id' => $penjualan->id]);
        } catch (\Exception $ex) {
            $this->addError('error', 'Terjadi kesalahan: ' . $ex->getMessage());
            session()->flash('error', 'Gagal menghitung produk');
        }
    }

    private function saveToDatabase($total)
    {
        $pelangganId = $this->selectedPelangganId;

        if ($pelangganId !== null) {
            try {
                \DB::beginTransaction();

                $penjualan = Penjualan::create([
                    'tanggal_penjualan' => now(),
                    'total_harga' => $total,
                    'pelanggan_id' => $pelangganId,
                ]);

                foreach ($this->selectedProduk as $item) {
                    $product = $item['product'];

                    DetailPenjualan::create([
                        'penjualan_id' => $penjualan->id,
                        'produk_id' => $product->id,
                        'total_produk' => $item['quantity'],
                        'subtotal' => $product->harga * $item['quantity'],
                        'fee_admin' => $this->feeAdmin,
                    ]);

                    $product->decrement('stok', $item['quantity']);
                }

                $this->dispatch('updateTotal', $total, $penjualan->id);

                \DB::commit();

                $this->resetForm();
                session()->flash('success', 'Sukses menghitung produk');

                return $penjualan;
            } catch (\Exception $ex) {
                \DB::rollBack();

                $this->addError('error', 'Terjadi kesalahan: ' . $ex->getMessage());
                session()->flash('error', 'Gagal menghitung produk');
            }
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
