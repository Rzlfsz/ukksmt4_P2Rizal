<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Struk Parkir</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; color: #111827; }
        .row { display: flex; justify-content: space-between; }
        .muted { color: #6b7280; }
        .center { text-align: center; }
        .hr { border-top: 1px dashed #9ca3af; margin: 10px 0; }
        table { width: 100%; border-collapse: collapse; }
        td { padding: 2px 0; vertical-align: top; }
    </style>
</head>
<body>
    <div class="center">
        <div style="font-weight: 700; font-size: 14px;">STRUK PARKIR</div>
        <div class="muted">{{ config('app.name') }}</div>
    </div>

    <div class="hr"></div>

    <table>
        <tr>
            <td class="muted">Invoice</td>
            <td style="text-align: right; font-weight: 700;">{{ $transaksi->invoice }}</td>
        </tr>
        <tr>
            <td class="muted">Plat</td>
            <td style="text-align: right;">{{ $kendaraan?->plat_nomor ?? '-' }}</td>
        </tr>
        <tr>
            <td class="muted">Jenis</td>
            <td style="text-align: right;">{{ $kendaraan?->jenis_kendaraan ?? '-' }}</td>
        </tr>
        <tr>
            <td class="muted">Area</td>
            <td style="text-align: right;">{{ $area?->nama_area ?? '-' }}</td>
        </tr>
        <tr>
            <td class="muted">Petugas</td>
            <td style="text-align: right;">{{ $petugas?->name ?? '-' }}</td>
        </tr>
    </table>

    <div class="hr"></div>

    <table>
        <tr>
            <td class="muted">Masuk</td>
            <td style="text-align: right;">{{ optional($transaksi->waktu_masuk)->format('d/m/Y H:i') }}</td>
        </tr>
        <tr>
            <td class="muted">Keluar</td>
            <td style="text-align: right;">{{ optional($transaksi->waktu_keluar)->format('d/m/Y H:i') ?? '-' }}</td>
        </tr>
        <tr>
            <td class="muted">Durasi</td>
            <td style="text-align: right;">{{ $transaksi->durasi_menit ? $transaksi->durasi_menit.' menit' : '-' }}</td>
        </tr>
        <tr>
            <td class="muted">Tarif/Jam</td>
            <td style="text-align: right;">{{ $tarif ? 'Rp '.number_format($tarif->harga_per_jam, 0, ',', '.') : '-' }}</td>
        </tr>
        <tr>
            <td class="muted">Denda</td>
            <td style="text-align: right;">{{ $tarif ? 'Rp '.number_format($tarif->denda, 0, ',', '.') : '-' }}</td>
        </tr>
    </table>

    <div class="hr"></div>

    <table>
        <tr>
            <td style="font-weight: 700;">Total Bayar</td>
            <td style="text-align: right; font-weight: 700;">Rp {{ number_format((int) $transaksi->total_bayar, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td class="muted">Status</td>
            <td style="text-align: right;">{{ strtoupper($transaksi->status_pembayaran) }}</td>
        </tr>
    </table>

    <div class="hr"></div>

    <div class="center muted">Terima kasih.</div>
</body>
</html>

