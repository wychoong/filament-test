<?php

namespace App\Filament\Resources\Tasks\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('task')
                    ->required()
                    ->maxLength(255),
                TextInput::make('remarks')
                    ->required()
                    ->maxLength(255),
                Toggle::make('completed')
                    ->default(false),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('task')
            ->columns([
                TextColumn::make('task'),
                TextColumn::make('remarks'),
                ToggleColumn::make('completed')
                    ->updateStateUsing(fn ($state, $record) => $record->update([
                        'completed' => $state,
                        'completed_at' => $state ? now() : null,
                    ])),
                TextColumn::make('completed_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                CreateAction::make(),
            ]);
    }
}
