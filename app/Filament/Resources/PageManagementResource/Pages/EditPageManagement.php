<?php

namespace App\Filament\Resources\PageManagementResource\Pages;

use App\Filament\Resources\PageManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPageManagement extends EditRecord
{
    protected static string $resource = PageManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
