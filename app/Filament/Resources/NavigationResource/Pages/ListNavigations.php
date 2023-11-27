<?php

namespace App\Filament\Resources\NavigationResource\Pages;

use Filament\Forms\Form;
use App\Models\Navigation;
use App\Helpers\Formatting;
use Filament\Actions\CreateAction;
use Illuminate\Support\Facades\View;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\NavigationResource;

class ListNavigations extends ListRecords
{
    protected static string $resource = NavigationResource::class;

    //protected static string $view = 'filament.resources.navigation-resource.pages.navigation-page';

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
