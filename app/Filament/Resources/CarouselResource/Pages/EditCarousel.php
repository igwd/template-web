<?php

namespace App\Filament\Resources\CarouselResource\Pages;

use Filament\Pages\Actions;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\CarouselResource;
use Illuminate\Support\Facades\Storage;

class EditCarousel extends EditRecord
{
    protected static string $resource = CarouselResource::class;

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $data['updated_by'] = auth()->id();
        $data['updated_at'] = now();
        /* if($data['bgimage']){
            $oldbg = $record->bgimage;
            Storage::disk('carousel')->delete($oldbg);
        } */
        /* $data['thumbnail_meta'] = $data['title'];
        $data['thumbnail_meta_en'] = $data['title_en']; */
        $record->update($data);
        return $record;
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['sections'] = json_decode($data['sections'],true);
        return $data;
    }
}
