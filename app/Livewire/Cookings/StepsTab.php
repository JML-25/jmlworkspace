<?php

namespace App\Livewire\Cookings;

use App\Models\Cooking;
use App\Models\Cookingstep;
use App\Services\ColumnValueOptionsService;
use Livewire\Component;

class StepsTab extends Component
{
    public ?Cooking $cooking;
	
	public ?string $successMessage = null;
	public ?string $errorMessage = null;


    public array $rows = [];

    public ?int $editingId = null;

    public string $title = '';
    public int $sequence = 1;
    public string $tasktype = '';             // required by migration (string(7))
    public string $instruction = '';          // text -> textarea
    public int $expectedtime = 0;
    public ?string $additionalinformation = null; // text nullable -> textarea

    public array $selectTaskType = [];

    private ColumnValueOptionsService $cvo;

    public function boot(ColumnValueOptionsService $cvo): void
    {
        $this->cvo = $cvo;
    }

    public function mount(?Cooking $cooking = null): void
    {
        $this->cooking = $cooking;

        // if you store options for (cookingsteps, tasktype)
        $this->selectTaskType = $this->cvo->getSelectOptions('cookingsteps', 'tasktype');

        if ($this->tasktype === '' && count($this->selectTaskType) > 0) {
            $this->tasktype = array_key_first($this->selectTaskType);
        }

        $this->reloadRows();
    }

    public function reloadRows(): void
    {
        if (!$this->cooking) {
            $this->rows = [];
            return;
        }

        $items = Cookingstep::query()
            ->where('cooking_id', $this->cooking->id)
            ->orderBy('sequence')
            ->get();

        $this->rows = $items->map(fn ($x) => [
            'id' => $x->id,
            'sequence' => $x->sequence,
            'title' => $x->title,
            'tasktype' => $x->tasktype,
            'expectedtime' => $x->expectedtime,
        ])->all();
    }

    public function startCreate(): void
    {
        $this->editingId = null;

        $this->title = '';
        $this->sequence = 1;

        $this->tasktype = '';
        if (count($this->selectTaskType) > 0) {
            $this->tasktype = array_key_first($this->selectTaskType);
        }

        $this->instruction = '';
        $this->expectedtime = 0;
        $this->additionalinformation = null;
    }

    public function startEdit(int $id): void
    {
        $row = Cookingstep::query()->find($id);
        if (!$row) {
            return;
        }

        $this->editingId = $row->id;
        $this->title = $row->title;
        $this->sequence = (int) $row->sequence;
        $this->tasktype = $row->tasktype;
        $this->instruction = $row->instruction;
        $this->expectedtime = (int) $row->expectedtime;
        $this->additionalinformation = $row->additionalinformation;
    }

    public function save(): void
    {
        if (!$this->cooking) {
            return;
        }

        $validated = $this->validate($this->rules());

        $model = $this->editingId
            ? Cookingstep::query()->find($this->editingId)
            : new Cookingstep();

        if (!$model) {
            return;
        }

        $model->fill($validated);
        $model->cooking_id = $this->cooking->id;
        $model->save();
	$this->successMessage = 'Step saved successfully.';
        $this->startCreate();
        $this->reloadRows();
    }

    public function delete(int $id): void
    {
        $row = Cookingstep::query()->find($id);
        if (!$row) {
            return;
        }

        $row->delete();
        $this->reloadRows();
    }

    private function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'sequence' => ['required', 'integer'],
            'tasktype' => ['required', 'string', 'max:7'],
            'instruction' => ['required', 'string'],
            'expectedtime' => ['required', 'integer'],
            'additionalinformation' => ['nullable', 'string'],
        ];
    }
	private function clearMessages(): void
	{
		$this->successMessage = null;
		$this->errorMessage = null;
	}
    public function render()
    {
        return view('livewire.cookings.steps-tab');
    }
}
