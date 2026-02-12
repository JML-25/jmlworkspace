<?php

namespace App\Livewire\Cookings;

use App\Models\Cooking;
use App\Models\CookingIngredient;
use App\Models\CookingStep;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

final class CookingEditor extends Component
{
    public ?int $cookingId = null;

    // UI
    public string $activeTab = 'cooking'; // cooking|ingredients|steps
    public bool $confirmingDeleteCooking = false;

    // cookings table fields
    public string $name = '';
    public ?string $description = null;
    public ?string $additionalinformation = null;

    public ?string $recipestatus = null;     // length 7 in migration
    public ?string $typeofdish = null;       // length 7 in migration
    public ?string $difficultylevel = null;  // length 7 in migration

    public ?int $preparationtime = null;
    public ?int $cookingtime = null;
    public ?int $totaltime = null;

    public ?int $servings = null;
    public ?int $calories = null;
    public ?int $fat = null;
    public ?int $carbs = null;
    public ?int $protein = null;

    // keep cost as string to avoid float surprises in UI
    public ?string $totalcost = null;

    /** @var array<int, array<string,mixed>> */
    public array $cookingingredients = [];

    /** @var array<int, array<string,mixed>> */
    public array $cookingsteps = [];

    public function mount(?int $cookingId = null): void
    {
        $this->cookingId = $cookingId;

        if ($this->cookingId === null) {
            $this->initializeForCreate();
            return;
        }

        $this->loadCookingById($this->cookingId);
    }

    public function render(): View
    {
        return view('livewire.cookings.cooking-editor');
    }

    // -------------------------------------------------
    // External events
    // -------------------------------------------------

    #[On('cooking-selected')]
    public function onCookingSelected(int $cookingId): void
    {
        $this->cookingId = $cookingId;
        $this->confirmingDeleteCooking = false;
        $this->activeTab = 'cooking';

        $this->loadCookingById($cookingId);
    }

    #[On('cooking-create-requested')]
    public function onCookingCreateRequested(): void
    {
        $this->cookingId = null;
        $this->confirmingDeleteCooking = false;
        $this->activeTab = 'cooking';

        $this->initializeForCreate();
    }

    // -------------------------------------------------
    // Tab + delete UI events (from tabs component)
    // -------------------------------------------------

    #[On('tab-changed')]
    public function onTabChanged(string $tab): void
    {
        $this->setActiveTab($tab);
    }

    public function setActiveTab(string $tab): void
    {
        if (!in_array($tab, ['cooking', 'ingredients', 'steps'], true)) {
            $tab = 'cooking';
        }
        $this->activeTab = $tab;
    }

    public function askDeleteCooking(): void
    {
        $this->confirmingDeleteCooking = true;
    }

    public function cancelDeleteCooking(): void
    {
        $this->confirmingDeleteCooking = false;
    }

    // -------------------------------------------------
    // Child events: Cooking fields
    // -------------------------------------------------

    #[On('cooking-field-set')]
    public function onCookingFieldSet(string $field, mixed $value): void
    {
        $allowed = [
            'name','description','additionalinformation',
            'recipestatus','typeofdish','difficultylevel',
            'preparationtime','cookingtime','totaltime',
            'servings','calories','fat','carbs','protein',
            'totalcost',
        ];

        if (!in_array($field, $allowed, true)) {
            return;
        }

        $intFields = [
            'preparationtime','cookingtime','totaltime',
            'servings','calories','fat','carbs','protein',
        ];

        if (in_array($field, $intFields, true)) {
            $this->{$field} = ($value === '' || $value === null) ? null : (int) $value;
            return;
        }

        if ($field === 'totalcost') {
            $this->totalcost = ($value === '' || $value === null) ? null : (string) $value;
            return;
        }

        if ($field === 'name') {
            $this->name = (string) $value;
            return;
        }

        $this->{$field} = ($value === '' ? null : $value);
    }

    // -------------------------------------------------
    // Child events: CookingIngredients
    // -------------------------------------------------

    #[On('cookingingredients-add-requested')]
    public function onCookingIngredientsAddRequested(): void
    {
        $this->addCookingIngredientRow();
    }

    #[On('cookingingredients-mark-delete-requested')]
    public function onCookingIngredientsMarkDeleteRequested(int $index): void
    {
        $this->markCookingIngredientForDeletion($index);
    }

