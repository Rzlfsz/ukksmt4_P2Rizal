<?php

namespace App\Filament\Resources\TarifParkirs;

use App\Filament\Resources\TarifParkirs\Pages\CreateTarifParkir;
use App\Filament\Resources\TarifParkirs\Pages\EditTarifParkir;
use App\Filament\Resources\TarifParkirs\Pages\ListTarifParkirs;
use App\Filament\Resources\TarifParkirs\Schemas\TarifParkirForm;
use App\Filament\Resources\TarifParkirs\Tables\TarifParkirsTable;
use App\Models\TarifParkir;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TarifParkirResource extends Resource
{
    protected static ?string $model = TarifParkir::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup = 'Master Data';

    public static function form(Schema $schema): Schema
    {
        return TarifParkirForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TarifParkirsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTarifParkirs::route('/'),
            'create' => CreateTarifParkir::route('/create'),
            'edit' => EditTarifParkir::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
