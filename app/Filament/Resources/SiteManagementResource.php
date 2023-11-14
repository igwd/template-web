<?php

namespace App\Filament\Resources;
use Filament;
use App\Models\Site;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SiteManagementResource\Pages;
use App\Filament\Resources\SiteManagementResource\RelationManagers;

class SiteManagementResource extends Resource
{
    protected static ?string $model = Site::class;

    protected static ?string $navigationGroup = "Site Management";

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';

    protected static ?string $navigationLabel = "Website";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Filament\Tables\Columns\TextColumn::make('name'),
                Filament\Tables\Columns\TextColumn::make('slug'),
            ])
            ->filters([
                Filament\Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Filament\Tables\Actions\EditAction::make(),
                Filament\Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Filament\Tables\Actions\DeleteBulkAction::make(),
                Filament\Tables\Actions\ForceDeleteBulkAction::make(),
                Filament\Tables\Actions\RestoreBulkAction::make(),
            ]);
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
            'index' => Pages\ListSiteManagement::route('/'),
            'create' => Pages\CreateSiteManagement::route('/create'),
            'edit' => Pages\EditSiteManagement::route('/{record}/edit'),
        ];
    }    
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
