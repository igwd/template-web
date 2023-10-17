<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\Galeries;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class GaleriesTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Galeries::class);

        $component->assertStatus(200);
    }
}
