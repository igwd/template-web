<?php

namespace App\Http\Livewire\Component\Front\Gallery;

use Livewire\Component;
use App\Helpers\Formatting;
use App\Models\MGallery;

class GalleryBase extends Component
{
    public $slug;
    public $photos;
    public $displayed;
    public $newsUpdate;
    public $perPage = 6;
    public $currentPage = 1;
    
    public function mount($slug=null, $show=null){
        $lang = Formatting::getLang();
        $this->slug = $slug;
    }

    public function render()
    {
        $site_slug = $this->slug;
        $start = ($this->currentPage - 1) * $this->perPage;
        if(Formatting::getLang() == 'en'){
            $data = MGallery::en()->whereHas('site',function($query) use ($site_slug){
                if(!empty($site_slug)){
                    $query->where('slug',$site_slug);
                }else{
                    $query->where('is_main_site',1);
                }
            })
            ->whereNotNull('published_at')
            ->orWhere('site_id',0)
            ->where('media_type','photo')
            ->skip($start)
            ->take($this->perPage)
            ->orderBy('published_at','desc')
            ->get();
        }else{
            $data = MGallery::id()->whereHas('site',function($query) use ($site_slug){
                if(!empty($site_slug)){
                    $query->where('slug',$site_slug);
                }else{
                    $query->where('is_main_site',1);
                }
            })
            ->whereNotNull('published_at')
            ->orWhere('site_id',0)
            ->where('media_type','photo')
            ->skip($start)
            ->take($this->perPage)
            ->orderBy('published_at','desc')
            ->get();
        }
        
        $this->photos = $data;
        return view('livewire.component.front.gallery.gallery-base',['photos'=>$this->photos]);
    }

    public function next(){
        $this->currentPage++;
    }

    public function prev()
    {
        if ($this->currentPage > 1) {
            $this->currentPage--;
        }
    }
}
