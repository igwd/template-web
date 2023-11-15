<?php

namespace App\Filament\Resources\SiteManagementResource\Pages;

use App\Models\Site;
use Filament\Pages\Actions;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\SiteManagementResource;

class EditSiteManagement extends EditRecord
{
    protected static string $resource = SiteManagementResource::class;

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $data['updated_by'] = auth()->id();
        $data['updated_at'] = now();
        if($data['is_main_site']){
            Site::where('id','<>',$record->id)->update(['is_main_site'=>0]);
            $data['is_main_site'] = 1;
        }
        //dd($data);
        $record->update($data);
        return $record;
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['sections'] = json_decode($data['sections'],true);
        return $data;
    }

}
