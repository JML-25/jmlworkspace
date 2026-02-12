namespace App\Livewire;

use App\Models\Recipe;
use App\Models\Instruction;
use Livewire\Component;
use Livewire\Attributes\Validate;

class InstructionManager extends Component
{
    public Recipe $recipe;

    #[Validate('required|min:5')]
    public $newStep = '';

    public function addStep()
    {
        $this->validate();

        $this->recipe->instructions()->create([
            'content' => $this->newStep,
            'sort_order' => $this->recipe->instructions()->count() + 1
        ]);

        $this->reset('newStep');
    }

    public function removeStep($id)
    {
        Instruction::destroy($id);
        $this->recipe->load('instructions');
    }

    public function render()
    {
        return view('livewire.instruction-manager', [
            'instructions' => $this->recipe->instructions()->orderBy('sort_order')->get()
        ]);
    }
}