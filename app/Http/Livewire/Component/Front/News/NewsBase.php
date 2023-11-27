<?php

namespace App\Http\Livewire\Component\Front\News;

use App\Helpers\Formatting;
use App\Models\Post;
use Livewire\Component;

class NewsBase extends Component
{
    public $news;
    public $slug;

    public function mount($slug=null){
        //$slug = site slug;
        $lang = Formatting::getLang();
        $this->slug = $slug;
        if($lang == 'en'){
            $this->news = Post::en()->whereHas('site',function($query) use($slug){
                if(!empty($slug)){
                    $query->where('slug',$slug);
                }else{
                    $query->where('is_main_site',1);
                }
            })
            ->whereNotNull('published_at')
            ->orWhere('site_id',0)
            ->latest()
            ->first();
        }else{
            $this->news = Post::id()->whereHas('site',function($query) use($slug){
                if(!empty($slug)){
                    $query->where('slug',$slug);
                }else{
                    $query->where('is_main_site',1);
                }
            })
            ->whereNotNull('published_at')
            ->orWhere('site_id',0)
            ->latest()
            ->first();
        }
    }

    public function render()
    {
        return view('livewire.component.front.news.news-base');
    }
}
