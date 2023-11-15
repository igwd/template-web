<?php

namespace App\Filament\Resources;

use Filament;
use App\Models\Site;

use App\Models\Widget;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;

use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Actions\Action;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SiteManagementResource\Pages;
use App\Filament\Resources\SiteManagementResource\RelationManagers;

class SiteManagementResource extends Resource
{
    protected static ?string $model = Site::class;

    protected static ?string $navigationGroup = "Site Management";

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';

    protected static ?string $navigationLabel = "Website";
    
    protected static ?string $modelLabel = "Website";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Settings')
                ->description('General configuration for Site Management')
                ->schema([
                    TextInput::make('name')->label('Site Name')
                    ->live()
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->required(),
                    TextInput::make('slug')->label('Slug URL')
                    ->prefix('../site/'),
                    Toggle::make('is_main_site')->label("Set As Main Website")
                    ->onIcon('heroicon-m-bolt')
                    ->inline(false)
                ])->columns(3),
                Section::make('Header')
                ->description('Header configuration for Site Management')
                ->schema([
                    Fieldset::make('Logo')
                    ->schema([
                        FileUpload::make('logo')->label("Website")
                        ->image()
                        ->imageEditor(),
                        FileUpload::make('logo_1')
                        ->label('Header 1')
                        ->image()
                        ->imageEditor(),
                        FileUpload::make('logo_2')
                        ->label('Header 2')
                        ->image()
                        ->imageEditor(),
                    ])->columns(3),
                    TextInput::make('header')
                    ->label('Header Title')
                    ->required(),
                    TextInput::make('header_en')
                    ->label('Header Title (EN)')
                    ->required(),
                    TextInput::make('sub_header')
                    ->label('Sub Header')
                    ->required(),
                    TextInput::make('sub_header_en')
                    ->label('Sub Header (EN)')
                    ->required(),
                ])->columns(2),
                Section::make('Sections')
                ->description('Section content configuration for Site Management')
                ->schema([
                    Repeater::make('sections')->label("")
                    ->schema([
                        Select::make('section')
                        ->label('Widget')
                        ->options(Widget::all()->pluck('name', 'component'))
                        ->searchable()
                    ])->defaultItems(1)
                    ->collapsible()
                    ->columnSpanFull()
                    ->itemLabel(fn (array $state): ?string => Widget::where('component',$state['section'])->first()->name ?? null)
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Filament\Tables\Columns\TextColumn::make('name')
                ->description(fn (Site $record): string => $record->is_main_site ? 'Website Utama' : ''),
                Filament\Tables\Columns\ToggleColumn::make('is_main_site')
                ->label('Main Site'),
                Filament\Tables\Columns\ToggleColumn::make('is_active')
                ->label('Active'),
            ])
            ->filters([
                Filament\Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Filament\Tables\Actions\ReplicateAction::make(),
                Filament\Tables\Actions\EditAction::make(),
                Filament\Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Filament\Tables\Actions\DeleteBulkAction::make(),
                Filament\Tables\Actions\ForceDeleteBulkAction::make(),
                Filament\Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListSiteManagement::route('/'),
            'create' => Pages\CreateSiteManagement::route('/create'),
            'edit' => Pages\EditSiteManagement::route('/{record}/edit'),
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
