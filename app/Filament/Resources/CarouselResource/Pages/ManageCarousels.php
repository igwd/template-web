<?php

namespace App\Filament\Resources\CarouselResource\Pages;

use App\Filament\Resources\CarouselResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCarousels extends ManageRecords
{
    protected static string $resource = CarouselResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
