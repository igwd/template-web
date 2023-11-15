<?php

namespace App\Filament\Resources;

use Filament;
use App\Models\Site;

use Filament\Forms\Form;
use App\Models\MCarousel;
use Filament\Tables\Table;
use Filament\Resources\Resource;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Enums\FiltersLayout;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CarouselResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CarouselResource\RelationManagers;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;

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
                Filament\Forms\Components\TextInput::make('heading_sm_en')
                ->maxLength(100)
                ->label('Heading sm (EN)'),
                Filament\Forms\Components\TextInput::make('heading_lg_en')
                ->maxLength(100)
                ->label('Heading lg (EN)'),
                Filament\Forms\Components\TextInput::make('heading_md_en')
                ->label('Heading md (EN)')
                ->maxLength(100),
                Filament\Forms\Components\MarkdownEditor::make('description')
                ->columnSpanFull()
                ->disableToolbarButtons([
                    'attachFiles',
                ]),
                Filament\Forms\Components\MarkdownEditor::make('description_en')
                ->columnSpanFull()
                ->label("Description (EN)")
                ->disableToolbarButtons([
                    'attachFiles',
                ]),
                Filament\Forms\Components\FileUpload::make('bgimage')
                ->label('Background')
                ->disk('carousel')
                ->image()
                ->imageEditor()
                ->columnSpanFull(),
                Section::make('Footer Carousel Section')->schema([
                    Repeater::make('sections')
                    ->label("")
                    ->schema([
                        TextInput::make('label')->required(),
                        TextInput::make('label_en')->required(),
                        TextInput::make('link_section')->required(),
                    ])->columns(3)
                    ->itemLabel(fn (array $state): ?string => $state['label'] ?? null)
                ]),
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
                Filament\Tables\Filters\SelectFilter::make('Site Owner')
                ->relationship('site', 'name', fn (Builder $query) => $query->orderBy('id'))
                ->columnSpanFull(),
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
            ])/* ->groups([
                'site.name'
            ])->defaultGroup('site.name') */;
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