    #[On('cookingingredients-restore-requested')]
    public function onCookingIngredientsRestoreRequested(int $index): void
    {
        $this->restoreCookingIngredient($index);
    }

    #[On('cookingingredients-set-field-requested')]
    public function onCookingIngredientsSetFieldRequested(int $index, string $field, mixed $value): void
    {
        $allowed = ['ingredient_id','title','ingredientdescription','quantity','unit','instruction'];
        if (!in_array($field, $allowed, true)) {
            return;
        }
        if (!isset($this->cookingingredients[$index])) {
            return;
        }

        $this->cookingingredients[$index][$field] = $value;
    }

    // -------------------------------------------------
    // Child events: CookingSteps
    // -------------------------------------------------

    #[On('cookingsteps-add-requested')]
    public function onCookingStepsAddRequested(): void
    {
        $this->addCookingStepRow();
    }

    #[On('cookingsteps-mark-delete-requested')]
    public function onCookingStepsMarkDeleteRequested(int $index): void
    {
        $this->markCookingStepForDeletion($index);
    }

    #[On('cookingsteps-restore-requested')]
    public function onCookingStepsRestoreRequested(int $index): void
    {
        $this->restoreCookingStep($index);
    }

    #[On('cookingsteps-set-field-requested')]
    public function onCookingStepsSetFieldRequested(int $index, string $field, mixed $value): void
    {
        $allowed = ['title','tasktype','instruction','expectedtime','additionalinformation'];
        if (!in_array($field, $allowed, true)) {
            return;
        }
        if (!isset($this->cookingsteps[$index])) {
            return;
        }

        $this->cookingsteps[$index][$field] = $value;
    }

    // -------------------------------------------------
    // Init / Load
    // -------------------------------------------------

    private function initializeForCreate(): void
    {
        $this->name = '';
        $this->description = null;
        $this->additionalinformation = null;
        $this->recipestatus = null;
        $this->typeofdish = null;
        $this->difficultylevel = null;

        $this->preparationtime = null;
        $this->cookingtime = null;
        $this->totaltime = null;

        $this->servings = null;
        $this->calories = null;
        $this->fat = null;
        $this->carbs = null;
        $this->protein = null;

        $this->totalcost = null;

        $this->cookingingredients = [$this->newCookingIngredientRow(1)];
        $this->cookingsteps = [$this->newCookingStepRow(1)];
    }

    private function loadCookingById(int $cookingId): void
    {
        $cooking = Cooking::query()
            ->with(['cookingIngredients', 'cookingSteps'])
            ->findOrFail($cookingId);

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

        $this->totalcost = $cooking->totalcost !== null ? (string) $cooking->totalcost : null;

        $this->cookingingredients = [];
        foreach ($cooking->cookingIngredients as $row) {
            $this->cookingingredients[] = [
                'id' => (int) $row->id,
                'sequence' => (int) $row->sequence,
                'ingredient_id' => (int) $row->ingredient_id,
                'title' => (string) $row->title,
                'ingredientdescription' => (string) $row->ingredientdescription,
                'quantity' => (string) $row->quantity,
                'unit' => (string) $row->unit,
                'instruction' => (string) $row->instruction,
                '_delete' => false,
            ];
        }
        if (count($this->cookingingredients) === 0) {
            $this->cookingingredients = [$this->newCookingIngredientRow(1)];
        }

        $this->cookingsteps = [];
        foreach ($cooking->cookingSteps as $row) {
            $this->cookingsteps[] = [
                'id' => (int) $row->id,
                'sequence' => (int) $row->sequence,
                'title' => (string) $row->title,
                'tasktype' => (string) $row->tasktype,
                'instruction' => (string) $row->instruction,
                'expectedtime' => (int) $row->expectedtime,
                'additionalinformation' => $row->additionalinformation,
                '_delete' => false,
            ];
        }
        if (count($this->cookingsteps) === 0) {
            $this->cookingsteps = [$this->newCookingStepRow(1)];
        }
    }

    private function newCookingIngredientRow(int $sequence): array
    {
        return [
            'id' => null,
            'sequence' => $sequence,
            'ingredient_id' => 1,
            'title' => '',
            'ingredientdescription' => '',
            'quantity' => null,
            'unit' => '',
            'instruction' => '',
            '_delete' => false,
        ];
    }

