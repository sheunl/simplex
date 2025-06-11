<?php

namespace App\Filament\Resources\ExamAnswers\Pages;

use App\Filament\Resources\ExamAnswers\ExamAnswerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListExamAnswers extends ListRecords
{
    protected static string $resource = ExamAnswerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
