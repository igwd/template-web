<?php

namespace App\Filament\Resources\PageManagementResource\Pages;

use App\Filament\Resources\PageManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPageManagement extends ListRecords
{
    protected static string $resource = PageManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
