<?php

namespace App\Http\Livewire\Component\Front;

use Livewire\Component;

class Homepage extends Component
{
    public $lang;

    public function mount($lang){
        $this->lang = $lang;
    }
    
    public function render()
    {
        return view('livewire.component.front.homepage',['lang'=>$this->lang]);
    }
}
