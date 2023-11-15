<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\MInfobase;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Fieldset;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\ReplicateAction;
use App\Filament\Resources\MInfobaseResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MInfobaseResource\RelationManagers;

class MInfobaseResource extends Resource
{
    protected static ?string $model = MInfobase::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = "Site Management";

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationLabel = "Infobase";

    protected static ?string $modelLabel = 'Infobase Widget';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Site Owner')
                ->schema([
                    Forms\Components\Select::make('site_id')
                    ->relationship('site','name')
                    ->label("")
                    ->required()
                    ->columnSpanFull(),
                ]),
                Fieldset::make('Background Image')
                ->schema([
                    FileUpload::make('background')->label("")
                        ->disk('infobase')
                        ->image()
                        ->imageEditor()
                        ->columnSpanFull(),
                ]),
                Fieldset::make('Content')
                ->schema([
                    Forms\Components\TextInput::make('heading_1')
                    ->label('Heading 1 (ID)')
                    ->required()
                    ->maxLength(100),
                    Forms\Components\TextInput::make('heading_1_en')
                    ->label('Heading 1 (EN)')
                    ->required()
                    ->maxLength(100),
                    Forms\Components\TextInput::make('heading_2')
                    ->label('Heading 2 (ID)')
                    ->required()
                    ->maxLength(100),
                    Forms\Components\TextInput::make('heading_2_en')
                    ->label('Heading 2 (EN)')
                    ->required()
                    ->maxLength(100),
                    Forms\Components\Repeater::make('sections')
                    ->schema([
                        FileUpload::make('icon')->label("Upload Icon")
                        ->image()
                        ->imageEditor()
                        ->disk('infobase')->columnSpan(1),
                        Forms\Components\Textarea::make('svg')
                        ->label('SVG Resource')
                        ->rows(10),
                        Forms\Components\TextInput::make('description')
                        ->label('Description (ID)')
                        ->maxLength(100)
                        ->required(),
                        Forms\Components\TextInput::make('description_en')
                        ->label('Description (EN)')
                        ->maxLength(100)
                        ->required(),
                        Forms\Components\TextInput::make('link')
                        ->maxLength(100),
                        Forms\Components\TextInput::make('external_link')
                        ->maxLength(100),
                    ])
                    ->columns(2)
                    ->collapsed()
                    ->defaultItems(1)
                    ->collapsible()
                    ->columnSpanFull()
                    ->itemLabel(fn (array $state): ?string => $state['description'] ?? null),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('heading_1')
                ->label('Heading')
                    ->description(fn (MInfobase $record): string => $record->heading_1_en
                )
                ->searchable(),
                Tables\Columns\TextColumn::make('site.name')
                ->label('Site Owner')
                ->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('site')
                ->label("")
                ->relationship('site', 'name', fn (Builder $query) => $query->orderBy('id'))
                ->columnSpanFull(),
            ],layout: FiltersLayout::AboveContent)
            ->actions([
                ReplicateAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function(MInfobase $record){
                     // delete file
                     Storage::disk('infobase')->delete($record->background);    
                }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListMInfobases::route('/'),
            'create' => Pages\CreateMInfobase::route('/create'),
            'edit' => Pages\EditMInfobase::route('/{record}/edit'),
        ];
    }
}
