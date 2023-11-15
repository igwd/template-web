<?php

namespace App\Filament\Resources;

use Filament;
use Filament\Forms\Form;
use App\Models\Navigation;
use Filament\Tables\Table;

use Illuminate\Support\Carbon;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\NavigationResource\Pages;
use App\Filament\Resources\NavigationResource\RelationManagers;

class NavigationResource extends Resource
{
    protected static ?string $model = Navigation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = "Site Management";

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Filament\Forms\Components\Select::make('Site Owener')
                    ->relationship('site','name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Filament\Forms\Components\Select::make('parent')
                    ->relationship('nav_parent','name')
                    ->searchable()
                    ->preload(),
                Filament\Forms\Components\TextInput::make('name')
                    ->maxLength(100)->required(),
                Filament\Forms\Components\TextInput::make('name_en')
                    ->maxLength(100)->required(),
                Filament\Forms\Components\TextInput::make('sort'),
                Filament\Forms\Components\TextInput::make('link')->required()
                    ->maxLength(255),
                Filament\Forms\Components\TextInput::make('external_link')
                    ->maxLength(255)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Filament\Tables\Columns\TextColumn::make('name')->label('Navigation')->searchable(),
                Filament\Tables\Columns\TextColumn::make('nav_parent.name')->label('Parent Navigation')->searchable(),
                Filament\Tables\Columns\TextColumn::make('sort'),
                Filament\Tables\Columns\TextColumn::make('link'),
                Filament\Tables\Columns\TextColumn::make('external_link'),
                Filament\Tables\Columns\TextColumn::make('created_at')->since(),
            ])
            ->filters([
                Filament\Tables\Filters\SelectFilter::make('Site Owner')->relationship('site', 'name')->columnSpan(4),
            ])
            ->actions([
                Filament\Tables\Actions\EditAction::make(),
                Filament\Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Filament\Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListNavigations::route('/'),
            'create' => Pages\CreateNavigation::route('/create'),
            'edit' => Pages\EditNavigation::route('/{record}/edit'),
        ];
    }    
}
