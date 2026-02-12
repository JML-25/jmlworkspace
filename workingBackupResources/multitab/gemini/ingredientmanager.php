namespace App\Livewire;

use App\Models\Recipe;
use App\Models\Ingredient;
use Livewire\Component;
use Livewire\Attributes\Validate;

class IngredientManager extends Component
{
    public Recipe $recipe;
    
    // Temporary storage for adding a new ingredient
    #[Validate('required')]
    public $newName = '';
    #[Validate('required')]
    public $newAmount = '';

    public function addIngredient()
    {
        $this->validate();
        
        // Save directly to the relationship
        $this->recipe->ingredients()->create([
            'name' => $this->newName,
            'amount' => $this->newAmount
        ]);

        $this->reset(['newName', 'newAmount']);
    }

    public function removeIngredient($id)
    {
        Ingredient::find($id)->delete();
        $this->recipe->load('ingredients'); // Refresh the relation
    }

    public function render()
    {
        return view('livewire.ingredient-manager', [
            'ingredients' => $this->recipe->ingredients
        ]);
    }
}