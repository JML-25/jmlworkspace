<?php

namespace App\Livewire\Ingredients;

use App\Models\Ingredient;
use Livewire\Component;

class IngredientLookup extends Component
{
    public string $query = '';
    public array $results = [];

    public ?int $selectedIngredientId = null;
    public string $selectedIngredientTitle = '';

    public function updatedQuery(string $value): void
    {
        $value = trim($value);

        if (mb_strlen($value) < 2) {
            $this->results = [];
            return;
        }

        $rows = Ingredient::query()
            ->where('title', 'like', $value . '%')
            ->orderBy('title')
            ->limit(10)
            ->get(['id', 'title']);

        $this->results = $rows
            ->map(fn ($r) => ['id' => $r->id, 'title' => $r->title])
            ->all();
    }

    public function selectIngredient(int $ingredientId): void
    {
        $ingredient = Ingredient::query()->find($ingredientId);

        if (!$ingredient) {
            $this->selectedIngredientId = null;
            $this->selectedIngredientTitle = '';
            $this->results = [];
            return;
        }

        $this->selectedIngredientId = $ingredient->id;
        $this->selectedIngredientTitle = $ingredient->title;

        $this->results = [];

        // Explicit event to parent component(s)
        $this->dispatch('ingredientSelected', id: $ingredient->id, title: $ingredient->title);
    }

    public function clearSelection(): void
    {
        $this->selectedIngredientId = null;
        $this->selectedIngredientTitle = '';
        $this->dispatch('ingredientCleared');
    }

    public function render()
    {
        return view('livewire.ingredients.ingredient-lookup');
    }
}
