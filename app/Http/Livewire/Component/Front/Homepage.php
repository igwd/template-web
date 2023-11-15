<?php

namespace App\Http\Livewire\Component\Front;

use App\Models\Site;
use Livewire\Component;
use App\Helpers\Formatting;

class Homepage extends Component
{
    public $lang;
    public $site;

    public function mount($slug=null){
        $this->lang = Formatting::getLang();
        $this->site = Site::where(function($query) use ($slug){
            if (!empty($slug)) {
                $query->where('slug',$slug);
            }else{
                $query->where('is_main_site',1);
            }
            $query->where('is_active',1);
        })->first();
        if(empty($this->site->id)){
            return abort('404');
        }
        $this->site = $this->site->toArray();       
        $this->site['sections'] = json_decode($this->site['sections'],true); 
    }
    
    public function render()
    {
        return view('livewire.component.front.homepage');
    }
}
