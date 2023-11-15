<?php

namespace App\Http\Livewire\Component\Front;

use Livewire\Component;
use App\Models\MCarousel;
use App\Helpers\Formatting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class Carousel extends Component
{
    public $lang;
    public $carousels;
    public $currentCarouselIndex = 0;
    public $prevCarouselId = 0;
    public $nextCarouselId = 0;

    public function mount($slug=null){
        $this->lang = Formatting::getLang();
        $this->carousels = MCarousel::id()->whereHas('site', function ($query) use ($slug) {
            if(!empty($slug)){
                $query->where('slug', $slug);
            }else{
                $query->where('is_main_site', 1);
            }
        })->orderBy('id', 'asc')->get()->toArray();
        if($this->lang === 'en'){
            $this->carousels = MCarousel::en()->whereHas('site', function ($query) use ($slug) {
                if(!empty($slug)){
                    $query->where('slug', $slug);
                }else{
                    $query->where('is_main_site', 1);
                }
            })->orderBy('id', 'asc')->get()->toArray();
        }
    }

    public function render()
    {
        return view('livewire.component.front.carousel');
    }

    public function previousCarousel()
    {
        $this->currentCarouselIndex = ($this->currentCarouselIndex - 1 + count($this->carousels)) % count($this->carousels);
    }

    public function nextCarousel()
    {
        $previousIndex = $this->currentCarouselIndex; // Simpan indeks sebelum diubah
        $this->currentCarouselIndex = ($this->currentCarouselIndex + 1) % count($this->carousels);
    }
}
