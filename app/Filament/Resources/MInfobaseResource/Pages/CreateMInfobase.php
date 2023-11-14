<?php

namespace App\Filament\Resources\MInfobaseResource\Pages;

use App\Filament\Resources\MInfobaseResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMInfobase extends CreateRecord
{
    protected static string $resource = MInfobaseResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
