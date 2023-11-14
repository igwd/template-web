<?php

namespace App\Http\Livewire\Component\Front;

use App\Models\Site;
use Livewire\Component;

class SiteComponent extends Component
{
    public $site;

    public function mount($slug){
        $this->site = Site::where('slug',$slug)->first();        
    }

    public function render()
    {
        return view('livewire.component.front.site');
    }
}
