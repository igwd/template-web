<?php

namespace App\Http\Livewire\Component\Front\News;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class NewsUpdate extends Component
{
    use WithPagination;
    public $displayed;
    public $newsUpdate;
    public $perPage = 4;
    public $currentPage = 1;
    public $loading;

    public function mount($slug=null){
        $this->displayed = Post::whereNotNull('published_at')
        ->latest()
        ->first();
    }

    public function render()
    {
        $start = ($this->currentPage - 1) * $this->perPage;
        $data = Post::whereNotNull('published_at')
                ->where('id','<>',$this->displayed->id)
                ->skip($start)
                ->take($this->perPage)
                ->orderBy('published_at','desc')
                ->get();
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

    public function updatedCurrentPage()
    {
        $this->resetPage();
    }
}
