<?php

namespace App\Filament\Resources\CarouselResource\Pages;

use App\Filament\Resources\CarouselResource;
use App\Models\MCarousel;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCarousel extends CreateRecord
{
    protected static string $resource = CarouselResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if(empty($data['sections'])){
            $data['sections'] = null;
        }
        $data['sort'] = MCarousel::where('site_id',$data['site'])->max('sort')+1;
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
