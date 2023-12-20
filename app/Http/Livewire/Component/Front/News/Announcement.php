<?php

namespace App\Http\Livewire\Component\Front\News;

use Livewire\Component;
use App\Helpers\Formatting;
use Livewire\WithPagination;
use App\Models\MAnnouncement;

class Announcement extends Component
{
    use WithPagination;

    public $announcements;
    public $perPage = 4;
    public $currentPage = 1;
    public $loading, $displayed, $slug;

    public function mount($slug=null, $post=null){
        $this->slug = $slug;

        if(!empty($post)){
            $this->displayed = MAnnouncement::where('slug',$post)->first();
        }
    }

    public function render()
    {
        $site_slug = $this->slug;
        $start = ($this->currentPage - 1) * $this->perPage;
        $data = MAnnouncement::id('2')
            ->with('category')
            ->whereHas('site',function($query) use ($site_slug){
                if(!empty($site_slug)){
                    $query->where('slug',$site_slug);
                }else{
                    $query->where('is_main_site',1);
                }
                $query->orWhere('site_id', 0);
            })
            ->whereNotNull('published_at')
            ->skip($start)
            ->take($this->perPage)
            ->get();
        
        if(Formatting::getLang() == "en"){
            $data = MAnnouncement::en('2')
                ->with('category')->whereHas('site',function($query) use ($site_slug){
                    if(!empty($site_slug)){
                        $query->where('slug',$site_slug);
                    }else{
                        $query->where('is_main_site',1);
                    }
                    $query->orWhere('site_id', 0);
                })
                ->whereNotNull('published_at')
                ->skip($start)
                ->take($this->perPage)
                ->get();
        }
        $this->announcements = $data;
        return view('livewire.component.front.news.announcement',['announcements'=>$this->announcements]);
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

    public function updatedCurrentPage()
    {
        $this->resetPage();
    }
}
