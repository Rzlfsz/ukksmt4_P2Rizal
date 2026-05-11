<?php

namespace App\Filament\Resources\Transaksis\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TransaksiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('invoice')
                    ->required(),
                Select::make('kendaraan_id')
                    ->relationship('kendaraan', 'id_kendaraan')
                    ->required(),
                Select::make('petugas_id')
                    ->relationship('petugas', 'name'),
                DateTimePicker::make('waktu_masuk')
                    ->required(),
                DateTimePicker::make('waktu_keluar'),
                TextInput::make('durasi_menit')
                    ->numeric(),
                TextInput::make('total_bayar')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('status_pembayaran')
                    ->required()
                    ->default('unpaid'),
            ]);
    }
}
