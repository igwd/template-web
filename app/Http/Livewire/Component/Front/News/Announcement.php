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
    public $loading;

    public function mount($slug=null){
        
    }

    public function render()
    {
        $start = ($this->currentPage - 1) * $this->perPage;
        $data = MAnnouncement::id()->whereNotNull('published_at')
                ->skip($start)
                ->take($this->perPage)
                ->orderBy('published_at','desc')
                ->get();
        
        if(Formatting::getLang() == "en"){
            $data = MAnnouncement::en()->whereNotNull('published_at')
                ->skip($start)
                ->take($this->perPage)
                ->orderBy('published_at','desc')
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