    private function newCookingStepRow(int $sequence): array
    {
        return [
            'id' => null,
            'sequence' => $sequence,
            'title' => '',
            'tasktype' => '',
            'instruction' => '',
            'expectedtime' => null,
            'additionalinformation' => null,
            '_delete' => false,
        ];
    }

    // -------------------------------------------------
    // In-memory mutations: cookingingredients
    // -------------------------------------------------

    private function nextCookingIngredientSequence(): int
    {
        $max = 0;
        foreach ($this->cookingingredients as $row) {
            if ((bool)($row['_delete'] ?? false) === true) {
                continue;
            }
            $max = max($max, (int)($row['sequence'] ?? 0));
        }
        return $max + 1;
    }

    private function recomputeCookingIngredientSequences(): void
    {
        $seq = 1;
        foreach ($this->cookingingredients as $i => $row) {
            if ((bool)($row['_delete'] ?? false) === true) {
                continue;
            }
            $this->cookingingredients[$i]['sequence'] = $seq;
            $seq++;
        }
    }

    public function addCookingIngredientRow(): void
    {
        $seq = $this->nextCookingIngredientSequence();
        $this->cookingingredients[] = $this->newCookingIngredientRow($seq);
    }

    public function markCookingIngredientForDeletion(int $index): void
    {
        if (!isset($this->cookingingredients[$index])) {
            return;
        }

        if ($this->cookingingredients[$index]['id'] === null) {
            array_splice($this->cookingingredients, $index, 1);
            if (count($this->cookingingredients) === 0) {
                $this->cookingingredients[] = $this->newCookingIngredientRow(1);
            }
            $this->recomputeCookingIngredientSequences();
            return;
        }

        $this->cookingingredients[$index]['_delete'] = true;
        $this->recomputeCookingIngredientSequences();
    }

    public function restoreCookingIngredient(int $index): void
    {
        if (!isset($this->cookingingredients[$index])) {
            return;
        }

        $this->cookingingredients[$index]['_delete'] = false;
        $this->recomputeCookingIngredientSequences();
    }

    // -------------------------------------------------
    // In-memory mutations: cookingsteps
    // -------------------------------------------------

    private function nextCookingStepSequence(): int
    {
        $max = 0;
        foreach ($this->cookingsteps as $row) {
            if ((bool)($row['_delete'] ?? false) === true) {
                continue;
            }
            $max = max($max, (int)($row['sequence'] ?? 0));
        }
        return $max + 1;
    }

    private function recomputeCookingStepSequences(): void
    {
        $seq = 1;
        foreach ($this->cookingsteps as $i => $row) {
            if ((bool)($row['_delete'] ?? false) === true) {
                continue;
            }
            $this->cookingsteps[$i]['sequence'] = $seq;
            $seq++;
        }
    }

    public function addCookingStepRow(): void
    {
        $seq = $this->nextCookingStepSequence();
        $this->cookingsteps[] = $this->newCookingStepRow($seq);
    }

    public function markCookingStepForDeletion(int $index): void
    {
        if (!isset($this->cookingsteps[$index])) {
            return;
        }

        if ($this->cookingsteps[$index]['id'] === null) {
            array_splice($this->cookingsteps, $index, 1);
            if (count($this->cookingsteps) === 0) {
                $this->cookingsteps[] = $this->newCookingStepRow(1);
            }
            $this->recomputeCookingStepSequences();
            return;
        }

        $this->cookingsteps[$index]['_delete'] = true;
        $this->recomputeCookingStepSequences();
    }

    public function restoreCookingStep(int $index): void
    {
        if (!isset($this->cookingsteps[$index])) {
            return;
        }

        $this->cookingsteps[$index]['_delete'] = false;
        $this->recomputeCookingStepSequences();
    }

    // -------------------------------------------------
    // Validation
    // -------------------------------------------------

