// app/Livewire/InstructionsTab.php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Recipe;
use App\Models\Instruction;

class InstructionsTab extends Component
{
    public Recipe $recipe;
    public $instructions;
    public $newInstruction = ['description' => '', 'step' => ''];
    public $editingInstructionId = null;
    public $editInstruction = ['description' => '', 'step' => ''];

    public function mount(Recipe $recipe, $instructions)
    {
        $this->recipe = $recipe;
        $this->instructions = $instructions;
    }

    public function addInstruction()
    {
        $this->validate([
            'newInstruction.description' => 'required',
            'newInstruction.step' => 'required',
        ]);

        $this->dispatch('add-instruction', data: $this->newInstruction);
        $this->newInstruction = ['description' => '', 'step' => ''];
    }

    public function editInstruction($id)
    {
        $instruction = collect($this->instructions)->firstWhere('id', $id);
        $this->editInstruction = $instruction;
        $this->editingInstructionId = $id;
    }

    public function updateInstruction()
    {
        $this->validate([
            'editInstruction.description' => 'required',
            'editInstruction.step' => 'required',
        ]);

        $this->dispatch('update-instruction', id: $this->editingInstructionId, data: $this->editInstruction);
        $this->editingInstructionId = null;
    }

    public function deleteInstruction($id)
    {
        $this->dispatch('delete-instruction', id: $id);
    }

    public function render()
    {
        return view('livewire.instructions-tab');
    }
}
