<?php

namespace App\Filament\Resources\Kendaraans\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KendaraanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('plat_nomor')
                    ->required(),
                Select::make('jenis_kendaraan')
                    ->options(['Motor' => 'Motor', 'Mobil' => 'Mobil', 'Truk' => 'Truk'])
                    ->required(),
                TextInput::make('warna'),
                TextInput::make('pemilik'),
                Select::make('area_parkir_id')
                    ->relationship('areaParkir', 'id'),
                TextInput::make('id_user')
                    ->numeric(),
            ]);
    }
}