    private function allRules(): array
    {
        return [
            // cooking
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'description' => ['nullable', 'string'],
            'additionalinformation' => ['nullable', 'string'],

            'recipestatus' => ['nullable', 'string', 'max:7'],
            'typeofdish' => ['nullable', 'string', 'max:7'],
            'difficultylevel' => ['nullable', 'string', 'max:7'],

            'preparationtime' => ['nullable', 'integer', 'min:0'],
            'cookingtime' => ['nullable', 'integer', 'min:0'],
            'totaltime' => ['nullable', 'integer', 'min:0'],

            'servings' => ['nullable', 'integer', 'min:0'],
            'calories' => ['nullable', 'integer', 'min:0'],
            'fat' => ['nullable', 'integer', 'min:0'],
            'carbs' => ['nullable', 'integer', 'min:0'],
            'protein' => ['nullable', 'integer', 'min:0'],

            'totalcost' => ['nullable', 'numeric', 'min:0'],

            // cookingingredients
            'cookingingredients' => ['array'],
            'cookingingredients.*.id' => ['nullable', 'integer'],
            'cookingingredients.*.sequence' => ['required', 'integer', 'min:1'],
            'cookingingredients.*.ingredient_id' => ['nullable', 'integer', 'min:1'],
            'cookingingredients.*.title' => ['nullable', 'string', 'max:255'],
            'cookingingredients.*.ingredientdescription' => ['nullable', 'string', 'max:255'],
            'cookingingredients.*.quantity' => ['nullable', 'numeric', 'min:0'],
            'cookingingredients.*.unit' => ['nullable', 'string', 'max:64'],
            'cookingingredients.*.instruction' => ['nullable', 'string', 'max:10000'],
            'cookingingredients.*._delete' => ['boolean'],

            // cookingsteps
            'cookingsteps' => ['array'],
            'cookingsteps.*.id' => ['nullable', 'integer'],
            'cookingsteps.*.sequence' => ['required', 'integer', 'min:1'],
            'cookingsteps.*.title' => ['nullable', 'string', 'max:255'],
            'cookingsteps.*.tasktype' => ['nullable', 'string', 'max:7'],
            'cookingsteps.*.instruction' => ['nullable', 'string', 'max:10000'],
            'cookingsteps.*.expectedtime' => ['nullable', 'integer', 'min:0'],
            'cookingsteps.*.additionalinformation' => ['nullable', 'string'],
            'cookingsteps.*._delete' => ['boolean'],
        ];
    }

    private function validateAll(): void
    {
        $this->validate($this->allRules());

        // Require at least 1 non-deleted ingredient with title filled OR ingredientdescription filled
        $hasIng = false;
        foreach ($this->cookingingredients as $row) {
            if ((bool)($row['_delete'] ?? false) === true) {
                continue;
            }
            $t = trim((string)($row['title'] ?? ''));
            $d = trim((string)($row['ingredientdescription'] ?? ''));
            if ($t !== '' || $d !== '') {
                $hasIng = true;
                break;
            }
        }

        // Require at least 1 non-deleted step with instruction filled
        $hasStep = false;
        foreach ($this->cookingsteps as $row) {
            if ((bool)($row['_delete'] ?? false) === true) {
                continue;
            }
            if (trim((string)($row['instruction'] ?? '')) !== '') {
                $hasStep = true;
                break;
            }
        }

        if (!$hasIng) {
            $this->addError('cookingingredients', 'Add at least one cooking ingredient (fill title or description on at least one row).');
        }
        if (!$hasStep) {
            $this->addError('cookingsteps', 'Add at least one cooking step (fill instruction on at least one row).');
        }

        if ($this->getErrorBag()->isNotEmpty()) {
            throw new \Illuminate\Validation\ValidationException($this->getValidatorInstance());
        }
    }

    // -------------------------------------------------
    // Persistence
    // -------------------------------------------------

    public function save(): void
    {
        $this->resetErrorBag();

        $this->recomputeCookingIngredientSequences();
        $this->recomputeCookingStepSequences();

        $this->validateAll();

        DB::transaction(function (): void {
            $cooking = $this->saveCookingRecord();
            $id = (int) $cooking->id;

            $this->saveCookingIngredientRecords($id);
            $this->saveCookingStepRecords($id);

            $this->cookingId = $id;
        });

        $this->confirmingDeleteCooking = false;
        session()->flash('status', 'Saved.');
        $this->dispatch('cooking-saved', cookingId: $this->cookingId);
    }

