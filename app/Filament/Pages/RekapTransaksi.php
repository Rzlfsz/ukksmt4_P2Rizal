<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use BackedEnum;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class RekapTransaksi extends Page
{
    protected string $view = 'filament.pages.rekap-transaksi';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChartBar;

    protected static string|UnitEnum|null $navigationGroup = 'Laporan';

    public static function canAccess(): bool
    {
        $user = auth()->user();

        return (bool) $user?->can('Laporan:RekapTransaksi');
    }
}
