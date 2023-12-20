<?php

namespace App\Filament\Resources\NavigationResource\Pages;

use Filament\Pages\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\NavigationResource;
use App\Models\Navigation;

class CreateNavigation extends CreateRecord
{
    protected static string $resource = NavigationResource::class;

    protected function getRedirectUrl(): string 
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $site_id = $data['site_id'];
        $navigations = $data['subjects'];
        dd($data);
        foreach($navigations as $row => $value){
            $menu = new Navigation();
            
        }
    }

    protected function getCreatedNotification(): ? Notification
    {
        return Notification::make()
            ->success()
            ->title('Item Created')
            ->body('Data has been created successfully.');
    }
}