    private function saveCookingRecord(): Cooking
    {
        $cooking = ($this->cookingId === null)
            ? new Cooking()
            : Cooking::query()->findOrFail($this->cookingId);

        $cooking->name = $this->name;
        $cooking->description = $this->description;
        $cooking->additionalinformation = $this->additionalinformation;

        $cooking->recipestatus = $this->recipestatus;
        $cooking->typeofdish = $this->typeofdish;
        $cooking->difficultylevel = $this->difficultylevel;

        $cooking->preparationtime = $this->preparationtime;
        $cooking->cookingtime = $this->cookingtime;
        $cooking->totaltime = $this->totaltime;

        $cooking->servings = $this->servings;
        $cooking->calories = $this->calories;
        $cooking->fat = $this->fat;
        $cooking->carbs = $this->carbs;
        $cooking->protein = $this->protein;

        $cooking->totalcost = ($this->totalcost === null || $this->totalcost === '') ? null : (float) $this->totalcost;

        $cooking->save();

        return $cooking;
    }

    private function saveCookingIngredientRecords(int $cookingId): void
    {
        // delete pass
        foreach ($this->cookingingredients as $row) {
            $id = $row['id'] ?? null;
            $delete = (bool)($row['_delete'] ?? false);

            if ($id !== null && $delete) {
                CookingIngredient::query()
                    ->where('id', $id)
                    ->where('cooking_id', $cookingId)
                    ->delete();
            }
        }

        // upsert pass
        foreach ($this->cookingingredients as $row) {
            if ((bool)($row['_delete'] ?? false) === true) {
                continue;
            }

            $title = trim((string)($row['title'] ?? ''));
            $desc  = trim((string)($row['ingredientdescription'] ?? ''));

            // skip totally empty row
            if ($title === '' && $desc === '') {
                continue;
            }

            $id = $row['id'] ?? null;

            if ($id === null) {
                $ci = new CookingIngredient();
                $ci->cooking_id = $cookingId;
            } else {
                $ci = CookingIngredient::query()
                    ->where('id', $id)
                    ->where('cooking_id', $cookingId)
                    ->firstOrFail();
            }

            $ci->sequence = (int) $row['sequence'];
            $ci->ingredient_id = ($row['ingredient_id'] === '' || $row['ingredient_id'] === null) ? null : (int) $row['ingredient_id'];
            $ci->title = $title === '' ? '' : $title;
            $ci->ingredientdescription = $desc === '' ? '' : $desc;

            $ci->quantity = ($row['quantity'] === '' || $row['quantity'] === null) ? 0.0 : (float) $row['quantity'];
            $ci->unit = (string)($row['unit'] ?? '');
            $ci->instruction = (string)($row['instruction'] ?? '');

            $ci->save();
        }
    }

    private function saveCookingStepRecords(int $cookingId): void
    {
        // delete pass
        foreach ($this->cookingsteps as $row) {
            $id = $row['id'] ?? null;
            $delete = (bool)($row['_delete'] ?? false);

            if ($id !== null && $delete) {
                CookingStep::query()
                    ->where('id', $id)
                    ->where('cooking_id', $cookingId)
                    ->delete();
            }
        }

        // upsert pass
        foreach ($this->cookingsteps as $row) {
            if ((bool)($row['_delete'] ?? false) === true) {
                continue;
            }

            $instruction = trim((string)($row['instruction'] ?? ''));
            if ($instruction === '') {
                continue;
            }

            $id = $row['id'] ?? null;

            if ($id === null) {
                $cs = new CookingStep();
                $cs->cooking_id = $cookingId;
            } else {
                $cs = CookingStep::query()
                    ->where('id', $id)
                    ->where('cooking_id', $cookingId)
                    ->firstOrFail();
            }

            $cs->sequence = (int) $row['sequence'];
            $cs->title = (string)($row['title'] ?? '');
            $cs->tasktype = (string)($row['tasktype'] ?? '');
            $cs->instruction = $instruction;

            $cs->expectedtime = ($row['expectedtime'] === '' || $row['expectedtime'] === null) ? 0 : (int) $row['expectedtime'];
            $cs->additionalinformation = ($row['additionalinformation'] === '' ? null : $row['additionalinformation']);

            $cs->save();
        }
    }

    public function deleteCooking(): void
    {
        if ($this->cookingId === null) {
            return;
        }

        $deletedId = $this->cookingId;

        DB::transaction(function () use ($deletedId): void {
            Cooking::query()->where('id', $deletedId)->delete();
        });

        $this->cookingId = null;
        $this->confirmingDeleteCooking = false;
        $this->activeTab = 'cooking';
        $this->initializeForCreate();

        session()->flash('status', 'Cooking deleted.');
        $this->dispatch('cooking-deleted', cookingId: $deletedId);
    }
}
