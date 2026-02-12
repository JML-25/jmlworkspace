<?php

namespace App\Livewire\Cookings\Parts;

use Illuminate\Contracts\View\View;
use Livewire\Component;

final class CookingFieldsForm extends Component
{
    public string $name = '';
    public ?string $description = null;
    public ?string $additionalinformation = null;

    public ?string $recipestatus = null;
    public ?string $typeofdish = null;
    public ?string $difficultylevel = null;

    public ?int $preparationtime = null;
    public ?int $cookingtime = null;
    public ?int $totaltime = null;

    public ?int $servings = null;
    public ?int $calories = null;
    public ?int $fat = null;
    public ?int $carbs = null;
    public ?int $protein = null;

    public ?string $totalcost = null;

    public function render(): View
    {
        return view('livewire.cookings.parts.cooking-fields-form');
    }

    public function setField(string $field, mixed $value): void
    {
        $this->dispatch('cooking-field-set', field: $field, value: $value);
    }
}
