<?php

namespace App\Filament\Resources\MInfobaseResource\Pages;

use Filament\Actions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\MInfobaseResource;

class EditMInfobase extends EditRecord
{
    protected static string $resource = MInfobaseResource::class;

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
        if($data['background']){
            $oldbg = $record->background;
            Storage::disk('infobase')->delete($oldbg);
        }
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

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
