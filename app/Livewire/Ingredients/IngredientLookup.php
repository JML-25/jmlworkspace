<?php

namespace App\Livewire\Ingredients;

use App\Models\Ingredient;
use Livewire\Component;

class IngredientLookup extends Component
{
    /** @var array<int, array{id:int,title:string}> */
    public array $items = [];

    public ?int $selectedIngredientId = null;
    public string $selectedIngredientTitle = '';

    public function mount(): void
    {
        // Précharge un "catalogue" minimal.
        // Ajuste la limite selon ton volume (ex 500, 1000, 2000).
        $rows = Ingredient::query()
            ->orderBy('title')
            ->limit(1000)
            ->get(['id', 'title']);

        $this->items = $rows->map(fn ($r) => [
            'id' => $r->id,
            'title' => $r->title,
        ])->all();
    }

    public function selectIngredient(int $id): void
    {
        $ingredient = Ingredient::query()->find($id);
        if (!$ingredient) {
            $this->selectedIngredientId = null;
            $this->selectedIngredientTitle = '';
            return;
        }

        $this->selectedIngredientId = $ingredient->id;
        $this->selectedIngredientTitle = $ingredient->title;

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
