<?php

namespace App\Filament\Resources\TarifParkirs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TarifParkirForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('jenis_kendaraan')
                    ->required(),
                TextInput::make('harga_per_jam')
                    ->required()
                    ->numeric(),
                TextInput::make('denda')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
