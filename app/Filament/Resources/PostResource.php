<?php

namespace App\Filament\Resources;

use Closure;
use Filament;

use App\Models\Post;
use Filament\Tables;
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
                                ->afterStateUpdated(function (Closure $get, Closure $set, ?string $state) {
                                    if (! $get('is_slug_changed_manually') && filled($state)) {
                                        $set('slug', Str::slug($state));
                                    }
                                })
                                ->reactive()
                                ->columnSpanFull()
                                ->required(),
                            TextInput::make('slug')
                                ->afterStateUpdated(function (Closure $get, Closure $set) {
                                    if (!$get('is_slug_changed_manually')) {
                                        // Generate slug from title if it hasn't been changed manually
                                        $title = $get('title');
                                        if (filled($title)) {
                                            $set('slug', Str::slug($title));
                                        }
                                    }
                                })
                                ->prefix('site/')
                                ->required(),
                            RichEditor::make('content')
                                ->label('Berita')
                                ->columnSpanFull()
                                ->required(),
                            TagsInput::make('tags')
                                ->label(fn()=> new HtmlString('Tags'))
                                ->placeholder('')
                                ->helperText('<small class="text-red-700">*) pisahkan dengan tanda (koma)</small>')
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
                                ->afterStateUpdated(function (Closure $get, Closure $set, ?string $state) {
                                    if (! $get('is_slug_changed_manually') && filled($state)) {
                                        $set('slug_en', Str::slug($state));
                                    }
                                })
                                ->reactive()
                                ->columnSpanFull()
                                ->required(),
                            TextInput::make('slug_en')
                                ->label('Slug (en)')
                                ->afterStateUpdated(function (Closure $get, Closure $set) {
                                    if (!$get('is_slug_changed_manually')) {
                                        // Generate slug from title if it hasn't been changed manually
                                        $title = $get('title_en');
                                        if (filled($title)) {
                                            $set('slug_en', Str::slug($title));
                                        }
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
                                ->helperText('<small class="text-red-700">*) separate with a comma</small>')
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
                    ->description(fn (Post $record): string => Str::words($record->content,8,"..."))
                    ->wrap()
                    ->searchable()
                    ->sortable(),
                ViewColumn::make('tags')->view('tables.columns.tags')->sortable(),
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
