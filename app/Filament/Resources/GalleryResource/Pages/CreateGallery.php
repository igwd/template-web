<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\GalleryResource;

class CreateGallery extends CreateRecord
{
    protected static string $resource = GalleryResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = auth()->id();
        $data['created_at'] = now();
        $data['slug'] = Str::slug($data['title']);
        $data['thumbnail_meta_en'] = $data['title_en'];
        $data['site_id'] = empty($data['site']) ? 0 : $data['site'];
        $data['published_at'] = now();
        return $data;
    }

    protected function getRedirectUrl(): string 
    {
        return $this->getResource()::getUrl('index');
    }
}
