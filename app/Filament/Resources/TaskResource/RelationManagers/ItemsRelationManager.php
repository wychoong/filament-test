<?php

namespace App\Filament\Resources\TaskResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('task')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('remarks')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('completed')
                    ->default(false),
                Forms\Components\Select::make('category')
                    ->native(false)
                    ->options([
                        'Low',
                        'Medium',
                        'High',
                    ])
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('task')
            ->columns([
                Tables\Columns\TextColumn::make('task'),
                Tables\Columns\TextColumn::make('remarks'),
                Tables\Columns\ToggleColumn::make('completed')
                    ->updateStateUsing(fn ($state, $record) => $record->update([
                        'completed' => $state,
                        'completed_at' => $state ? now() : null,
                    ])),
                Tables\Columns\TextColumn::make('completed_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
}
