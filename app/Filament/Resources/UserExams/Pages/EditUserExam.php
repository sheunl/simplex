<?php

namespace App\Filament\Resources\UserExams\Pages;

use App\Filament\Resources\UserExams\UserExamResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUserExam extends EditRecord
{
    protected static string $resource = UserExamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
