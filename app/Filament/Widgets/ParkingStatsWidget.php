<?php

namespace App\Filament\Widgets;

use App\Models\Kendaraan;
use App\Models\Transaksi;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class ParkingStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $today = Carbon::today();

        $totalKendaraan = Kendaraan::query()->count();
        $masukHariIni = Transaksi::query()->whereDate('waktu_masuk', $today)->count();
        $keluarHariIni = Transaksi::query()->whereDate('waktu_keluar', $today)->whereNotNull('waktu_keluar')->count();
        $pendapatanHariIni = (int) Transaksi::query()
            ->whereDate('waktu_keluar', $today)
            ->where('status_pembayaran', 'paid')
            ->sum('total_bayar');

        return [
            Stat::make('Total Kendaraan', number_format($totalKendaraan))
                ->description('Semua kendaraan terdaftar'),
            Stat::make('Kendaraan Masuk Hari Ini', number_format($masukHariIni))
                ->description('Berdasarkan waktu masuk'),
            Stat::make('Kendaraan Keluar Hari Ini', number_format($keluarHariIni))
                ->description('Berdasarkan waktu keluar'),
            Stat::make('Pendapatan Hari Ini', 'Rp '.number_format($pendapatanHariIni, 0, ',', '.'))
                ->description('Transaksi paid hari ini'),
        ];
    }
}
