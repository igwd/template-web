<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;
use Filament\Navigation\NavigationGroup;
use Filament\Panel;
use Filament\Support\Colors\Color;

class AdminServiceProvider extends ServiceProvider
{   
    public function boot(): void
    {
        
    }

    public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->colors([
            'danger' => Color::Rose,
            'gray' => Color::Gray,
            'info' => Color::Blue,
            'primary' => Color::Indigo,
            'success' => Color::Emerald,
            'warning' => Color::Orange,
        ]);
}
}