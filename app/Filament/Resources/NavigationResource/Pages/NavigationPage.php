<?php

namespace App\Filament\Resources\NavigationResource\Pages;

use App\Models\Navigation;
use Filament\Tables\Table;
use App\Helpers\Formatting;
use Filament\Resources\Pages\Page;
use Filament\Tables\Actions\Action;
use Filament\Forms\Contracts\HasForms;
use App\Filament\Resources\NavigationResource;
use Filament\Tables\Contracts\HasTable;

class NavigationPage extends Page
{
    protected static string $resource = NavigationResource::class;

    protected static string $view = 'filament.resources.navigation-resource.pages.navigation-page';

    public $navigations = [];
    //
    public function mount(): void
    {
        $this->navigations = Formatting::generateTree(Navigation::all()->toArray(),0,'parent');
        //dd($this->navigations);
    }
}
