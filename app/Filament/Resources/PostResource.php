<?php

namespace App\Filament\Resources;

use Closure;
use Filament;

use App\Models\Post;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Filament\Resources\Resource;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\PostResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Helpers\Formatting;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = "Berita & Pengumuman";

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = "Berita";

    public static function getNavigationBadge(): ?string {
        return Post::get()->count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Label')
                ->tabs([
                    Tabs\Tab::make('Indonesia (ID)')
                    ->schema([
                        Fieldset::make('Content')
                        ->schema([
                            TextInput::make('title')
                            ->label('Judul')
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->columnSpanFull()
                            ->required(),
                            TextInput::make('slug')
                            ->columnSpanFull()
                            ->required(),
                            RichEditor::make('content')
                            ->label('Berita')
                            ->columnSpanFull()
                            ->required(),
                            TagsInput::make('tags')
                            ->placeholder('')
                            ->helperText(new HtmlString('<small class="text-red-700">*) pisahkan dengan tanda (koma)</small>'))
                            ->separator(','),
                            DateTimePicker::make('published_at')
                            ->required()
                        ])->columnSpanFull()
                    ]),
                    Tabs\Tab::make('English (EN)')
                    ->schema([
                        Fieldset::make('Content')
                        ->schema([
                            TextInput::make('title_en')
                            ->label('Title')
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug_en', Str::slug($state)))
                            ->live(onBlur: true)
                            ->columnSpanFull()
                            ->required(),
                            TextInput::make('slug_en')
                            ->label('Slug (en)')
                            ->afterStateUpdated(function (Closure $get, Closure $set) {
                                $title = $get('title_en');
                                if (filled($title)) {
                                    $set('slug_en', Str::slug($title));
                                }
                            })
                            ->required(),
                            RichEditor::make('content_en')
                            ->label('News')
                            ->columnSpanFull()
                            ->required(),
                            TagsInput::make('tags_en')
                            ->label('Tags')
                            ->placeholder('')
                            ->helperText(new HtmlString('<small class="text-red-700">*) pisahkan dengan tanda (koma)</small>'))
                            ->separator(',')
                            ->columnSpanFull(),
                        ])->columnSpanFull()
                    ]),
                ])->columnSpanFull(),
                Fieldset::make('Thumbnail')
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->label('Photo')
                            ->disk('news')
                            ->getUploadedFileNameForStorageUsing(
                                fn (TemporaryUploadedFile $file, Get $get): string => (string) $get('slug').".".$file->getClientOriginalExtension()        
                            )
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')->disk('news'),
                TextColumn::make('title')
                ->description(fn (Post $record): string => Formatting::limitWords($record->content,8,"..."))
                ->wrap()
                ->searchable()
                ->sortable(),
                TextColumn::make('tags')
                ->badge()
                ->separator(',')
                ->sortable(),
                TextColumn::make('user_created.name')
                ->searchable()
                ->sortable()
                ->label('Created By')
                ->description(
                    fn (Post $record): string => Carbon::parse($record->created_at)->diffForHumans()
                )
                ->searchable()
                ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
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
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
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
