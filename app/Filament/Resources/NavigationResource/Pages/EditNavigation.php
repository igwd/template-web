<?php

namespace App\Filament\Resources\NavigationResource\Pages;

use Filament\Pages\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\NavigationResource;

class EditNavigation extends EditRecord
{
    protected static string $resource = NavigationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string 
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getUpdatedNotification(): ? Notification
    {
        return Notification::make()
            ->success()
            ->title('Item Updated')
            ->body('Data has been updated successfully.');
    }
}
