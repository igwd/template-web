<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\GalleryResource;

class EditGallery extends EditRecord
{
    protected static string $resource = GalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $data['updated_by'] = auth()->id();
        $data['updated_at'] = now();
        $data['slug'] = Str::slug($data['title']);
        $data['site_id'] = empty($data['site']) ? 0 : $data['site'];
        $record->update($data);
        return $record;
    }

    protected function getRedirectUrl(): string 
    {
        return $this->getResource()::getUrl('index');
    }
}
