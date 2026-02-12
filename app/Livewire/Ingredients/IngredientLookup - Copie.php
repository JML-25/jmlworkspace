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

    public function updated(string $property): void
    {
        // if ($property !== 'query') {
        //     return;
        // }

        $this->search();
    }

    public function search(): void
    {
        $value = trim($this->query);

        if (mb_strlen($value) < 2) {
            $this->results = [];
            return;
        }

        $rows = Ingredient::query()
            // Utilise contains plutôt que prefix pour être plus tolérant
            ->where('title', 'like', '%' . $value . '%')
            ->orderBy('title')
            ->limit(10)
            ->get(['id', 'title']);

        $this->results = $rows->map(fn ($r) => [
            'id' => $r->id,
            'title' => $r->title,
        ])->all();
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