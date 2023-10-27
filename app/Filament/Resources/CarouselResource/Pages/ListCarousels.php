<?php

namespace App\Filament\Resources\CarouselResource\Pages;

use App\Filament\Resources\CarouselResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarousels extends ListRecords
{
    protected static string $resource = CarouselResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
