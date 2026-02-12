namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Component;
use Livewire\Attributes\Validate;

class RecipeForm extends Component
{
    public ?Recipe $recipe = null;
    public $activeTab = 'details';

    #[Validate('required|string|min:3')]
    public $title = '';

    #[Validate([
        'ingredients.*.name' => 'required|string',
        'ingredients.*.amount' => 'required|string',
    ])]
    public $ingredients = [];

    #[Validate([
        'instructions.*.content' => 'required|string',
    ])]
    public $instructions = [];

    public function mount(Recipe $recipe = null)
    {
        if ($recipe && $recipe->exists) {
            $this->recipe = $recipe;
            $this->title = $recipe->title;
            $this->ingredients = $recipe->ingredients->toArray();
            $this->instructions = $recipe->instructions->toArray();
        }
    }

    // --- Dynamic Row Logic ---

    public function addIngredient()
    {
        $this->ingredients[] = ['name' => '', 'amount' => ''];
    }

    public function removeIngredient($index)
    {
        unset($this->ingredients[$index]);
        $this->ingredients = array_values($this->ingredients);
    }

    public function addInstruction()
    {
        $this->instructions[] = ['content' => '', 'order' => count($this->instructions) + 1];
    }

    public function removeInstruction($index)
    {
        unset($this->instructions[$index]);
        $this->instructions = array_values($this->instructions);
    }

    // --- Persistence ---

    public function save()
    {
        $this->validate();

        $recipe = $this->recipe ?? new Recipe();
        $recipe->title = $this->title;
        $recipe->save();

        // Sync Ingredients: Simple approach is to delete and recreate 
        // OR use a more advanced upsert logic.
        $recipe->ingredients()->delete();
        $recipe->ingredients()->createMany($this->ingredients);

        $recipe->instructions()->delete();
        $recipe->instructions()->createMany($this->instructions);

        session()->flash('message', 'Recipe saved successfully!');
        return redirect()->route('recipes.index');
    }

    public function render()
    {
        return view('livewire.recipe-form');
    }
}