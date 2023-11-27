<?php

namespace App\Http\Livewire\Component\Front\News;

use Livewire\Component;
use App\Helpers\Formatting;
use App\Models\Post;

class Posts extends Component
{
    public $news;
    public $lang;
    public $site;

    public function mount($site=null,$slug=null){
        $this->site = $site;
        $this->lang = Formatting::getLang();
        $this->news = Post::where(function($query) use ($slug){
            if (!empty($slug)) {
                $query->where('slug', $slug);
                $query->orWhere('slug_en', $slug);
            }
        })->first();
        if(empty($this->news)){
            return abort('404');
        }
    }

    public function render()
    {
        return view('livewire.component.front.news.post',['site'=>$this->site,'news'=>$this->news]);
    }
}
