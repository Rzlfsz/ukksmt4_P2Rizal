<?php

namespace App\Filament\Resources\AreaParkirs;

use App\Filament\Resources\AreaParkirs\Pages\CreateAreaParkir;
use App\Filament\Resources\AreaParkirs\Pages\EditAreaParkir;
use App\Filament\Resources\AreaParkirs\Pages\ListAreaParkirs;
use App\Filament\Resources\AreaParkirs\Schemas\AreaParkirForm;
use App\Filament\Resources\AreaParkirs\Tables\AreaParkirsTable;
use App\Models\AreaParkir;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AreaParkirResource extends Resource
{
    protected static ?string $model = AreaParkir::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup = 'Master Data';

    public static function form(Schema $schema): Schema
    {
        return AreaParkirForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AreaParkirsTable::configure($table);
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
            'index' => ListAreaParkirs::route('/'),
            'create' => CreateAreaParkir::route('/create'),
            'edit' => EditAreaParkir::route('/{record}/edit'),
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
