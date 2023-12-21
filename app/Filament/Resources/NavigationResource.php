<?php

namespace App\Filament\Resources;

use Filament;
use App\Models\Site;
use Filament\Forms\Form;
use App\Models\Navigation;

use Filament\Tables\Table;
use Illuminate\Support\Carbon;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Actions\Action;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\NavigationResource\Pages;
use App\Filament\Resources\NavigationResource\RelationManagers;
use Saade\FilamentAdjacencyList\Forms\Components\AdjacencyList;

class NavigationResource extends Resource
{
    protected static ?string $model = Site::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = "Site Management";

    protected static ?string $modelLabel = 'Navigation';

    protected static ?int $navigationSort = 2;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Navigation')
                ->description('Navigation Menu for Site Management')
                ->schema([
                    Filament\Forms\Components\Select::make('site_id')
                    ->label('Site')
                    ->options(Site::all()->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
                    AdjacencyList::make('subjects')
                    ->label('')
                    ->form([
                        Grid::make(2)->schema([
                            Filament\Forms\Components\TextInput::make('name')
                                ->maxLength(100)->required(),
                            Filament\Forms\Components\TextInput::make('name_en')
                                ->maxLength(100)->required(),
                            Filament\Forms\Components\TextInput::make('link')->required()
                                ->maxLength(255),
                            Filament\Forms\Components\TextInput::make('external_link')
                                ->maxLength(255)
                        ])
                    ])
                    ->labelKey('name')
                    ->addAction(fn (Action $action): Action => $action->icon('heroicon-o-plus')->color('primary')->label('Add Menu Item'))
                    ->deleteAction(fn (Action $action): Action => $action->requiresConfirmation())
                    ->maxDepth(3)
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(Site::where('id','<>',0))
            ->columns([
                TextColumn::make('name')->label('Site')->searchable(),
                TextColumn::make('created_at')->since(),
            ])
            ->filters([
                
            ],layout: FiltersLayout::AboveContent)
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ])
            ->reorderable('sort');
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
