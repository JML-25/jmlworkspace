<?php

namespace App\Livewire\Cookings;

use App\Models\Cooking;
use App\Services\ColumnValueOptionsService;
use Livewire\Component;

class CookingTab extends Component
{
    public ?Cooking $cooking;

	public ?string $successMessage = null;
	public ?string $errorMessage = null;


    public string $name = '';
    public ?string $description = null;              // text -> textarea
    public ?string $additionalinformation = null;    // text -> textarea
    public ?string $recipestatus = null;             // string(7) nullable
    public ?string $typeofdish = null;               // string(7) nullable
    public ?string $difficultylevel = null;          // string(7) nullable

    public ?int $preparationtime = null;
    public ?int $cookingtime = null;
    public ?int $totaltime = null;
    public ?int $servings = null;

    public ?int $calories = null;
    public ?int $fat = null;
    public ?int $carbs = null;
    public ?int $protein = null;

    public ?float $totalcost = null;                 // float(15) nullable

    public array $selectRecipeStatus = [];
    public array $selectTypeOfDish = [];
    public array $selectDifficulty = [];

    private ColumnValueOptionsService $cvo;

    public function boot(ColumnValueOptionsService $cvo): void
    {
        $this->cvo = $cvo;
    }

    public function mount(?Cooking $cooking = null): void
    {
        $this->cooking = $cooking;

        // ColumnValueOption-driven selects
        $this->selectRecipeStatus = $this->cvo->getSelectOptions('cookings', 'recipestatus');
        $this->selectTypeOfDish   = $this->cvo->getSelectOptions('cookings', 'typeofdish');
        $this->selectDifficulty   = $this->cvo->getSelectOptions('cookings', 'difficultylevel');

        if ($this->cooking) {
            $this->fillFromModel($this->cooking);
        }
    }

    private function fillFromModel(Cooking $cooking): void
    {
        $this->name = (string) $cooking->name;
        $this->description = $cooking->description;
        $this->additionalinformation = $cooking->additionalinformation;

        $this->recipestatus = $cooking->recipestatus;
        $this->typeofdish = $cooking->typeofdish;
        $this->difficultylevel = $cooking->difficultylevel;

        $this->preparationtime = $cooking->preparationtime;
        $this->cookingtime = $cooking->cookingtime;
        $this->totaltime = $cooking->totaltime;
        $this->servings = $cooking->servings;

        $this->calories = $cooking->calories;
        $this->fat = $cooking->fat;
        $this->carbs = $cooking->carbs;
        $this->protein = $cooking->protein;

        $this->totalcost = $cooking->totalcost;
    }

    public function save(): void
    {
		$this->clearMessages();
        $validated = $this->validate($this->rules());

        $model = $this->cooking ?? new Cooking();
        $model->fill($validated);
        $model->save();

        $this->cooking = $model;

        // explicit event to parent
		$this->successMessage = 'Cooking saved successfully.';
        $this->dispatch('cookingSaved', id: $model->id);
    }

    public function delete(): void
    {
        if (!$this->cooking) {
            return;
        }

        $id = $this->cooking->id;
        $this->cooking->delete();
        $this->cooking = null;

        $this->dispatch('cookingDeleted', id: $id);
    }

    private function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'additionalinformation' => ['nullable', 'string'],

            'recipestatus' => ['nullable', 'string', 'max:7'],
            'typeofdish' => ['nullable', 'string', 'max:7'],
            'difficultylevel' => ['nullable', 'string', 'max:7'],

            'preparationtime' => ['nullable', 'integer'],
            'cookingtime' => ['nullable', 'integer'],
            'totaltime' => ['nullable', 'integer'],
            'servings' => ['nullable', 'integer'],

            'calories' => ['nullable', 'integer'],
            'fat' => ['nullable', 'integer'],
            'carbs' => ['nullable', 'integer'],
            'protein' => ['nullable', 'integer'],

            'totalcost' => ['nullable', 'numeric'],
        ];
    }
	private function clearMessages(): void
	{
		$this->successMessage = null;
		$this->errorMessage = null;
	}

	
    public function render()
    {
        return view('livewire.cookings.cooking-tab');
    }
}
