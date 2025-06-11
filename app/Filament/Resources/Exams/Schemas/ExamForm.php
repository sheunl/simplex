<?php

namespace App\Filament\Resources\Exams\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ExamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('course_id')
                    ->required()
                    ->numeric(),
                TextInput::make('duration')
                    ->required()
                    ->numeric()
                    ->default(60),
                Select::make('status')
                    ->options(['draft' => 'Draft', 'published' => 'Published', 'archived' => 'Archived'])
                    ->default('draft')
                    ->required(),
                DateTimePicker::make('published_at'),
                Textarea::make('questions')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('passing_score')
                    ->required()
                    ->numeric()
                    ->default(50),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
