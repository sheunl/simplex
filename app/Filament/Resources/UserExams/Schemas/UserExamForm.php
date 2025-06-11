<?php

namespace App\Filament\Resources\UserExams\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class UserExamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('exam_id')
                    ->required()
                    ->numeric(),
                Textarea::make('scores')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
