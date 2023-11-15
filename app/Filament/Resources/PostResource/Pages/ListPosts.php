<?php

namespace App\Filament\Resources\PostResource\Pages;

use Filament\Pages\Actions;
use App\Filament\Resources\PostResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    public function isTableSearchable(): bool
    {
        return true;
    }
    
    /* protected function applySearchToTableQuery(Builder $query): Builder
    {
        if (filled($searchQuery = $this->getTableSearchQuery())) {
            //In this example a filter scope on the model is used
            //But you can also customize the query right here!
            return $query->filter(['search' => $searchQuery]);
        }
    
        return $query;
    } */

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
