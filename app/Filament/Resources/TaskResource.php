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
                Forms\Components\Select::make('title')
                    ->required()
                    ->options($options)
                    ->reactive(),
                SimpleRepeater::make('meta')
                    ->field(
                        TextInput::make('meta')
                    )
                    ->visible(fn ($get) => $get('title') == 'show'),
                Forms\Components\Select::make('type')
                    ->options($options)
                    ->searchable()
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
