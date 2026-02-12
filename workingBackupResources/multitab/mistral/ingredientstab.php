// app/Livewire/IngredientsTab.php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Recipe;
use App\Models\Ingredient;

class IngredientsTab extends Component
{
    public Recipe $recipe;
    public $ingredients;
    public $newIngredient = ['name' => '', 'quantity' => ''];
    public $editingIngredientId = null;
    public $editIngredient = ['name' => '', 'quantity' => ''];

    public function mount(Recipe $recipe, $ingredients)
    {
        $this->recipe = $recipe;
        $this->ingredients = $ingredients;
    }

    public function addIngredient()
    {
        $this->validate([
            'newIngredient.name' => 'required',
            'newIngredient.quantity' => 'required',
        ]);

        $this->dispatch('add-ingredient', data: $this->newIngredient);
        $this->newIngredient = ['name' => '', 'quantity' => ''];
    }

    public function editIngredient($id)
    {
        $ingredient = collect($this->ingredients)->firstWhere('id', $id);
        $this->editIngredient = $ingredient;
        $this->editingIngredientId = $id;
    }

    public function updateIngredient()
    {
        $this->validate([
            'editIngredient.name' => 'required',
            'editIngredient.quantity' => 'required',
        ]);

        $this->dispatch('update-ingredient', id: $this->editingIngredientId, data: $this->editIngredient);
        $this->editingIngredientId = null;
    }

    public function deleteIngredient($id)
    {
        $this->dispatch('delete-ingredient', id: $id);
    }

    public function render()
    {
        return view('livewire.ingredients-tab');
    }
}
