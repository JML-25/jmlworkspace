// app/Livewire/RecipeForm.php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Instruction;

class RecipeForm extends Component
{
    public Recipe $recipe;
    public $activeTab = 'recipe';
    public $ingredients = [];
    public $instructions = [];

    public function mount(Recipe $recipe)
    {
        $this->recipe = $recipe;
        $this->ingredients = $this->recipe->ingredients->toArray();
        $this->instructions = $this->recipe->instructions->toArray();
    }

    public function updateRecipe($data)
    {
        $this->recipe->update($data);
        $this->dispatch('recipe-updated');
    }

    public function addIngredient($data)
    {
        $ingredient = $this->recipe->ingredients()->create($data);
        $this->ingredients[] = $ingredient->toArray();
    }

    public function updateIngredient($id, $data)
    {
        $ingredient = Ingredient::find($id);
        $ingredient->update($data);
        $this->ingredients = $this->recipe->ingredients->fresh()->toArray();
    }

    public function deleteIngredient($id)
    {
        Ingredient::find($id)->delete();
        $this->ingredients = $this->recipe->ingredients->fresh()->toArray();
    }

    public function addInstruction($data)
    {
        $instruction = $this->recipe->instructions()->create($data);
        $this->instructions[] = $instruction->toArray();
    }

    public function updateInstruction($id, $data)
    {
        $instruction = Instruction::find($id);
        $instruction->update($data);
        $this->instructions = $this->recipe->instructions->fresh()->toArray();
    }

    public function deleteInstruction($id)
    {
        Instruction::find($id)->delete();
        $this->instructions = $this->recipe->instructions->fresh()->toArray();
    }

    public function render()
    {
        return view('livewire.recipe-form');
    }
}
