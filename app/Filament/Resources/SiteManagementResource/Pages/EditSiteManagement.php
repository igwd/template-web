<?php

namespace App\Filament\Resources\SiteManagementResource\Pages;

use App\Filament\Resources\SiteManagementResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSiteManagement extends EditRecord
{
    protected static string $resource = SiteManagementResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
