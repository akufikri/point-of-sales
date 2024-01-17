<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generatePdf($id)
    {
        $penjualan = Penjualan::with('details.produk', 'pelanggan')->find($id);

        if (!$penjualan) {
            abort(404);
        }

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.nota', compact('penjualan'));

        return $pdf->download('nota_pembelanjaan.pdf');
    }
}
