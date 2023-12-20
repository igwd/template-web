<?php

namespace App\Filament\Resources;


use App\Models\Post;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\MAnnouncement;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Forms\Components\FileUpload;
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

    protected static ?string $navigationGroup = "Posting";

    protected static ?string $navigationLabel = "Pengumuman";

    protected static ?string $modelLabel = "Pengumuman";

    protected static ?int $navigationSort = 2;

    public static function getNavigationBadge(): ?string {
        return Post::where('category_id','2')->get()->count();
    }

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
                Fieldset::make('Published')
                ->schema([
                    Select::make('site_id')
                    ->preload()
                    ->relationship('site','name')
                    ->label('')
                    ->searchable(),
                    DateTimePicker::make('published_at')
                    ->label('')
                    ->required()
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(MAnnouncement::where('category_id',2))
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
                Tables\Filters\SelectFilter::make('site')
                ->label("")
                ->relationship('site', 'name', fn (Builder $query) => $query->where('id','<>',0)->orderBy('id')),
                Tables\Filters\TrashedFilter::make()
                ->label(''),
            ],layout: FiltersLayout::AboveContent)->filtersFormColumns(2)
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
            'create' => Pages\CreateAnnouncement::route('/create'),
            'edit' => Pages\EditAnnouncement::route('/{record}/edit'),
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
