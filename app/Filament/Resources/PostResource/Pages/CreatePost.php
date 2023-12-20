<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Helpers\Formatting;
use Filament\Pages\Actions;
use App\Filament\Resources\PostResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['slug'] = Formatting::makeUniqueSlug('m_post','slug',$data['slug']);
        $data['slug_en'] = Formatting::makeUniqueSlug('m_post','slug_en',$data['slug_en']);
        $data['created_by'] = auth()->id();
        $data['created_at'] = now();
        $data['thumbnail_meta'] = $data['title'];
        $data['thumbnail_meta_en'] = $data['title_en'];
 
        return $data;
    }
}
