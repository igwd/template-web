<?php

namespace App\Http\Livewire\Component\Front\VideoGallery;

use Livewire\Component;
use App\Models\MGallery;
use App\Helpers\Formatting;

class VideoGalleryBase extends Component
{
    public $slug;
    public $medias;
    public $displayed;
    public $newsUpdate;
    public $perPage = 3;
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
            ->where('media_type','video')
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
            ->where('media_type','video')
            ->skip($start)
            ->take($this->perPage)
            ->orderBy('published_at','desc')
            ->get();
        }
        
        $this->medias = $data;
        return view('livewire.component.front.video-gallery.video-gallery-base');
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
