<?php

namespace App\Filament\Resources\AnnouncementResource\Pages;

use App\Helpers\Formatting;
use Filament\Pages\Actions;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\AnnouncementResource;

class EditAnnouncement extends EditRecord
{
    protected static string $resource = AnnouncementResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model{
        $data['slug'] = Formatting::makeUniqueSlug('m_post','slug',Str::slug($data['title']),$record->id);
        $data['slug_en'] = Formatting::makeUniqueSlug('m_post','slug_en',Str::slug($data['title_en']),$record->id);
        $data['updated_by'] = auth()->id();
        $data['updated_at'] = now();
        $data['thumbnail_meta'] = $data['title'];
        $data['thumbnail_meta_en'] = $data['title_en'];
        $record->update($data);
        return $record;
    }
}
