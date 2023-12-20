<?php

namespace App\Filament\Resources\AnnouncementResource\Pages;

use App\Helpers\Formatting;
use Filament\Pages\Actions;
use Illuminate\Support\Str;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\AnnouncementResource;

class CreateAnnouncement extends CreateRecord
{
    protected static string $resource = AnnouncementResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['slug'] = Formatting::makeUniqueSlug('m_post','slug','slug_en',Str::slug($data['title']));
        $data['slug_en'] = Formatting::makeUniqueSlug('m_post','slug','slug_en',Str::slug($data['title_en']));
        $data['thumbnail_meta'] = $data['title'];
        $data['thumbnail_meta_en'] = $data['title_en'];
        $data['created_by'] = auth()->user()->id;
        $data['created_at'] = now();
        return $data;
    }
}
