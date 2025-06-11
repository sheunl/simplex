<?php

namespace App\Filament\Resources\UserExams;

use App\Filament\Resources\UserExams\Pages\CreateUserExam;
use App\Filament\Resources\UserExams\Pages\EditUserExam;
use App\Filament\Resources\UserExams\Pages\ListUserExams;
use App\Filament\Resources\UserExams\Schemas\UserExamForm;
use App\Filament\Resources\UserExams\Tables\UserExamsTable;
use App\Models\UserExam;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UserExamResource extends Resource
{
    protected static ?string $model = UserExam::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return UserExamForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UserExamsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUserExams::route('/'),
            'create' => CreateUserExam::route('/create'),
            'edit' => EditUserExam::route('/{record}/edit'),
        ];
    }
}
