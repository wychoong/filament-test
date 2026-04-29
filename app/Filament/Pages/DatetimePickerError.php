<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\DateTimePicker;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Alignment;
use Filament\Support\Icons\Heroicon;

class DatetimePickerError extends Page
{
    protected string $view = 'filament.pages.datetime-picker-error';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ExclamationTriangle;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'started_at' => now()->minute(18),
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->statePath('data')
            ->components([
                Section::make()
                    ->key('form')
                    ->schema([
                        DateTimePicker::make('started_at')
                            ->label('Started At')
                            ->seconds(false)
                            ->native(false)
                            ->minutesStep(15),
                    ])
                    ->footerActions([
                        Action::make('create')
                            ->label('Create')
                            ->keyBindings(['mod+s'])
                            ->submit('create'),
                    ])->footerActionsAlignment(Alignment::End),
            ]);
    }

    public function create(): void
    {
        dd($this->form->getState());
    }
}
