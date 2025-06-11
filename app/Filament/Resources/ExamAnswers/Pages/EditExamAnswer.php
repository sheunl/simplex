<?php

namespace App\Filament\Resources\ExamAnswers\Pages;

use App\Filament\Resources\ExamAnswers\ExamAnswerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditExamAnswer extends EditRecord
{
    protected static string $resource = ExamAnswerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
