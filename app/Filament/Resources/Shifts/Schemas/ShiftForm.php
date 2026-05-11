<?php

namespace App\Filament\Resources\Shifts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ShiftForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                DateTimePicker::make('mulai')
                    ->required(),
                DateTimePicker::make('selesai'),
                TextInput::make('status')
                    ->required()
                    ->default('aktif'),
            ]);
    }
}
