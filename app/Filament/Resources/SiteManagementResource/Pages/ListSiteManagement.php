<?php

namespace App\Filament\Resources\SiteManagementResource\Pages;

use App\Filament\Resources\SiteManagementResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSiteManagement extends ListRecords
{
    protected static string $resource = SiteManagementResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
