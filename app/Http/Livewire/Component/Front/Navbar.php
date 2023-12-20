<?php

namespace App\Http\Livewire\Component\Front;

use App\Models\Site;
use Livewire\Component;
use App\Models\Navigation;
use App\Helpers\Formatting;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Cookie;

class Navbar extends Component
{
    public $navbars = [];
    public $lang;
    public $site;

    public function mount($slug=null){
        $this->lang = Cookie::get('language', 'id');
        $this->site = Site::id()->where(function($query) use ($slug){
            if (!empty($slug)) {
                $query->where('slug',$slug);
            }else{
                $query->where('is_main_site',1);
            }
        })->first();

        if(empty($this->site->id)){
            return abort('404');
        }
        
        $this->site = $this->site->toArray();
        
        $data = Navigation::whereHas('site', function ($query) use ($slug) {
            if(!empty($slug)){
                $query->where('slug', $slug);
            }else{
                $query->where('is_main_site', 1);
            }
        })->orderBy('sort','asc')->get()->toArray();

        $this->navbars = Formatting::generateTree($data,0,"parent");
        
        if($this->lang == 'en'){
            $this->site = Site::en()->where(function($query) use ($slug){
                if (!empty($slug)) {
                    $query->where('slug',$slug);
                }else{
                    $query->where('is_main_site',1);
                }
            })->first()->toArray();

            $data = Navigation::en()->whereHas('site', function ($query) use ($slug) {
                if(!empty($slug)){
                    $query->where('slug', $slug);
                }else{
                    $query->where('is_main_site', 1);
                }
            })->orderBy('sort','asc')->get()->toArray();
            
            $this->navbars = Formatting::generateTree($data,0,"parent");
        }
    }

    public function render()
    {
        return view('livewire.component.front.navbar');
    }
}
