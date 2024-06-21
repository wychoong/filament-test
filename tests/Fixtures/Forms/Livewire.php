<?php

namespace Tests\Fixtures\Forms;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class Livewire extends Component implements HasForms
{
    use InteractsWithForms;

    public $data;

    public static function make(): static
    {
        return new static();
    }

    // public function mount(): void
    // {
    //     $this->form->fill();
    // }

    public function data($data): static
    {
        $this->data = $data;

        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    public function render()
    {
        return <<<'HTML'
<div>
    @foreach ($this->getCachedForms() as $form)
        {{ $form }}
    @endforeach
</div>
HTML;
    }
}
