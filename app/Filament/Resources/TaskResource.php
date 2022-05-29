<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Task;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\TaskResource\Pages;
use RyanChandler\FilamentSimpleRepeater\SimpleRepeater;
use App\Filament\Resources\TaskResource\RelationManagers;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\HasManyRepeater;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        $options = [
            'show' => 'Show',
            'hide' => 'Hide',
        ];

        return $form
            ->schema([
                Card::make([
                    Forms\Components\TextInput::make('title')
                        ->required(),
                    Forms\Components\HasManyRepeater::make('items')
                        ->schema([
                            TextInput::make('task'),
                            SimpleRepeater::make('meta')
                                ->field(
                                    Forms\Components\TextInput::make('option')
                                        ->required()
                                )
                        ])
                ])
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('title'),
            ])
            ->filters([
                //
            ]);
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
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }
}
