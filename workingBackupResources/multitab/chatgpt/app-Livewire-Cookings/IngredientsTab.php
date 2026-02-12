<?php

namespace App\Livewire\Cookings;

use App\Models\Cooking;
use App\Models\Cookingingredient;
use App\Models\Ingredient;
use App\Services\ColumnValueOptionsService;
use Livewire\Attributes\On;
use Livewire\Component;

class IngredientsTab extends Component
{
    public ?Cooking $cooking;

    public array $rows = [];

    // form fields
    public ?int $editingId = null;
    public ?int $ingredient_id = null;

    public int $sequence = 1;
    public string $title = '';
    public string $ingredientdescription = '';
    public float $quantity = 0;
    public string $unit = '';             // required by migration
    public string $instruction = '';

    public array $selectUnit = [];

    private ColumnValueOptionsService $cvo;

    public function boot(ColumnValueOptionsService $cvo): void
    {
        $this->cvo = $cvo;
    }

    public function mount(?Cooking $cooking = null): void
    {
        $this->cooking = $cooking;

        $this->selectUnit = $this->cvo->getSelectOptions('cookingingredients', 'unit');

        // sensible default when options exist
        if ($this->unit === '' && count($this->selectUnit) > 0) {
            $this->unit = array_key_first($this->selectUnit);
        }

        $this->reloadRows();
    }

    public function reloadRows(): void
    {
        if (!$this->cooking) {
            $this->rows = [];
            return;
        }

        $items = Cookingingredient::query()
            ->where('cooking_id', $this->cooking->id)
            ->orderBy('sequence')
            ->get();

        $this->rows = $items->map(fn ($x) => [
            'id' => $x->id,
            'sequence' => $x->sequence,
            'title' => $x->title,
            'quantity' => $x->quantity,
            'unit' => $x->unit,
        ])->all();
    }

    #[On('ingredientSelected')]
    public function onIngredientSelected(int $id, string $title): void
    {
        $ingredient = Ingredient::query()->find($id);
        if (!$ingredient) {
            return;
        }

        $this->ingredient_id = $ingredient->id;

        // optional auto-fill
        $this->title = $ingredient->title;
        $this->ingredientdescription = (string) $ingredient->description;
    }

    #[On('ingredientCleared')]
    public function onIngredientCleared(): void
    {
        $this->ingredient_id = null;
    }

    public function startCreate(): void
    {
        $this->editingId = null;
        $this->ingredient_id = null;

        $this->sequence = 1;
        $this->title = '';
        $this->ingredientdescription = '';
        $this->quantity = 0;

        $this->unit = '';
        if (count($this->selectUnit) > 0) {
            $this->unit = array_key_first($this->selectUnit);
        }

        $this->instruction = '';
    }

    public function startEdit(int $id): void
    {
        $row = Cookingingredient::query()->find($id);
        if (!$row) {
            return;
        }

        $this->editingId = $row->id;
        $this->ingredient_id = $row->ingredient_id;

        $this->sequence = (int) $row->sequence;
        $this->title = $row->title;
        $this->ingredientdescription = $row->ingredientdescription;
        $this->quantity = (float) $row->quantity;
        $this->unit = $row->unit;
        $this->instruction = $row->instruction;
    }

    public function save(): void
    {
        if (!$this->cooking) {
            return;
        }

        $validated = $this->validate($this->rules());

        $model = $this->editingId
            ? Cookingingredient::query()->find($this->editingId)
            : new Cookingingredient();

        if (!$model) {
            return;
        }

        $model->fill($validated);
        $model->cooking_id = $this->cooking->id;
        $model->save();

        $this->startCreate();
        $this->reloadRows();
    }

    public function delete(int $id): void
    {
        $row = Cookingingredient::query()->find($id);
        if (!$row) {
            return;
        }

        $row->delete();
        $this->reloadRows();
    }

    private function rules(): array
    {
        return [
            'ingredient_id' => ['nullable', 'integer', 'exists:ingredients,id'],
            'sequence' => ['required', 'integer'],
            'title' => ['required', 'string', 'max:255'],
            'ingredientdescription' => ['required', 'string', 'max:255'],
            'quantity' => ['required', 'numeric'],
            'unit' => ['required', 'string', 'max:64'],
            'instruction' => ['required', 'string', 'max:255'],
        ];
    }

    public function render()
    {
        return view('livewire.cookings.ingredients-tab');
    }
}
