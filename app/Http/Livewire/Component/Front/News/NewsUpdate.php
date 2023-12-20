<?php

namespace App\Http\Livewire\Component\Front\News;

use App\Helpers\Formatting;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class NewsUpdate extends Component
{
    
    public $displayed;
    public $newsUpdate;
    public $perPage = 4;
    public $currentPage = 1;
    public $loading;
    public $slug;

    public function mount($slug=null, $post=null){
        $this->slug = $slug;
        $this->displayed = Post::id('1')
        ->whereNotNull('published_at')
        ->latest('published_at')
        ->first();
        if(!empty($post)){
            $this->displayed = Post::where('slug',$post)->first();
        }
    }

    public function render()
    {
        $site_slug = $this->slug;
        $start = ($this->currentPage - 1) * $this->perPage;
        if(Formatting::getLang() == 'en'){
            $data = Post::en('1')->with('category')->whereHas('site',function($query) use ($site_slug){
                if(!empty($site_slug)){
                    $query->where('slug',$site_slug);
                }else{
                    $query->where('is_main_site',1);
                }
            })
            ->where(function ($query) {
                $query->whereNotNull('published_at')->orWhere('site_id', 0);
            })
            ->where('id','<>',$this->displayed->id)
            ->skip($start)
            ->take($this->perPage)
            ->orderBy('published_at','desc')
            ->get();
        }else{
            $data = Post::id('1')->with('category')->whereHas('site',function($query) use ($site_slug){
                if(!empty($site_slug)){
                    $query->where('slug',$site_slug);
                }else{
                    $query->where('is_main_site',1);
                }
            })
            ->where(function ($query) {
                $query->whereNotNull('published_at')->orWhere('site_id', 0);
            })
            ->where('id','<>',$this->displayed->id)
            ->skip($start)
            ->take($this->perPage)
            ->orderBy('published_at','desc')
            ->get();
        }
        
        $this->newsUpdate = $data;
        return view('livewire.component.front.news.news-update',['newsUpdate'=>$this->newsUpdate]);
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
