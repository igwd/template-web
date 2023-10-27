<?php

namespace App\Http\Livewire\Component\Front;

use Livewire\Component;

class Homepage extends Component
{
    public function render()
    {
        return view('livewire.component.front.homepage')->extends('layouts.app');
    }
}
