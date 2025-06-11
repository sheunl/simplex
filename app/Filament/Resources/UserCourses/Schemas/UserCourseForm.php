<?php

namespace App\Filament\Resources\UserCourses\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class UserCourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('course_id')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->options(['enrolled' => 'Enrolled', 'completed' => 'Completed', 'dropped' => 'Dropped'])
                    ->default('enrolled')
                    ->required(),
                DateTimePicker::make('enrolled_at')
                    ->required(),
                DateTimePicker::make('completed_at'),
                DateTimePicker::make('dropped_at'),
                TextInput::make('progress')
                    ->required()
                    ->default('0%'),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
