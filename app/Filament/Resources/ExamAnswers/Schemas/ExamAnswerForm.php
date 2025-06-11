<?php

namespace App\Filament\Resources\ExamAnswers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ExamAnswerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('exam_questions_id')
                    ->required()
                    ->numeric(),
                Textarea::make('answer_text')
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('is_correct')
                    ->required(),
            ]);
    }
}
