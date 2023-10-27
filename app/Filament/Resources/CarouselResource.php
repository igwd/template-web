<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Site;
use Filament\Tables;
use App\Models\MCarousel;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CarouselResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CarouselResource\RelationManagers;

class CarouselResource extends Resource
{
    protected static ?string $model = MCarousel::class;

    protected static ?string $navigationGroup = "Site Management";

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Carousels';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('heading_sm')
                    ->maxLength(100),
                Forms\Components\TextInput::make('heading_lg')
                    ->maxLength(100),
                Forms\Components\TextInput::make('heading_md')
                    ->maxLength(100),
                Forms\Components\MarkdownEditor::make('description')
                    ->columnSpanFull()
                    ->disableToolbarButtons([
                        'attachFiles',
                    ]),
                Forms\Components\FileUpload::make('bgimage')
                    ->label('Background')
                    ->disk('carousel')
                    ->columnSpanFull(),
                Forms\Components\Select::make('site_id')
                ->label('Site')
                ->options(Site::all()->pluck('name', 'id'))
                ->searchable()
                ->columnSpanFull(),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('bgimage')->disk('carousel')->size(100)->label("Image"),
                Tables\Columns\ViewColumn::make('description')->view('tables.columns.carousel')->sortable(),
                Tables\Columns\TextColumn::make('sectionOwner.name')->label('Site Owner'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListCarousels::route('/'),
            'create' => Pages\CreateCarousel::route('/create'),
            'edit' => Pages\EditCarousel::route('/{record}/edit'),
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
