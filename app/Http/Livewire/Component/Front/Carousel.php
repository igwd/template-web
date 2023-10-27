<?php

namespace App\Http\Livewire\Component\Front;

use Livewire\Component;
use App\Models\MCarousel;

class Carousel extends Component
{
    public $carousels;
    public $currentCarouselIndex = 0;

    public function render()
    {
        $this->carousels = MCarousel::all()->toArray();
        return view('livewire.component.front.carousel');
    }

    public function previousCarousel()
    {
        $this->currentCarouselIndex = ($this->currentCarouselIndex - 1 + count($this->carousels)) % count($this->carousels);
    }

    public function nextCarousel()
    {
        $this->currentCarouselIndex = ($this->currentCarouselIndex + 1) % count($this->carousels);
    }
}
