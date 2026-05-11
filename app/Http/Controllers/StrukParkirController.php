<?php

namespace App\Http\Controllers;

use App\Models\TarifParkir;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StrukParkirController
{
    public function __invoke(Request $request, Transaksi $transaksi): Response
    {
        $user = $request->user();

        abort_unless($user, 401);
        abort_unless($user->can('Transaksi:CetakStruk'), 403);

        $transaksi->load(['kendaraan.areaParkir', 'petugas']);

        $tarif = TarifParkir::query()
            ->where('jenis_kendaraan', $transaksi->kendaraan?->jenis_kendaraan)
            ->first();

        $pdf = Pdf::loadView('pdf.struk-parkir', [
            'transaksi' => $transaksi,
            'kendaraan' => $transaksi->kendaraan,
            'area' => $transaksi->kendaraan?->areaParkir,
            'petugas' => $transaksi->petugas,
            'tarif' => $tarif,
        ])->setPaper('a6');

        return $pdf->stream("struk-{$transaksi->invoice}.pdf");
    }
}

