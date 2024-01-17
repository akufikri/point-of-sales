<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Pembelanjaan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="font-family: 'Arial', sans-serif;">

    <div style="display: flex; justify-content: center;">
        <div style="max-width: 2xl; height: 100vh; background-color: #E5E7EB; width: 100%; padding: 16px;">

            <h1 style="font-size: 1.875rem; font-weight: bold; margin-bottom: 1rem;">Nota Pembelanjaan</h1>

            <div>
                <p><strong>Tanggal:</strong> {{ $penjualan->tanggal_penjualan }}</p>
                <p><strong>Pelanggan:</strong> {{ optional($penjualan->pelanggan)->nama }}</p>

                <h2 style="font-size: 1.25rem; font-weight: bold; margin-top: 1rem;">Detail Pembelian:</h2>
                <table style="width: 100%; border-collapse: collapse; margin-top: 0.5rem;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #ccc; padding: 8px;">#</th>
                            <th style="border: 1px solid #ccc; padding: 8px;">Produk</th>
                            <th style="border: 1px solid #ccc; padding: 8px;">Qty</th>
                            <th style="border: 1px solid #ccc; padding: 8px;">Harga</th>
                            <th style="border: 1px solid #ccc; padding: 8px;">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjualan->details as $index => $detail)
                            <tr>
                                <td style="border: 1px solid #ccc; padding: 8px;">{{ $index + 1 }}</td>
                                <td style="border: 1px solid #ccc; padding: 8px;">{{ $detail->produk->name }}</td>
                                <td style="border: 1px solid #ccc; padding: 8px;">{{ $detail->total_produk }}</td>
                                <td style="border: 1px solid #ccc; padding: 8px;">
                                    Rp.{{ number_format($detail->produk->harga, 2) }}
                                </td>
                                <td style="border: 1px solid #ccc; padding: 8px;">
                                    Rp.{{ number_format($detail->subtotal, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div style="margin-top: 1rem;">
                    <p style="font-weight: bold;">Total Harga: Rp.{{ number_format($penjualan->total_harga, 2) }}</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
