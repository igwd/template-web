<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeFill(array $data): array {
        $data['name'] = $data['name']." Toss";
        $data['user_id'] = auth()->id();
        return $data;
    }

    protected function getActions(): array {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
