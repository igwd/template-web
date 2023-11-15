<?php

namespace App\Http\Livewire\Component\Front\Info;

use App\Helpers\Formatting;
use App\Models\MInfoBase;
use App\Models\Site;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class InfoBase extends Component
{
    public $infobase = [];
    public $lang;

    public function mount(){
        $this->lang = Formatting::getLang();
        $this->infobase = MInfoBase::id()->whereHas('site', function ($query) {
            $query->where('is_main_site', 1);
        })->first()->toArray();
        
        $this->infobase['sections'] = json_decode($this->infobase['sections'],true);

        $this->infobase['sections'] = array_map(function ($section) {
            unset($section['description_en']);
            return $section;
        }, $this->infobase['sections']);
        
        if($this->lang == 'en'){
            $this->infobase = MInfoBase::en()->whereHas('site', function ($query) {
                $query->where('is_main_site', 1);
            })->first()->toArray();

            $this->infobase['sections'] = json_decode($this->infobase['sections'],true);

            $this->infobase['sections'] = array_map(function ($section) {
                $section['description'] = $section['description_en'];
                unset($section['description_en']);
                return $section;
            }, $this->infobase['sections']);
        }
        $this->infobase['background'] = Storage::disk('infobase')->url($this->infobase['background']);

    }

    public function render()
    {
        return view('livewire.component.front.info.info-base');
    }
}
