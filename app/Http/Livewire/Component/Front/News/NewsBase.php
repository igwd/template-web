<?php

namespace App\Http\Livewire\Component\Front\News;

use App\Models\Post;
use Livewire\Component;

class NewsBase extends Component
{
    public $news;

    public function mount(){
        $this->news = Post::whereNotNull('published_at')
        ->latest()
        ->first();
    }

    public function render()
    {
        return view('livewire.component.front.news.news-base');
    }
}
