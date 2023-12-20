<?php

namespace App\Filament\Resources\NavigationResource\Pages;

use App\Models\Navigation;
use App\Helpers\Formatting;
use Filament\Pages\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\NavigationResource;

class EditNavigation extends EditRecord
{
    protected static string $resource = NavigationResource::class;

    protected $parentSort = 0;
    protected $listMenu = [];

    protected function getRedirectUrl(): string 
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeFill(array $data): array {
        $navigations = Navigation::where('site_id',$data['id'])->orderBy('sort','asc')->get()->toArray();        
        $navigations = Formatting::navigationTree($navigations,0,'parent');
        $dataform['site_id'] = $data['id'];
        $dataform['subjects'] = $navigations;
        
        return $dataform; 
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        foreach ($data['subjects'] as $parentId => $subject) {
            $this->saveNavigationItem($data['site_id'], null, $subject,$this->parentSort);
            $this->parentSort++;
        }
        Navigation::whereNotIn('id', $this->listMenu)->where('site_id',$data['site_id'])->delete();
        return $data;
    }

    protected function getUpdatedNotification(): ? Notification
    {
        return Notification::make()
            ->success()
            ->title('Item Updated')
            ->body('Data has been updated successfully.');
    }

    protected function saveNavigationItem($siteId, $parentId=0, $item, $sort = 0)
    {
        //dd($item);
        $navigation = Navigation::find(@$item['id']);
        if(empty($navigation)){
            $navigation = new Navigation();
            $navigation->created_at = now();
            $navigation->created_by = auth()->user()->id;
        }else{
            $navigation->updated_at = now();
            $navigation->updated_by = auth()->user()->id;
        }

        $navigation->site_id = $siteId;
        $navigation->parent = $parentId===null ? 0 : $parentId;
        $navigation->name = $item['name'];
        $navigation->name_en = $item['name_en'];
        $navigation->sort = $parentId === 0 ? $this->parentSort : $sort;
        $navigation->link = $item['link'];
        $navigation->external_link = $item['external_link'];

        //dd($navigation);
        $navigation->save();
        $this->listMenu[] = $navigation->id;

        if (!empty($item['children'])) {
            $childSort = 0;
            foreach ($item['children'] as $child) {
                $this->saveNavigationItem($siteId, $navigation->id, $child, $childSort++);
            }
        }
    }
}
