<?php

namespace App\Filament\Resources\NavigationResource\Pages;

use Filament\Pages\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\NavigationResource;

class CreateNavigation extends CreateRecord
{
    protected static string $resource = NavigationResource::class;

    protected function getRedirectUrl(): string 
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ? Notification
    {
        return Notification::make()
            ->success()
            ->title('Item Created')
            ->body('Data has been created successfully.');
    }
}
