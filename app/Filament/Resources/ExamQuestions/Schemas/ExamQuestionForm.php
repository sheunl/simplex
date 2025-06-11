<?php

namespace App\Filament\Resources\ExamQuestions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ExamQuestionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('exam_id')
                    ->required()
                    ->numeric(),
                TextInput::make('question_text')
                    ->required(),
                TextInput::make('question_type')
                    ->required(),
                TextInput::make('points')
                    ->required()
                    ->numeric(),
            ]);
    }
}
