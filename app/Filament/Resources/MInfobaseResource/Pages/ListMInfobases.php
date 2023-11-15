<?php

namespace App\Filament\Resources\MInfobaseResource\Pages;

use App\Filament\Resources\MInfobaseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMInfobases extends ListRecords
{
    protected static string $resource = MInfobaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
