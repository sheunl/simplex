<?php

namespace App\Filament\Resources\UserExams\Pages;

use App\Filament\Resources\UserExams\UserExamResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUserExams extends ListRecords
{
    protected static string $resource = UserExamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
