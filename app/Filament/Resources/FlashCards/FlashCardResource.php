<?php

namespace App\Filament\Resources\FlashCards;

use App\Filament\Resources\FlashCards\Pages\CreateFlashCard;
use App\Filament\Resources\FlashCards\Pages\EditFlashCard;
use App\Filament\Resources\FlashCards\Pages\ListFlashCards;
use App\Filament\Resources\FlashCards\Schemas\FlashCardForm;
use App\Filament\Resources\FlashCards\Tables\FlashCardsTable;
use App\Models\FlashCard;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FlashCardResource extends Resource
{
    protected static ?string $model = FlashCard::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return FlashCardForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FlashCardsTable::configure($table);
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
            'index' => ListFlashCards::route('/'),
            'create' => CreateFlashCard::route('/create'),
            'edit' => EditFlashCard::route('/{record}/edit'),
        ];
    }
}
