<?php

namespace App\Filament\Resources;


use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\Announcement;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AnnouncementResource\Pages;
use App\Filament\Resources\AnnouncementResource\RelationManagers;

class AnnouncementResource extends Resource
{
    protected static ?string $model = Announcement::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?string $navigationGroup = "Berita & Pengumuman";

    protected static ?string $navigationLabel = "Pengumuman";

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Thumbnail')
                ->schema([
                    Forms\Components\FileUpload::make('thumbnail')
                        ->label('Photo')
                        ->disk('announcement')
                        ->columnSpanFull(),
                ]),
                Forms\Components\TextInput::make('title')->label('Judul')
                    ->maxLength(255),
                Forms\Components\TextInput::make('title_en')->label('Judul (en)')
                    ->maxLength(255),
                Forms\Components\MarkdownEditor::make('content')
                ->disableToolbarButtons(['attachFiles'])
                ->columnSpanFull(),
                Forms\Components\MarkdownEditor::make('content_en')
                ->disableToolbarButtons(['attachFiles'])
                ->columnSpanFull()
                ->label('Content (en)'),
                Forms\Components\Fieldset::make('Attachment')
                ->schema([
                    Forms\Components\FileUpload::make('attachment')
                    ->label('Upload Files')
                    ->disk('announcement')
                    ->multiple()
                    ->enableDownload()
                    ->columnSpanFull(),
                ]),
                Forms\Components\DateTimePicker::make('published_at')
                ->default(now())
                ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->description(fn (Announcement $record): string => Str::words($record->content,8,"..."))
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
                Tables\Actions\ViewAction::make(),
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
