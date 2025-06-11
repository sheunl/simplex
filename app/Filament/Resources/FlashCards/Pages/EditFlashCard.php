<?php

namespace App\Filament\Resources\FlashCards\Pages;

use App\Filament\Resources\FlashCards\FlashCardResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFlashCard extends EditRecord
{
    protected static string $resource = FlashCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
