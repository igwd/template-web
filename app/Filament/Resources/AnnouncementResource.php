<?php

namespace App\Filament\Resources;


use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\MAnnouncement;
use Filament\Forms\Components\Fieldset;
use Filament\Resources\Resource;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\MarkdownEditor;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AnnouncementResource\Pages;
use App\Filament\Resources\AnnouncementResource\RelationManagers;

class AnnouncementResource extends Resource
{
    protected static ?string $model = MAnnouncement::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?string $navigationGroup = "Berita & Pengumuman";

    protected static ?string $navigationLabel = "Pengumuman";

    protected static ?string $modelLabel = "Pengumuman";

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Thumbnail')
                ->schema([
                    FileUpload::make('thumbnail')
                        ->label('Photo')
                        ->disk('announcement')
                        ->columnSpanFull(),
                ]),
                TextInput::make('title')->label('Judul')
                    ->maxLength(255),
                TextInput::make('title_en')->label('Judul (en)')
                    ->maxLength(255),
                MarkdownEditor::make('content')
                ->disableToolbarButtons(['attachFiles'])
                ->columnSpanFull(),
                MarkdownEditor::make('content_en')
                ->disableToolbarButtons(['attachFiles'])
                ->columnSpanFull()
                ->label('Content (en)'),
                Fieldset::make('Attachment')
                ->schema([
                    FileUpload::make('attachment')
                    ->label('Upload Files')
                    ->disk('announcement')
                    ->multiple()
                    ->downloadable()
                    ->columnSpanFull(),
                ]),
                DateTimePicker::make('published_at')
                ->default(now())
                ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->description(fn (MAnnouncement $record): string => Str::words($record->content,8,"..."))
                    ->wrap()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ViewColumn::make('attachment')
                ->view('tables.columns.multiple-uploads'),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                /* Tables\Actions\ViewAction::make(), */
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageAnnouncements::route('/'),
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
