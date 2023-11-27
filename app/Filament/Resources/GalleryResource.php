<?php

namespace App\Filament\Resources;

use Filament;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use App\Models\MGallery;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Textarea;

use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\GalleryResource\Pages;

use Illuminate\Database\Eloquent\SoftDeletingScope;

class GalleryResource extends Resource
{
    protected static ?string $model = MGallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = "Galeri";

    protected static ?string $navigationLabel = "Photo & Video";

    protected static ?string $modelLabel = "Photo & Video";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Site Owner')
                ->schema([
                    Select::make('site')
                    ->preload()
                    ->relationship('site','name')
                    ->label('Site')
                    ->searchable()
                    ->columnSpanFull(),
                ]),
                Fieldset::make('Content')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('title')
                        ->label('Judul'),
                        TextInput::make('title_en')
                        ->label('Judul (EN)'),
                        Textarea::make('description')
                        ->label('Deskripsi'),
                        Textarea::make('description_en')
                        ->label('Deskripsi (EN)'),
                    ])
                ]),
                Fieldset::make('Media')
                ->schema([
                    Select::make('media_type')
                    ->options(['photo'=>'Photo','video'=>'Video'])
                    ->live()
                    ->columnSpanFull(),
                    FileUpload::make('media_photo')
                    ->disk('gallery_photo')
                    ->visible(fn (Get $get): bool => $get('media_type') == 'photo')
                    ->image()
                    ->imageEditor()
                    ->multiple()
                    ->reorderable()
                    ->columnSpanFull(),
                    FileUpload::make('media_video_thumb')
                    ->disk('gallery_video')
                    ->visible(fn (Get $get): bool => $get('media_type') == 'video')
                    ->columnSpanFull(),
                    FileUpload::make('media_video')
                    ->disk('gallery_video')
                    ->visible(fn (Get $get): bool => $get('media_type') == 'video')
                    ->multiple()
                    ->reorderable()
                    ->columnSpanFull()
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('media_type')
                ->label('Media')
                ->badge(),
                TextColumn::make('title')
            ])
            ->filters([
                //
            ])
            ->actions([
                Filament\Tables\Actions\ReplicateAction::make(),
                Filament\Tables\Actions\EditAction::make(),
                Filament\Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->defaultGroup('site.name');
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
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
