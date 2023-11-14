<?php

namespace App\Filament\Resources\PostResource\Pages;

use Filament\Pages\Actions;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\PostResource;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $data['updated_by'] = auth()->id();
        $data['updated_at'] = now();
        $data['thumbnail_meta'] = $data['title'];
        $data['thumbnail_meta_en'] = $data['title_en'];
        $record->update($data);
        return $record;
    }
}
