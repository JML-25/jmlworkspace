<?php

namespace App\Livewire\Cookings\Parts;

use Illuminate\Contracts\View\View;
use Livewire\Component;

final class CookingStepsEditor extends Component
{
    /** @var array<int, array<string,mixed>> */
    public array $cookingsteps = [];

    public function render(): View
    {
        return view('livewire.cookings.parts.cookingsteps-editor');
    }

    public function requestAddRow(): void
    {
        $this->dispatch('cookingsteps-add-requested');
    }

    public function requestDeleteRow(int $index): void
    {
        $this->dispatch('cookingsteps-mark-delete-requested', index: $index);
    }

    public function requestRestoreRow(int $index): void
    {
        $this->dispatch('cookingsteps-restore-requested', index: $index);
    }

    public function setField(int $index, string $field, mixed $value): void
    {
        $allowed = ['title','tasktype','instruction','expectedtime','additionalinformation'];
        if (!in_array($field, $allowed, true)) {
            return;
        }

        $this->dispatch('cookingsteps-set-field-requested', index: $index, field: $field, value: $value);
    }
}
