<?php

namespace App\Livewire\Cookings\Parts;

use Illuminate\Contracts\View\View;
use Livewire\Component;

final class CookingIngredientsEditor extends Component
{
    /** @var array<int, array<string,mixed>> */
    public array $cookingingredients = [];

    public function render(): View
    {
        return view('livewire.cookings.parts.cookingingredients-editor');
    }

    public function requestAddRow(): void
    {
        $this->dispatch('cookingingredients-add-requested');
    }

    public function requestDeleteRow(int $index): void
    {
        $this->dispatch('cookingingredients-mark-delete-requested', index: $index);
    }

    public function requestRestoreRow(int $index): void
    {
        $this->dispatch('cookingingredients-restore-requested', index: $index);
    }

    public function setField(int $index, string $field, mixed $value): void
    {
        $allowed = ['ingredient_id','title','ingredientdescription','quantity','unit','instruction'];
        if (!in_array($field, $allowed, true)) {
            return;
        }

        $this->dispatch('cookingingredients-set-field-requested', index: $index, field: $field, value: $value);
    }
}
