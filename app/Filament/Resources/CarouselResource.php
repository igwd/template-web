<?php

namespace App\Filament\Resources;

use Filament;
use App\Models\Site;

use Filament\Forms\Form;
use App\Models\MCarousel;
use Filament\Tables\Table;
use Filament\Resources\Resource;

use Filament\Forms\Components\Fieldset;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Enums\FiltersLayout;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CarouselResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CarouselResource\RelationManagers;

class CarouselResource extends Resource
{
    protected static ?string $model = MCarousel::class;

    protected static ?string $navigationGroup = "Site Management";

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Carousels';

    protected static ?string $modelLabel = 'Carousels Widget';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Filament\Forms\Components\TextInput::make('heading_sm')
                    ->maxLength(100),
                Filament\Forms\Components\TextInput::make('heading_lg')
                    ->maxLength(100),
                Filament\Forms\Components\TextInput::make('heading_md')
                    ->maxLength(100),
                Filament\Forms\Components\MarkdownEditor::make('description')
                    ->columnSpanFull()
                    ->disableToolbarButtons([
                        'attachFiles',
                    ]),
                Filament\Forms\Components\FileUpload::make('bgimage')
                ->label('Background')
                ->disk('carousel')
                ->image()
                ->imageEditor()
                ->columnSpanFull(),
                Fieldset::make('Site Owner')
                ->schema([
                    Filament\Forms\Components\Select::make('site')
                    ->relationship('site','name')
                    ->label('Site')
                    ->searchable()
                    ->columnSpanFull(),
                ])
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Filament\Tables\Columns\ImageColumn::make('bgimage')->disk('carousel')->size(100)->label("Image"),
                Filament\Tables\Columns\ViewColumn::make('description')->view('tables.columns.carousel')->sortable(),
            ])
            ->filters([
                Filament\Tables\Filters\SelectFilter::make('Site Owner')->relationship('site', 'name')->columnSpan(1),
            ],layout: FiltersLayout::AboveContent)
            ->actions([
                Filament\Tables\Actions\ReplicateAction::make(),
                Filament\Tables\Actions\EditAction::make(),
                Filament\Tables\Actions\DeleteAction::make()
                    ->before(function(MCarousel $record){
                     // delete file
                     Storage::disk('carousel')->delete($record->bgimage);    
                }),
            ])
            ->bulkActions([
                Filament\Tables\Actions\DeleteBulkAction::make(),
                Filament\Tables\Actions\ForceDeleteBulkAction::make(),
                Filament\Tables\Actions\RestoreBulkAction::make(),
            ]);
    }

    protected function getTableFiltersFormWidth(): string{
        return '4xl';
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
